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

    <section class="col-md-12 col-lg-6">
        <?php pidgin_theme_post_thumbnail(); ?>
    </section>

    <section class="col-md-12 col-lg-6">
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <?php var_dump( get_post_custom(get_the_ID()) ); ?>
            <dl>
                <?php $date = get_post_meta( get_the_ID(), 'pidgin_issue_date', true ); ?>
                <dt>
                  <?= $date ?>
                </dt>
                <?php $editors = get_post_meta( get_the_ID(), 'editor' ); ?>
                <?php if ( $editors ): ?>
                <dt>Editor<?= ( count( $editors ) > 1 ? 's' : '' ) ?></dt>
                <dd>
                    <ul class="list-unstyled">
                        <?php foreach ( $editors as $editor ): ?>
                        <li><?= $editor ?></li>
                        <?php endforeach; ?>
                    </ul>
                </dd>
                <?php endif; ?>

                <?php $pieces = get_post_meta( get_the_ID(), 'piece' ); ?>
                <?php if ( $pieces ): ?>
                <dt>Table of Contents</dt>
                <dd>
                    <ul class="list-unstyled">
                        <?php foreach ( $pieces as $piece ): ?>
                        <li><?= $piece ?></li>
                        <?php endforeach; ?>
                    </ul>
                </dd>
                <?php endif; ?>
            </dl>
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
    </section>

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
</article><!-- #post-<?php the_ID(); ?> -->
