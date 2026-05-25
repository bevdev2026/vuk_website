<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($PAGE['title']) ?></title>
  <meta name="description" content="<?= htmlspecialchars($PAGE['description']) ?>">
  <link rel="icon" href="assets/images/favicon.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700;900&family=Cinzel:wght@400;600;700&family=Spectral:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/tokens.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="assets/js/nav.js" defer></script>
</head>
<body>

<header class="site-header" id="site-header">
  <div class="nav-container">
    <a href="index.php" class="nav-brand" aria-label="<?= htmlspecialchars($SITE['brand']) ?>">
      <img src="assets/images/vuk_logo.png" alt="<?= htmlspecialchars($SITE['brand']) ?>" class="nav-logo"
           onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
    </a>
    <nav class="nav-links" aria-label="Main navigation">
      <?php foreach ($NAV as $item):
        $active = ($PAGE['slug'] === $item['slug']) ? ' active' : '';
      ?>
        <a href="<?= htmlspecialchars($item['href']) ?>" class="nav-link<?= $active ?>"><?= htmlspecialchars($item['label']) ?></a>
      <?php endforeach; ?>
    </nav>
    <button class="nav-toggle" aria-label="Open menu" aria-expanded="false">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <line x1="3" y1="6"  x2="21" y2="6"  stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        <line x1="3" y1="12" x2="21" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        <line x1="3" y1="18" x2="21" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
      </svg>
    </button>
  </div>
  <div class="nav-overlay" aria-hidden="true">
    <button class="nav-close" aria-label="Close menu">&#x2715;</button>
    <a href="index.php" class="nav-overlay-brand">
      <img src="assets/images/vuk_logo.png" alt="<?= htmlspecialchars($SITE['brand']) ?>" class="nav-overlay-logo"
           onerror="this.onerror=null;this.src='assets/images/placeholder-mechanism.svg'">
    </a>
    <nav class="nav-overlay-links" aria-label="Mobile navigation">
      <?php foreach ($NAV as $item):
        $active = ($PAGE['slug'] === $item['slug']) ? ' active' : '';
      ?>
        <a href="<?= htmlspecialchars($item['href']) ?>" class="nav-link<?= $active ?>"><?= htmlspecialchars($item['label']) ?></a>
      <?php endforeach; ?>
    </nav>
  </div>
</header>
