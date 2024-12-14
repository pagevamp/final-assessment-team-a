<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Outside_Traineeship_Biolerplate
 */

get_header();

	$error_404 = get_field('404_error', 'option');

	$error_code = $error_404['error_code'];
	$error_message = $error_404['error_message'];
	$error_description = $error_404['error_description'];
	$button = $error_404['button'];
	$button_label = $button['button_label'];
	$page_link = $button['page_link'];
	$image = $error_404['background_image'];
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container p-0">
				<?php if ($image): ?>
					<img src="<?php echo $image['url'];?>" class="error__image" alt="<?php echo $image['alt'];?>" aria-label="Error background image">
				<?php endif; ?>

				<div class="error__content">
					<?php if ($error_code): ?>
						<p class="c1"><?php echo $error_code; ?></p>
					<?php endif; ?>

					<?php if ($error_message): ?>
						<h2 class="d2 pb-m"><?php echo $error_message; ?></h2>
					<?php endif; ?>

					<?php if ($error_description): ?>
						<p class="sh3 pb-s"><?php echo $error_description; ?></p>
					<?php endif; ?>

					<?php if ($button): ?>
						<a href="<?php echo $page_link;?>" class="btn-primary text-decoration-none mx-auto"aria-label="Navigate to <?php echo $button_label; ?> page"><?php echo $button_label; ?></a>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
