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

		<header id="header" class="header" role="banner">
			<nav class="navbar navbar-expand-lg navbar-light" role="navigation">
				<div class="container-fluid">
					<!-- Logo Section -->
					<div class="header__logo-container navbar-brand">
						<?php if (!empty($logo)): ?>
							<a href="#" aria-label="Homepage">
								<img class="header__logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
							</a>
						<?php endif; ?>
					</div>

					<!-- Toggle Button for Offcanvas Menu -->
					<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#header-menu" aria-controls="#header-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
						<span class="icon-menu"></span>
					</button>

					<!-- Offcanvas Menu -->
					<div class="offcanvas offcanvas-end" tabindex="-1" id="header-menu" aria-labelledby="offcanvasLabel">
						<div class="offcanvas-header">
							<div class="header__logo-container offcanvas-title" id="offcanvasLabel">
								<?php if (!empty($logo)): ?>
									<a href=" #">
										<img class="header__logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
									</a>
								<?php endif; ?>
							</div>
							<button type="button" data-bs-dismiss="offcanvas" aria-label="Close">
								<span class="icon-x-mark"></span>
							</button>
						</div>

						<!-- Primary Navigation menu -->
						<?php
						wp_nav_menu(array(
							'theme_location'	=> 'header-menu',
							'depth'				=> 2,
							'container'			=> 'false',
							'menu_class'      	=> 'navbar-nav text-lg me-auto',
							'fallback_cb'     	=> 'WP_Bootstrap_Navwalker::fallback',
							'walker'          	=> new WP_Bootstrap_Navwalker(),
						));
						?>

						<!-- Emergency Contact Information in Offcanvas -->
						<div class="offcanvas-header">
							<span class="icon-linkedin" aria-hidden="true"></span>
							<div class="header__emergency">
								<?php if (!empty($emergency)): ?>
									<p class="text-xsm text-neutral-600"><?php echo $emergency['heading']; ?></p>
									<p class="text-lg"><span class="icon-phone-call" aria-hidden="true"></span> <?php echo $emergency['phone']; ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<!-- Main Header Contact Info -->
					<div class="header__contact" aria-label="Emergency contact">
						<a target="_blank" href="tel:<?php echo $emergency['phone']; ?>" class="header__emergency">
							<?php if (!empty($emergency)): ?>
								<p class="text-xsm text-neutral-600"><?php echo $emergency['heading']; ?></p>
								<p class="text-lg text-neutral-600"><span class="icon-phone-call"></span> <?php echo $emergency['phone']; ?></p>
							<?php endif; ?>
						</a>
					</div>
				</div>
			</nav>

		</header>