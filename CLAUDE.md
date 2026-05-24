# CLAUDE.md — Vuk Pinball Parlor

## Project Overview
Plain PHP 8.3 website for **Vuk Pinball Parlor** — a pinball venue located inside Fullsteam Brewery at the American Tobacco Company (ATC) in Durham, NC. No framework. No build step. PHP built-in server for local dev.

This is a venue website for Vuk Pinball Parlor. The parent company (Triangle Coin Op LLC) is **not** the subject of this site and must not appear in content, copy, or branding — only in the footer copyright line.

**Local dev server:**
```
php -S 127.0.0.1:8765 -t vuk-pinball-parlor/
```

**Local root path:**
```
C:\Users\steve\OneDrive\Desktop\vuk-pinball-parlor\vuk-pinball-parlor\
```

---

## File Structure
```
vuk-pinball-parlor/
├── .htaccess
├── index.php
├── leagues.php
├── mercantile.php
├── contact.php
├── 404.php
├── submit-contact.php
├── includes/
│   ├── config.php       ← $SITE, $NAV, $PAGE defaults
│   ├── events.php       ← event data array
│   ├── header.php
│   └── footer.php
└── assets/
    └── images/
```

---

## Core Rules

### 1. Build one section at a time
- Complete and confirm each section before moving to the next.
- Never scaffold multiple pages or sections speculatively.
- Ask before touching any file not directly related to the current task.

### 2. Do not recreate or modify existing code unless required
- If a section already exists and works, leave it alone.
- Only modify existing code when: (a) a bug must be fixed, or (b) the current task explicitly requires it.
- If a change to existing code is needed, call it out explicitly before making it.

### 3. Config is the single source of truth
- All site-wide values (brand, URLs, emails, nav) live in `includes/config.php`.
- Never hardcode brand names, URLs, or contact info into page files.
- Always use `$SITE['key']` and `htmlspecialchars()` when outputting config values.

### 4. Nav is defined once
- `$NAV` in `config.php` drives both header and footer nav.
- Never add nav links directly to `header.php` or `footer.php`.

### 5. Includes pattern
Every page follows this exact wrapper pattern:
```php
<?php
require_once 'includes/config.php';
$PAGE = [
  'title'       => $SITE['brand'] . ' — Page Title',
  'description' => 'Page-specific meta description.',
  'slug'        => 'slug-matching-NAV',
];
require_once 'includes/header.php';
?>

<!-- page content -->

<?php require_once 'includes/footer.php'; ?>
```

### 6. Image fallbacks
All `<img>` tags must include an `onerror` fallback to a placeholder SVG:
```html
onerror="this.onerror=null;this.src='assets/images/placeholder-[type].svg'"
```

### 7. Minimal diffs
- Make the smallest possible change to accomplish the task.
- Do not reformat, re-indent, or reorganize code outside the section being worked on.

### 8. Todo tracking
- After completing each section or task, update `todo.md` to mark it done.
- Add any discovered sub-tasks or follow-ups to `todo.md` immediately.

### 9. Brand discipline
- This site is for **Vuk Pinball Parlor** — not Triangle Coin Op.
- Never use "Triangle Coin Op" in page copy, headings, meta descriptions, or nav.
- The only permitted use of "Triangle Coin Op LLC" is in the footer copyright line.

---

## Venue Detail
- **Venue name:** Vuk Pinball Parlor (also referred to as Vuk Pinball Lounge)
- **Located inside:** Fullsteam Brewery, American Tobacco Company (ATC), Durham, NC
- **ATC** = American Tobacco Company — spell out on first reference per page, abbreviate after

---

## Navigation

### Desktop Nav
- Lives entirely in `includes/header.php`
- Rendered by looping `$NAV` from `config.php` — never hardcoded
- Logo/brand name ("Vuk") on the left, nav links on the right
- Active state: compare each item's `slug` to `$PAGE['slug']`; add `class="active"` when matched
- Brand name links to `index.php`
- Nav is sticky (fixed to top on scroll)
- Example render loop:
```php
foreach ($NAV as $item) {
    $active = ($PAGE['slug'] === $item['slug']) ? ' class="nav-link active"' : ' class="nav-link"';
    echo '<a href="' . htmlspecialchars($item['href']) . '"' . $active . '>'
       . htmlspecialchars($item['label']) . '</a>';
}
```

### Mobile Nav
- Breakpoint: collapse to hamburger at `max-width: 768px`
- Hamburger button: three-line SVG icon, top-right corner, `aria-label="Open menu"`
- On tap: full-screen overlay slides down (or drawer slides in from right)
- Overlay contains: brand name at top, stacked nav links centered, close button (✕)
- Active link highlighted same as desktop
- Close on: ✕ button tap, nav link tap, or tap outside the drawer
- **Implementation: vanilla JS only — no jQuery, no libraries**
- Toggle class `nav-open` on `<body>` to drive open/close state via CSS
- JS is inlined at bottom of `header.php` or in `assets/js/nav.js` — no inline `onclick` attributes
- Must be keyboard accessible: `Escape` key closes the menu

