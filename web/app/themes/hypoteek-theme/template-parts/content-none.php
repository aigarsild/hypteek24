<?php
/**
 * Content None Template Part
 *
 * @package hypoteek-theme
 */

?>

<section class="no-results py-12">
    <header class="page-header">
        <h1 class="page-title text-3xl font-bold mb-4">
            <?php _e( 'Nothing here', 'hypoteek-theme' ); ?>
        </h1>
    </header>

    <div class="page-content">
        <p><?php _e( 'Sorry, we couldn\'t find anything at this location.', 'hypoteek-theme' ); ?></p>
        <?php get_search_form(); ?>
    </div>
</section>
