<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$blog_fields = new FieldsBuilder('blog_opotions', [
	'position' => 'acf_after_title',
	'title' => 'Blog Page Options',
]);

$blog_fields
	->addText('page_title')
	->setRequired()
	->addTextarea('page_content', [
		'new_lines' => 'br',
	])
	->setRequired()

	->setLocation('page_type', '==', 'posts_page');

add_action('acf/init', function() use ($blog_fields) {
	acf_add_local_field_group($blog_fields->build());
});
