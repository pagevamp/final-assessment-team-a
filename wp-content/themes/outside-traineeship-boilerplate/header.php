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
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<?php
		$header		= get_field('header_content', 'option');
		$logo		= $header['logo'];
		$emergency	= $header['emergency_contact'];
		?>

		<header id="header" class="header">
			<div class="header__logo-container">
				<?php if (!empty($logo)): ?>
					<img class="header__logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
				<?php endif; ?>
			</div>

			<?php
			wp_nav_menu(array(
				'theme_location'	=> 'header-menu',
				'menu_class'     	=> 'header__menu',
				'menu_id'			=> 'header-menu',
				'container'			=> 'nav',
				'container_class'	=> 'header__nav'
			));
			?>

			<div class="header__contact">
				<?php if (!empty($emergency)): ?>
					<p><?php echo $emergency['heading']; ?></p>
					<p><span class="icon-phone-call"></span> <?php echo $emergency['phone']; ?></p>
				<?php endif; ?>
			</div>

		</header>