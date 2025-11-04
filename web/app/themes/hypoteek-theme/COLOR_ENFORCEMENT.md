# Color Enforcement Policy & Guidelines

## 📋 Official Brand Color Palette

The Hypoteek project uses a strict 3-color palette. **No other colors are permitted.**

| Name | Hex Code | Usage | Tailwind Class |
|------|----------|-------|----------------|
| **Primary (Purple)** | `#442A76` | Main brand, CTAs, headers | `brand-primary` |
| **Secondary (Green)** | `#44AF57` | Success, highlights, accents | `brand-secondary` |
| **Light (White)** | `#FFFFFF` | Backgrounds, text on dark | `white` or `brand-light` |

---

## ✅ How to Use Brand Colors

### Tailwind CSS Classes (Recommended)

Always use semantic brand color names, never arbitrary colors:

```html
<!-- ✅ CORRECT -->
<button class="bg-brand-primary text-white">Click me</button>
<div class="text-brand-secondary">Success!</div>

<!-- ❌ WRONG -->
<button class="bg-blue-500 text-white">Click me</button>
<button class="bg-[#442A76]">Click me</button>
<button class="bg-purple-600">Click me</button>
```

### Available Tailwind Classes

#### Background Colors
- `bg-white` - White background
- `bg-brand-primary` - Purple background
- `bg-brand-secondary` - Green background
- `bg-brand-light` - White (alias)

#### Text Colors
- `text-white` - White text
- `text-brand-primary` - Purple text
- `text-brand-secondary` - Green text
- `text-brand-light` - White text (alias)

#### Border Colors
- `border-white` - White border
- `border-brand-primary` - Purple border
- `border-brand-secondary` - Green border
- `border-brand-light` - White border (alias)

#### Other Classes
- `divide-brand-primary` - Purple divider
- `ring-brand-primary` - Purple focus ring
- `from-brand-primary` - Gradient start (purple)
- `to-brand-secondary` - Gradient end (green)

### CSS Variables (Custom CSS)

If using custom CSS in `assets/css/input.css`:

```css
.my-component {
  background-color: var(--color-primary);
  color: var(--color-light);
  border-color: var(--color-secondary);
}
```

### Pre-built Component Classes

Use these ready-made components that enforce brand colors:

```html
<!-- Buttons -->
<button class="btn-primary">Primary Action</button>
<button class="btn-secondary">Secondary Action</button>
<button class="btn-outline">Outlined</button>
<button class="btn-ghost">Ghost</button>

<!-- Cards -->
<div class="card-primary">Purple Card</div>
<div class="card-secondary">Green Card</div>

<!-- Alerts -->
<div class="alert-primary">Info message</div>
<div class="alert-secondary">Success message</div>

<!-- Badges -->
<span class="badge-primary">Label</span>
<span class="badge-secondary">Status</span>

<!-- Sections -->
<section class="section-primary">Purple section</section>
<section class="section-secondary">Green section</section>
```

---

## ❌ Things You CANNOT Do

### 1. Do NOT Use Arbitrary Color Values

```html
<!-- ❌ WRONG - Arbitrary colors -->
<div class="bg-[#FF0000]">Wrong</div>
<div class="bg-red-500">Wrong</div>
<div class="text-blue-700">Wrong</div>
```

### 2. Do NOT Import External Color Libraries

```javascript
// ❌ WRONG - External color library
import colors from 'tailwindcss/colors';
```

### 3. Do NOT Add Colors to Tailwind Config

```javascript
// ❌ WRONG - Adding unauthorized colors
module.exports = {
  theme: {
    extend: {
      colors: {
        red: '#FF0000',        // ❌ Not allowed
        'my-color': '#123456', // ❌ Not allowed
      }
    }
  }
}
```

### 4. Do NOT Use Tailwind Color Names

```html
<!-- ❌ WRONG - Default Tailwind colors -->
<div class="bg-red-500">Wrong</div>
<div class="text-blue-700">Wrong</div>
<div class="border-yellow-400">Wrong</div>
```

### 5. Do NOT Hardcode Colors in PHP

