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
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<pre>
				<?php print_r($error_404); ?>
			</pre>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
