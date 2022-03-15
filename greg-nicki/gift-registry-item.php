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

        <h1 class="page-entry-title">Gift Registry <span class="gift-retailer"><?php the_field('vendor_category') ?><?php the_field('sold_in_usa')?></span>
			<?php
				if ( single_cat_title('', false) == "Gift Registry" )  {
					echo the_field('sold_in_usa');
				}
			?>
		</h1>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-gift-registry', get_post_type() );
    ?>
    </main><!-- #main -->
    <?php 
            

			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle"><i class="fas fa-lightbulb"></i>' . esc_html__( 'Idea:', 'greg-nicki' ) . '</span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle"><i class="fas fa-lightbulb"></i>' . esc_html__( 'Idea:', 'greg-nicki' ) . '</span> <span class="nav-title">%title</span>',
			// 	)
			// );
    
    // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
    ?>

<!-- end gift-registry-item.php -->

<?php
get_footer();
