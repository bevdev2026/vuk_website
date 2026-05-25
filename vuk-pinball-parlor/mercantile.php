<?php
require_once 'includes/config.php';
$PAGE = [
  'title'       => $SITE['brand'] . ' — Mercantile',
  'description' => 'Vuk Pinball Parlor merchandise — apparel, swag, and stickers. Represent your local pinball parlor.',
  'slug'        => 'mercantile',
];
require_once 'includes/header.php';
?>

<main>

  <!-- ============================================================
       Page Hero
       ============================================================ -->
  <section class="section text-center" style="padding-bottom:var(--space-lg);">
    <div class="container">
      <span class="section-tag">Mercantile</span>
      <h1 class="section-title">Represent the Parlor</h1>
      <p class="section-desc" style="margin:0 auto;">
        Gear up. Whether you&rsquo;re a regular or just discovered us, take a piece of
        <?= htmlspecialchars($SITE['brand_short']) ?> home with you.
      </p>
    </div>
  </section>

  <!-- ============================================================
       Section 01: Apparel
       ============================================================ -->
  <section class="section section-dark" id="apparel">
    <div class="container">
      <span class="section-tag">01 &mdash; Apparel</span>
      <h2 class="section-title">Apparel</h2>
      <p class="section-desc">
        Tees, hoodies, and hats bearing the <?= htmlspecialchars($SITE['brand_short']) ?> mark.
        Worn-in style for people who keep the machines alive.
      </p>
      <div class="grid-3">

        <div class="frame">
          <img src="assets/images/placeholder-mechanism.svg" alt="Vuk T-Shirt" class="frame-image"
               onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
          <div class="frame-title">Classic Tee</div>
          <p class="frame-body">The standard. <?= htmlspecialchars($SITE['brand_short']) ?> wordmark on heavyweight cotton. Available in black and charcoal.</p>
        </div>

        <div class="frame">
          <img src="assets/images/placeholder-mechanism.svg" alt="Vuk Hoodie" class="frame-image"
               onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
          <div class="frame-title">Pullover Hoodie</div>
          <p class="frame-body">Midweight fleece with the <?= htmlspecialchars($SITE['brand_short']) ?> logo embroidered on chest. Made for late nights at the ATC.</p>
        </div>

        <div class="frame">
          <img src="assets/images/placeholder-mechanism.svg" alt="Vuk Hat" class="frame-image"
               onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
          <div class="frame-title">Structured Cap</div>
          <p class="frame-body">Six-panel, adjustable snapback. Embroidered logo, low profile. Black only.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       Section 02: Swag
       ============================================================ -->
  <section class="section" id="swag">
    <div class="container">
      <span class="section-tag">02 &mdash; Swag</span>
      <h2 class="section-title">Swag</h2>
      <p class="section-desc">
        Small things that make a big statement. Pins, patches, pint glasses &mdash; the kind of stuff that ends up on your shelf forever.
      </p>
      <div class="grid-3">

        <div class="frame">
          <img src="assets/images/placeholder-mechanism.svg" alt="Vuk Enamel Pin" class="frame-image"
               onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
          <div class="frame-title">Enamel Pin</div>
          <p class="frame-body">Hard enamel, dual post. The <?= htmlspecialchars($SITE['brand_short']) ?> logo in copper and gold. Clip it on your bag or jacket.</p>
        </div>

        <div class="frame">
          <img src="assets/images/placeholder-mechanism.svg" alt="Vuk Pint Glass" class="frame-image"
               onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
          <div class="frame-title">Pint Glass</div>
          <p class="frame-body">16 oz. shaker pint, screen-printed logo. Use it at home, or grab one at the bar.</p>
        </div>

        <div class="frame">
          <img src="assets/images/placeholder-mechanism.svg" alt="Vuk Patch" class="frame-image"
               onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
          <div class="frame-title">Embroidered Patch</div>
          <p class="frame-body">Iron-on or sew-on. The full <?= htmlspecialchars($SITE['brand_short']) ?> mark, 3&Prime; wide. Put it anywhere it fits.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       Section 03: Stickers
       ============================================================ -->
  <section class="section section-dark" id="stickers">
    <div class="container">
      <span class="section-tag">03 &mdash; Stickers</span>
      <h2 class="section-title">Stickers</h2>
      <p class="section-desc">
        Waterproof vinyl. Laptop, water bottle, machine backglass &mdash; wherever you want the world to know where you play.
      </p>
      <div class="grid-3">

        <div class="frame">
          <img src="assets/images/placeholder-mechanism.svg" alt="Vuk Die-Cut Sticker" class="frame-image"
               onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
          <div class="frame-title">Die-Cut Logo</div>
          <p class="frame-body">Precision cut to the <?= htmlspecialchars($SITE['brand_short']) ?> mark. UV-resistant, weatherproof. 3&Prime; tall.</p>
        </div>

        <div class="frame">
          <img src="assets/images/placeholder-mechanism.svg" alt="Vuk Rectangle Sticker" class="frame-image"
               onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
          <div class="frame-title">Wordmark Rectangle</div>
          <p class="frame-body">Clean horizontal layout with the full venue name. Matte finish, 4&Prime; &times; 1.5&Prime;.</p>
        </div>

        <div class="frame">
          <img src="assets/images/placeholder-mechanism.svg" alt="Vuk Holographic Sticker" class="frame-image"
               onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
          <div class="frame-title">Holographic Circle</div>
          <p class="frame-body">2&Prime; round, holographic foil finish. Because pinball machines deserve a little flash.</p>
        </div>

      </div>
    </div>
  </section>

</main>

<?php require_once 'includes/footer.php'; ?>
