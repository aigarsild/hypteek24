<?php
/**
 * Featured Section Partial
 * Displays a featured section with image, title, description, and button
 *
 * @package hypoteek-theme
 */

// Get hero data including featured section
$hero_data = get_hero_data();
?>

<section class="featured-section">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <!-- Image (Absolute Positioned) -->
        <div class="featured-image-container">
            <?php if ( $hero_data['featured_section_image_id'] ) : ?>
                <img 
                    src="<?php echo esc_url( $hero_data['featured_section_image_url'] ); ?>" 
                    alt="<?php echo esc_attr( $hero_data['featured_section_title'] ); ?>"
                    class="featured-section-image"
                    <?php if ( $hero_data['featured_section_svg_mask_url'] ) : ?>
                        style="
                            -webkit-mask-image: url('<?php echo esc_url( $hero_data['featured_section_svg_mask_url'] ); ?>');
                            mask-image: url('<?php echo esc_url( $hero_data['featured_section_svg_mask_url'] ); ?>');
                            -webkit-mask-repeat: no-repeat;
                            mask-repeat: no-repeat;
                            -webkit-mask-position: center;
                            mask-position: center;
                            -webkit-mask-size: contain;
                            mask-size: contain;
                        "
                    <?php endif; ?>
                >
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Image Column -->
            <div class="featured-image-column"></div>

            <!-- Content Column -->
            <div class="featured-content">
                <!-- Title -->
                <h2 class="featured-section-title text-brand-primary">
                    <?php echo esc_html( $hero_data['featured_section_title'] ); ?>
                </h2>

                <!-- Description -->
                <div class="featured-section-description text-gray-600 mb-8">
                    <?php echo wp_kses_post( $hero_data['featured_section_description'] ); ?>
                </div>

                <!-- Button -->
                <?php if ( $hero_data['featured_section_button_text'] && $hero_data['featured_section_button_link'] ) : ?>
                    <a href="<?php echo esc_url( $hero_data['featured_section_button_link'] ); ?>" class="featured-section-button">
                        <?php echo esc_html( $hero_data['featured_section_button_text'] ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
