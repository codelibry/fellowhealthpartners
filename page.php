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
 * @package fellow
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="page-blocks">
			<?php
			if (!post_password_required()) :
				// Your custom code should here
				the_acf_loop();
			else :
				// we will show password form here
				echo get_the_password_form();
			endif;
			?>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
