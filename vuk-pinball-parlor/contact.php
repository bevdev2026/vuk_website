<?php
require_once 'includes/config.php';

$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once 'submit-contact.php';
}

$PAGE = [
  'title'       => $SITE['brand'] . ' — Contact',
  'description' => 'Get in touch with Vuk Pinball Parlor. Questions, Local Hero submissions, or just want to say hello — we\'d love to hear from you.',
  'slug'        => 'contact',
];
require_once 'includes/header.php';
?>

<main>

  <section class="section">
    <div class="container" style="max-width:680px;">

      <span class="section-tag">Get In Touch</span>
      <h1 class="section-title">Contact Us</h1>
      <p class="section-desc">
        Questions, Local Hero score submissions, or anything else &mdash; drop us a line.
        Attach a photo if you&rsquo;re submitting a high score (JPG or PNG, up to 5&nbsp;MB).
      </p>

      <!-- Direct email -->
      <div class="contact-email-block">
        <div class="contact-email-label">Email us directly</div>
        <a href="mailto:<?= htmlspecialchars($SITE['support_email']) ?>" class="contact-email-link">
          <?= htmlspecialchars($SITE['support_email']) ?>
        </a>
      </div>

      <!-- Inline result -->
      <?php if ($result !== null): ?>
        <div class="inline-flash inline-flash--<?= $result['ok'] ? 'ok' : 'err' ?>">
          <?= htmlspecialchars($result['message']) ?>
        </div>
      <?php endif; ?>

      <!-- Contact form -->
      <?php if ($result === null || !$result['ok']): ?>
      <form class="contact-form" method="POST" action="contact.php" enctype="multipart/form-data" novalidate>

        <!-- Honeypot -->
        <div class="hp-field" aria-hidden="true">
          <label for="website">Website</label>
          <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="form-group">
          <label class="form-label" for="name">Name <span class="required">*</span></label>
          <input
            class="form-input"
            type="text"
            id="name"
            name="name"
            value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
            placeholder="Your name"
            required
            autocomplete="name">
        </div>

        <div class="form-group">
          <label class="form-label" for="email">Email <span class="required">*</span></label>
          <input
            class="form-input"
            type="email"
            id="email"
            name="email"
            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
            placeholder="you@example.com"
            required
            autocomplete="email">
        </div>

        <div class="form-group">
          <label class="form-label" for="message">Message <span class="required">*</span></label>
          <textarea
            class="form-textarea"
            id="message"
            name="message"
            placeholder="What's on your mind?"
            required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
          <label class="form-label" for="attachment">Photo Attachment <span style="opacity:.5;font-size:10px;">(optional)</span></label>
          <div class="form-file-wrap">
            <input class="form-file" type="file" id="attachment" name="attachment" accept=".jpg,.jpeg,.png">
          </div>
          <div class="form-hint">JPG or PNG only &mdash; max 5 MB. Use this to submit a Local Hero high score photo.</div>
        </div>

        <button type="submit" class="btn btn-primary btn-pill form-submit">Send Message</button>

      </form>
      <?php endif; ?>

    </div>
  </section>

</main>

<?php require_once 'includes/footer.php'; ?>
