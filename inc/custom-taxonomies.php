<?php
/*
	=====================
		Custom Taxonomies
	=====================	
*/

function add_custom_taxonomies()
{
	// Category type
	register_taxonomy('testimonials_category', 'testimonials_cases', array(
		'hierarchical' => true,
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "resources_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
		'labels' => array(
			'name' => _x('Category Type', 'TU Delft'),
			'singular_name' => _x('Category Type', 'TU Delft'),
			'search_items' =>  __('Search Category Type'),
			'all_items' => __('All Category Types'),
			'parent_item' => __('Parent Category Type'),
			'parent_item_colon' => __('Parent Category Type:'),
			'edit_item' => __('Edit Category Type'),
			'update_item' => __('Update Category Type'),
			'add_new_item' => __('Add New Category Type'),
			'new_item_name' => __('New Category Type Name'),
			'menu_name' => __('Category Types'),
		),
		'rewrite' => array(
			'slug' => 'testimonials_category',
			'with_front' => false,
			'hierarchical' => true
		),
	));
}
add_action('init', 'add_custom_taxonomies', 0);