### HTML Structure
```html
<header class="site-header">
  <div class="nav-container">
    <a href="index.php" class="nav-brand"><?= htmlspecialchars($SITE['brand']) ?></a>
    <nav class="nav-links" aria-label="Main navigation">
      <!-- loop renders links here -->
    </nav>
    <button class="nav-toggle" aria-label="Open menu" aria-expanded="false">
      <!-- hamburger SVG -->
    </button>
  </div>
  <div class="nav-overlay" aria-hidden="true">
    <button class="nav-close" aria-label="Close menu">✕</button>
    <nav class="nav-overlay-links">
      <!-- same loop -->
    </nav>
  </div>
</header>
```

### CSS Classes
| Class | Purpose |
|-------|---------|
| `site-header` | Sticky top bar |
| `nav-container` | Inner flex row (brand + links + toggle) |
| `nav-brand` | Logo/brand text link |
| `nav-links` | Desktop horizontal link list |
| `nav-link` | Individual link |
| `nav-link.active` | Current page indicator |
| `nav-toggle` | Hamburger button (hidden on desktop) |
| `nav-overlay` | Full-screen mobile menu |
| `nav-overlay-links` | Stacked links inside overlay |
| `nav-close` | Close button inside overlay |
| `body.nav-open` | Applied by JS to lock scroll and show overlay |

---

## Pages

| File | Slug | Purpose |
|------|------|---------|
| `index.php` | `home` | Hero, About, Locations, Events, Leaderboard, Local Hero |
| `leagues.php` | `leagues` | League nights, schedule, how to join |
| `mercantile.php` | `mercantile` | Apparel, Amazon collection, league exclusives |
| `contact.php` | `contact` | Direct email + contact form with optional attachment |
| `404.php` | `404` | Branded error page |

---

## CSS Conventions
Use existing CSS custom properties — do not introduce new color values or spacing literals:
- Colors: `--steel-pale`, `--shadow-deep`, etc.
- Spacing: `--radius-lg`, `mb-xl`, etc.
- Layout classes: `container`, `grid-2`, `grid-3`, `section`, `section-dark`, `section-steel`
- Components: `btn`, `btn-primary`, `btn-ghost`, `btn-steel`, `btn-pill`, `frame`, `section-tag`, `section-title`, `section-desc`

---

## index.php — Section Specs

### Block 1: Hero
- Video background with poster fallback
- Corner overlay decorations
- Eyebrow: venue residency line
- H1: "VUK"
- Tagline: `$SITE['tagline']`
- Two CTA buttons: "League Nights" → `leagues.php`, "Find Us" → `#locations`

### Block 2: About
- **Layout:** Centered text block, single short paragraph (3–5 sentences max)
- **Section tag:** `01 — About`
- **Tone:** Brand voice — authoritative, warm, enthusiast-to-enthusiast
- **Content must cover:**
  - Vuk is more than a place to play pinball — it's a community
  - Owners are pinball enthusiasts who love both the game and the machines
  - Every machine is maintained in beautiful condition
  - All skill levels welcome — first-timers and seasoned players alike
  - Soft CTA: invite visitors to explore the site to discover what's happening
- **No image required**
- **Do not write marketing fluff** — write like an enthusiast talking to another enthusiast

### Block 3: Locations
- **Section tag:** `02 — Find Us`
- **Layout:** Two-column grid (`grid-2`) — left: address/copy, right: embedded map
- **Copy must include:**
  - Vuk Pinball Parlor is located inside Fullsteam Brewery
  - Full address: Fullsteam Brewery, American Tobacco Company (ATC), Durham, NC
  - Spell out "American Tobacco Company (ATC)" on first reference; use "ATC" after
  - Link to Fullsteam Brewery website (`$SITE['fullsteam_url']`), label "Visit Fullsteam Brewery", new tab
- **Map implementation:**
  - Embed Google Maps iframe via `$SITE['maps_embed_url']` from config
  - Directions input: plain `<input>` + `<button>`, opens `https://www.google.com/maps/dir/?api=1&destination=Fullsteam+Brewery+Durham+NC&origin=USER_INPUT` via JS `window.open()` — no `<form>` POST
  - Add `<!-- CONFIG TODO: add Google Maps Embed API key -->` comment in config

### Block 4: Upcoming Events
- **Section tag:** `03 — Events`
- **Layout:** Full-width calendar grid, month header with prev/next navigation
- **Calendar behavior:**
  - One full month at a time (Sun–Sat, 7 columns)
  - Prev/Next driven by `?month=YYYY-MM` query param — PHP only, no JS required
  - Current day highlighted
  - Days with events visually marked
  - Clicking an event shows detail card below calendar
