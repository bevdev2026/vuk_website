<?php
http_response_code(404);
require_once 'includes/config.php';
$PAGE = [
  'title'       => $SITE['brand'] . ' — TILT.',
  'description' => 'Page not found.',
  'slug'        => '404',
];
require_once 'includes/header.php';
?>

<main>
  <div class="page-404">
    <div>
      <div class="error-number">404</div>
      <h1 class="error-headline">TILT.</h1>
      <p class="error-sub">
        You nudged too hard. This page doesn&rsquo;t exist &mdash; and
        unlike a real tilt, there&rsquo;s no one to blame but the universe.
        The machines are still waiting.
      </p>
      <div class="error-buttons">
        <a href="index.php" class="btn btn-primary btn-pill">Back to Home</a>
        <a href="index.php#events" class="btn btn-ghost btn-pill">See What&rsquo;s On</a>
      </div>
    </div>
  </div>
</main>

<?php require_once 'includes/footer.php'; ?>
