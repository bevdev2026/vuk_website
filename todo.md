# TODO — Vuk Pinball Parlor Website

## Legend
- [ ] Not started
- [~] In progress
- [x] Complete

---

## Setup & Infrastructure
- [x] `includes/config.php` — rewrite for Vuk brand; remove Triangle Coin Op from all keys except `parent_co` (footer only)
- [x] `includes/events.php` — event data array, seeded with 2–3 placeholder events
- [x] `includes/header.php` — sticky nav, desktop links, hamburger button, mobile overlay
- [x] `assets/js/nav.js` — vanilla JS mobile nav toggle
- [x] `includes/footer.php` — copyright (Triangle Coin Op LLC), Fullsteam link, social icons
- [x] Base CSS file — custom properties, layout classes, component classes
- [x] Placeholder SVGs — `placeholder-mechanism.svg`, `placeholder-divider.svg`
- [x] `.htaccess` — `ErrorDocument 404 /404.php`

---

## index.php Sections
- [x] Block 1: Hero — video bg, corner overlays, eyebrow/title/tagline/CTAs
- [x] Block 2: About — short brand-voice paragraph; Vuk community; enthusiast owners; beautiful machines; all skill levels welcome; CTA to explore
- [x] Block 3: Locations — address copy (Fullsteam Brewery, ATC, Durham NC); Fullsteam link; Google Maps embed; directions input
- [x] Block 4: Upcoming Events — monthly PHP calendar; prev/next month nav; event detail cards; data from `includes/events.php`
- [x] Block 5: Leaderboard — Coming Soon placeholder (Stern Insider Connected, September 2025)
- [ ] Block 6: Local Hero — centered callout; invite players to email photo + high score via contact form
- [ ] Block 7: Footer — copyright Triangle Coin Op LLC; Fullsteam link; Facebook + Instagram icons

---

## leagues.php
- [ ] Page shell
- [ ] Section: League schedule / next event
- [ ] Section: Machine roster
- [ ] Section: How to join / sign-up CTA

---

## mercantile.php
- [ ] Page shell
- [ ] Section: Apparel & Uniforms
- [ ] Section: Amazon Collection
- [ ] Section: League Exclusives

---

## contact.php
- [ ] Page shell
- [ ] Prominent mailto link (`$SITE['support_email']`)
- [ ] Contact form (name, email, message, optional attachment, honeypot)
- [ ] `submit-contact.php` — PHP mail() handler with attachment support

---

## 404.php
- [ ] `404.php` — branded error page; pinball headline; two CTAs; `http_response_code(404)`

---

## Config TODOs
- [ ] `$SITE['brand']` — update to "Vuk Pinball Parlor"
- [ ] `$SITE['brand_short']` — "Vuk"
- [ ] `$SITE['fullsteam_url']` — confirm Fullsteam Brewery website URL
- [ ] `$SITE['maps_embed_url']` — Google Maps Embed API iframe src for Fullsteam Brewery ATC
- [ ] `$SITE['matchplay_url']` — Matchplay profile/tournament URL
- [ ] `$SITE['insider_leaderboard_url']` — set to `null` now; add real URL in September 2025
- [ ] `$SITE['facebook_url']` — Vuk Facebook page URL
- [ ] `$SITE['instagram_url']` — Vuk Instagram profile URL
- [ ] `$SITE['support_email']` — support@trianglecoinop.com (confirm live)
- [ ] `$SITE['public_email']` — hello@trianglecoinop.com (confirm live)
- [ ] Add `Contact` to `$NAV` → `contact.php`
- [ ] Remove or repurpose `venue-operations.php` entry from `$NAV` (not part of Vuk site)

---

## Nice-to-Have / Future
- [ ] Open Graph / social meta tags (important for Facebook + Instagram sharing)
- [ ] Favicon + Apple touch icon
- [ ] Local Hero Phase 2 — display board for approved submissions
- [ ] Events Phase 2 — Google Sheets integration for easier calendar updates
- [ ] Leaderboard Phase 2 — Stern Insider Connected live embed (September 2025)
- [ ] Mobile nav analytics (track hamburger opens if analytics added)
- [ ] Privacy policy page (if collecting contact form data)
