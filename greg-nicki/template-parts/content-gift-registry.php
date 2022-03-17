<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greg_&_Nicki
 */

?>

<!-- start content-gift-registry.php -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
		if ( is_singular() ) :
			$greg_nicki_comment_count = get_comments_number();
			if ( '1' === $greg_nicki_comment_count ) {
				echo '';
			} else  {
				echo '<p class="gift-registry-margin">This is to confirm you are purchasing the following gift, and removing it from available items in the registry:</p>';
			}
			the_title( '<p class="gift-registry-margin" id="content-gift-registry-name">', '</p>');
			$greg_nicki_comment_count = get_comments_number();
			if ( '1' === $greg_nicki_comment_count ) {
				echo '';
			} else  {
				echo '<p class="gift-registry-margin">Click the "Gift Purchased" button to finish.</p>';
			}
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>

		<?php
			$display = null;

			if ( single_cat_title('', false) == "Vendors" )  {
				$display = 'show';
			}
		?>
		<a href="<?php the_field('vendor_website') ?>" target="_blank" rel="noopener noreferrer"><?php the_field('vendor_website') ?></a>
		<br>


		<?php
			if ( single_cat_title('', false) == "Gift Registry" )  {
				echo the_field('sold_in_stores');
			}
		?>

	<?php greg_nicki_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'greg-nicki' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'greg-nicki' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->

<!-- end content-gift-registry.php -->