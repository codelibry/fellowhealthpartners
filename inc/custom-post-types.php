<?php
/*
	=====================
		Custom Post Types
	=====================	
*/
function create_posttypes()
{
	// register_post_type(
	// 	'testimonials',
	// 	array(
	// 		'labels' => array(
	// 			'name' => __('Testimonials'),
	// 			'singular_name' => __('Testimonial')
	// 		),
	// 		'public' => true,
	// 		'has_archive' => false,
	// 		'supports' => array('title', 'editor', 'page-attributes')
	// 	)
	// );

	register_post_type(
		'leadership',
		array(
			'labels' => array(
				'name' => __('Leadership'),
				'singular_name' => __('Leadership')
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array('title', 'editor', 'page-attributes', 'thumbnail')
		)
	);

	register_post_type(
		'job',
		array(
			'labels' => array(
				'name' => __('Job openings'),
				'singular_name' => __('Job openings')
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'page-attributes')
		)
	);

	register_post_type(
		'our_clients',
		array(
			'labels' => array(
				'name' => __('As seen in'),
				'singular_name' => __('As seen in')
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'exclude_from_search' => true,
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'client'
			),
			'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => false,
			'menu_position' => 12,
			'supports' => array('title', 'editor', 'custom-fields', 'thumbnail')
		)
	);

	register_post_type(
		'employee',
		array(
			'labels' => array(
				'name' => __('Employees'),
				'singular_name' => __('Employee')
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'exclude_from_search' => true,
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'employee'
			),
			'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => false,
			'menu_position' => 13,
			'supports' => array('title', 'editor', 'custom-fields', 'thumbnail')
		)
	);

	register_post_type(
		'testimonials_cases',
		array(
			'labels' => array(
				'name' => __('Testimonials & Case Studies'),
				'singular_name' => __('Testimonial & Case Study')
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'exclude_from_search' => true,
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'testimonials'
			),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => 'dashicons-format-chat',
			'supports' => array('title', 'editor', 'thumbnail')
		)
	);
}
add_action('init', 'create_posttypes');
