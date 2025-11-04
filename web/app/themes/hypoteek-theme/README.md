# Hypoteek Theme

A modern, lightweight WordPress starter theme built with Tailwind CSS and wp-cli integration.

## Features

- 🎨 **Tailwind CSS** - Utility-first CSS framework for rapid UI development
- 📦 **Component-Based** - Organized structure with partials and template parts
- 🚀 **Modern PHP** - Clean, well-documented PHP code following WordPress standards
- 🎯 **SEO-Friendly** - Semantic HTML and proper accessibility support
- 📱 **Responsive** - Mobile-first responsive design
- ⚡ **Optimized** - Minified CSS in production, fast load times

## Quick Start

### 1. Install Dependencies

```bash
npm install
```

### 2. Development

Watch for changes and rebuild CSS:

```bash
npm run dev
```

The theme will automatically rebuild your CSS as you modify files.

### 3. Production Build

Create a minified version for deployment:

```bash
npm run build
```

## File Organization

### Root Files

- `style.css` - Generated Tailwind CSS output
- `functions.php` - Theme configuration and hooks
- `header.php` - Header template
- `footer.php` - Footer template
- `index.php` - Main template
- `package.json` - npm configuration

### Directories

#### `/assets`

All front-end assets (CSS, JavaScript, images).

```
assets/
├── css/
│   └── input.css      (Tailwind directives, compiled to ../style.css)
├── js/
│   └── main.js        (Main JavaScript file)
└── images/            (Theme images, icons, etc.)
```

#### `/partials`

Reusable template components. Load with `get_partial()`:

- `header-top.php` - Top bar / header section
- `navigation.php` - Main navigation menu
- `hero.php` - Hero section
- `sidebar.php` - Sidebar content
- `footer-widgets.php` - Footer widget areas

#### `/template-parts`

WordPress template parts for different content types:

- `content.php` - Default post display
- `content-none.php` - No posts found message

#### `/inc`

PHP utility functions and helpers:

- `theme-helpers.php` - Helper functions like `get_partial()`

## Developing with Tailwind CSS

### Modifying Styles

Edit `assets/css/input.css` to add custom styles. The file includes:

- Base styles
- Component classes (buttons, containers, etc.)
- Utility classes

### Custom Components

Add custom component classes in `assets/css/input.css`:

```css
@layer components {
  .card {
    @apply bg-white rounded-lg shadow-md p-6;
  }
}
```

### Tailwind Configuration

Modify `tailwind.config.js` to customize:

- Color schemes
- Fonts
- Spacing
- Breakpoints
- Plugins

Example - Add a custom color:

```javascript
theme: {
  extend: {
    colors: {
      brand: '#FF6B6B',
    },
  },
}
```

## Creating New Partials

### Step 1: Create the File

Create a new PHP file in `/partials`:

```bash
touch partials/call-to-action.php
```

### Step 2: Add Content

```php
<?php
/**
 * Call to Action Partial
 *
 * @package hypoteek-theme
 */

?>

<section class="bg-blue-500 text-white py-12">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4"><?php echo esc_html( $title ); ?></h2>
        <p><?php echo esc_html( $description ); ?></p>
    </div>
</section>
```

### Step 3: Use in Templates

```php
<?php
get_partial( 'call-to-action', array(
    'title'       => 'Join Our Newsletter',
    'description' => 'Subscribe to get updates',
) );
?>
```

## Theme Hooks & Filters

Common WordPress hooks used in this theme:

### Actions

- `after_setup_theme` - Theme setup and registration
- `wp_enqueue_scripts` - Load CSS and JS

### Filters

- `the_excerpt` - Modify excerpt output
- `the_content` - Modify post content

## Template Hierarchy

WordPress uses a template hierarchy. The theme follows:

```
Single Post:
single-{post-type}.php → single.php → index.php

Archive Page:
archive-{post-type}.php → archive.php → index.php

Home:
home.php → index.php

Search:
search.php → index.php
```

To create custom templates, add files like:
- `single-post.php`
- `archive-portfolio.php`
- `page-about.php`

## Helper Functions

### get_partial()

Load a partial template with arguments:

```php
<?php
get_partial( 'hero', array(
    'title'    => 'Welcome',
    'subtitle' => 'To our site',
) );
?>
```

Variables are extracted and available in the partial.

### get_template_part_with_args()

Enhanced version of WordPress's `get_template_part()` with argument support:

```php
<?php
get_template_part_with_args( 'content', array(
    'featured' => true,
) );
?>
```

## Customization

### Adding a Custom Post Type

In `functions.php`:

```php
function hypoteek_register_post_types() {
    register_post_type( 'portfolio', array(
        'labels'       => array( 'name' => 'Portfolio' ),
        'public'       => true,
        'has_archive'  => true,
        'supports'     => array( 'title', 'editor', 'thumbnail' ),
    ) );
}
add_action( 'init', 'hypoteek_register_post_types' );
```

### Adding Menus

Menus are already registered in `functions.php`:

```php
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'hypoteek-theme' ),
    'footer'  => __( 'Footer Menu', 'hypoteek-theme' ),
) );
```

Display in templates:

```php
<?php
wp_nav_menu( array(
    'theme_location' => 'primary',
    'menu_class'     => 'flex space-x-4',
) );
?>
```

## Performance Tips

1. **Minimize HTTP Requests** - Use CSS instead of images where possible
2. **Lazy Load Images** - Use `loading="lazy"` attribute
3. **Optimize Images** - Use WebP format with fallbacks
4. **Cache Queries** - Use WordPress transients for expensive queries
5. **Minify CSS/JS** - Use npm build script for production

## Browser Support

The theme supports all modern browsers:

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

Older browsers may have limited support for CSS Grid and Flexbox.

## Accessibility

The theme follows WCAG 2.1 guidelines:

- Semantic HTML (`<header>`, `<nav>`, `<main>`, etc.)
- Proper heading hierarchy
- Alt text on images
- Keyboard navigation support
- Color contrast compliance

## Security Best Practices

Always follow these when modifying the theme:

```php
// Sanitize user input
$safe_input = sanitize_text_field( $_POST['input'] );

// Escape output
echo esc_html( $variable );
echo esc_url( $url );
echo esc_attr( $attribute );

// Use nonces for forms
$nonce = wp_create_nonce( 'action_name' );
wp_verify_nonce( $_POST['nonce'], 'action_name' );
```

## Troubleshooting

### CSS Not Updating

1. Make sure you're running `npm run dev` or `npm run build`
2. Clear your browser cache (Ctrl+Shift+R or Cmd+Shift+R)
3. Check for CSS build errors in terminal output

### Tailwind Classes Not Working

1. Ensure the file is in the `content` array of `tailwind.config.js`
2. Rebuild CSS: `npm run build`
3. Check your HTML markup matches Tailwind class syntax

### PHP Errors

1. Check WordPress debug log: `wp-content/debug.log`
2. Enable debug mode in `.env`: `WP_DEBUG='true'`

## Resources

- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [Tailwind CSS Docs](https://tailwindcss.com/docs)
- [WordPress Plugin API](https://developer.wordpress.org/plugins/)
- [PHP Best Practices](https://www.php.net/manual/en/index.php)

## Support & Credits

Created as a modern starter theme for WordPress development.

---

**Version**: 1.0.0  
**License**: GPL-2.0+  
**Theme URI**: https://hypoteek.test

