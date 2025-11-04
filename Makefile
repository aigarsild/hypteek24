.PHONY: help setup install db wp-install theme-dev theme-build valet-start valet-stop valet-restart clean

# Display help text
help:
	@echo "Hypoteek WordPress Project - Available Commands"
	@echo "================================================"
	@echo ""
	@echo "Setup & Installation:"
	@echo "  make setup          - Complete setup (requires manual DB creation)"
	@echo "  make install        - Install WordPress"
	@echo ""
	@echo "Database:"
	@echo "  make db-create      - Create database with wp-cli"
	@echo "  make db-export      - Export database to backup.sql"
	@echo "  make db-import      - Import database from backup.sql"
	@echo ""
	@echo "Theme Development:"
	@echo "  make theme-dev      - Watch theme CSS changes"
	@echo "  make theme-build    - Build minified theme CSS"
	@echo ""
	@echo "Valet:"
	@echo "  make valet-start    - Start Valet"
	@echo "  make valet-stop     - Stop Valet"
	@echo "  make valet-restart  - Restart Valet"
	@echo ""
	@echo "Utilities:"
	@echo "  make clean          - Clean theme node_modules and build"
	@echo "  make help           - Display this help message"

# Complete setup
setup: valet-link
	@echo "Setup complete! Next steps:"
	@echo "1. Create database (see SETUP_GUIDE.md)"
	@echo "2. Update .env with DB credentials"
	@echo "3. Run: make install"

# Link with Valet
valet-link:
	cd . && valet link hypoteek

# Install WordPress
install:
	wp core install \
		--url=http://hypoteek.test \
		--title="Hypoteek" \
		--admin_user=admin \
		--admin_password=password \
		--admin_email=admin@hypoteek.test \
		--skip-email
	wp theme activate hypoteek-theme
	@echo "WordPress installed! Visit http://hypoteek.test"

# Theme development - watch CSS changes
theme-dev:
	cd web/app/themes/hypoteek-theme && npm run dev

# Theme production build
theme-build:
	cd web/app/themes/hypoteek-theme && npm run build

# Database operations
db-create:
	mysql -u root -p -e "CREATE DATABASE hypoteek CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
	mysql -u root -p -e "CREATE USER 'hypoteek'@'localhost' IDENTIFIED BY 'password';"
	mysql -u root -p -e "GRANT ALL PRIVILEGES ON hypoteek.* TO 'hypoteek'@'localhost';"
	mysql -u root -p -e "FLUSH PRIVILEGES;"

db-export:
	wp db export backup.sql
	@echo "Database exported to backup.sql"

db-import:
	wp db import backup.sql
	@echo "Database imported from backup.sql"

# Valet commands
valet-start:
	valet start

valet-stop:
	valet stop

valet-restart:
	valet restart

# Cleanup
clean:
	cd web/app/themes/hypoteek-theme && rm -rf node_modules package-lock.json
	cd web/app/themes/hypoteek-theme && npm install && npm run build
	@echo "Theme cleaned and rebuilt"

# WordPress commands with wp-cli
wp-list-themes:
	wp theme list

wp-list-plugins:
	wp plugin list

wp-create-post:
	wp post create --prompt=post_title,post_content

wp-flush-cache:
	wp cache flush

wp-import-xml:
	wp import --help

# Valet status
status:
	@echo "Valet Status:"
	@valet status 2>/dev/null || echo "Valet not running"
	@echo ""
	@echo "WordPress Status:"
	@wp core version
	@echo ""
	@echo "Active Theme:"
	@wp theme list --field=name --status=active
