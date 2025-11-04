# Hypoteek WordPress Project

A modern WordPress development environment built with Bedrock, Valet, and wp-cli.

## Project Structure

```
hypoteek24/
├── web/
│   ├── app/
│   │   ├── plugins/
│   │   ├── themes/
│   │   │   └── hypoteek-theme/  (Custom starter theme)
│   │   └── mu-plugins/
│   ├── wp-config.php
│   └── index.php
├── config/
├── vendor/
├── .env
└── composer.json
```

## Prerequisites

Before setting up this project, ensure you have:

- **PHP 7.4+** installed
- **Composer** - [Install Composer](https://getcomposer.org/)
- **Node.js & npm** - [Install Node.js](https://nodejs.org/)
- **Valet** - [Install Valet](https://laravel.com/docs/valet)
- **wp-cli** - [Install wp-cli](https://wp-cli.org/)
- **MySQL/MariaDB** - Running locally

## Installation & Setup

### 1. Environment Configuration

The `.env` file has been created with default settings. Update the database credentials as needed:

```bash
DB_NAME="hypoteek"
DB_USER="root"
DB_PASSWORD="root"
DB_HOST="127.0.0.1"

WP_ENV="development"
WP_HOME="http://hypoteek.test"
WP_SITEURL="${WP_HOME}/wp"
```

> **Security Note**: Generate unique security keys at https://roots.io/salts.html and update the AUTH_* and NONCE_* values in `.env`

### 2. Database Setup

Create a MySQL database and user:

```bash
mysql -u root -p
```

```sql
CREATE DATABASE hypoteek;
CREATE USER 'hypoteek'@'localhost' IDENTIFIED BY 'your-secure-password';
GRANT ALL PRIVILEGES ON hypoteek.* TO 'hypoteek'@'localhost';
FLUSH PRIVILEGES;
```

### 3. Valet Setup

Link the project with Valet:

```bash
cd /Users/aigarsild/hypoteek24
valet link hypoteek
```

Access the site at: `http://hypoteek.test`

### 4. WordPress Installation

Install WordPress using wp-cli:

```bash
wp core install \
  --url=http://hypoteek.test \
  --title="Hypoteek" \
  --admin_user=admin \
  --admin_password=password \
  --admin_email=admin@hypoteek.test
```

### 5. Activate Theme

```bash
wp theme activate hypoteek-theme
```

## Theme Development

### Directory Structure

```
hypoteek-theme/
├── assets/
│   ├── css/
│   │   └── input.css          (Tailwind input)
│   ├── js/
│   │   └── main.js            (Main JavaScript)
│   └── images/
├── partials/
│   ├── header-top.php
│   ├── navigation.php
│   ├── hero.php
│   ├── sidebar.php
│   └── footer-widgets.php
├── template-parts/
│   ├── content.php
│   └── content-none.php
├── inc/
│   └── theme-helpers.php
├── functions.php
├── header.php
├── footer.php
├── index.php
├── style.css
├── package.json
└── tailwind.config.js
```

### Working with Tailwind CSS

The theme uses Tailwind CSS for styling. To work on theme styles:

#### Development Mode (Watch for changes):

```bash
cd web/app/themes/hypoteek-theme
npm run dev
```

#### Production Build (Minified):

```bash
cd web/app/themes/hypoteek-theme
npm run build
```

### Using Theme Helpers

#### Load a Partial

```php
<?php get_partial( 'hero', array( 'title' => 'Welcome' ) ); ?>
```

This loads `hypoteek-theme/partials/hero.php`

#### Load a Template Part

```php
<?php get_template_part( 'template-parts/content', 'page' ); ?>
```

### Creating New Partials

1. Create a new PHP file in `hypoteek-theme/partials/`
2. Use the same structure as existing partials with proper comments
3. Load using `get_partial()` helper function

## Common WordPress Tasks

### View WordPress Version

```bash
wp core version
```

### List Installed Themes

```bash
wp theme list
```

### Create a New Post

```bash
wp post create --post_title="My First Post" --post_content="Post content here" --post_type=post
```

### Export Database

```bash
wp db export backup.sql
```

### Reset WordPress (Be Careful!)

```bash
wp site empty
```

## Bedrock Resources

- [Bedrock Documentation](https://roots.io/bedrock/)
- [Bedrock on GitHub](https://github.com/roots/bedrock)

## Valet Resources

- [Valet Documentation](https://laravel.com/docs/valet)
- [Valet Drivers](https://laravel.com/docs/valet#custom-valet-drivers)

## wp-cli Resources

- [wp-cli.org](https://wp-cli.org/)
- [wp-cli Commands](https://developer.wordpress.org/cli/commands/)

## Theme Development Notes

### Folder Structure Best Practices

- **assets/css/**: Keep CSS files organized
- **assets/js/**: JavaScript modules and utilities
- **assets/images/**: Theme images and icons
- **partials/**: Reusable component templates
- **template-parts/**: Full template sections for post types
- **inc/**: PHP utility functions and helpers

### Security

- Always sanitize user input with functions like `sanitize_text_field()`, `sanitize_email()`
- Always escape output with `esc_html()`, `esc_url()`, `esc_attr()`
- Use nonces for form submissions: `wp_create_nonce()` and `wp_verify_nonce()`

## Troubleshooting

### Valet Issues

If Valet isn't working:

```bash
valet start
valet restart
```

### Database Connection Issues

Check your `.env` credentials match your MySQL setup:

```bash
wp db check
```

### Theme Not Showing

Ensure theme is activated:

```bash
wp theme activate hypoteek-theme
```

### Build Issues

Clear npm cache and rebuild:

```bash
cd web/app/themes/hypoteek-theme
rm -rf node_modules package-lock.json
npm install
npm run build
```

## Local Development Tips

1. **Enable WordPress Debug**: Add to wp-config.php
   ```php
   define( 'WP_DEBUG', true );
   define( 'WP_DEBUG_LOG', true );
   define( 'WP_DEBUG_DISPLAY', false );
   ```

2. **View Debug Log**: 
   ```bash
   tail -f web/wp-content/debug.log
   ```

3. **Use WP-CLI for Quick Tasks**: Much faster than the admin panel

4. **Version Control**: Add to .gitignore:
   ```
   web/wp/
   web/wp-content/plugins/*/
   vendor/
   node_modules/
   ```

## Next Steps

1. ✅ Bedrock WordPress installed
2. ✅ Valet configured (run `valet link hypoteek`)
3. ✅ wp-cli ready
4. ✅ hypoteek-theme created with Tailwind CSS
5. Create a WordPress database and run installation
6. Start developing! 🚀

---

**Created**: October 2025
**Theme Version**: 1.0.0
**WordPress Version**: 6.8.3
