<?php
/**
 * Footer Template
 *
 * @package hypoteek-theme
 */

?>
    <footer id="site-footer" class="site-footer bg-brand-primary text-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8 py-12">
            <!-- Top Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 pb-8 border-b" style="border-bottom-color: #664D97;">
                <!-- Left: Logo and Info -->
                <div class="footer-left">
                    <!-- Logo -->
                    <div class="footer-logo mb-6">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hypoteek-logo.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-8 w-auto">
                    </div>

                    <!-- Description -->
                    <p class="footer-description text-sm leading-relaxed mb-6">
                        <?php bloginfo( 'description' ); ?>
                    </p>
                </div>

                <!-- Right: Contact Info and Social -->
                <div class="footer-right">
                    <!-- Contact Info -->
                    <div class="footer-contact mb-6 text-right">
                        <h3 class="text-sm font-bold mb-2"><?php _e( 'Võtke meiega ühendust', 'hypoteek-theme' ); ?></h3>
                        <p class="text-sm mb-1">
                            <a href="tel:+37255565556" class="hover:text-brand-secondary transition">+372 5556 5556</a>
                        </p>
                        <p class="text-sm">
                            Tartu mnt 10, Tallinn
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Center: Email -->
                <div class="footer-email text-center mb-6 md:mb-0">
                    <p class="text-sm">
                        <a href="mailto:info@hypoteek24.ee" class="hover:text-brand-secondary transition">hüpoteeklaen24</a>
                    </p>
                </div>

                <!-- Right: Social Links -->
                <div class="footer-social flex gap-6">
                    <?php
                    $hero_data = get_hero_data();
                    
                    // Facebook
                    if ( $hero_data['footer_facebook_icon_id'] ) {
                        $facebook_url = wp_get_attachment_url( $hero_data['footer_facebook_icon_id'] );
                        if ( $facebook_url ) {
                            ?>
                            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="footer-social-link hover:opacity-80 transition">
                                <span class="sr-only">Facebook</span>
                                <img src="<?php echo esc_url( $facebook_url ); ?>" alt="Facebook" class="footer-social-icon">
                            </a>
                            <?php
                        }
                    }
                    
                    // Instagram
                    if ( $hero_data['footer_instagram_icon_id'] ) {
                        $instagram_url = wp_get_attachment_url( $hero_data['footer_instagram_icon_id'] );
                        if ( $instagram_url ) {
                            ?>
                            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="footer-social-link hover:opacity-80 transition">
                                <span class="sr-only">Instagram</span>
                                <img src="<?php echo esc_url( $instagram_url ); ?>" alt="Instagram" class="footer-social-icon">
                            </a>
                            <?php
                        }
                    }
                    
                    // WhatsApp
                    if ( $hero_data['footer_whatsapp_icon_id'] ) {
                        $whatsapp_url = wp_get_attachment_url( $hero_data['footer_whatsapp_icon_id'] );
                        if ( $whatsapp_url ) {
                            ?>
                            <a href="https://whatsapp.com" target="_blank" rel="noopener noreferrer" class="footer-social-link hover:opacity-80 transition">
                                <span class="sr-only">WhatsApp</span>
                                <img src="<?php echo esc_url( $whatsapp_url ); ?>" alt="WhatsApp" class="footer-social-icon">
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php wp_footer(); ?>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            var menuToggle = document.getElementById('menu-toggle');
            var mobileMenu = document.getElementById('mobile-menu');
            var nav = document.getElementById('site-navigation');

            if (!menuToggle || !mobileMenu) return;

            function openMenu() {
                mobileMenu.classList.remove('hidden');
                menuToggle.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden';
            }

            function closeMenu() {
                mobileMenu.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }

            menuToggle.addEventListener('click', function (e) {
                var expanded = menuToggle.getAttribute('aria-expanded') === 'true';
                if (expanded) {
                    closeMenu();
                } else {
                    openMenu();
                }
            });

            // Close when clicking outside the nav or on a mobile menu link
            document.addEventListener('click', function (e) {
                if (mobileMenu.classList.contains('hidden')) return;
                if (nav && nav.contains(e.target)) {
                    if (e.target.closest('#mobile-menu a')) {
                        closeMenu();
                    }
                    return;
                }
                closeMenu();
            });

            // Close with Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeMenu();
                }
            });

            // Close on resize to desktop
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 768) {
                    closeMenu();
                }
            });
        });
        </script>
    </footer>
</body>
</html>
