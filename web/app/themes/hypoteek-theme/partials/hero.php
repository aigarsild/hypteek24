<?php
/**
 * Hero Section Partial
 *
 * @package hypoteek-theme
 */

// Get hero data from settings
$hero_data = get_hero_data();

// Extract variables for easier use
$title_main    = $hero_data['title_main'];
$title_bold    = $hero_data['title_bold'];
$subtitle      = $hero_data['subtitle'];
$image_url     = $hero_data['image_url'];
$svg_mask_url  = $hero_data['svg_mask_url'];
$button_1_text = $hero_data['button_1_text'];
$button_1_link = $hero_data['button_1_link'];
$button_2_text = $hero_data['button_2_text'];
$button_2_link = $hero_data['button_2_link'];

?>

<!-- Hero Section -->
<section id="hero" class="hero-section w-full relative flex items-center justify-center overflow-hidden" style="height: 90vh;">
    <!-- Gradient Background -->
    <div class="hero-gradient absolute inset-0 z-0"></div>
    
    <!-- Hero Content Wrapper - Two Column Layout -->
    <div class="hero-content-wrapper relative z-10 w-full h-full flex flex-col items-center">
        <?php if ( $image_url ) : ?>
            <!-- Mobile Hero Image (full-bleed, outside container) -->
            <div class="hero-image md:hidden flex items-center h-full relative overflow-hidden w-full">
                <img 
                    src="<?php echo esc_url( $image_url ); ?>" 
                    alt="<?php echo esc_attr( $title_main ); ?>" 
                    class="w-full h-full object-cover shadow-2xl hero-mask-image"
                    <?php if ( ! empty( $svg_mask_url ) ) : ?>
                        style="--hero-mask: url('<?php echo esc_attr( $svg_mask_url ); ?>');"
                    <?php endif; ?>
                >
            </div>
        <?php endif; ?>

        <div class="container mx-auto px-4 sm:px-6 md:px-8 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-stretch h-full">
                <!-- Left Column - Text Content -->
                <div class="hero-content flex flex-col justify-center">
                    <!-- Two-Line Title -->
                    <div class="hero-title-wrapper mb-6">
                        <!-- Main Title (Thin) -->
                        <div class="hero-title-main text-white font-light mb-2">
                            <?php echo wp_kses_post( $title_main ); ?>
                        </div>
                        <!-- Bold Title -->
                        <div class="hero-title-bold text-white font-bold">
                            <?php echo wp_kses_post( $title_bold ); ?>
                        </div>
                    </div>

                    <!-- Subtitle -->
                    <div class="hero-subtitle text-white text-xl mb-8">
                        <?php echo wp_kses_post( $subtitle ); ?>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="hero-cta flex gap-4 flex-wrap">
                        <?php if ( ! empty( $button_1_text ) && ! empty( $button_1_link ) ) : ?>
                            <a href="<?php echo esc_url( $button_1_link ); ?>" class="btn btn-secondary">
                                <?php echo esc_html( $button_1_text ); ?>
                            </a>
                        <?php endif; ?>

                        <?php if ( ! empty( $button_2_text ) && ! empty( $button_2_link ) ) : ?>
                            <a href="<?php echo esc_url( $button_2_link ); ?>" class="btn btn-outline">
                                <?php echo esc_html( $button_2_text ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right Column - Hero Image -->
                <?php if ( $image_url ) : ?>
                    <!-- Desktop Hero Image (inside grid) -->
                    <div class="hero-image hidden md:flex items-center h-full relative overflow-hidden">
                        <img 
                            src="<?php echo esc_url( $image_url ); ?>" 
                            alt="<?php echo esc_attr( $title_main ); ?>" 
                            class="w-full h-full object-cover shadow-2xl hero-mask-image"
                            <?php if ( ! empty( $svg_mask_url ) ) : ?>
                                style="--hero-mask: url('<?php echo esc_attr( $svg_mask_url ); ?>');"
                            <?php endif; ?>
                        >
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
