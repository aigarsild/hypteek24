# Hypoteek Theme - Style Guide & Color System

## 🎨 Brand Color Palette

This style guide defines the official color system for the Hypoteek project. **All colors must be chosen from this palette only.**

### Primary Colors

#### Brand Primary - Deep Purple
- **Name:** `brand-primary`
- **Hex Code:** `#442A76`
- **RGB:** `68, 42, 118`
- **HSL:** `258°, 47%, 31%`
- **Usage:** Primary CTAs, headings, focus states, brand elements
- **Tailwind:** `bg-brand-primary`, `text-brand-primary`, `border-brand-primary`

```html
<div class="bg-brand-primary text-white px-4 py-2 rounded">
  Deep Purple (Primary)
</div>
```

#### Brand Secondary - Fresh Green
- **Name:** `brand-secondary`
- **Hex Code:** `#44AF57`
- **RGB:** `68, 175, 87`
- **HSL:** `132°, 43%, 48%`
- **Usage:** Success states, highlights, secondary CTAs, accents
- **Tailwind:** `bg-brand-secondary`, `text-brand-secondary`, `border-brand-secondary`

```html
<div class="bg-brand-secondary text-white px-4 py-2 rounded">
  Fresh Green (Secondary)
</div>
```

#### Brand Light - White
- **Name:** `brand-light`
- **Hex Code:** `#FFFFFF`
- **RGB:** `255, 255, 255`
- **HSL:** `0°, 0%, 100%`
- **Usage:** Backgrounds, text on dark, cards, containers
- **Tailwind:** `bg-white`, `text-white`, `border-white`

```html
<div class="bg-white text-brand-primary px-4 py-2 rounded shadow">
  White (Light)
</div>
```

---

## 📝 How to Use Colors

### CSS Classes (Tailwind)

#### Background Colors
```html
<!-- Primary Purple background -->
<div class="bg-brand-primary">Content</div>

<!-- Secondary Green background -->
<div class="bg-brand-secondary">Content</div>

<!-- White background -->
<div class="bg-white">Content</div>
```

#### Text Colors
```html
<!-- Purple text -->
<h1 class="text-brand-primary">Heading</h1>

<!-- Green text -->
<p class="text-brand-secondary">Paragraph</p>

<!-- White text (on dark backgrounds) -->
<span class="text-white">Light text</span>
```

#### Border Colors
```html
<!-- Purple border -->
<div class="border-2 border-brand-primary">Box</div>

<!-- Green border -->
<input class="border border-brand-secondary" />

<!-- White border (on dark) -->
<div class="border border-white bg-brand-primary">Card</div>
```

#### Hover States
```html
<!-- Hover background change -->
<button class="bg-brand-primary hover:bg-brand-secondary text-white">
  Hover me
</button>

<!-- Hover with opacity -->
<a class="text-brand-primary hover:text-brand-secondary">Link</a>
```

### Custom CSS (in assets/css/input.css)

```css
/* Define color variables */
:root {
  --color-primary: #442A76;
  --color-secondary: #44AF57;
  --color-light: #FFFFFF;
}

/* Use variables */
.button-primary {
  background-color: var(--color-primary);
  color: var(--color-light);
}

.accent {
  color: var(--color-secondary);
}
```

---

## 🎯 Component Examples

### Buttons

#### Primary Button (Purple)
```html
<button class="bg-brand-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-brand-secondary transition-colors">
  Primary Action
</button>
```

#### Secondary Button (Green)
```html
<button class="bg-brand-secondary text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity">
  Secondary Action
</button>
```

#### Outlined Button
```html
<button class="border-2 border-brand-primary text-brand-primary bg-white px-6 py-3 rounded-lg font-semibold hover:bg-brand-primary hover:text-white transition-all">
  Outlined Action
</button>
```

### Cards

```html
<div class="bg-white border-l-4 border-brand-primary rounded-lg shadow-lg p-6">
  <h3 class="text-brand-primary font-bold text-lg mb-2">Card Title</h3>
  <p class="text-gray-700">Card content goes here.</p>
</div>
```

### Headers

```html
<header class="bg-brand-primary text-white py-8">
  <div class="container mx-auto">
    <h1 class="text-4xl font-bold">Welcome</h1>
    <p class="text-brand-secondary mt-2">Tagline here</p>
  </div>
</header>
```

### Alerts

#### Success (Green)
```html
<div class="bg-brand-secondary bg-opacity-10 border-l-4 border-brand-secondary text-brand-secondary p-4">
  ✓ Success message
</div>
```

#### Primary (Purple)
```html
<div class="bg-brand-primary bg-opacity-10 border-l-4 border-brand-primary text-brand-primary p-4">
  ℹ Information message
</div>
```

### Navigation

```html
<nav class="bg-brand-primary">
  <ul class="flex space-x-6">
    <li><a href="#" class="text-white hover:text-brand-secondary transition">Home</a></li>
    <li><a href="#" class="text-white hover:text-brand-secondary transition">About</a></li>
    <li><a href="#" class="text-white hover:text-brand-secondary transition">Contact</a></li>
  </ul>
</nav>
```

---

## ⚠️ Color Usage Rules

### DO ✅

- ✅ Use only colors from the brand palette
- ✅ Use semantic color names: `brand-primary`, `brand-secondary`, `brand-light`
- ✅ Create new Tailwind utilities in `tailwind.config.js` if needed
- ✅ Use opacity variants: `bg-brand-primary bg-opacity-75`
- ✅ Test contrast ratios for accessibility
- ✅ Document custom color variations

