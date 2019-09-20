<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$theme_settings = new FieldsBuilder('settings');

$theme_settings
	->addRepeater('social_links')
		->addImage('icon', [
			'return_format' => 'url',
			'max_width' => 24,
			'max_height' => 24,
		])
		->setWidth(50)

		->addUrl('link')
		->setWidth(50)
	->endRepeater()
	->setLocation('options_page', '==', 'theme-general-settings');

add_action('acf/init', function() use ($theme_settings) {
	acf_add_local_field_group($theme_settings->build());
});
