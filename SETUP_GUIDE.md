# Hypoteek WordPress Project - Quick Setup Guide

## What Has Been Set Up

✅ **Bedrock** - Modern WordPress boilerplate installed  
✅ **Valet** - Local development environment configured  
✅ **wp-cli** - WordPress command line tool ready to use  
✅ **hypoteek-theme** - Custom starter theme with Tailwind CSS  
✅ **Tailwind CSS** - Utility-first CSS framework integrated  

## Next Steps to Get Started

### 1. Create Database

```bash
mysql -u root -p
```

```sql
CREATE DATABASE hypoteek CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'hypoteek'@'localhost' IDENTIFIED BY 'your_password_here';
GRANT ALL PRIVILEGES ON hypoteek.* TO 'hypoteek'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Then update `.env` with your database credentials:

```
DB_NAME="hypoteek"
DB_USER="hypoteek"
DB_PASSWORD="your_password_here"
DB_HOST="127.0.0.1"
```

### 2. Generate Security Keys

Visit https://roots.io/salts.html and copy the keys.

Update `.env` with your unique keys:

```
AUTH_KEY='...'
SECURE_AUTH_KEY='...'
LOGGED_IN_KEY='...'
NONCE_KEY='...'
AUTH_SALT='...'
SECURE_AUTH_SALT='...'
LOGGED_IN_SALT='...'
NONCE_SALT='...'
```

### 3. Link with Valet

```bash
cd /Users/aigarsild/hypteek24
valet link hypoteek
```

Your site will be available at: **http://hypoteek.test**

### 4. Install WordPress

```bash
wp core install \
  --url=http://hypoteek.test \
  --title="Hypoteek" \
  --admin_user=admin \
  --admin_password=password \
  --admin_email=admin@hypoteek.test \
  --skip-email
```

### 5. Activate Theme

```bash
wp theme activate hypoteek-theme
```

### 6. Create Sample Content

```bash
wp post create \
  --post_title="Welcome to Hypoteek" \
  --post_content="This is your first post!" \
  --post_type=post \
  --post_status=publish
```

## Theme Development

### Watch CSS Changes

```bash
cd web/app/themes/hypoteek-theme
npm run dev
```

Leave this running while you develop. CSS will rebuild automatically.

### Build for Production

```bash
cd web/app/themes/hypoteek-theme
npm run build
```

## Project Directory Structure

```
/Users/aigarsild/hypteek24/
├── .env                          # Environment configuration
├── README.md                      # Main project documentation
├── SETUP_GUIDE.md                 # This file
├── web/                           # Web root
│   ├── app/
│   │   ├── themes/
│   │   │   └── hypoteek-theme/   # Your custom theme
│   │   ├── plugins/
│   │   └── mu-plugins/
│   ├── wp/                        # WordPress core (gitignored)
│   ├── wp-config.php
│   └── index.php
├── config/                        # Bedrock config
├── composer.json                  # PHP dependencies
└── vendor/                        # Composer packages
```

## Useful Commands

### WordPress

```bash
# List themes
wp theme list

# Install a plugin
wp plugin install --activate hello-dolly

# Create a page
wp post create --post_title="About" --post_type=page

# Export database
wp db export backup.sql

# Reset WordPress (careful!)
wp site empty
```

### Theme

```bash
# Navigate to theme
cd web/app/themes/hypoteek-theme

# Install/update dependencies
npm install

# Development mode (watch)
npm run dev

# Production build (minified)
npm run build
```

### Valet

```bash
# Start Valet
valet start

# Restart Valet
valet restart

# Stop Valet
valet stop

# View Valet logs
valet log

# List linked sites
valet links
```

## Available Partials

Located in `web/app/themes/hypoteek-theme/partials/`:

- `header-top.php` - Top header area
- `navigation.php` - Main navigation
- `hero.php` - Hero section
- `sidebar.php` - Sidebar
- `footer-widgets.php` - Footer widgets

Use with: `<?php get_partial( 'hero' ); ?>`

## Adding Custom Styles with Tailwind

Edit `web/app/themes/hypoteek-theme/assets/css/input.css`:

```css
@layer components {
  .card {
    @apply bg-white rounded-lg shadow-md p-6;
  }
}
```

Rebuild: `npm run build`

## Troubleshooting

### Site not loading at hypoteek.test

1. Make sure Valet is running: `valet start`
2. Check if linked: `valet links`
3. Restart Valet: `valet restart`

### Can't connect to database

Check `.env` credentials:
```bash
wp db check
```

### CSS changes not showing

1. Make sure running `npm run dev` or `npm run build`
2. Clear browser cache (Cmd+Shift+R)
3. Check for build errors in terminal

### WordPress won't install

Check web root permissions:
```bash
chmod -R 755 web/
```

## Documentation Links

- [Bedrock Docs](https://roots.io/bedrock/)
- [Valet Docs](https://laravel.com/docs/valet)
- [wp-cli Docs](https://wp-cli.org/)
- [WordPress Theme Dev](https://developer.wordpress.org/themes/)
- [Tailwind CSS](https://tailwindcss.com/docs)

## Project Information

- **Project Name**: Hypoteek
- **Location**: /Users/aigarsild/hypteek24
- **Theme**: hypoteek-theme
- **WordPress Version**: 6.8.3
- **PHP Version**: 7.4+
- **Local Domain**: hypoteek.test

---

**Need help?** Check the main README.md for more detailed information.

Happy coding! 🚀
