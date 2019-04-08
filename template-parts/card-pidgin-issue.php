<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pidgin
 */

?>

<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class( array( 'col-sm-12', 'col-md-6', 'col-lg-4', 'text-center', get_post_type().'-card', 'text-reset', 'text-decoration-none', 'mb-5' ) ); ?>>

	<?php pidgin_theme_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title( '<p class="entry-title">', '</p>' ); ?>
	</header><!-- .entry-header -->

</a><!-- #post-<?php the_ID(); ?> -->
