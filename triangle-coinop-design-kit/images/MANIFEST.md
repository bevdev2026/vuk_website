# Image Asset Manifest

Drop your image files into this folder using these exact filenames. They are already referenced in the CSS and PHP — no code changes needed if you match the names.

## Required (site won't render correctly without these)

| Filename                 | Description                                              | Recommended dimensions     |
|--------------------------|----------------------------------------------------------|----------------------------|
| `global-bg-texture.png`  | Worn parchment / brushed metal / leather pattern. Tileable. | 1920 × 1080 or seamless tile |
| `hero-bg.png`            | Hero video poster fallback. Atmospheric steampunk scene. | 1920 × 1080                |
| `hero-bg.mp4`            | Looping hero video — gears, clockwork, or steam.         | 1920 × 1080, <8MB, ~10s loop |
| `hero-foreground.png`    | Macro brass mechanism / focal graphic.                   | 1200 × 1200, transparent BG |
| `divider-1.png`          | Section divider — pipes, brass border, riveted strip.    | 1200 × 80, transparent BG  |
| `divider-2.png`          | Second divider variant for visual rhythm.                | 1200 × 80, transparent BG  |
| `footer-bg.png`          | Footer scene — served by `hero-bg.png` via CSS (`background-size: 100% 300%; background-position: center bottom`). No separate file needed. | — |

## Available — drop in if you want to wire them up

| Filename                 | Description                                              | Where to use               |
|--------------------------|----------------------------------------------------------|----------------------------|
| `cta-bg.png`             | Call-to-action library/parlour scene.                    | Behind venue intake form   |
| `button-bg.png`          | Metallic plate / gauge texture for custom buttons.       | Override `.btn-primary` bg |
| `vector-button-bg.png`   | Vector version of button texture.                        | Same as above              |
| `feature-icons.png`      | 4 custom steampunk-styled icons.                         | Replace inline SVGs in venue-operations.php |
| `bullet-icons.png`       | Small cogs / keys / valves for list items.               | Replace ⚙ in `.gear-list`  |

## File size guidance

- Keep PNGs under 500KB each. Use [TinyPNG](https://tinypng.com) or ImageOptim before uploading.
- Hero video should be under 8MB. Compress with HandBrake (H.264, 60-80% quality).
- Hostinger has bandwidth limits — large assets cost real money on shared plans.

## Need to rename instead?

If your asset filenames are different, update the references in:

- `assets/css/styles.css` — searches for `url('../images/...')`
- `index.php`, `leagues.php`, `mercantile.php`, `venue-operations.php` — search for `assets/images/`
- `includes/footer.php` — has the footer image reference
