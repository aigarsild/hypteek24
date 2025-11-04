<?php
/**
 * Hypoteek Theme Functions
 *
 * @package hypoteek-theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define theme constants
define( 'HYPOTEEK_THEME_DIR', get_template_directory() );
define( 'HYPOTEEK_THEME_URI', get_template_directory_uri() );
define( 'HYPOTEEK_THEME_VERSION', '1.0.0' );

/**
 * Theme Setup
 */
function hypoteek_theme_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'hypoteek-theme' ),
        'footer'  => __( 'Footer Menu', 'hypoteek-theme' ),
    ) );

    // Load text domain
    load_theme_textdomain( 'hypoteek-theme', HYPOTEEK_THEME_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'hypoteek_theme_setup' );

/**
 * Enqueue Scripts and Styles
 */
function hypoteek_theme_enqueue_assets() {
    // Enqueue Google Fonts - Poppins
    wp_enqueue_style(
        'hypoteek-poppins-font',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Main stylesheet
    $style_path = HYPOTEEK_THEME_DIR . '/style.css';
    $style_version = file_exists( $style_path ) ? filemtime( $style_path ) : HYPOTEEK_THEME_VERSION;
    wp_enqueue_style(
        'hypoteek-style',
        HYPOTEEK_THEME_URI . '/style.css',
        array( 'hypoteek-poppins-font' ),
        $style_version
    );

    // Main JavaScript
    wp_enqueue_script(
        'hypoteek-script',
        HYPOTEEK_THEME_URI . '/assets/js/main.js',
        array(),
        HYPOTEEK_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'hypoteek_theme_enqueue_assets' );

// Load theme utilities and functions
require_once HYPOTEEK_THEME_DIR . '/inc/theme-helpers.php';

// Load SVG upload handler
require_once HYPOTEEK_THEME_DIR . '/inc/svg-upload.php';

// Load hero section admin functionality
require_once HYPOTEEK_THEME_DIR . '/inc/hero-admin.php';