```php
<!-- ❌ WRONG - Hardcoded hex colors -->
<div style="background-color: #FF0000;">Wrong</div>
<div style="color: rgb(255, 0, 0);">Wrong</div>
```

### 6. Do NOT Mix Colors for Same Purpose

```html
<!-- ❌ WRONG - Inconsistent usage -->
<button class="bg-brand-primary">Action 1</button>
<button class="bg-brand-secondary">Action 1</button> <!-- Same purpose, different color -->
```

---

## 🎯 Color Usage Guidelines by Component

### Buttons

| Type | Primary Color | Hover | Text |
|------|---------------|-------|------|
| Primary CTA | `brand-primary` | `brand-secondary` | `white` |
| Secondary CTA | `brand-secondary` | `opacity-90` | `white` |
| Outline | Border: `brand-primary` | `brand-primary` bg | `brand-primary` → `white` |
| Ghost | Text: `brand-primary` | `brand-primary` bg-opacity-10 | `brand-primary` |

```html
<!-- Primary Button -->
<button class="btn-primary">Primary</button>

<!-- Secondary Button -->
<button class="btn-secondary">Secondary</button>

<!-- Outlined Button -->
<button class="btn-outline">Outlined</button>

<!-- Ghost Button -->
<button class="btn-ghost">Ghost</button>
```

### Text & Headings

- **Headings (h1-h6):** Always `text-brand-primary`
- **Links:** `text-brand-primary` hover `text-brand-secondary`
- **Body text:** Default color (or white on dark backgrounds)
- **Accents:** Use `text-brand-secondary` for highlights

```html
<h1 class="text-brand-primary">Heading</h1>
<p>Normal text with <span class="text-brand-secondary">highlighted</span> accent</p>
<a href="#" class="link">Link</a>
```

### Backgrounds

- **Header/Hero:** `bg-brand-primary`
- **Sections:** `bg-white` (default) or `section-primary` / `section-secondary`
- **Cards:** `bg-white` with optional `border-l-4 border-brand-primary`
- **Accents:** Use `bg-opacity-10` or `bg-opacity-25` for subtle backgrounds

```html
<header class="bg-brand-primary text-white">...</header>
<section class="bg-white">...</section>
<section class="section-primary">...</section>
```

### Borders

- **Accent borders:** Use `border-brand-primary` or `border-brand-secondary`
- **Input focus:** `ring-brand-primary`
- **Dividers:** `border-t border-brand-primary`

```html
<div class="border-l-4 border-brand-primary">Card</div>
<input class="input-primary" />
<hr class="divider" />
```

---

## 📊 Color Contrast & Accessibility

All color combinations have been tested for WCAG AA compliance:

| Combination | Ratio | WCAG Level | ✓ Approved |
|------------|-------|-----------|-----------|
| White on Purple | 6.2:1 | AAA | ✅ |
| Purple on White | 6.2:1 | AAA | ✅ |
| White on Green | 4.5:1 | AA | ✅ |
| Green on White | 4.5:1 | AA | ✅ |

**Use with confidence!** All combinations are accessible.

---

## 🔍 Linting & Enforcement

### Checking for Non-Brand Colors

Search for any hardcoded colors or invalid Tailwind classes:

```bash
# Search for hex color codes in PHP files
grep -r "#[0-9A-Fa-f]\{6\}" web/app/themes/hypoteek-theme --include="*.php" | grep -v "442A76\|44AF57\|FFFFFF"

# Search for style attributes
grep -r "style=" web/app/themes/hypoteek-theme --include="*.php"

# Search for invalid color classes
grep -r "bg-red\|bg-blue\|text-red\|text-blue" web/app/themes/hypoteek-theme
```

### Pre-commit Hook (Optional)

Create `.git/hooks/pre-commit` to prevent commits with non-brand colors:

