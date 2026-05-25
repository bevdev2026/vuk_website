<?php
require_once 'includes/config.php';
$PAGE = [
  'title'       => $SITE['brand'] . ' — Pinball Parlor in Durham, NC',
  'description' => 'Vuk Pinball Parlor — a pinball lounge inside Fullsteam Brewery at the American Tobacco Company in Durham, NC. League nights, open play, and masterfully maintained machines.',
  'slug'        => 'home',
];
require_once 'includes/header.php';
?>

<main>

  <!-- ============================================================
       Block 1: Hero
       ============================================================ -->
  <section class="hero">
    <video class="hero-video" autoplay muted loop playsinline
           poster="assets/images/hero-bg.png">
      <source src="assets/images/hero-bg.mp4" type="video/mp4">
    </video>
    <span class="hero-corner hero-corner--tl"></span>
    <span class="hero-corner hero-corner--tr"></span>
    <span class="hero-corner hero-corner--bl"></span>
    <span class="hero-corner hero-corner--br"></span>
    <div class="hero-inner">
      <p class="hero-eyebrow">A Fullsteam Brewery Residency &mdash; Durham, NC</p>
      <img
        src="assets/images/vuk_logo.png"
        alt="<?= htmlspecialchars($SITE['brand']) ?>"
        class="hero-logo"
        onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
      <p class="hero-tagline"><?= htmlspecialchars($SITE['tagline']) ?></p>
      <div class="hero-buttons">
        <a href="leagues.php" class="btn btn-primary btn-pill">League Nights</a>
        <a href="#locations" class="btn btn-ghost btn-pill">Find Us</a>
      </div>
    </div>
  </section>


  <!-- ============================================================
       Block 2: About
       ============================================================ -->
  <section class="section text-center" id="about">
    <div class="container">
      <span class="section-tag">01 &mdash; About</span>
      <div class="section-intro" style="margin:0 auto;">
        <p class="section-desc" style="margin:0 auto;">
          Vuk is a pinball parlor inside Fullsteam Brewery at the American Tobacco Company in Durham &mdash;
          built by people who love both the game and the machines. Every table on our floor is maintained
          to play exactly the way it was designed to. We care about the craft, and it shows.
          Whether you've never touched a flipper or you're chasing your IFPA ranking, you belong here.
          Explore the site to find out what's on.
        </p>
      </div>
    </div>
  </section>

</main>

<?php require_once 'includes/footer.php'; ?>
