<?php
/**
 * The template for displaying all single posts
 * 
 * Template Name: Gift Registry Item
 * Template Post Type: post, page, product
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Greg_&_Nicki
 */

get_header();
?>

<!-- start gift-registry-item.php -->

	<main id="primary" class="site-main gift-registry-item">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Idea:', 'greg-nicki' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Idea:', 'greg-nicki' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<!-- end gift-registry-item.php -->

<?php
get_footer();
