<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Outside_Traineeship_Biolerplate
 */

?>

<footer id="footer" class="footer bg-neutral-50">
	<?php
	$footer				= get_field('footer', 'option');
	$logo				= $footer['logo'];
	$footer_content 	= $footer['footer_content'];
	$social_links		= get_field('socials', 'option');
	$linkedin			= $social_links['linkedin'];

	$has_menu_items 	= wp_nav_menu(array('theme_location' => 'footer-menu', 'echo' => false)) !== false; // check if menu is empty or not

	$is_assigned 		= has_nav_menu('footer-menu'); // check if menu location is assigned
	?>

	<section class="footer__container">
		<div class="footer__content">
			<?php foreach ($footer_content as $content): ?>
				<div class="footer__details">
					<?php if ($content['heading']): ?>
						<p class="c3 text-primary"><?php echo $content['heading']; ?></p>
					<?php endif; ?>

					<?php if ($content['list'] !== []): ?>
						<ul class="footer__list">
							<?php foreach ($content['list'] as $item): ?>
								<?php if ($item['item']): ?>
									<li class="text-neutral-600 sh3">
										<a target="_blank" href="<?php echo $item['link'] ?? '' ?>" class="text-neutral-600 text-decoration-none">
											<?php echo $item['item']; ?>
										</a>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>

			<a href="<?php echo $linkedin['url']; ?>" target="<?php echo $linkedin['target']; ?>" title="LinkedIn">
				<span class="icon-linkedin text-decoration-none text-neutral-600" aria-hidden="true"></span>
			</a>
		</div>

		<?php if ($has_menu_items && $is_assigned): ?>
			<nav class="footer__nav">
				<p class="c3 text-primary">Explore</p>
				<?php
				wp_nav_menu(array(
					'theme_location'	=> 'footer-menu',
					'menu_class'     	=> 'footer__menu',
					'menu_id'			=> 'footer-menu',
				));
				?>
			</nav>
		<?php endif; ?>

		<a href="#" class="footer__logo-container">
			<?php if (!empty($logo)): ?>
				<img class="footer__logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
			<?php endif; ?>
		</a>
	</section>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>