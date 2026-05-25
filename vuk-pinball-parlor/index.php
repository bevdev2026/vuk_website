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


  <!-- ============================================================
       Block 3: Locations
       ============================================================ -->
  <section class="section section-dark" id="locations">
    <div class="container">
      <span class="section-tag">02 &mdash; Find Us</span>
      <div class="grid-2">

        <!-- Left: address + directions -->
        <div>
          <h2 class="section-title">Find Us</h2>
          <p class="section-desc">
            Vuk Pinball Parlor is located inside Fullsteam Brewery at the
            American Tobacco Company (ATC) in Durham, NC. We&rsquo;re on the ATC campus &mdash;
            find Fullsteam and you&rsquo;ll find us.
          </p>
          <address class="location-address">
            Fullsteam Brewery<br>
            726 Rigsbee Ave<br>
            Durham, NC 27701
          </address>
          <a href="<?= htmlspecialchars($SITE['fullsteam_url']) ?>"
             target="_blank" rel="noopener noreferrer"
             class="btn btn-ghost mb-xl">Visit Fullsteam Brewery</a>

          <div class="mb-xl">
            <p style="font-family:var(--font-heading);font-size:11px;letter-spacing:var(--tracking-wide);text-transform:uppercase;color:var(--copper-bright);margin-bottom:var(--space-sm);">Get Directions From</p>
            <div class="directions-row">
              <input id="directions-from" type="text" placeholder="Your starting address">
              <button type="button" class="btn btn-primary" id="directions-btn">Go</button>
            </div>
          </div>
        </div>

        <!-- Right: map -->
        <div class="map-wrap">
          <?php if ($SITE['maps_embed_url']): ?>
            <iframe
              src="<?= htmlspecialchars($SITE['maps_embed_url']) ?>"
              allowfullscreen loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="<?= htmlspecialchars($SITE['venue']) ?>"></iframe>
          <?php else: ?>
            <div style="display:flex;align-items:center;justify-content:center;height:100%;color:var(--parchment);font-family:var(--font-mono);font-size:13px;">Map coming soon</div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </section>
  <script>
  (function () {
    var btn   = document.getElementById('directions-btn');
    var input = document.getElementById('directions-from');
    function go() {
      var origin = input.value.trim();
      if (!origin) { input.focus(); return; }
      window.open(
        'https://www.google.com/maps/dir/?api=1&destination=Fullsteam+Brewery+Durham+NC&origin=' + encodeURIComponent(origin),
        '_blank', 'noopener'
      );
    }
    btn.addEventListener('click', go);
    input.addEventListener('keydown', function (e) { if (e.key === 'Enter') go(); });
  }());
  </script>

</main>

<?php require_once 'includes/footer.php'; ?>
