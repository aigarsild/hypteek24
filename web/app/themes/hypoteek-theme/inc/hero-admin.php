<?php
/**
 * Hero Section Admin Functionality
 * Handles hero section editing from WordPress admin panel
 *
 * @package hypoteek-theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue media library scripts for admin
 */
function hypoteek_enqueue_admin_scripts( $hook ) {
    // Only enqueue on our custom page
    if ( $hook !== 'toplevel_page_hypoteek-hero-settings' ) {
        return;
    }

    // Enqueue WordPress media library
    wp_enqueue_media();

    // Enqueue jQuery
    wp_enqueue_script( 'jquery' );
}
add_action( 'admin_enqueue_scripts', 'hypoteek_enqueue_admin_scripts' );

/**
 * Sanitize SVG URL
 */
function hypoteek_sanitize_svg_url( $value ) {
    if ( empty( $value ) ) {
        return '';
    }
    
    // Ensure it's a valid SVG file URL
    $value = esc_url_raw( $value );
    
    // Check if it ends with .svg
    if ( ! preg_match( '/\.svg$/i', $value ) ) {
        return '';
    }
    
    return $value;
}

/**
 * Register hero settings in customizer or as theme mods
 */
function hypoteek_register_hero_settings() {
    // Register hero title - main (thin)
    register_setting( 'hypoteek-hero-settings', 'hypoteek_hero_title_main', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Arendad ja ehitad?',
    ) );

    // Register hero title - bold
    register_setting( 'hypoteek-hero-settings', 'hypoteek_hero_title_bold', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Küsi arenduslaenu!',
    ) );

    // Register hero subtitle
    register_setting( 'hypoteek-hero-settings', 'hypoteek_hero_subtitle', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Your trusted partner for financial solutions',
    ) );

    // Register hero image
    register_setting( 'hypoteek-hero-settings', 'hypoteek_hero_image', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    // Register hero SVG mask
    register_setting( 'hypoteek-hero-settings', 'hypoteek_hero_svg_mask', array(
        'sanitize_callback' => 'hypoteek_sanitize_svg_url',
        'default'           => '',
    ) );

    // Register button 1 text
    register_setting( 'hypoteek-hero-settings', 'hypoteek_button_1_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ) );

    // Register button 1 link
    register_setting( 'hypoteek-hero-settings', 'hypoteek_button_1_link', array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '',
    ) );

    // Register button 2 text
    register_setting( 'hypoteek-hero-settings', 'hypoteek_button_2_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ) );

    // Register button 2 link
    register_setting( 'hypoteek-hero-settings', 'hypoteek_button_2_link', array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '',
    ) );

    // Register icon cards section - Card 1
    register_setting( 'hypoteek-hero-settings', 'hypoteek_icon_card_1_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Personaalne lähenemine',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_icon_card_1_icon', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    // Register icon cards section - Card 2
    register_setting( 'hypoteek-hero-settings', 'hypoteek_icon_card_2_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Paindlikud laenutusingimused',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_icon_card_2_icon', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    // Register icon cards section - Card 3
    register_setting( 'hypoteek-hero-settings', 'hypoteek_icon_card_3_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Sõbralik teenindus',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_icon_card_3_icon', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    // Register CTA section settings
    register_setting( 'hypoteek-hero-settings', 'hypoteek_cta_title', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Laen, mis vastab Sinu äri vajadustele',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cta_content', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Hüpoteeklaenu ärilaen on paindlik ja mõeldud just nendeks tegevusteks, mis Sinu äris on vajalikud. Ärilaenu saamise eelduseks on selge idee ja kindel tagasimakseallikas.',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cta_button_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Võta meiega ühendust',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cta_button_link', array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '#',
    ) );

    // Register cards section title and description
    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_section_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Küsi arenduslaenu!',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_section_description', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt',
    ) );

    // Register cards section - Card 1
    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_1_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ärilaen',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_1_description', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_1_icon', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    // Register cards section - Card 2
    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_2_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Laen kinnisvara tagatisel',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_2_description', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_2_icon', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    // Register cards section - Card 3
    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_3_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Kasvulaen',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_3_description', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_cards_3_icon', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    // Register featured section (new section)
    register_setting( 'hypoteek-hero-settings', 'hypoteek_featured_section_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Küsi personaalset pakkumist',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_featured_section_description', array(
        'sanitize_callback' => 'wp_kses_post',
        'default'           => 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_featured_section_image', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_featured_section_svg_mask', array(
        'sanitize_callback' => 'hypoteek_sanitize_svg_url',
        'default'           => '',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_featured_section_button_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Taotlе siin',
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_featured_section_button_link', array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => '',
    ) );

    // Register footer social icons
    register_setting( 'hypoteek-hero-settings', 'hypoteek_footer_facebook_icon', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_footer_instagram_icon', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );

    register_setting( 'hypoteek-hero-settings', 'hypoteek_footer_whatsapp_icon', array(
        'sanitize_callback' => 'absint',
        'default'           => 0,
    ) );
}
add_action( 'init', 'hypoteek_register_hero_settings' );

/**
 * Add hero settings menu page
 */
function hypoteek_add_hero_admin_menu() {
    add_menu_page(
        __( 'Hero Section', 'hypoteek-theme' ),
        __( 'Hero Section', 'hypoteek-theme' ),
        'manage_options',
        'hypoteek-hero-settings',
        'hypoteek_render_hero_admin_page',
        'dashicons-image-flip-vertical',
        6
    );
}
add_action( 'admin_menu', 'hypoteek_add_hero_admin_menu' );

/**
 * Render hero settings admin page
 */
function hypoteek_render_hero_admin_page() {
    // Check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Get current values
    $hero_title_main        = get_option( 'hypoteek_hero_title_main', 'Arendad ja ehitad?' );
    $hero_title_bold        = get_option( 'hypoteek_hero_title_bold', 'Küsi arenduslaenu!' );
    $hero_subtitle     = get_option( 'hypoteek_hero_subtitle', 'Your trusted partner for financial solutions' );
    $hero_image_id     = get_option( 'hypoteek_hero_image', 0 );
    $hero_image_url    = $hero_image_id ? wp_get_attachment_url( $hero_image_id ) : '';
    $button_1_text     = get_option( 'hypoteek_button_1_text', 'For Individuals' );
    $button_1_link     = get_option( 'hypoteek_button_1_link', '/erakliendile' );
    $button_2_text     = get_option( 'hypoteek_button_2_text', 'For Business' );
    $button_2_link     = get_option( 'hypoteek_button_2_link', '/ärikliendile' );
    ?>

    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

        <form action="options.php" method="post" class="hypoteek-hero-form">
            <?php settings_fields( 'hypoteek-hero-settings' ); ?>

            <!-- Hero Title -->
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="hypoteek_hero_title_main"><?php _e( 'Hero Title (Main)', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_hero_title_main"
                                name="hypoteek_hero_title_main"
                                value="<?php echo esc_attr( $hero_title_main ); ?>"
                                class="regular-text"
                                placeholder="Arendad ja ehitad?"
                            >
                            <p class="description"><?php _e( 'Main heading text for the hero section (thin)', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_hero_title_bold"><?php _e( 'Hero Title (Bold)', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_hero_title_bold"
                                name="hypoteek_hero_title_bold"
                                value="<?php echo esc_attr( $hero_title_bold ); ?>"
                                class="regular-text"
                                placeholder="Küsi arenduslaenu!"
                            >
                            <p class="description"><?php _e( 'Bold heading text for the hero section', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <!-- Hero Subtitle -->
                    <tr>
                        <th scope="row">
                            <label for="hypoteek_hero_subtitle"><?php _e( 'Hero Subtitle', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <?php
                            wp_editor(
                                $hero_subtitle,
                                'hypoteek_hero_subtitle',
                                array(
                                    'textarea_name' => 'hypoteek_hero_subtitle',
                                    'textarea_rows' => 5,
                                    'media_buttons' => false,
                                    'quicktags'     => false,
                                    'teeny'         => true,
                                )
                            );
                            ?>
                            <p class="description"><?php _e( 'Secondary text for the hero section', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <!-- Hero Image -->
                    <tr>
                        <th scope="row">
                            <label for="hypoteek_hero_image"><?php _e( 'Hero Image', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-image-upload">
                                <?php if ( $hero_image_url ) : ?>
                                    <div class="hypoteek-image-preview" id="hypoteek-image-preview">
                                        <img src="<?php echo esc_url( $hero_image_url ); ?>" alt="Hero image preview" style="max-width: 300px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-image"><?php _e( 'Remove Image', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-image-preview" id="hypoteek-image-preview" style="display: none;">
                                        <img src="" alt="Hero image preview" style="max-width: 300px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-image"><?php _e( 'Remove Image', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>

                                <input
                                    type="hidden"
                                    id="hypoteek_hero_image"
                                    name="hypoteek_hero_image"
                                    value="<?php echo esc_attr( $hero_image_id ); ?>"
                                >

                                <button type="button" class="button button-primary" id="hypoteek-upload-image"><?php _e( 'Upload Image', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Upload an image to display on the right side of the hero section', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <!-- SVG Mask Upload -->
                    <tr>
                        <th scope="row">
                            <label for="hypoteek_hero_svg_mask"><?php _e( 'Hero SVG Mask', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-svg-mask-upload">
                                <input
                                    type="url"
                                    id="hypoteek_hero_svg_mask"
                                    name="hypoteek_hero_svg_mask"
                                    value="<?php echo esc_attr( get_option( 'hypoteek_hero_svg_mask', '' ) ); ?>"
                                    class="regular-text"
                                    placeholder="https://example.com/mask.svg"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-svg-mask"><?php _e( 'Upload SVG Mask', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Upload an SVG file to use as a mask for the hero image. The SVG should contain a &lt;mask&gt; element.', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <!-- Button 1 Settings -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h2><?php _e( 'Button 1 (Green)', 'hypoteek-theme' ); ?></h2>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_button_1_text"><?php _e( 'Button 1 Text', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_button_1_text"
                                name="hypoteek_button_1_text"
                                value="<?php echo esc_attr( $button_1_text ); ?>"
                                class="regular-text"
                                placeholder="For Individuals"
                            >
                            <p class="description"><?php _e( 'Text displayed on the first button', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_button_1_link"><?php _e( 'Button 1 Link', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="url"
                                id="hypoteek_button_1_link"
                                name="hypoteek_button_1_link"
                                value="<?php echo esc_attr( $button_1_link ); ?>"
                                class="regular-text"
                                placeholder="/erakliendile"
                            >
                            <p class="description"><?php _e( 'URL for the first button (relative or absolute)', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <!-- Button 2 Settings -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h2><?php _e( 'Button 2 (Purple Outline)', 'hypoteek-theme' ); ?></h2>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_button_2_text"><?php _e( 'Button 2 Text', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_button_2_text"
                                name="hypoteek_button_2_text"
                                value="<?php echo esc_attr( $button_2_text ); ?>"
                                class="regular-text"
                                placeholder="For Business"
                            >
                            <p class="description"><?php _e( 'Text displayed on the second button', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_button_2_link"><?php _e( 'Button 2 Link', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="url"
                                id="hypoteek_button_2_link"
                                name="hypoteek_button_2_link"
                                value="<?php echo esc_attr( $button_2_link ); ?>"
                                class="regular-text"
                                placeholder="/ärikliendile"
                            >
                            <p class="description"><?php _e( 'URL for the second button (relative or absolute)', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <!-- Icon Cards Settings -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h2><?php _e( 'Icon Cards Section', 'hypoteek-theme' ); ?></h2>
                        </th>
                    </tr>

                    <!-- Card 1 -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h3><?php _e( 'Card 1 - Personal Approach', 'hypoteek-theme' ); ?></h3>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_icon_card_1_title"><?php _e( 'Card 1 Title', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_icon_card_1_title"
                                name="hypoteek_icon_card_1_title"
                                value="<?php echo esc_attr( get_option( 'hypoteek_icon_card_1_title', 'Personaalne lähenemine' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Title for the first card', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_icon_card_1_icon"><?php _e( 'Card 1 Icon', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-icon-upload">
                                <?php 
                                $icon_id = get_option( 'hypoteek_icon_card_1_icon', 0 );
                                $icon_url = $icon_id ? wp_get_attachment_url( $icon_id ) : '';
                                if ( $icon_url ) : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-icon-preview-1">
                                        <img src="<?php echo esc_url( $icon_url ); ?>" alt="Card 1 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-icon-1"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-icon-preview-1" style="display: none;">
                                        <img src="" alt="Card 1 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-icon-1"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_icon_card_1_icon"
                                    name="hypoteek_icon_card_1_icon"
                                    value="<?php echo esc_attr( $icon_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-icon-1"><?php _e( 'Upload Icon', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Choose an icon for the first card', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <!-- Card 2 -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h3><?php _e( 'Card 2 - Flexible Terms', 'hypoteek-theme' ); ?></h3>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_icon_card_2_title"><?php _e( 'Card 2 Title', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_icon_card_2_title"
                                name="hypoteek_icon_card_2_title"
                                value="<?php echo esc_attr( get_option( 'hypoteek_icon_card_2_title', 'Paindlikud laenutusingimused' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Title for the second card', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_icon_card_2_icon"><?php _e( 'Card 2 Icon', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-icon-upload">
                                <?php 
                                $icon_id = get_option( 'hypoteek_icon_card_2_icon', 0 );
                                $icon_url = $icon_id ? wp_get_attachment_url( $icon_id ) : '';
                                if ( $icon_url ) : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-icon-preview-2">
                                        <img src="<?php echo esc_url( $icon_url ); ?>" alt="Card 2 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-icon-2"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-icon-preview-2" style="display: none;">
                                        <img src="" alt="Card 2 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-icon-2"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_icon_card_2_icon"
                                    name="hypoteek_icon_card_2_icon"
                                    value="<?php echo esc_attr( $icon_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-icon-2"><?php _e( 'Upload Icon', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Choose an icon for the second card', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <!-- Card 3 -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h3><?php _e( 'Card 3 - Friendly Service', 'hypoteek-theme' ); ?></h3>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_icon_card_3_title"><?php _e( 'Card 3 Title', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_icon_card_3_title"
                                name="hypoteek_icon_card_3_title"
                                value="<?php echo esc_attr( get_option( 'hypoteek_icon_card_3_title', 'Sõbralik teenindus' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Title for the third card', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_icon_card_3_icon"><?php _e( 'Card 3 Icon', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-icon-upload">
                                <?php 
                                $icon_id = get_option( 'hypoteek_icon_card_3_icon', 0 );
                                $icon_url = $icon_id ? wp_get_attachment_url( $icon_id ) : '';
                                if ( $icon_url ) : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-icon-preview-3">
                                        <img src="<?php echo esc_url( $icon_url ); ?>" alt="Card 3 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-icon-3"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-icon-preview-3" style="display: none;">
                                        <img src="" alt="Card 3 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-icon-3"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_icon_card_3_icon"
                                    name="hypoteek_icon_card_3_icon"
                                    value="<?php echo esc_attr( $icon_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-icon-3"><?php _e( 'Upload Icon', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Choose an icon for the third card', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <!-- CTA Section Settings -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h2><?php _e( 'CTA Section', 'hypoteek-theme' ); ?></h2>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cta_title"><?php _e( 'CTA Title', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_cta_title"
                                name="hypoteek_cta_title"
                                value="<?php echo esc_attr( get_option( 'hypoteek_cta_title', 'Laen, mis vastab Sinu äri vajadustele' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Main title for CTA section (Extra Bold 50px)', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cta_content"><?php _e( 'CTA Content', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <?php
                            wp_editor(
                                get_option( 'hypoteek_cta_content', 'Hüpoteeklaenu ärilaen on paindlik ja mõeldud just nendeks tegevusteks, mis Sinu äris on vajalikud. Ärilaenu saamise eelduseks on selge idee ja kindel tagasimakseallikas.' ),
                                'hypoteek_cta_content',
                                array(
                                    'textarea_rows' => 4,
                                    'teeny'         => true,
                                    'media_buttons' => false,
                                )
                            );
                            ?>
                            <p class="description"><?php _e( 'Content for CTA section (18px Light)', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cta_button_text"><?php _e( 'CTA Button Text', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_cta_button_text"
                                name="hypoteek_cta_button_text"
                                value="<?php echo esc_attr( get_option( 'hypoteek_cta_button_text', 'Võta meiega ühendust' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Button text for CTA section', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cta_button_link"><?php _e( 'CTA Button Link', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="url"
                                id="hypoteek_cta_button_link"
                                name="hypoteek_cta_button_link"
                                value="<?php echo esc_attr( get_option( 'hypoteek_cta_button_link', '#' ) ); ?>"
                                class="regular-text"
                                placeholder="/kontakt"
                            >
                            <p class="description"><?php _e( 'Button link URL', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <!-- Cards Section Settings -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h2><?php _e( 'Cards Section', 'hypoteek-theme' ); ?></h2>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_section_title"><?php _e( 'Cards Section Title', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_cards_section_title"
                                name="hypoteek_cards_section_title"
                                value="<?php echo esc_attr( get_option( 'hypoteek_cards_section_title', 'Küsi arenduslaenu!' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Main title for cards section (Extra Bold 50px)', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_section_description"><?php _e( 'Cards Section Description', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <?php
                            wp_editor(
                                get_option( 'hypoteek_cards_section_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ),
                                'hypoteek_cards_section_description',
                                array(
                                    'textarea_rows' => 3,
                                    'teeny'         => true,
                                    'media_buttons' => false,
                                )
                            );
                            ?>
                            <p class="description"><?php _e( 'Description for cards section (14px)', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <!-- Card 1 -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h3><?php _e( 'Card 1 - Business Loan', 'hypoteek-theme' ); ?></h3>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_1_title"><?php _e( 'Card 1 Title', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_cards_1_title"
                                name="hypoteek_cards_1_title"
                                value="<?php echo esc_attr( get_option( 'hypoteek_cards_1_title', 'Ärilaen' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Title for card 1', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_1_description"><?php _e( 'Card 1 Description', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <?php
                            wp_editor(
                                get_option( 'hypoteek_cards_1_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ),
                                'hypoteek_cards_1_description',
                                array(
                                    'textarea_rows' => 3,
                                    'teeny'         => true,
                                    'media_buttons' => false,
                                )
                            );
                            ?>
                            <p class="description"><?php _e( 'Description for card 1', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_1_icon"><?php _e( 'Card 1 Icon', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-icon-upload">
                                <?php 
                                $icon_id = get_option( 'hypoteek_cards_1_icon', 0 );
                                $icon_url = $icon_id ? wp_get_attachment_url( $icon_id ) : '';
                                if ( $icon_url ) : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-card-icon-preview-1">
                                        <img src="<?php echo esc_url( $icon_url ); ?>" alt="Card 1 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-card-icon-1"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-card-icon-preview-1" style="display: none;">
                                        <img src="" alt="Card 1 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-card-icon-1"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_cards_1_icon"
                                    name="hypoteek_cards_1_icon"
                                    value="<?php echo esc_attr( $icon_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-card-icon-1"><?php _e( 'Upload Icon', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Choose an icon for card 1', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <!-- Card 2 -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h3><?php _e( 'Card 2 - Real Estate Loan', 'hypoteek-theme' ); ?></h3>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_2_title"><?php _e( 'Card 2 Title', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_cards_2_title"
                                name="hypoteek_cards_2_title"
                                value="<?php echo esc_attr( get_option( 'hypoteek_cards_2_title', 'Laen kinnisvara tagatisel' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Title for card 2', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_2_description"><?php _e( 'Card 2 Description', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <?php
                            wp_editor(
                                get_option( 'hypoteek_cards_2_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ),
                                'hypoteek_cards_2_description',
                                array(
                                    'textarea_rows' => 3,
                                    'teeny'         => true,
                                    'media_buttons' => false,
                                )
                            );
                            ?>
                            <p class="description"><?php _e( 'Description for card 2', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_2_icon"><?php _e( 'Card 2 Icon', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-icon-upload">
                                <?php 
                                $icon_id = get_option( 'hypoteek_cards_2_icon', 0 );
                                $icon_url = $icon_id ? wp_get_attachment_url( $icon_id ) : '';
                                if ( $icon_url ) : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-card-icon-preview-2">
                                        <img src="<?php echo esc_url( $icon_url ); ?>" alt="Card 2 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-card-icon-2"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-card-icon-preview-2" style="display: none;">
                                        <img src="" alt="Card 2 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-card-icon-2"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_cards_2_icon"
                                    name="hypoteek_cards_2_icon"
                                    value="<?php echo esc_attr( $icon_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-card-icon-2"><?php _e( 'Upload Icon', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Choose an icon for card 2', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <!-- Card 3 -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h3><?php _e( 'Card 3 - Growth Loan', 'hypoteek-theme' ); ?></h3>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_3_title"><?php _e( 'Card 3 Title', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_cards_3_title"
                                name="hypoteek_cards_3_title"
                                value="<?php echo esc_attr( get_option( 'hypoteek_cards_3_title', 'Kasvulaen' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Title for card 3', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_3_description"><?php _e( 'Card 3 Description', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <?php
                            wp_editor(
                                get_option( 'hypoteek_cards_3_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ),
                                'hypoteek_cards_3_description',
                                array(
                                    'textarea_rows' => 3,
                                    'teeny'         => true,
                                    'media_buttons' => false,
                                )
                            );
                            ?>
                            <p class="description"><?php _e( 'Description for card 3', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_cards_3_icon"><?php _e( 'Card 3 Icon', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-icon-upload">
                                <?php 
                                $icon_id = get_option( 'hypoteek_cards_3_icon', 0 );
                                $icon_url = $icon_id ? wp_get_attachment_url( $icon_id ) : '';
                                if ( $icon_url ) : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-card-icon-preview-3">
                                        <img src="<?php echo esc_url( $icon_url ); ?>" alt="Card 3 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-card-icon-3"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-card-icon-preview-3" style="display: none;">
                                        <img src="" alt="Card 3 icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-card-icon-3"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_cards_3_icon"
                                    name="hypoteek_cards_3_icon"
                                    value="<?php echo esc_attr( $icon_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-card-icon-3"><?php _e( 'Upload Icon', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Choose an icon for card 3', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <!-- Featured Section Settings -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h2><?php _e( 'Featured Section', 'hypoteek-theme' ); ?></h2>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_featured_section_title"><?php _e( 'Featured Section Title', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_featured_section_title"
                                name="hypoteek_featured_section_title"
                                value="<?php echo esc_attr( get_option( 'hypoteek_featured_section_title', 'Küsi personaalset pakkumist' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Title for the featured section (Extra Bold 50px)', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_featured_section_description"><?php _e( 'Featured Section Description', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <?php
                            wp_editor(
                                get_option( 'hypoteek_featured_section_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ),
                                'hypoteek_featured_section_description',
                                array(
                                    'textarea_rows' => 3,
                                    'teeny'         => true,
                                    'media_buttons' => false,
                                )
                            );
                            ?>
                            <p class="description"><?php _e( 'Description for the featured section (14px)', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_featured_section_image"><?php _e( 'Featured Section Image', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-image-upload">
                                <?php 
                                $featured_image_id = get_option( 'hypoteek_featured_section_image', 0 );
                                $featured_image_url = $featured_image_id ? wp_get_attachment_url( $featured_image_id ) : '';
                                if ( $featured_image_url ) : ?>
                                    <div class="hypoteek-image-preview" id="hypoteek-featured-image-preview">
                                        <img src="<?php echo esc_url( $featured_image_url ); ?>" alt="Featured section image preview" style="max-width: 300px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-featured-image"><?php _e( 'Remove Image', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-image-preview" id="hypoteek-featured-image-preview" style="display: none;">
                                        <img src="" alt="Featured section image preview" style="max-width: 300px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-featured-image"><?php _e( 'Remove Image', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_featured_section_image"
                                    name="hypoteek_featured_section_image"
                                    value="<?php echo esc_attr( $featured_image_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-featured-image"><?php _e( 'Upload Image', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Upload an image to display in the featured section', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_featured_section_svg_mask"><?php _e( 'Featured Section SVG Mask', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-svg-mask-upload">
                                <input
                                    type="url"
                                    id="hypoteek_featured_section_svg_mask"
                                    name="hypoteek_featured_section_svg_mask"
                                    value="<?php echo esc_attr( get_option( 'hypoteek_featured_section_svg_mask', '' ) ); ?>"
                                    class="regular-text"
                                    placeholder="https://example.com/mask.svg"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-featured-svg-mask"><?php _e( 'Upload SVG Mask', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Upload an SVG file to use as a mask for the featured image. The SVG should contain a &lt;mask&gt; element.', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_featured_section_button_text"><?php _e( 'Featured Section Button Text', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="hypoteek_featured_section_button_text"
                                name="hypoteek_featured_section_button_text"
                                value="<?php echo esc_attr( get_option( 'hypoteek_featured_section_button_text', 'Taotlе siin' ) ); ?>"
                                class="regular-text"
                            >
                            <p class="description"><?php _e( 'Button text for the featured section', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_featured_section_button_link"><?php _e( 'Featured Section Button Link', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <input
                                type="url"
                                id="hypoteek_featured_section_button_link"
                                name="hypoteek_featured_section_button_link"
                                value="<?php echo esc_attr( get_option( 'hypoteek_featured_section_button_link', '' ) ); ?>"
                                class="regular-text"
                                placeholder="/taotlus"
                            >
                            <p class="description"><?php _e( 'Button link URL for the featured section', 'hypoteek-theme' ); ?></p>
                        </td>
                    </tr>

                    <!-- Footer Social Icons -->
                    <tr>
                        <th scope="row" colspan="2">
                            <h2><?php _e( 'Footer Social Icons', 'hypoteek-theme' ); ?></h2>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_footer_facebook_icon"><?php _e( 'Facebook Icon', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-icon-upload">
                                <?php 
                                $facebook_icon_id = get_option( 'hypoteek_footer_facebook_icon', 0 );
                                $facebook_icon_url = $facebook_icon_id ? wp_get_attachment_url( $facebook_icon_id ) : '';
                                if ( $facebook_icon_url ) : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-footer-facebook-icon-preview">
                                        <img src="<?php echo esc_url( $facebook_icon_url ); ?>" alt="Facebook icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-footer-facebook-icon"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-footer-facebook-icon-preview" style="display: none;">
                                        <img src="" alt="Facebook icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-footer-facebook-icon"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_footer_facebook_icon"
                                    name="hypoteek_footer_facebook_icon"
                                    value="<?php echo esc_attr( $facebook_icon_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-footer-facebook-icon"><?php _e( 'Upload Icon', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Choose an icon for the Facebook link', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_footer_instagram_icon"><?php _e( 'Instagram Icon', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-icon-upload">
                                <?php 
                                $instagram_icon_id = get_option( 'hypoteek_footer_instagram_icon', 0 );
                                $instagram_icon_url = $instagram_icon_id ? wp_get_attachment_url( $instagram_icon_id ) : '';
                                if ( $instagram_icon_url ) : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-footer-instagram-icon-preview">
                                        <img src="<?php echo esc_url( $instagram_icon_url ); ?>" alt="Instagram icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-footer-instagram-icon"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-footer-instagram-icon-preview" style="display: none;">
                                        <img src="" alt="Instagram icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-footer-instagram-icon"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_footer_instagram_icon"
                                    name="hypoteek_footer_instagram_icon"
                                    value="<?php echo esc_attr( $instagram_icon_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-footer-instagram-icon"><?php _e( 'Upload Icon', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Choose an icon for the Instagram link', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="hypoteek_footer_whatsapp_icon"><?php _e( 'WhatsApp Icon', 'hypoteek-theme' ); ?></label>
                        </th>
                        <td>
                            <div class="hypoteek-icon-upload">
                                <?php 
                                $whatsapp_icon_id = get_option( 'hypoteek_footer_whatsapp_icon', 0 );
                                $whatsapp_icon_url = $whatsapp_icon_id ? wp_get_attachment_url( $whatsapp_icon_id ) : '';
                                if ( $whatsapp_icon_url ) : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-footer-whatsapp-icon-preview">
                                        <img src="<?php echo esc_url( $whatsapp_icon_url ); ?>" alt="WhatsApp icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-footer-whatsapp-icon"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php else : ?>
                                    <div class="hypoteek-icon-preview" id="hypoteek-footer-whatsapp-icon-preview" style="display: none;">
                                        <img src="" alt="WhatsApp icon preview" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                                        <br>
                                        <button type="button" class="button button-secondary" id="hypoteek-remove-footer-whatsapp-icon"><?php _e( 'Remove Icon', 'hypoteek-theme' ); ?></button>
                                    </div>
                                <?php endif; ?>
                                <input
                                    type="hidden"
                                    id="hypoteek_footer_whatsapp_icon"
                                    name="hypoteek_footer_whatsapp_icon"
                                    value="<?php echo esc_attr( $whatsapp_icon_id ); ?>"
                                >
                                <button type="button" class="button button-primary" id="hypoteek-upload-footer-whatsapp-icon"><?php _e( 'Upload Icon', 'hypoteek-theme' ); ?></button>
                                <p class="description"><?php _e( 'Choose an icon for the WhatsApp link', 'hypoteek-theme' ); ?></p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>

    <style>
        .hypoteek-hero-form .form-table h2 {
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 1.3em;
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 10px;
        }

        .hypoteek-image-upload {
            margin-bottom: 20px;
        }

        .hypoteek-image-preview {
            margin-bottom: 15px;
        }
    </style>

    <script>
        jQuery(function($) {
            // Media uploader for hero image
            var mediaUploader;

            $('#hypoteek-upload-image').on('click', function(e) {
                e.preventDefault();

                // If the uploader object has already been created, reopen the dialog
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                // Extend the wp.media object
                mediaUploader = wp.media({
                    title: '<?php _e( 'Select Hero Image', 'hypoteek-theme' ); ?>',
                    button: {
                        text: '<?php _e( 'Choose Image', 'hypoteek-theme' ); ?>',
                    },
                    multiple: false,
                });

                // When an image is selected, run a callback.
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#hypoteek_hero_image').val(attachment.id);
                    $('#hypoteek-image-preview img').attr('src', attachment.url);
                    $('#hypoteek-image-preview').show();
                });

                // Open the uploader dialog
                mediaUploader.open();
            });

            // Remove hero image
            $(document).on('click', '#hypoteek-remove-image', function(e) {
                e.preventDefault();
                $('#hypoteek_hero_image').val(0);
                $('#hypoteek-image-preview').hide();
                $('#hypoteek-image-preview img').attr('src', '');
            });

            // Media uploader for SVG mask
            var svgUploader;

            $('#hypoteek-upload-svg-mask').on('click', function(e) {
                e.preventDefault();

                if (svgUploader) {
                    svgUploader.open();
                    return;
                }

                svgUploader = wp.media({
                    title: '<?php _e( 'Select SVG Mask', 'hypoteek-theme' ); ?>',
                    button: {
                        text: '<?php _e( 'Choose SVG', 'hypoteek-theme' ); ?>',
                    },
                    library: {
                        type: 'application/atom+xml,image/svg+xml',
                    },
                    multiple: false,
                });

                svgUploader.on('select', function() {
                    var attachment = svgUploader.state().get('selection').first().toJSON();
                    // Only accept .svg files
                    if (attachment.filename && attachment.filename.endsWith('.svg')) {
                        $('#hypoteek_hero_svg_mask').val(attachment.url);
                    } else {
                        alert('<?php _e( 'Please select a valid SVG file', 'hypoteek-theme' ); ?>');
                    }
                });

                svgUploader.open();
            });

            // Media uploaders for icon cards
            function createIconUploader(cardNumber) {
                var iconUploader;
                var uploadButton = '#hypoteek-upload-icon-' + cardNumber;
                var removeButton = '#hypoteek-remove-icon-' + cardNumber;
                var previewDiv = '#hypoteek-icon-preview-' + cardNumber;
                var hiddenInput = '#hypoteek_icon_card_' + cardNumber + '_icon';

                $(uploadButton).on('click', function(e) {
                    e.preventDefault();

                    if (iconUploader) {
                        iconUploader.open();
                        return;
                    }

                    iconUploader = wp.media({
                        title: '<?php _e( 'Select Icon', 'hypoteek-theme' ); ?>',
                        button: {
                            text: '<?php _e( 'Choose Icon', 'hypoteek-theme' ); ?>',
                        },
                        multiple: false,
                    });

                    iconUploader.on('select', function() {
                        var attachment = iconUploader.state().get('selection').first().toJSON();
                        $(hiddenInput).val(attachment.id);
                        $(previewDiv + ' img').attr('src', attachment.url);
                        $(previewDiv).show();
                    });

                    iconUploader.open();
                });

                $(document).on('click', removeButton, function(e) {
                    e.preventDefault();
                    $(hiddenInput).val(0);
                    $(previewDiv).hide();
                    $(previewDiv + ' img').attr('src', '');
                });
            }

            // Initialize uploaders for all 3 icon cards
            createIconUploader(1);
            createIconUploader(2);
            createIconUploader(3);

            // Media uploaders for cards section icons
            function createCardIconUploader(cardNumber) {
                var cardIconUploader;
                var uploadButton = '#hypoteek-upload-card-icon-' + cardNumber;
                var removeButton = '#hypoteek-remove-card-icon-' + cardNumber;
                var previewDiv = '#hypoteek-card-icon-preview-' + cardNumber;
                var hiddenInput = '#hypoteek_cards_' + cardNumber + '_icon';

                $(uploadButton).on('click', function(e) {
                    e.preventDefault();

                    if (cardIconUploader) {
                        cardIconUploader.open();
                        return;
                    }

                    cardIconUploader = wp.media({
                        title: '<?php _e( 'Select Icon', 'hypoteek-theme' ); ?>',
                        button: {
                            text: '<?php _e( 'Choose Icon', 'hypoteek-theme' ); ?>',
                        },
                        multiple: false,
                    });

                    cardIconUploader.on('select', function() {
                        var attachment = cardIconUploader.state().get('selection').first().toJSON();
                        $(hiddenInput).val(attachment.id);
                        $(previewDiv + ' img').attr('src', attachment.url);
                        $(previewDiv).show();
                    });

                    cardIconUploader.open();
                });

                $(document).on('click', removeButton, function(e) {
                    e.preventDefault();
                    $(hiddenInput).val(0);
                    $(previewDiv).hide();
                    $(previewDiv + ' img').attr('src', '');
                });
            }

            // Initialize uploaders for all 3 cards section icons
            createCardIconUploader(1);
            createCardIconUploader(2);
            createCardIconUploader(3);

            // Media uploader for featured section image
            var featuredImageUploader;

            $('#hypoteek-upload-featured-image').on('click', function(e) {
                e.preventDefault();

                if (featuredImageUploader) {
                    featuredImageUploader.open();
                    return;
                }

                featuredImageUploader = wp.media({
                    title: '<?php _e( 'Select Featured Image', 'hypoteek-theme' ); ?>',
                    button: {
                        text: '<?php _e( 'Choose Image', 'hypoteek-theme' ); ?>',
                    },
                    multiple: false,
                });

                featuredImageUploader.on('select', function() {
                    var attachment = featuredImageUploader.state().get('selection').first().toJSON();
                    $('#hypoteek_featured_section_image').val(attachment.id);
                    $('#hypoteek-featured-image-preview img').attr('src', attachment.url);
                    $('#hypoteek-featured-image-preview').show();
                });

                featuredImageUploader.open();
            });

            // Remove featured section image
            $(document).on('click', '#hypoteek-remove-featured-image', function(e) {
                e.preventDefault();
                $('#hypoteek_featured_section_image').val(0);
                $('#hypoteek-featured-image-preview').hide();
                $('#hypoteek-featured-image-preview img').attr('src', '');
            });

            // Media uploader for featured section SVG mask
            var featuredSvgMaskUploader;

            $('#hypoteek-upload-featured-svg-mask').on('click', function(e) {
                e.preventDefault();

                if (featuredSvgMaskUploader) {
                    featuredSvgMaskUploader.open();
                    return;
                }

                featuredSvgMaskUploader = wp.media({
                    title: '<?php _e( 'Select Featured SVG Mask', 'hypoteek-theme' ); ?>',
                    button: {
                        text: '<?php _e( 'Choose SVG', 'hypoteek-theme' ); ?>',
                    },
                    library: {
                        type: 'application/atom+xml,image/svg+xml',
                    },
                    multiple: false,
                });

                featuredSvgMaskUploader.on('select', function() {
                    var attachment = featuredSvgMaskUploader.state().get('selection').first().toJSON();
                    // Only accept .svg files
                    if (attachment.filename && attachment.filename.endsWith('.svg')) {
                        $('#hypoteek_featured_section_svg_mask').val(attachment.url);
                    } else {
                        alert('<?php _e( 'Please select a valid SVG file', 'hypoteek-theme' ); ?>');
                    }
                });

                featuredSvgMaskUploader.open();
            });

            // Media uploaders for footer social icons
            function createFooterIconUploader(iconName) {
                var iconUploader;
                var uploadButton = '#hypoteek-upload-footer-' + iconName + '-icon';
                var removeButton = '#hypoteek-remove-footer-' + iconName + '-icon';
                var previewDiv = '#hypoteek-footer-' + iconName + '-icon-preview';
                var hiddenInput = '#hypoteek_footer_' + iconName + '_icon';

                $(uploadButton).on('click', function(e) {
                    e.preventDefault();

                    if (iconUploader) {
                        iconUploader.open();
                        return;
                    }

                    iconUploader = wp.media({
                        title: '<?php _e( 'Select ' + iconName + ' Icon', 'hypoteek-theme' ); ?>',
                        button: {
                            text: '<?php _e( 'Choose Icon', 'hypoteek-theme' ); ?>',
                        },
                        multiple: false,
                    });

                    iconUploader.on('select', function() {
                        var attachment = iconUploader.state().get('selection').first().toJSON();
                        $(hiddenInput).val(attachment.id);
                        $(previewDiv + ' img').attr('src', attachment.url);
                        $(previewDiv).show();
                    });

                    iconUploader.open();
                });

                $(document).on('click', removeButton, function(e) {
                    e.preventDefault();
                    $(hiddenInput).val(0);
                    $(previewDiv).hide();
                    $(previewDiv + ' img').attr('src', '');
                });
            }

            // Initialize uploaders for all footer social icons
            createFooterIconUploader('facebook');
            createFooterIconUploader('instagram');
            createFooterIconUploader('whatsapp');
        });
    </script>
    <?php
}

/**
 * Get hero section data
 */
function get_hero_data() {
    return array(
        'title_main'    => get_option( 'hypoteek_hero_title_main', 'Arendad ja ehitad?' ),
        'title_bold'    => get_option( 'hypoteek_hero_title_bold', 'Küsi arenduslaenu!' ),
        'subtitle'      => get_option( 'hypoteek_hero_subtitle', 'Your trusted partner for financial solutions' ),
        'image_id'      => get_option( 'hypoteek_hero_image', 0 ),
        'image_url'     => wp_get_attachment_url( get_option( 'hypoteek_hero_image', 0 ) ),
        'svg_mask_url'  => get_option( 'hypoteek_hero_svg_mask', '' ),
        'button_1_text' => get_option( 'hypoteek_button_1_text', '' ),
        'button_1_link' => get_option( 'hypoteek_button_1_link', '' ),
        'button_2_text' => get_option( 'hypoteek_button_2_text', '' ),
        'button_2_link' => get_option( 'hypoteek_button_2_link', '' ),
        // Icon cards
        'icon_card_1_title'       => get_option( 'hypoteek_icon_card_1_title', 'Personaalne lähenemine' ),
        'icon_card_1_icon'        => get_option( 'hypoteek_icon_card_1_icon', 0 ), // Changed to icon ID
        'icon_card_2_title'       => get_option( 'hypoteek_icon_card_2_title', 'Paindlikud laenutusingimused' ),
        'icon_card_2_icon'        => get_option( 'hypoteek_icon_card_2_icon', 0 ), // Changed to icon ID
        'icon_card_3_title'       => get_option( 'hypoteek_icon_card_3_title', 'Sõbralik teenindus' ),
        'icon_card_3_icon'        => get_option( 'hypoteek_icon_card_3_icon', 0 ), // Changed to icon ID
        // CTA section
        'cta_title'       => get_option( 'hypoteek_cta_title', 'Laen, mis vastab Sinu äri vajadustele' ),
        'cta_content'     => get_option( 'hypoteek_cta_content', 'Hüpoteeklaenu ärilaen on paindlik ja mõeldud just nendeks tegevusteks, mis Sinu äris on vajalikud. Ärilaenu saamise eelduseks on selge idee ja kindel tagasimakseallikas.' ),
        'cta_button_text' => get_option( 'hypoteek_cta_button_text', 'Võta meiega ühendust' ),
        'cta_button_link' => get_option( 'hypoteek_cta_button_link', '#' ),
        // Cards section
        'cards' => array(
            array(
                'title'       => get_option( 'hypoteek_cards_1_title', 'Ärilaen' ),
                'description' => get_option( 'hypoteek_cards_1_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ),
                'icon_id'     => get_option( 'hypoteek_cards_1_icon', 0 ),
            ),
            array(
                'title'       => get_option( 'hypoteek_cards_2_title', 'Laen kinnisvara tagatisel' ),
                'description' => get_option( 'hypoteek_cards_2_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ),
                'icon_id'     => get_option( 'hypoteek_cards_2_icon', 0 ),
            ),
            array(
                'title'       => get_option( 'hypoteek_cards_3_title', 'Kasvulaen' ),
                'description' => get_option( 'hypoteek_cards_3_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ),
                'icon_id'     => get_option( 'hypoteek_cards_3_icon', 0 ),
            ),
        ),
        // Featured section
        'featured_section_title' => get_option( 'hypoteek_featured_section_title', 'Küsi personaalset pakkumist' ),
        'featured_section_description' => get_option( 'hypoteek_featured_section_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ),
        'featured_section_image_id' => get_option( 'hypoteek_featured_section_image', 0 ),
        'featured_section_image_url' => wp_get_attachment_url( get_option( 'hypoteek_featured_section_image', 0 ) ),
        'featured_section_svg_mask_url' => get_option( 'hypoteek_featured_section_svg_mask', '' ),
        'featured_section_button_text' => get_option( 'hypoteek_featured_section_button_text', 'Taotlе siin' ),
        'featured_section_button_link' => get_option( 'hypoteek_featured_section_button_link', '' ),
        // Footer social icons
        'footer_facebook_icon_id' => get_option( 'hypoteek_footer_facebook_icon', 0 ),
        'footer_instagram_icon_id' => get_option( 'hypoteek_footer_instagram_icon', 0 ),
        'footer_whatsapp_icon_id' => get_option( 'hypoteek_footer_whatsapp_icon', 0 ),
    );
}
