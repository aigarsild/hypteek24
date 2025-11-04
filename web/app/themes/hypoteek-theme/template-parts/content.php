<?php
/**
 * Content Template Part
 *
 * @package hypoteek-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-8' ); ?>>
    <header class="entry-header mb-4">
        <?php the_title( '<h2 class="entry-title text-2xl font-bold"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <div class="entry-meta text-gray-600 text-sm">
            <?php
            printf(
                __( 'Posted on %s by %s', 'hypoteek-theme' ),
                '<time datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>',
                '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
            );
            ?>
        </div>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="entry-thumbnail mb-4">
            <?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-auto' ) ); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        the_excerpt();
        printf(
            '<a href="%1$s" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">%2$s</a>',
            esc_url( get_permalink() ),
            __( 'Read More', 'hypoteek-theme' )
        );
        ?>
    </div>

    <footer class="entry-footer mt-4 pt-4 border-t border-gray-200 text-sm text-gray-600">
        <?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            echo '<span class="entry-categories">' . __( 'Categories: ', 'hypoteek-theme' );
            echo implode( ', ', array_map( function( $cat ) {
                return '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>';
            }, $categories ) ) . '</span>';
        }
        ?>
    </footer>
</article>
