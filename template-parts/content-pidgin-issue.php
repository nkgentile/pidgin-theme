<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pidgin
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'row' ) ); ?>>

    <section class="col-sm-12">
        <?php pidgin_theme_post_thumbnail(); ?>
    </section>

    <section class="col-sm-12">
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <?php $publication_date = get_post_meta( get_the_ID(), 'pidgin_issue_date', true ); ?>
            <?php if($publication_date): ?>
            <dl>
                <?php if($publication_date): ?>
                <dt>
                  <?= $publication_date ?>
                </dt>
                <?php endif; ?>
            </dl>
            <?php endif; ?>
        </header><!-- .entry-header -->

        <main class="entry-content">
            <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pidgin-theme' ),
                'after'  => '</div>',
            ) );
            ?>
        </main><!-- .entry-content -->

        <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Edit <span class="screen-reader-text">%s</span>', 'pidgin-theme' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
        <?php endif; ?>
    </section>

</article><!-- #post-<?php the_ID(); ?> -->
