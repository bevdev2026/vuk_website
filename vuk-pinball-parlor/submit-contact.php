<?php
/**
 * submit-contact.php
 * Included by contact.php when $_SERVER['REQUEST_METHOD'] === 'POST'.
 * Sets $result = ['ok' => bool, 'message' => string].
 */

require_once 'includes/config.php';

$result = null;

// Honeypot — silently discard if filled
if (!empty($_POST['website'])) {
  $result = ['ok' => true, 'message' => 'Thanks! We\'ll be in touch.'];
  return;
}

// Validate required fields
$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
  $result = ['ok' => false, 'message' => 'Please fill in all required fields.'];
  return;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $result = ['ok' => false, 'message' => 'Please enter a valid email address.'];
  return;
}

// Sanitize for headers
$name    = preg_replace('/[\r\n]/', '', $name);
$email   = preg_replace('/[\r\n]/', '', $email);
$subject = 'Contact form — ' . htmlspecialchars($name, ENT_QUOTES);
$to      = $SITE['support_email'];

// Handle optional attachment
$attachment      = null;
$allowed_types   = ['image/jpeg', 'image/png'];
$max_bytes       = 5 * 1024 * 1024; // 5 MB

if (!empty($_FILES['attachment']['name'])) {
  $file = $_FILES['attachment'];

  if ($file['error'] !== UPLOAD_ERR_OK) {
    $result = ['ok' => false, 'message' => 'File upload failed. Please try again.'];
    return;
  }

  if ($file['size'] > $max_bytes) {
    $result = ['ok' => false, 'message' => 'Attachment must be 5 MB or smaller.'];
    return;
  }

  $finfo     = new finfo(FILEINFO_MIME_TYPE);
  $mime_type = $finfo->file($file['tmp_name']);

  if (!in_array($mime_type, $allowed_types, true)) {
    $result = ['ok' => false, 'message' => 'Only JPG and PNG files are accepted.'];
    return;
  }

  $attachment = [
    'tmp'      => $file['tmp_name'],
    'name'     => basename($file['name']),
    'mime'     => $mime_type,
    'contents' => base64_encode(file_get_contents($file['tmp_name'])),
  ];
}

// Build MIME email
$boundary = '----=_Part_' . md5(uniqid());

$headers  = "From: {$name} <{$email}>\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "MIME-Version: 1.0\r\n";

if ($attachment) {
  $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

  $body  = "--{$boundary}\r\n";
  $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
  $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
  $body .= "Name: {$name}\r\nEmail: {$email}\r\n\r\n{$message}\r\n\r\n";

  $body .= "--{$boundary}\r\n";
  $body .= "Content-Type: {$attachment['mime']}; name=\"{$attachment['name']}\"\r\n";
  $body .= "Content-Transfer-Encoding: base64\r\n";
  $body .= "Content-Disposition: attachment; filename=\"{$attachment['name']}\"\r\n\r\n";
  $body .= chunk_split($attachment['contents']) . "\r\n";

  $body .= "--{$boundary}--";
} else {
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
  $body     = "Name: {$name}\r\nEmail: {$email}\r\n\r\n{$message}";
}

$sent = mail($to, $subject, $body, $headers);

if ($sent) {
  $result = ['ok' => true, 'message' => 'Message sent! We\'ll get back to you soon.'];
} else {
  $result = ['ok' => false, 'message' => 'Something went wrong sending your message. Please email us directly.'];
}
