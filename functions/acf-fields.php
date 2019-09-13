<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

if (function_exists("acf_add_options_page")) {
	acf_add_options_page([
		"page_title" => "Options",
		"menu_title" => "Theme Settings",
		"menu_slug" => "theme-general-settings",
		"icon_url" => "dashicons-images-alt2",
		"capability" => "edit_posts",
		"redirect" => false,
	]);
}

$theme_settings = new FieldsBuilder('settings');
$theme_settings
	->addRepeater('social_links')
		->addImage('icon', [
			'return_format' => 'url',
		])
		->setWidth(50)
		->addUrl('link')
		->setWidth(50)
	->endRepeater()
	->setLocation('options_page', '==', 'theme-general-settings');

add_action('acf/init', function() use ($theme_settings) {
	acf_add_local_field_group($theme_settings->build());
});
