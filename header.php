<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pidgin
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'my-5' ); ?>>
<div id="page" class="site container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pidgin-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding row justify-content-center text-center">
			<h1 class="site-title col-12">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php if( has_custom_logo() ):
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$custom_logo_dimensions = 75;
						$custom_logo_src = wp_get_attachment_image_src( $custom_logo_id, [$custom_logo_dimensions, $custom_logo_dimensions], true )[0];
				?>
					<img src="<?php echo $custom_logo_src; ?>" width="<?php echo $custom_logo_dimensions; ?>" height="<?php echo $custom_logo_dimensions; ?>"/>
				<?php else: ?>
					<?php the_custom_logo(); ?>
				<?php endif; ?>
					<p class="site-description col-12"><?php echo get_bloginfo('name'); ?></p>
				</a>
			</h1>
				<?php
			$pidgin_theme_description = get_bloginfo( 'description', 'display' );
			if ( $pidgin_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $pidgin_theme_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'menu-1',
				'depth'	          => 1, // 1 = no dropdowns, 2 = with dropdowns.
				'container' 	  => false,
				'menu_class'      => 'nav justify-content-center',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
