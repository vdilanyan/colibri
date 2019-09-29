<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$blog_post_fields = new FieldsBuilder('blog_post_options', [
	'position' => 'acf_after_title',
]);

$blog_post_fields
	->addImage('blog_banner_image', [
		'return_format' => 'url',
		'min_width' => 1440,
	])

	->setLocation('post_type', '==', 'post');

add_action('acf/init', function() use ($blog_post_fields) {
	acf_add_local_field_group($blog_post_fields->build());
});
