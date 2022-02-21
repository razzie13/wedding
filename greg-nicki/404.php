<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Greg_&_Nicki
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			
				<h1 class="page-title"><?php esc_html_e( 'Four-Oh-Four', 'greg-nicki' ); ?></h1>
			

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'greg-nicki' ); ?></p>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
