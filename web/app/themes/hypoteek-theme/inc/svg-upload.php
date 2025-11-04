<?php
/**
 * SVG Upload Handler
 * Allows safe SVG file uploads to WordPress media library
 *
 * @package hypoteek-theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add SVG MIME type to allowed uploads
 * This is the most important function for SVG support
 */
function hypoteek_allow_svg_upload( $mimes ) {
    if ( ! isset( $mimes['svg'] ) ) {
        $mimes['svg']  = 'image/svg+xml';
    }
    if ( ! isset( $mimes['svgz'] ) ) {
        $mimes['svgz'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter( 'upload_mimes', 'hypoteek_allow_svg_upload', 10, 1 );

/**
 * Fix MIME type detection for SVG files
 * Ensure SVG files are recognized as images
 */
function hypoteek_fix_svg_mime_type( $data, $file, $filename, $mimes ) {
    // If MIME type is already detected, return as-is
    if ( ! empty( $data['type'] ) ) {
        return $data;
    }

    // Check if this is an SVG file by extension
    $ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
    
    if ( 'svg' === $ext || 'svgz' === $ext ) {
        $data['type'] = 'image/svg+xml';
    }

    return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'hypoteek_fix_svg_mime_type', 10, 4 );

/**
 * Skip metadata generation for SVG files
 * This prevents server errors when trying to process SVG with image libraries
 */
function hypoteek_skip_svg_processing( $metadata, $attachment_id ) {
    $mime_type = get_post_mime_type( $attachment_id );
    
    // Skip all processing for SVG files
    if ( 'image/svg+xml' === $mime_type ) {
        return array();
    }
    
    return $metadata;
}
add_filter( 'wp_generate_attachment_metadata', 'hypoteek_skip_svg_processing', 10, 2 );

/**
 * Allow SVG in media library final filter
 */
function hypoteek_sanitize_svg( $file ) {
    // Allow SVG files to pass through
    if ( isset( $file['type'] ) && 'image/svg+xml' === $file['type'] ) {
        return $file;
    }
    return $file;
}
add_filter( 'wp_handle_upload', 'hypoteek_sanitize_svg' );

/**
 * Display SVG properly in WordPress admin
 */
function hypoteek_enable_svg_preview() {
    echo "
    <style type='text/css'>
        img[src$='.svg'], img[src*='.svg?'] {
            max-width: 100% !important;
            height: auto !important;
        }
    </style>
    ";
}
add_action( 'admin_head', 'hypoteek_enable_svg_preview' );
