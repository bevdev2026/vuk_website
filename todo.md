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
- [x] Block 6: Local Hero — centered callout; invite players to email photo + high score via contact form
- [x] Block 7: Footer — copyright Triangle Coin Op LLC; Fullsteam link; Facebook + Instagram icons

---

## mercantile.php
- [x] Page shell
- [x] Section: Apparel
- [x] Section: Swag
- [x] Section: Stickers

---

## contact.php
- [x] Page shell
- [x] Prominent mailto link (`$SITE['support_email']`)
- [x] Contact form (name, email, message, optional attachment, honeypot)
- [x] `submit-contact.php` — PHP mail() handler with attachment support

---

## 404.php
- [x] `404.php` — branded error page; pinball headline; two CTAs; `http_response_code(404)`

---

## Config TODOs
- [x] `$SITE['brand']` — "Vuk Pinball Parlor"
- [x] `$SITE['brand_short']` — "Vuk"
- [x] `$SITE['fullsteam_url']` — https://www.fullsteambrewery.com
- [x] `$SITE['maps_embed_url']` — Google Maps embed in place
- [x] `$SITE['insider_leaderboard_url']` — null (intentional until September 2025)
- [x] `$SITE['support_email']` — support@vukpinball.biz
- [x] Contact in `$NAV` → `contact.php`
- [x] Leagues removed from `$NAV`
- [ ] `$SITE['matchplay_url']` — need real Matchplay URL
- [ ] `$SITE['facebook_url']` — need Vuk Facebook page URL
- [ ] `$SITE['instagram_url']` — need Vuk Instagram URL
- [x] `$SITE['public_email']` — support@vukpinball.biz

---

## Nice-to-Have / Future
- [ ] Open Graph / social meta tags (important for Facebook + Instagram sharing)
- [ ] Favicon + Apple touch icon
- [ ] Local Hero Phase 2 — display board for approved submissions
- [ ] Events Phase 2 — Google Sheets integration for easier calendar updates
- [ ] Leaderboard Phase 2 — Stern Insider Connected live embed (September 2025)
- [ ] Mobile nav analytics (track hamburger opens if analytics added)
- [ ] Privacy policy page (if collecting contact form data)
