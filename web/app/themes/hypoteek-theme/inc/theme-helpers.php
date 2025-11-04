<?php
/**
 * Theme Helper Functions
 *
 * @package hypoteek-theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get partial template
 *
 * @param string $partial Partial name
 * @param array  $args Arguments to pass to partial
 */
function get_partial( $partial, $args = array() ) {
    $partial_path = HYPOTEEK_THEME_DIR . '/partials/' . $partial . '.php';
    
    if ( file_exists( $partial_path ) ) {
        extract( $args );
        include $partial_path;
    }
}

/**
 * Get template part
 *
 * @param string $template Template name
 * @param array  $args Arguments to pass to template
 */
function get_template_part_with_args( $template, $args = array() ) {
    extract( $args );
    get_template_part( $template );
}
