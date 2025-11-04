<?php
/**
 * Icon Cards Section Partial
 * Displays three feature cards with icons
 *
 * @package hypoteek-theme
 */

// Get hero data including icon cards
$hero_data = get_hero_data();

// Extract icon cards data
$cards = array(
    array(
        'title'   => $hero_data['icon_card_1_title'],
        'icon_id' => $hero_data['icon_card_1_icon'],
    ),
    array(
        'title'   => $hero_data['icon_card_2_title'],
        'icon_id' => $hero_data['icon_card_2_icon'],
    ),
    array(
        'title'   => $hero_data['icon_card_3_title'],
        'icon_id' => $hero_data['icon_card_3_icon'],
    ),
);
?>

<section class="icon-cards-section bg-white">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 md:gap-0">
            <?php foreach ( $cards as $index => $card ) : ?>
                <div class="icon-card text-center <?php echo ( $index < count( $cards ) - 1 ) ? 'md:border-r' : ''; ?>" style="<?php echo ( $index < count( $cards ) - 1 ) ? 'border-right-color: #E0D8FF;' : ''; ?>">
                    <!-- Icon -->
                    <div class="icon-card-icon mb-6 flex justify-center">
                        <?php 
                        if ( $card['icon_id'] ) {
                            $icon_url = wp_get_attachment_url( $card['icon_id'] );
                            if ( $icon_url ) {
                                ?>
                                <img 
                                    src="<?php echo esc_url( $icon_url ); ?>" 
                                    alt="<?php echo esc_attr( $card['title'] ); ?>"
                                    class="h-7"
                                    style="width: auto;"
                                >
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <!-- Title -->
                    <h3 class="icon-card-title text-brand-primary">
                        <?php echo esc_html( $card['title'] ); ?>
                    </h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