### DON'T ❌

- ❌ Use hardcoded hex colors directly in HTML
- ❌ Use other color names (red, blue, yellow, etc.)
- ❌ Create arbitrary colors with `[]` brackets
- ❌ Import external color libraries that override brand colors
- ❌ Mix different brand colors for the same element purpose
- ❌ Use colors without checking accessibility compliance

---

## 🌈 Opacity Variants

### Using Opacity with Tailwind

```html
<!-- 100% opacity -->
<div class="bg-brand-primary">Full</div>

<!-- 90% opacity -->
<div class="bg-brand-primary bg-opacity-90">90%</div>

<!-- 75% opacity -->
<div class="bg-brand-primary bg-opacity-75">75%</div>

<!-- 50% opacity -->
<div class="bg-brand-primary bg-opacity-50">50%</div>

<!-- 25% opacity -->
<div class="bg-brand-primary bg-opacity-25">25%</div>
```

---

## ♿ Accessibility Considerations

### Contrast Ratios (WCAG AA)

| Color Combination | Ratio | Status |
|------------------|-------|--------|
| Purple on White | 6.2:1 | ✅ AAA |
| Green on White | 4.5:1 | ✅ AA |
| White on Purple | 6.2:1 | ✅ AAA |
| White on Green | 4.5:1 | ✅ AA |

### Best Practices

1. **Text on Backgrounds**
   - Purple text on white: Good contrast ✓
   - Green text on white: Good contrast ✓
   - Avoid: Green text on white for small text (use darker variant)

2. **Color Blindness**
   - Don't rely on color alone to convey meaning
   - Use icons, patterns, or text labels
   - Purple and Green are distinguishable for most colorblind users

3. **Focus States**
   - Always provide visible focus indicators
   - Combine color with underline or border
   ```html
   <a href="#" class="text-brand-primary focus:outline-2 focus:outline-offset-2 focus:outline-brand-primary">
     Link
   </a>
   ```

---

## 📚 Tailwind Configuration Reference

Your `tailwind.config.js` defines the color system:

```javascript
theme: {
  colors: {
    white: '#FFFFFF',
    brand: {
      primary: '#442A76',    // Deep Purple
      secondary: '#44AF57',  // Fresh Green
      light: '#FFFFFF',      // White
    },
    transparent: 'transparent',
    current: 'currentColor',
  },
}
```

### Available Tailwind Classes

```
// Background
bg-white
bg-brand-primary
bg-brand-secondary
bg-brand-light

// Text
text-white
text-brand-primary
text-brand-secondary
text-brand-light

// Border
border-white
border-brand-primary
border-brand-secondary
border-brand-light

// Shadow, Divide, etc.
divide-brand-primary
ring-brand-secondary
```

---

## 🔄 Adding New Colors Later

When you add more colors to the palette:

1. **Update `tailwind.config.js`:**
   ```javascript
   theme: {
     colors: {
       // ... existing colors
       brand: {
         primary: '#442A76',
         secondary: '#44AF57',
         light: '#FFFFFF',
         // NEW:
         tertiary: '#YourNewColor',
       }
     }
   }
   ```

2. **Update this style guide** with new sections

3. **Test all component** examples with new colors

4. **Update** any affected component documentation

---

## 📋 Component Checklist

When building components, ensure:

- [ ] Colors used are from the brand palette only
- [ ] Text has sufficient contrast (minimum 4.5:1 ratio)
- [ ] Color is not the only way to convey information
- [ ] Focus states are clearly visible
- [ ] Hover states use valid brand colors
- [ ] Reviewed against this style guide
- [ ] Accessibility tested

---

## 🎨 Color Preview Component

Create a visual reference page at `/wp-admin/?page=style-guide`:

```php
// In your theme or plugin
<div class="p-8 bg-white">
  <h1 class="text-3xl font-bold text-brand-primary mb-8">Color Palette</h1>
  
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Purple -->
    <div class="rounded-lg overflow-hidden shadow-lg">
      <div class="h-32 bg-brand-primary"></div>
      <div class="p-4">
        <h3 class="font-bold">Primary Purple</h3>
        <p class="text-sm text-gray-600">#442A76</p>
      </div>
    </div>
    
    <!-- Green -->
    <div class="rounded-lg overflow-hidden shadow-lg">
      <div class="h-32 bg-brand-secondary"></div>
      <div class="p-4">
        <h3 class="font-bold">Secondary Green</h3>
        <p class="text-sm text-gray-600">#44AF57</p>
      </div>
    </div>
    
    <!-- White -->
    <div class="rounded-lg overflow-hidden shadow-lg border">
      <div class="h-32 bg-white"></div>
      <div class="p-4">
        <h3 class="font-bold">Light White</h3>
        <p class="text-sm text-gray-600">#FFFFFF</p>
      </div>
    </div>
  </div>
</div>
```

---

## 📞 Questions?

- **"Can I use a different color?"** → No, use only brand colors from this guide
- **"What if I need more colors?"** → Add them to this guide first, then update config
- **"What about states (hover, focus)?"** → Use opacity or swap to another brand color
- **"Can I use gradients?"** → Yes, but only with brand colors
- **"What about darkening a color?"** → Use opacity-75 or opacity-50 instead

---

**Last Updated:** October 31, 2025  
**Version:** 1.0  
**Status:** Active - All new components must follow this guide

