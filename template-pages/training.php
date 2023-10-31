<?php

/**
 * Template Name: Training page 
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
	<?php if (!is_home() && !is_front_page()) : ?>
		<?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
	<?php endif; ?>
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
		<?php echo get_template_part('template-parts/parts/popup'); ?>
	</div>

</main><!-- #main -->

<?php
get_footer();
