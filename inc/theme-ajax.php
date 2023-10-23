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

function loadmore_get_news()
{
	$category_id = $_POST['category'];
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1; // 
	$args['post_status'] = 'publish';
	$args['post_type'] = 'post';

	if (!empty($category_id)) {
		$args['cat'] = $category_id; // Filter by selected category
	}

	$posts = new WP_Query($args);
	if ($posts->have_posts()) :
		while ($posts->have_posts()) : $posts->the_post();
			echo get_template_part('template-parts/parts/news_item');
		endwhile;
	endif;
	wp_die();
}

add_action('wp_ajax_loadmore_news', 'loadmore_get_news');
add_action('wp_ajax_nopriv_loadmore_news', 'loadmore_get_news');

function filter_news()
{
	$category = $_POST['category'];

	$news = new WP_Query([
		'post_type' => 'post',
		'posts_per_page' => 3,
		'order' => 'DESC',
		'order_by' => 'date',
		'status' => 'publish',

		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'terms'    => $category
			),
		),
	]);

	$news_all = new WP_Query([
		'post_type' => 'post',
		'posts_per_page' => 3,
		'order_by' => 'date',
		'order' => 'DESC',
		'status' => 'publish',
	]);

	$response = '';
	if ($news->have_posts()) {
		while ($news->have_posts()) : $news->the_post();
			$response .= get_template_part('template-parts/parts/news_item');
		endwhile;
	} else {
		while ($news_all->have_posts()) : $news_all->the_post();
			$response .= get_template_part('template-parts/parts/news_item');
		endwhile;
	}

	echo $response;
	exit; // use die instead of exit 
}
add_action('wp_ajax_filter_news', 'filter_news');
add_action('wp_ajax_nopriv_filter_news', 'filter_news');

function get_category_count()
{
	$category_id = $_POST['category'];
	$category = get_term($category_id, 'category');
	echo $category->count;
	wp_die();
}

add_action('wp_ajax_get_category_count', 'get_category_count');
add_action('wp_ajax_nopriv_get_category_count', 'get_category_count');
