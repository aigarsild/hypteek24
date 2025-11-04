<?php
/**
 * Main Template
 *
 * @package hypoteek-theme
 */

get_header();
?>

<!-- Hero Section -->
<?php get_template_part( 'partials/hero' ); ?>

<!-- Icon Cards Section -->
<?php get_template_part( 'partials/icon-cards' ); ?>

<!-- CTA Section -->
<?php get_template_part( 'partials/cta-section' ); ?>

<!-- Cards Section -->
<?php get_template_part( 'partials/cards-section' ); ?>

<!-- Featured Section -->
<?php get_template_part( 'partials/featured-section' ); ?>

<?php get_footer(); ?>
