<?php
/**
 * CTA Section Partial
 * Displays a call-to-action section with background image
 *
 * @package hypoteek-theme
 */

// Get hero data including CTA section
$hero_data = get_hero_data();

$cta_title       = $hero_data['cta_title'];
$cta_content     = $hero_data['cta_content'];
$cta_button_text = $hero_data['cta_button_text'];
$cta_button_link = $hero_data['cta_button_link'];

$background_url = get_template_directory_uri() . '/assets/images/backkgr.svg';
?>

<section class="cta-section" style="background-image: url('<?php echo esc_url( $background_url ); ?>');">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <div class="cta-content">
            <!-- Title -->
            <h2 class="cta-title">
                <?php echo esc_html( $cta_title ); ?>
            </h2>

            <!-- Content -->
            <div class="cta-text">
                <?php echo wp_kses_post( $cta_content ); ?>
            </div>

            <!-- Button -->
            <?php if ( ! empty( $cta_button_text ) && ! empty( $cta_button_link ) ) : ?>
                <a href="<?php echo esc_url( $cta_button_link ); ?>" class="cta-button">
                    <?php echo esc_html( $cta_button_text ); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>


