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
	$footer = get_field('footer', 'option');
	$logo = $footer['logo'];
	$footer_content = $footer['footer_content'];
	?>

	<section class="grid-container">
		<div class="footer__content">
			<?php foreach ($footer_content as $content): ?>
				<div class="footer__details">
					<p class="c3 text-primary"><?php echo $content['heading']; ?></p>

					<ul class="footer__list">
						<?php foreach ($content['list'] as $item): ?>
							<li class="text-neutral-600"><?php echo $item['item']; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>

			<span class="icon-linkedin"></span>
		</div>

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

		<div class="footer__logo-container">
			<?php if (!empty($logo)): ?>
				<img class="footer__logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
			<?php endif; ?>
		</div>
	</section>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>