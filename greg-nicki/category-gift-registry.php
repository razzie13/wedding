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

				<p class="category-more-info">
					We thank you for visiting our online gift registry! Here you will find some fun wedding gift ideas, as well as links to outside registries.
				</p>

				<p class="category-more-info">
					If you make a purchase using our registry, aside from gift cards, please mark the item as purchased by clicking the link on the bottom of the listed item to avoid the gifting of duplicate gifts.
				</p>

				
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
            
            <ul class="gift-registry-category-tiles">
            <?php echo $this_category; ?>
            
            </ul>
            
            <?php } ?>

			<?php
			/* Start the Loop */


			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

			</div>

	</main><!-- #main -->

<!-- end category-gift-registry.php -->

<?php
get_footer();
