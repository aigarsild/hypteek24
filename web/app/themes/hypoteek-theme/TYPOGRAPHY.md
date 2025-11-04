# Hypoteek Theme - Typography & Font System

## 🔤 Global Font: Poppins

**Poppins** is now the official font family for the entire Hypoteek project. It's applied globally across all text elements.

### Font Details

- **Font Family:** Poppins
- **Fallback:** system-ui, sans-serif
- **Loaded From:** Google Fonts
- **Weights Included:** 300, 400, 500, 600, 700
- **Display:** Swap (ensures fast loading)

---

## 📋 Font Implementation

### Where Poppins is Applied

✅ All text elements use Poppins by default:
- `<h1>` through `<h6>` - Headings
- `<p>` - Paragraphs
- `<a>` - Links
- `<button>`, `<input>`, `<textarea>`, `<select>` - Form elements
- All other text content

### How It Works

1. **Google Fonts Import** - Poppins is loaded via Google Fonts CDN in `functions.php`
2. **Tailwind Config** - Font family is set in `tailwind.config.js`
3. **CSS Base Layer** - Applied globally in `assets/css/input.css`

---

## 🎨 Font Weights & Usage

### Available Weights

| Weight | Name | Usage | Example |
|--------|------|-------|---------|
| 300 | Light | Subtle text, captions | *"Learn more"* |
| 400 | Regular | Body text, paragraphs | Normal text |
| 500 | Medium | Emphasis, navigation | Menu items |
| 600 | Semibold | Strong emphasis, buttons | **Important** |
| 700 | Bold | Headings, titles | **Main Heading** |

### Recommended Font Usage

```html
<!-- Headings - Bold (700) -->
<h1 class="font-bold text-3xl">Main Heading</h1>
<h2 class="font-bold text-2xl">Section Title</h2>

<!-- Navigation - Medium (500) -->
<nav>
  <a class="font-medium">Menu Item</a>
</nav>

<!-- Buttons - Semibold (600) -->
<button class="btn-primary font-semibold">Click Me</button>

<!-- Body Text - Regular (400) -->
<p>This is regular body text using Poppins.</p>

<!-- Light Text - Light (300) -->
<span class="font-light text-sm">Subtle caption text</span>
```

---

## 📐 Tailwind Font Classes

Use these Tailwind classes to set font weights:

```html
<p class="font-light">Light text (300)</p>
<p class="font-normal">Regular text (400)</p>
<p class="font-medium">Medium text (500)</p>
<p class="font-semibold">Semibold text (600)</p>
<p class="font-bold">Bold text (700)</p>
```

---

## 📏 Font Sizes

The theme uses standard Tailwind font size scale:

```html
<!-- Headings -->
<h1 class="text-4xl">Extra Large Heading</h1>
<h2 class="text-3xl">Large Heading</h2>
<h3 class="text-2xl">Medium Heading</h3>
<h4 class="text-xl">Small Heading</h4>

<!-- Body Text -->
<p class="text-base">Normal paragraph text</p>
<p class="text-lg">Large paragraph text</p>
<p class="text-sm">Small text / captions</p>
<p class="text-xs">Extra small text</p>
```

### Size Reference

| Class | Size | Typical Use |
|-------|------|-------------|
| `text-4xl` | 36px | Page titles |
| `text-3xl` | 30px | Section headers |
| `text-2xl` | 24px | Subsection headers |
| `text-xl` | 20px | Card titles |
| `text-lg` | 18px | Navigation, callouts |
| `text-base` | 16px | Body text (default) |
| `text-sm` | 14px | Secondary text |
| `text-xs` | 12px | Captions, labels |

---

## 🎯 Heading Styles (Components)

