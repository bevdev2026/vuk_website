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
            American Tobacco Company<br>
            Blackwell St, Durham, NC 27701
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
        'https://www.google.com/maps/dir/?api=1&destination=American+Tobacco+Company+Blackwell+St+Durham+NC+27701&origin=' + encodeURIComponent(origin),
        '_blank', 'noopener'
      );
    }
    btn.addEventListener('click', go);
    input.addEventListener('keydown', function (e) { if (e.key === 'Enter') go(); });
  }());
  </script>


  <!-- ============================================================
       Block 4: Upcoming Events
       ============================================================ -->
  <?php
  require_once 'includes/events.php';

  $monthParam = (isset($_GET['month']) && preg_match('/^\d{4}-\d{2}$/', $_GET['month']))
    ? $_GET['month'] : date('Y-m');
  [$calYear, $calMonth] = array_map('intval', explode('-', $monthParam));
  if ($calMonth < 1 || $calMonth > 12) { $calYear = (int)date('Y'); $calMonth = (int)date('m'); }

  $firstTs   = mktime(0, 0, 0, $calMonth, 1, $calYear);
  $daysInMon = (int)date('t', $firstTs);
  $startDow  = (int)date('w', $firstTs);
  $today     = date('Y-m-d');
  $prevMon   = date('Y-m', mktime(0, 0, 0, $calMonth - 1, 1, $calYear));
  $nextMon   = date('Y-m', mktime(0, 0, 0, $calMonth + 1, 1, $calYear));

  $eventsByDate = [];
  foreach ($EVENTS as $i => $ev) {
    $eventsByDate[$ev['date']][] = $i;
  }
  ?>
  <section class="section" id="events">
    <div class="container">
      <span class="section-tag">03 &mdash; Events</span>
      <h2 class="section-title">Upcoming Events</h2>

      <div class="calendar-header">
        <a href="?month=<?= $prevMon ?>#events" class="calendar-nav" aria-label="Previous month">&#8592;</a>
        <span class="calendar-month"><?= date('F Y', $firstTs) ?></span>
        <a href="?month=<?= $nextMon ?>#events" class="calendar-nav" aria-label="Next month">&#8594;</a>
      </div>

      <div class="calendar-grid">
        <?php foreach (['Sun','Mon','Tue','Wed','Thu','Fri','Sat'] as $dow): ?>
          <div class="calendar-dow"><?= $dow ?></div>
        <?php endforeach; ?>

        <?php for ($e = 0; $e < $startDow; $e++): ?>
          <div class="calendar-cell calendar-cell--empty"></div>
        <?php endfor; ?>

        <?php for ($d = 1; $d <= $daysInMon; $d++):
          $ds      = sprintf('%04d-%02d-%02d', $calYear, $calMonth, $d);
          $isToday = ($ds === $today);
          $evIdxs  = $eventsByDate[$ds] ?? [];
        ?>
          <div class="calendar-cell<?= $isToday ? ' calendar-cell--today' : '' ?><?= $evIdxs ? ' calendar-cell--has-events' : '' ?>">
            <span class="calendar-day"><?= $d ?></span>
            <?php foreach ($evIdxs as $i): ?>
              <a href="#event-<?= $i ?>" class="calendar-event"><?= htmlspecialchars($EVENTS[$i]['title']) ?></a>
            <?php endforeach; ?>
          </div>
        <?php endfor; ?>
      </div>

      <?php foreach ($EVENTS as $i => $ev): ?>
        <div id="event-<?= $i ?>" class="event-card">
          <div class="event-card-inner">
            <h3 class="event-card-title"><?= htmlspecialchars($ev['title']) ?></h3>
            <span class="event-card-meta"><?= date('l, F j, Y', strtotime($ev['date'])) ?> &mdash; <?= htmlspecialchars($ev['time']) ?></span>
            <p class="event-card-desc"><?= htmlspecialchars($ev['description']) ?></p>
            <?php if ($ev['url']): ?>
              <a href="<?= htmlspecialchars($ev['url']) ?>" target="_blank" rel="noopener" class="btn btn-ghost"><?= htmlspecialchars($ev['url_label']) ?></a>
            <?php endif; ?>
            <a href="#events" class="event-card-close" aria-label="Close event">&#x2715;</a>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </section>


  <!-- ============================================================
       Block 5: Leaderboard
       ============================================================ -->
  <section class="section section-dark text-center" id="leaderboard">
    <div class="container">
      <span class="section-tag">04 &mdash; Leaderboard</span>
      <h2 class="section-title">Leaderboard</h2>

      <?php if ($SITE['insider_leaderboard_url']): ?>

        <iframe
          src="<?= htmlspecialchars($SITE['insider_leaderboard_url']) ?>"
          width="100%" height="600"
          style="border:0;display:block;border-radius:var(--radius-md);"
          loading="lazy"
          title="Vuk Pinball Leaderboard — Stern Insider Connected">
          <a href="<?= htmlspecialchars($SITE['insider_leaderboard_url']) ?>" target="_blank" rel="noopener">
            View leaderboard on Stern Insider Connected
          </a>
        </iframe>

      <?php else: ?>

        <div class="leaderboard-placeholder">
          <div class="leaderboard-icon" aria-hidden="true">&#9651;</div>
          <p class="section-desc" style="margin:0 auto var(--space-md);">
            Live leaderboards powered by Stern Insider Connected &mdash; coming soon.
          </p>
          <p class="leaderboard-sub">
            Track your scores, climb the rankings, and see who&rsquo;s leading on every machine.
          </p>
        </div>

      <?php endif; ?>

    </div>
  </section>

</main>

<?php require_once 'includes/footer.php'; ?>
