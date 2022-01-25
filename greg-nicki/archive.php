<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greg_&_Nicki
 */

get_header();
?>

<!-- start archive.php -->

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="page-header">
				<!-- <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?> -->
				<h1>Vendors</h1>
			</div><!-- .page-header -->

			<div class="wedding-posts">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

			</div>

	</main><!-- #main -->

<!-- end archive.php -->

<?php
get_footer();
