<?php
/**
 * Header Template
 *
 * @package hypoteek-theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <link rel="icon" href="<?php echo esc_url( HYPOTEEK_THEME_URI . '/assets/images/icons/favi.svg' ); ?>" type="image/svg+xml">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( HYPOTEEK_THEME_URI . '/assets/favicons/favicon-32x32.png' ); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( HYPOTEEK_THEME_URI . '/assets/favicons/favicon-16x16.png' ); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( HYPOTEEK_THEME_URI . '/assets/favicons/apple-touch-icon.png' ); ?>">
    <link rel="manifest" href="<?php echo esc_url( HYPOTEEK_THEME_URI . '/assets/favicons/site.webmanifest' ); ?>">
    <link rel="mask-icon" href="<?php echo esc_url( HYPOTEEK_THEME_URI . '/assets/images/icons/favi.svg' ); ?>" color="#0a0a0a">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Navigation Bar (Positioned over hero) -->
    <nav id="site-navigation" class="main-navigation fixed top-0 left-0 right-0 z-50 px-4 sm:px-6 md:px-8 py-6 flex items-center justify-between">
        <!-- Logo (Left side) -->
        <div class="logo-area">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="inline-block">
                <img src="<?php echo esc_url( HYPOTEEK_THEME_URI . '/assets/images/hypoteek-logo.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-8 w-auto">
            </a>
        </div>

        <!-- Hamburger Menu Button (Mobile Only) -->
        <button id="menu-toggle" class="md:hidden flex items-center justify-center p-2" aria-label="Toggle navigation menu" aria-controls="mobile-menu" aria-expanded="false">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Navigation Menu (Hidden on Mobile, Shown on Medium screens and up) -->
        <div id="menu-items" class="hidden md:block">
            <div class="bg-brand-primary rounded-2xl px-10 py-4 shadow-lg">
                <ul class="flex flex-wrap items-center justify-end gap-4 sm:gap-6 md:gap-8">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex flex-wrap items-center justify-end gap-4 sm:gap-6 md:gap-8',
                        'fallback_cb'    => function() {
                            echo '<li><a href="' . esc_url( home_url( '/' ) ) . '" class="text-white text-sm font-light hover:text-brand-secondary transition-colors">Home</a></li>';
                        },
                        'link_before'    => '<span class="text-white text-sm font-light hover:text-brand-secondary transition-colors">',
                        'link_after'     => '</span>',
                    ) );
                    ?>
                </ul>
            </div>
        </div>

        <!-- Mobile Menu (Dropdown) -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 right-0 bg-brand-primary shadow-lg">
            <div class="px-4 py-2">
                <ul class="flex flex-col gap-2">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex flex-col gap-2',
                        'fallback_cb'    => function() {
                            echo '<li><a href="' . esc_url( home_url( '/' ) ) . '" class="block px-4 py-2 text-white text-sm font-light hover:text-brand-secondary transition-colors hover:bg-white hover:bg-opacity-10 rounded">Home</a></li>';
                        },
                        'link_before'    => '<span class="block px-4 py-2 text-white text-sm font-light hover:text-brand-secondary transition-colors hover:bg-white hover:bg-opacity-10 rounded">',
                        'link_after'     => '</span>',
                    ) );
                    ?>
                </ul>
            </div>
        </div>
    </nav>