All headings automatically use:
- **Font:** Poppins (sans)
- **Weight:** Bold (700)
- **Tracking:** Tight (letter-spacing: -0.025em)
- **Color:** Brand Primary Purple (#442A76)

```html
<h1>Automatically styled heading</h1>
<h2>All colors, fonts, and spacing are preset</h2>
<h3>No additional classes needed</h3>
```

---

## 📝 Paragraph & Body Text

Body text uses:
- **Font:** Poppins (sans)
- **Weight:** Regular (400)
- **Line Height:** Relaxed (1.625)
- **Color:** Default (inherit)

```html
<p>This paragraph automatically uses Poppins with optimal line height for readability.</p>
```

---

## 🔗 Link Styling

Links inherit Poppins font and use brand colors:

```html
<!-- Basic link -->
<a href="#">Link text</a>

<!-- With link utility class -->
<a href="#" class="link">Styled link (purple, green on hover)</a>

<!-- Underlined link -->
<a href="#" class="link-underline">Underlined link</a>
```

---

## 🔘 Button Typography

Buttons use Poppins with semibold weight for emphasis:

```html
<!-- Primary Button -->
<button class="btn-primary">Button Text</button>

<!-- Secondary Button -->
<button class="btn-secondary">Action</button>

<!-- With custom weight -->
<button class="btn-primary font-bold">Bold Button</button>
```

---

## 📋 Form Elements Typography

All form inputs use Poppins:

```html
<input type="text" placeholder="Poppins font">
<textarea placeholder="Poppins font">Text area</textarea>
<select>
  <option>Poppins font</option>
</select>
<button>Poppins font</button>
```

---

## 🎓 CSS Custom Properties (Variables)

Typography can also be controlled via CSS variables:

```css
:root {
  /* Font family is set in Tailwind config */
  /* Use Tailwind classes for font control */
}
```

---

## 💻 Implementation Details

### Google Fonts Link
```
https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap
```

### Tailwind Configuration
```javascript
theme: {
  extend: {
    fontFamily: {
      sans: ['Poppins', 'system-ui', 'sans-serif'],
    },
  },
}
```

### CSS Base Layer
```css
@layer base {
  body {
    @apply font-sans leading-relaxed;
  }
  h1, h2, h3, h4, h5, h6 {
    @apply font-sans font-bold tracking-tight text-brand-primary;
  }
}
```

---

## ⚙️ Fallback Behavior

If Poppins fails to load:
1. Falls back to `system-ui` (default system fonts)
2. Then falls back to generic `sans-serif`

This ensures readable typography even if CDN is unavailable.

---

## 🚀 Performance

- **Load Time:** < 100ms (async CSS font load)
- **Display Strategy:** `swap` - shows fallback immediately, swaps to Poppins when loaded
- **Weights:** Only loaded weights needed (300, 400, 500, 600, 700)
- **Format:** Latest WOFF2 format (smallest file size)

---

## 📋 Checklist for New Components

When creating new components, ensure:

- [ ] Text uses Poppins (automatic via Tailwind `font-sans`)
- [ ] Appropriate font weight selected for content type
- [ ] Headings are bold (700) and purple
- [ ] Body text uses regular weight (400)
- [ ] Buttons are semibold (600)
- [ ] Line height is appropriate (use `leading-*` classes)
- [ ] Font sizes follow Tailwind scale
- [ ] Text color uses brand colors only
- [ ] Contrast ratio is 4.5:1 minimum (WCAG AA)

---

## 🎨 Typography Examples

### Page Title
```html
<h1 class="text-4xl font-bold text-brand-primary">Welcome to Hypoteek</h1>
```

### Section Heading
```html
<h2 class="text-3xl font-bold text-brand-primary">Our Services</h2>
```

### Navigation Menu
```html
<nav>
  <a class="text-lg font-medium text-white hover:text-brand-secondary">Erakliendile</a>
  <a class="text-lg font-medium text-white hover:text-brand-secondary">Ärikliendile</a>
  <a class="text-lg font-medium text-white hover:text-brand-secondary">Meist</a>
</nav>
```

### Card with Title and Description
```html
<div class="card">
  <h3 class="text-2xl font-bold text-brand-primary">Card Title</h3>
  <p class="font-normal leading-relaxed">Card description text in Poppins regular weight.</p>
  <button class="btn-primary font-semibold">Learn More</button>
</div>
```

### Button with Different Weights
```html
<button class="btn-primary font-light">Light Weight</button>
<button class="btn-primary font-normal">Normal Weight</button>
<button class="btn-primary font-semibold">Semibold Weight</button>
<button class="btn-primary font-bold">Bold Weight</button>
```

---

## 📞 Questions?

**Q: Can I use a different font?**  
A: To change the font, update `tailwind.config.js` and the Google Fonts import in `functions.php`. Document it in this file.

**Q: How do I use different font weights?**  
A: Use Tailwind classes: `font-light`, `font-normal`, `font-medium`, `font-semibold`, `font-bold`

**Q: Is Poppins accessible?**  
A: Yes! Poppins is a highly legible font designed for all sizes and perfectly accessible.

**Q: What if Poppins doesn't load?**  
A: Fallback to system fonts is automatic and maintains readability.

---

## 📊 Resources

- [Poppins on Google Fonts](https://fonts.google.com/specimen/Poppins)
- [Poppins GitHub](https://github.com/itfoundry/poppins)
- [Tailwind Font Family Docs](https://tailwindcss.com/docs/font-family)
- [Typography Best Practices](https://www.typewolf.com/)

---

**Last Updated:** October 31, 2025  
**Version:** 1.0  
**Status:** Active - Poppins is the official global font

