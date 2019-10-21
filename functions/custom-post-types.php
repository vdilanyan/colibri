<?php

function custom_post_type_faq() {
	$labels = [
		'name'               => _x('FAQs', 'post type general name'),
		'singular_name'      => _x('FAQs', 'post type singular name'),
		'add_new'            => _x('Add New', 'FAQ'),
		'add_new_item'       => __('Add New FAQ'),
		'edit_item'          => __('Edit FAQ'),
		'new_item'           => __('New FAQ'),
		'all_items'          => __('All FAQs'),
		'view_item'          => __('View FAQ'),
		'search_items'       => __('Search FAQs'),
		'not_found'          => __('No FAQs found'),
		'not_found_in_trash' => __('No FAQs found in the Trash'), 
		'parent_item_colon'  => '',
		'menu_name'          => 'FAQs',
	];

	$args = [
		'labels'        => $labels,
		'description'   => 'Holds our FAQs and FAQ specific data',
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'			=> 'dashicons-format-status',
		'supports'      => ['title', 'editor', 'thumbnail', 'post-formats', 'custom-fields'],
		'has_archive'   => true,
	];
	
	register_post_type('faq', $args);
}
add_action('init', 'custom_post_type_faq');

function custom_post_type_reviews() {
	$labels = [
		'name'               => _x('Reviews', 'post type general name'),
		'singular_name'      => _x('Reviews', 'post type singular name'),
		'add_new'            => _x('Add New', 'Review'),
		'add_new_item'       => __('Add New Review'),
		'edit_item'          => __('Edit Review'),
		'new_item'           => __('New Review'),
		'all_items'          => __('All Reviews'),
		'view_item'          => __('View Review'),
		'search_items'       => __('Search Reviews'),
		'not_found'          => __('No Reviews found'),
		'not_found_in_trash' => __('No Reviews found in the Trash'), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Reviews',
	];

	$args = [
		'labels'        => $labels,
		'description'   => 'Holds our Reviews and Review specific data',
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'			=> 'dashicons-star-filled',
		'supports'      => ['title', 'editor', 'thumbnail', 'post-formats', 'custom-fields'],
		'has_archive'   => true,
	];
	
	register_post_type('reviews', $args);
}
add_action('init', 'custom_post_type_reviews');
