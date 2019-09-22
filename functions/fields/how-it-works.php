<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$hiw_fields = new FieldsBuilder('how_it_works_page_options', [
	'position' => 'acf_after_title',
]);

$hiw_fields
	->addTab('content', [
		'placement' => 'left',
	])
	->addText('page_title')
	->setRequired()
	->addText('page_sub_title')
	->addTextarea('page_description', [
		'new_lines' => 'br',
	])

	->addTab('product_information', [
		'placement' => 'left',
	])
	->addImage('product_image', [
		'return_format' => 'url',
	])
	->addRepeater('how_its_made', [
		'min' => 1,
		'max' => 3,
	])
		->addImage('icon', [
			'return_format' => 'url',
			'max_width' => 50,
			'max_height' => 50,
		])
		->setRequired()
		->addText('him_info', [
			'label' => 'Information',
		])
		->setRequired()
	->endRepeater()

	->addTab('how_it_works', [
		'placement' => 'left',
	])
	->addRepeater('how_it_works', [
		'max' => 3,
		'layout' => 'block',
	])
		->addImage('image', [
			'return_format' => 'url',
		])
		->setRequired()

		->addText('step')
		->setRequired()
	->endRepeater()

	->addTab('before_now', [
		'placement' => 'left',
		'label' => 'Before/Now',
	])
	->addText('bn_title', [
		'label' => 'Title',
	])
	->setRequired()

	->addImage('before_image', [
		'return_format' => 'url',
	])
	->setRequired()

	->addImage('after_image', [
		'return_format' => 'url',
	])
	->setRequired()

	->addTab('full_width_image', [
		'placement' => 'left',
	])
	->addImage('full_width_image', [
		'return_format' => 'url',
	])
	->addTextarea('slogan_text', [
		'new_lines' => 'br',
	])

	->setLocation('page_template', '==', 'how-it-works.php');

add_action('acf/init', function() use ($hiw_fields) {
	acf_add_local_field_group($hiw_fields->build());
});
