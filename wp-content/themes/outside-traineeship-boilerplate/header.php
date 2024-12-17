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
		$header			= get_field('header_content', 'option');
		$logo			= $header['logo'];
		$emergency		= $header['emergency_contact'];

		$socials		= get_field('socials', 'option');
		$linkedin		= $socials['linkedin'];

		$has_menu_items = wp_nav_menu(array('theme_location' => 'header-menu', 'echo' => false)) !== false; // check if menu is empty or not

		$is_assigned	= has_nav_menu('header-menu'); // check if menu location is assigned
		?>

		<header id="header" class="header container" role="banner">
			<nav class="navbar navbar-expand-lg navbar-light" role="navigation">
				<div class="container-fluid">
					<!-- Logo Section -->
					<?php if (!empty($logo)): ?>
						<figure class="header__logo-container navbar-brand">
							<a href="#" aria-label="Homepage">
								<img class="header__logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
							</a>
						</figure>
					<?php endif; ?>

					<!-- Toggle Button for Offcanvas Menu -->
					<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#header-menu" aria-controls="#header-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
						<span class="icon-menu"></span>
					</button>

					<!-- Offcanvas Menu -->
					<div class="offcanvas offcanvas-end mx-auto" tabindex="-1" id="header-menu" aria-labelledby="offcanvasLabel">
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
						if ($has_menu_items && $is_assigned) {
							wp_nav_menu(array(
								'theme_location'	=> 'header-menu',
								'depth'				=> 2,
								'container'			=> 'false',
								'menu_class'      	=> 'navbar-nav text-lg me-auto',
								'fallback_cb'     	=> 'WP_Bootstrap_Navwalker::fallback',
								'walker'          	=> new WP_Bootstrap_Navwalker(),
							));
						}
						?>

						<!-- Emergency Contact Information in Offcanvas -->
						<div class="offcanvas-header">
							<a href="<?php echo $linkedin['url']; ?>" target="<?php echo $linkedin['target']; ?>" title="LinkedIn">
								<span class="icon-linkedin text-decoration-none text-neutral-600" aria-hidden="true"></span>
							</a>
							<?php if (!empty($emergency['heading']) || !empty($emergency['phone'])): ?>
								<div class="header__emergency">
									<p class="text-xsm text-neutral-600"><?php echo $emergency['heading']; ?></p>
									<p class="text-lg"><span class="icon-phone-call" aria-hidden="true"></span> <?php echo $emergency['phone']; ?></p>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- Main Header Contact Info -->
					<?php if (!empty($emergency['heading']) || !empty($emergency['phone'])): ?>
						<div class="header__contact" aria-label="Emergency contact">
							<div class="header__emergency">
								<p class="text-xsm text-neutral-600 text-center"><?php echo $emergency['heading']; ?></p>

								<?php if (!empty($emergency['phone'])): ?>
									<a target="_blank" href="tel:<?php echo $emergency['phone']; ?>" class="text-lg text-neutral-600 text-decoration-none"><span class="icon-phone-call"></span> <?php echo $emergency['phone']; ?></a>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</nav>

		</header>