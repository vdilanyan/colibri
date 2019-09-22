<?php
if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title' => 'Options',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-general-settings',
		'icon_url' => 'dashicons-images-alt2',
		'capability' => 'edit_posts',
		'redirect' => false,
	]);
}

require_once('fields/home-fields.php');
require_once('fields/product-fields.php');
require_once('fields/products-page-fields.php');
require_once('fields/theme-settings-fields.php');
require_once('fields/how-it-works.php');