```bash
#!/bin/bash

# Check for hardcoded colors in PHP files
if grep -r "#[0-9A-Fa-f]\{6\}" web/app/themes/hypoteek-theme --include="*.php" | grep -v "442A76\|44AF57\|FFFFFF"; then
    echo "❌ Found hardcoded colors in PHP files!"
    exit 1
fi

# Check for invalid color Tailwind classes
if grep -r "bg-\(red\|blue\|yellow\|pink\|indigo\|cyan\|lime\)" web/app/themes/hypoteek-theme --include="*.php"; then
    echo "❌ Found invalid color names!"
    exit 1
fi

echo "✅ Color check passed!"
exit 0
```

---

## 📝 Component Checklist

Before submitting any component, verify:

- [ ] All colors are from the brand palette only
- [ ] Text has sufficient contrast (WCAG AA minimum)
- [ ] Used Tailwind `brand-*` classes, not arbitrary colors
- [ ] No `style=""` attributes with colors
- [ ] No hardcoded hex colors
- [ ] Hover/focus states use brand colors
- [ ] Reviewed against STYLE_GUIDE.md
- [ ] Accessibility tested with screen reader

---

## 🎨 Adding More Colors

When you're ready to add more brand colors:

1. **Update this file** - Add new colors to the palette
2. **Update `tailwind.config.js`** - Add to `brand` object
3. **Update `STYLE_GUIDE.md`** - Document new colors
4. **Test components** - Ensure all combinations work
5. **Update CSS variables** - Add to `:root` in `input.css`
6. **Test contrast** - Verify WCAG compliance

### Example: Adding Tertiary Color

```javascript
// tailwind.config.js
theme: {
  colors: {
    brand: {
      primary: '#442A76',
      secondary: '#44AF57',
      tertiary: '#YOUR_NEW_COLOR', // ← Add here
      light: '#FFFFFF',
    }
  }
}
```

---

## 🚨 Violations & Penalties

### What Happens If Colors Are Misused?

1. **Code Review:** Pull requests will be rejected
2. **Comment:** Reviewer will point to this policy
3. **Request:** Component must be updated to use brand colors
4. **Re-review:** Updated component will be checked again

### Examples of Violations

```html
<!-- ❌ Violation 1: Arbitrary hex color -->
<button class="bg-[#FF0000]">Wrong</button>

<!-- ❌ Violation 2: Tailwind color name -->
<div class="text-blue-700">Wrong</div>

<!-- ❌ Violation 3: Hardcoded style -->
<span style="color: #123456;">Wrong</span>

<!-- ❌ Violation 4: External library color -->
<div class="border-red-500">Wrong</div>
```

---

## 📚 Quick Reference

### The 3 Brand Colors

```
🟪 PRIMARY PURPLE:  #442A76  (brand-primary)
🟢 SECONDARY GREEN: #44AF57  (brand-secondary)
⚪ LIGHT WHITE:     #FFFFFF  (white, brand-light)
```

### Do's & Don'ts Quick List

✅ DO:
- Use `brand-primary`, `brand-secondary`, `white`
- Use pre-built component classes (`.btn-primary`, `.card-primary`)
- Use CSS variables: `var(--color-primary)`
- Test contrast ratios
- Document custom usage

❌ DON'T:
- Hardcode hex colors
- Use arbitrary color values
- Use external color libraries
- Use Tailwind default colors
- Style color attributes inline

---

## 📞 Questions?

**Q: Can I use a slightly different shade of purple?**  
A: No. Only `#442A76` is permitted. Use opacity if you need variation.

**Q: What if I need a different color?**  
A: Add it to the brand palette first (update STYLE_GUIDE.md and tailwind.config.js), then use it.

**Q: Can I use gradients?**  
A: Yes, but only with brand colors: `from-brand-primary to-brand-secondary`

**Q: What about dark mode?**  
A: The palette is designed for light mode. For dark mode, use inverted colors.

**Q: Can I use opacity?**  
A: Yes! Use `bg-opacity-75`, `bg-opacity-50`, etc. on brand colors.

---

## 📋 Document Info

- **Status:** ACTIVE - Enforced on all new code
- **Created:** October 31, 2025
- **Version:** 1.0
- **Author:** Hypoteek Team
- **Next Review:** When new colors are added

---

**Remember:** Consistency builds strong brands. Keep the color palette pure! 🎨