- **Event data:** Defined in `includes/events.php` as a PHP array
  ```php
  [
    'title'       => 'League Night',
    'date'        => '2025-08-07',
    'time'        => '7:00 PM',
    'description' => 'IFPA-sanctioned league night at Vuk.',
    'url'         => 'https://matchplay.events/...',  // null if none
    'url_label'   => 'Sign up on Matchplay',
  ]
  ```
- External URLs open `target="_blank" rel="noopener"`
- **Event management:** Edit `includes/events.php` directly — ask Claude Code to update
- **Do not build an admin UI for events unless explicitly requested**

### Block 5: Leaderboard
- **Section tag:** `04 — Leaderboard`
- **Layout:** Full-width section, centered content
- **Phase 1 (now — September 2025):** Placeholder
  - "Coming Soon" message referencing Stern Insider Connected
  - Example copy: "Live leaderboards powered by Stern Insider Connected — launching September 2025"
  - No iframe
- **Phase 2 (September 2025+):** Live embed
  - `<iframe>` using `$SITE['insider_leaderboard_url']`
  - Responsive, 100% width, ~600px height
  - Fallback link inside iframe tag if `X-Frame-Options` blocks embed
- **Config:** `'insider_leaderboard_url' => null` — swap in real URL in September
- **Build rule:** If `$SITE['insider_leaderboard_url']` is `null`, render Coming Soon; otherwise render iframe

### Block 6: Local Hero
- **Section tag:** `05 — Local Heroes`
- **Layout:** Centered text block, simple and clean
- **Content:**
  - Brief copy explaining the Local Hero board — celebrating highest scores on each machine
  - Instruct players to email a photo of themselves and a photo of their high score screen
  - Direct to contact form at `contact.php` — note that attachments are accepted
- **No file upload, no admin UI, no JSON data** — managed manually via email
- **Phase 2 (future):** Upgrade to a display board once enough submissions exist

### Block 7: Footer
- **Lives in:** `includes/footer.php`
- **Layout:** Full-width dark bar, centered single or two-row layout
- **Content:**
  - Copyright: `© <?= $SITE['year'] ?> Triangle Coin Op LLC. All rights reserved.`
  - This is the **only place** Triangle Coin Op LLC appears on the site
  - Fullsteam Brewery link: `$SITE['fullsteam_url']`, label "A Fullsteam Brewery Residency", new tab
  - Social icons: Facebook and Instagram — inline SVG, no icon font
  - Social URLs: `$SITE['facebook_url']` and `$SITE['instagram_url']`
- **Rules:**
  - Social links open `target="_blank" rel="noopener noreferrer"`
  - If a social URL is `null` or `'#'`, do not render that icon
  - Nav links in footer: optional — defer unless requested

---

## 404.php
- **Activation:** `.htaccess` rule: `ErrorDocument 404 /404.php`
- **PHP:** `http_response_code(404);` at top of file before any output
- **Layout:** Centered, full-viewport-height, full site header/footer
- **Content:**
  - Large styled "404" — brand typography
  - Pinball headline — choose one: "Drained." / "Ball Lost." / "TILT."
  - Subline: "That page doesn't exist — but there's plenty to play."
  - CTAs: "Back to Home" → `index.php` and "View Events" → `leagues.php`
- **Slug:** `404` — matches nothing in `$NAV`, no active state (correct)
- **Not linked from anywhere** — only reached via error routing

---

## contact.php
- **Slug:** `contact`
- **Layout:** Centered single-column
- **Content:**
  - Direct email displayed prominently: `$SITE['support_email']`
  - Clickable `mailto:` link for mobile
  - Contact form: name, email, message, optional file attachment, submit
  - Attachment: JPG/PNG only, max 5MB — used for Local Hero submissions
  - `submit-contact.php` handles POST, sends via PHP `mail()` with attachment if present
  - Inline success/error confirmation — no redirect
- **Spam protection:** Honeypot hidden field — silently discard if filled
- **Nav:** Include Contact in `$NAV` in `config.php`

---

## Brand Reference

| Key | Value |
|-----|-------|
| `$SITE['brand']` | Vuk Pinball Parlor |
| `$SITE['brand_short']` | Vuk |
| `$SITE['tagline']` | Masterfully Engineered Entertainment |
| `$SITE['location']` | Durham, North Carolina |
| `$SITE['venue']` | Fullsteam Brewery, ATC, Durham, NC |
| `$SITE['fullsteam_url']` | https://www.fullsteambrewery.com (confirm) |
| `$SITE['support_email']` | support@trianglecoinop.com |
| `$SITE['public_email']` | hello@trianglecoinop.com |
| `$SITE['matchplay_url']` | TBD |
| `$SITE['maps_embed_url']` | TBD — Google Maps Embed API |
| `$SITE['insider_leaderboard_url']` | null until September 2025 |
| `$SITE['facebook_url']` | TBD |
| `$SITE['instagram_url']` | TBD |
| `$SITE['year']` | `date('Y')` |
| Footer copyright only | Triangle Coin Op LLC |
