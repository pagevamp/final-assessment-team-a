<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Outside_Traineeship_Biolerplate
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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<<<<<<< HEAD
=======
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'outside-traineeship-biolerplate' ); ?></a>

	<button class="btn-primary">Label</button>
	<span class="icon-arrow-right"></span>
	<span class="icon-linkedin"></span>
	<span class="icon-chevron-down"></span>
	<span class="icon-pause"></span>
	<span class="icon-quote"></span>
	<div class="bg-overlay-20" style="width: 500px; height: 500px">
		<p class="d2">NiceNice</p>
	</div>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$outside_traineeship_biolerplate_description = get_bloginfo( 'description', 'display' );
			if ( $outside_traineeship_biolerplate_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $outside_traineeship_biolerplate_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'outside-traineeship-biolerplate' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
>>>>>>> 89d7eec (WTFA-11 : Font issue unsolved)
