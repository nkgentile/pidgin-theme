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
				<a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home">
          <svg class="site-logo" width="250" height="75" style="enable-background:new 0 0 525.4 93.1"version=1.1 viewBox="0 0 525.4 93.1"x=0px xml:space=preserve xmlns=http://www.w3.org/2000/svg xmlns:xlink=http://www.w3.org/1999/xlink y=0px><style>.st0{fill:#7d7d7d}.st1{font-family:HelveticaNeue}.st2{font-size:100.8037px}</style><g id=Pigeon><path class=st0 d="M524.3,71.2c0.6,0.2,1.3,0.7,1,1.2c-4,0.4-8.1-0.1-12.1-0.3c-13.8-0.8-27.6,1.5-41.2,3.7 c-0.7,0.1-1.6,0.4-1.8,1.1c-0.1,0.5,0.1,1,0.2,1.5c0.3,1.5-0.7,3-1.9,3.9c-1.2,1-2.3,2.5-3.2,3.8c0,0-0.3,0.6-0.9,1 c-0.4,0.6-0.7,1.3-1.1,1.9c0.2,0,0.3,0,0.5,0.1c0.1,0,0.4,0,0.5,0.1c0.3,0.1,0.4,0.5,0.3,0.8c-0.1,0.1-0.2,0.2-0.4,0.3 c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1,0-0.2,0c-0.3,0-0.6-0.1-0.9-0.1c0,0,0,0.1-0.1,0.1c-0.3,0.6,0,1.3,0.7,1.5c0.3,0,0.5,0,0.8,0.1 s0.5,0,0.8,0.1c0.5,0,1,0.1,1.5,0.1c0.2,0,0.4,0,0.6,0.2c0.2,0.2,0.2,0.4,0.1,0.6c-0.1,0.2-0.3,0.3-0.5,0.3c0,0-0.1,0-0.1,0 c-0.1,0-0.2,0-0.3,0c-0.2,0-0.5,0-0.7-0.1c-1-0.1-2-0.2-3-0.3c-1.4-0.1-1.6-0.1-3-0.2c-2-0.1-4-0.1-6-0.2c-0.5,0-1,0-1.5,0 c-0.6,0-0.9,0-1.5,0.1c-0.5,0.1-1,0.2-1.5,0.4c-0.5,0.1-1,0.3-1.5,0.4c-0.3,0.1-0.5-0.1-0.6-0.4c-0.1-0.3,0.1-0.6,0.4-0.6 c0.5-0.1,1.1-0.3,1.6-0.4c0.5-0.1,1.1-0.3,1.6-0.4c0.6-0.1,1-0.1,1.6-0.1c0.5,0,1.1,0,1.6,0c0.5,0,1.1,0,1.6,0 c1.1,0,2.2,0.1,3.3,0.1c1,0,1.9-0.6,2.4-1.4c0,0,0-0.1,0.1-0.1c-0.6-0.1-1.1-0.1-1.7-0.2c-0.6-0.1-1.1-0.1-1.7-0.1 c-1.1,0-2.3-0.1-3.4-0.1c-0.6,0-1.1,0-1.7,0c-0.3,0-0.6,0-0.8,0c-0.3,0-0.6,0-0.9,0c-0.6,0-1.1,0.2-1.6,0.5 c-0.5,0.3-1,0.5-1.5,0.7c-0.2,0.1-0.4,0-0.6-0.2c-0.1-0.2-0.1-0.4,0-0.6c0.1-0.1,0.2-0.2,0.3-0.2c0.1,0,0.2-0.1,0.3-0.1 c0.2-0.1,0.4-0.2,0.6-0.3c0.9-0.4,1.4-0.8,2.5-0.9c0.2,0,0.5,0,0.7,0c0.2,0,0.4,0,0.6,0c0.4,0,0.9,0,1.3,0c0.9,0,1.8,0.1,2.6,0.1 c0.8,0.1,1.4-0.4,1.8-1c0-0.1,0.1-0.1,0.1-0.2c0.4-0.7,0.9-1.5,1.3-2.2c-0.6-1,0.5-3.3,0.6-4.1c0.3-2.6-0.4-5.1-1.7-7.3 c-0.1-0.1,0-0.2,0.1-0.2c-0.5-0.3-1.1-0.5-1.6-0.8c-4.1-1.8-8-4-11.9-6.2c-5.4-3-9-9.5-9-9.5c-1.9-3.6-3.9-7.4-3.6-11.4 c-0.5-0.2-0.8-0.7-1-1.2c-0.7-1.7-0.5-3.9-0.4-5.7c0.1-2.1,0.4-4.1,0.8-6.2c0.8-4.9,1.9-9.8,1.1-14.8c-0.4-2.4-1.3-5.4-3.3-6.7 c-0.7,0.1-1.4,0.1-2,0.2c-0.7,0.2-2.2,1.2-2.9,0.6c-1.1-1.1,1.6-4,2.5-4.8c-0.1-0.6,0.4-1.2,1-1.6c0,0,0.1,0,0.1-0.1 c0.1-0.2,0.1-0.4,0.2-0.5c0.8-2.3,2.8-3.6,5-4.4c5.5-1.7,10.7,1.6,13.3,6.4c1.2,2.2,1.9,4.7,2.5,7.2c0.6,2.7,0.8,5.6,1.6,8.3 c0.7,2.1,1.9,4.1,3.3,6c0.7,0.9,1.5,1.9,2.4,2.9c1,1.1,2,2.2,3,3.2c1.1,0.3,2.3,0.7,3.4,1.2c2.6,1.1,5.1,2.5,7.4,4.3 c1.3,1,2.5,2.1,3.7,3.3c1.2,1.2,2.7,2.1,4,3.2c0.3,0.2,0.4,0.4,0.5,0.6c0.1,0,0.1,0,0.2,0c0.8,0.1,1.9,1.2,2.7,1.6 c1.4,0.9,2.8,1.7,4.3,2.5c1.6,0.9,3.2,1.7,4.9,2.4c1.3,0.6,2.9,1,4.1,1.9c0.7,0.5,1,1,1,1.6c2.7,1,5.4,1.9,8.1,2.7 c2.4,0.7,5,1.2,7.3,2.1c3.3,1.2,7.4,2.1,9.1,5.5c0,0.1,0,0.1,0,0.2c-1.1,1.1-3.5,0.6-5.1,0.5C517.9,69.1,521.1,70.2,524.3,71.2z  M463.4,84.6c0.5-1,0.5-2,0.3-3.1c0,0,0,0,0,0c0,0,0,0.1,0,0.1c-0.4,0.6-1.9,3.2-3.1,3.8c-0.4,0.7-0.9,1.4-1.3,2.1 c-0.3,0.4-0.1,1,0.4,1c0,0,0,0,0.1,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0.1,0c0,0,0.1,0,0.1,0c0.1,0,0.2,0,0.3,0 c0.2,0,0.3,0,0.5,0.1c0.3,0,0.7,0.1,1,0.1c0.4-0.7,0.8-1.4,1.2-2.1C462.8,86.3,462.9,85.7,463.4,84.6z"/><text class="st0 st1 st2"transform="matrix(1 0 0 1 120.808 72)">Pidgin</text><rect class="underline st0" height=5.1 width=196.9 x=68.5 y=88 /><rect class="underline st0" height=5.1 width=111.3 x=327.1 y=88 /></g></svg>
				</a>
			</h1>
				<?php
			$pidgin_theme_description = get_bloginfo( 'description', 'display' );
			if ( $pidgin_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?= $pidgin_theme_description /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'menu-1',
				'depth'	          => 1, // 1 = no dropdowns, 2 = with dropdowns.
				'container' 	    => false,
				'menu_class'      => 'nav justify-content-center m-0',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content my-5">
