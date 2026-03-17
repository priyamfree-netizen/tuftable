# AuraCall Color Palette — DNInfoSolution Brand

## Primary Colors

| Color Name | Hex Code | Usage |
|------------|----------|-------|
| **Cream Background** | `#F5F5E8` | Main page background (light mode) |
| **Black** | `#0D0D0D` | Text, dark sections, sidebar, navbar |
| **Lime Green** | `#C8F135` | Primary accent, buttons, highlights, active states |
| **White** | `#FFFFFF` | Cards, light sections |
| **Muted Gray** | `#6B6B6B` | Secondary text, descriptions |
| **Border Gray** | `#E2E2D8` | Subtle borders, dividers |

## Logo & Branding

- **Logo File**: `public/logo.png`
- **Logo Sizes**:
  - Sidebar: 80x80px container (h-20)
  - Auth pages: 96px height (h-24) desktop, 112px (h-28) mobile
  - Navbar: 56px height
  - Icon component: 96px max height
- **Favicon**: Uses `logo.png` for all formats
- **Browser Title**: Dynamic from `ThemeSetting::site_name` or "AuraCall"

## CSS Variables (Tailwind)

### Light Mode (`:root`)
```css
--background: oklch(0.98 0.01 100);        /* #F5F5E8 cream */
--foreground: oklch(0.08 0 0);             /* #0D0D0D black */
--primary: oklch(0.89 0.22 122);           /* #C8F135 lime */
--primary-foreground: oklch(0.08 0 0);     /* black on lime */
--muted: oklch(0.94 0.01 100);             /* light cream */
--muted-foreground: oklch(0.45 0 0);       /* #6B6B6B gray */
--border: oklch(0.88 0.01 100);            /* #E2E2D8 */
--card: oklch(1 0 0);                      /* #FFFFFF */
--sidebar: oklch(0.08 0 0);                /* #0D0D0D black */
--sidebar-foreground: oklch(0.98 0.01 100); /* cream text */
--sidebar-primary: oklch(0.89 0.22 122);   /* #C8F135 lime */
```

### Dark Mode (`.dark`)
```css
--background: oklch(0.08 0 0);             /* #0D0D0D */
--foreground: oklch(0.98 0.01 100);        /* #F5F5E8 */
--primary: oklch(0.89 0.22 122);           /* #C8F135 lime */
--card: oklch(0.12 0 0);                   /* #1A1A1A */
--muted: oklch(0.18 0 0);                  /* dark gray */
--border: oklch(0.20 0 0);                 /* dark border */
```

## Dashboard Color Usage

All dashboard components now use the DNInfoSolution brand colors:

- **Active/Success states**: Lime green `#C8F135`
- **Failed/Error states**: Black `#0D0D0D` or semantic red
- **Stats cards**: Use semantic Tailwind variables (`bg-card`, `text-foreground`)
- **Charts**: Lime for primary data, semantic colors for secondary
- **Buttons**: Lime background with black text for primary CTAs

## Usage Examples

### Buttons
- **Primary CTA**: `bg: #C8F135`, `text: #0D0D0D`, `border-radius: 999px`
- **Ghost Button**: `border: 1.5px solid #0D0D0D22`, `text: #0D0D0D`
- **Dark Ghost**: `border: 1.5px solid #ffffff33`, `text: #ffffffcc`

### Sections
- **Hero**: `bg: #F5F5E8` with dot grid pattern
- **Services**: `bg: #FFFFFF`
- **Features**: `bg: #F5F5E8`
- **Pricing**: `bg: #F5F5E8`, popular card `bg: #0D0D0D`
- **CTA**: `bg: #0D0D0D`, circular button `bg: #C8F135`
- **Footer**: `bg: #0D0D0D`
- **Navbar**: `bg: #0D0D0D` with white text

### Typography
- **Headlines**: `color: #0D0D0D`, `font-weight: 900`, `letter-spacing: -0.03em`
- **Body**: `color: #6B6B6B`, `line-height: 1.7`
- **Accent text**: `color: #C8F135`
- **Navbar text**: `color: #ffffff99` (muted white), hover `#FFFFFF`

### Cards
- **Light cards**: `bg: #FFFFFF`, `border: 1px solid #E2E2D8`
- **Cream cards**: `bg: #F5F5E8`, `border: 1px solid #E2E2D8`
- **Dark cards**: `bg: #0D0D0D`, `text: #F5F5E8`

## Brand Identity
- **Company**: DNInfoSolution
- **Product**: AuraCall
- **Contact**: dninfosolutionpvt@gmail.com
- **Currency**: Indian Rupees (₹)
- **Font**: Instrument Sans (primary), Inter (display)
- **Git**: `DNInfoSolution <vimal6040x@gmail.com>`

## Files Updated

### Logo Components
- `resources/js/components/app-logo.tsx` — Sidebar logo (80x80px)
- `resources/js/components/app-logo-icon.tsx` — Icon component (96px)
- `resources/js/layouts/auth/auth-split-layout.tsx` — Auth page logos (96-112px)
- `resources/js/pages/welcome.tsx` — Landing page navbar (56px)

### Favicon & Meta
- `resources/views/app.blade.php` — Favicon links, browser title
- `public/logo.png` — Main logo file
- `public/favicon.png` — Copy of logo.png
- `public/apple-touch-icon.png` — Copy of logo.png

### Color System
- `resources/css/app.css` — CSS variables for light/dark modes
- `resources/js/pages/Dashboard/Index.tsx` — Dashboard stats with lime accents
- `resources/js/pages/welcome.tsx` — Landing page with full brand palette
