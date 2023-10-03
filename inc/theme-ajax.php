<?php
/*
	=====================
		Theme ajax functions
	=====================	
*/


function loadmore_get_posts()
{
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1; // 
	$args['post_status'] = 'publish';

	$posts = new WP_Query($args);
	if ($posts->have_posts()) :
		while ($posts->have_posts()) : $posts->the_post();
			echo get_template_part('template-parts/card/block', 'career');
		endwhile;
	endif;
	wp_die();
}

add_action('wp_ajax_loadmore', 'loadmore_get_posts');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_get_posts');
