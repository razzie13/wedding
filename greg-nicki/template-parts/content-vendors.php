<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greg_&_Nicki
 */

?>

<!-- start content-vendors.php -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<h3><?php the_field('vendor_category') ?></h3>
		
		

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title">', '</h2>' );
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
		<span class=<?php if (the_field('vendor_insta') == '') {echo 'invisible';} else {echo 'show';} ?>>
		<i class="fab fa-instagram-square"></i>@<a href="https://www.instagram.com/<?php the_field('vendor_insta') ?>" target="_blank" rel="noopener noreferrer"><?php the_field('vendor_insta') ?></a>
		</span>

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

<!-- end content-vendors.php -->