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

<!-- start category-gift-registry.php -->

	<main id="primary" class="site-main">

    	<?php if ( have_posts() ) : ?>

			<div class="page-header">
				<!-- <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				
				?> -->
				<h1><?php single_cat_title(); ?></h1>
			</div><!-- .page-header -->

			<div class="wedding-posts">

            <?php
            if (is_category()) {
                $this_category = get_category($cat);
                }
                ?>
                <?php
                if($this_category->category_parent)
                $this_category = wp_list_categories('orderby=id
                &title_li=&use_desc_for_title=1&child_of='.$this_category->category_parent.
                "&echo=0"); else
                $this_category = wp_list_categories('orderby=id&depth=1
                &title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID.
                "&echo=0");
                if ($this_category) { ?> 
            
            <ul>
            <?php echo $this_category; ?>
            
            </ul>
            
            <?php } ?>

			<?php
			/* Start the Loop */


			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

			</div>

	</main><!-- #main -->

<!-- end category-gift-registry.php -->

<?php
get_footer();
