<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greg_&_Nicki
 */

?>

<?php $item_purchased = null; ?>

<?php 
if ( '1' === get_comments_number() ) {
	$item_purchased = 'item-purchased';
}
?>

<!-- start content.php -->

<article id="post-<?php the_ID(); ?>" <?php post_class($item_purchased); ?>>

		<h3><?php the_field('vendor_category') ?>
			<?php
				if ( single_cat_title('', false) == "Gift Registry" )  {
					echo the_field('sold_in_usa');
				}
			?>
		</h3>
		
		

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
		<ul class="gift-registry-tile-links">
			<li><a href="<?php the_field('exterior_link')?>" target="_blank" rel="noopener noreferrer"><strong>Product Link</strong></a><i class="fas fa-external-link-alt"></i></li>
			
			<?php
			if (single_cat_title('', false) != "More" ) {
				echo '<li>Store Product ID: ' , the_field('product_id') , '</li>';
				echo '<li>Number Requested: ' , the_field('number_requested') , '</li>';
				echo '<li>Sold In Stores: ' , the_field('sold_in_stores') , '</li>';
				if ( '1' === get_comments_number() ) {
					echo '<li><strong>Item Has Been Purchased</strong></li>';
				} else  {
					echo '<li><strong><a href="' . get_permalink() . '" rel="bookmark">Mark Item as Purchased</a></strong></li>';
				}			
			}
		?>
		</ul>

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

<!-- end content.php -->