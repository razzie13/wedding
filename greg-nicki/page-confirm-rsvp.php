<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greg_&_Nicki
 */

get_header();
?>

<!-- start page.php -->

	<main id="primary" class="site-main page-content">

	<h1 class="page-entry-title">RSVP</h1>

		<?php if($_GET['reply']=='success'){
        echo '<p>Thank you for your RSVP. We are thrilled you can make it!</p>';
        }else if($_GET['reply']=='decline'){
        echo '<p>Thank you for your RSVP. We are saddened you cannot make it to our event.</p>';
        } ?>

	</main><!-- #main -->

<!-- end page.php -->

<?php

get_footer();