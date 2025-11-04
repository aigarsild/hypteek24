<?php
/**
 * Cards Section Partial
 * Displays service/product cards with icons, titles, and descriptions
 *
 * @package hypoteek-theme
 */

// Get hero data including cards section
$hero_data = get_hero_data();
$cards = $hero_data['cards'];
?>

<section class="cards-section">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <!-- Section Title and Description -->
        <div class="cards-section-header mb-12 text-white text-center">
            <h2 class="cards-section-title">
                <?php echo esc_html( get_option( 'hypoteek_cards_section_title', 'Küsi arenduslaenu!' ) ); ?>
            </h2>
            <p class="cards-section-description">
                <?php echo wp_kses_post( get_option( 'hypoteek_cards_section_description', 'Kui pank viivitab, siis meiega liigud edasi kirelt ja mugavalt' ) ); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
            <?php foreach ( $cards as $card ) : ?>
                <div class="card bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                    <!-- Icon -->
                    <?php if ( ! empty( $card['icon_id'] ) ) : ?>
                        <div class="card-icon mb-6">
                            <?php
                            $icon_url = wp_get_attachment_url( $card['icon_id'] );
                            if ( $icon_url ) {
                                echo '<img src="' . esc_url( $icon_url ) . '" alt="' . esc_attr( $card['title'] ) . '" class="h-16 w-auto mx-auto">';
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <!-- Title -->
                    <h3 class="card-title text-brand-primary mb-4">
                        <?php echo esc_html( $card['title'] ); ?>
                    </h3>

                    <!-- Description -->
                    <div class="card-description text-gray-600 mb-6">
                        <?php echo wp_kses_post( $card['description'] ); ?>
                    </div>

                    <!-- Button -->
                    <a href="#" class="card-button inline-block bg-brand-secondary text-white px-6 py-2 rounded-full hover:opacity-90 transition-opacity">
                        <?php _e( 'Loe edasi', 'hypoteek-theme' ); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
