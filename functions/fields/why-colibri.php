<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$why_colibri = new FieldsBuilder('why_colibri_page_options', [
	'position' => 'acf_after_title',
]);

$why_colibri
	->addTab('page_header', [
		'placement' => 'left',
	])
	->addText('page_title')
	->setRequired()

	->addWysiwyg('page_content')
	->setRequired()

	->addImage('photo', [
		'return_format' => 'url',
	])
	->setWidth(50)
	->setRequired()

	->addTrueFalse('make_image_circle', [
		'ui' => 1,
		'default_value' => 1,
	])
	->setWidth(50)

	->addTab('the_tale', [
		'placement' => 'left',
	])
	->addText('the_tale_title', [
		'label' => 'Title'
	])
	->addRepeater('do_nothing', [
		'max' => 3,
		'button_label' => 'Add Item',
	])
		->addText('text')
		->setRequired()

		->addImage('image', [
			'return_format' => 'url',
		])
		->setRequired()
	->endRepeater()

	->addRepeater('do_something', [
		'max' => 3,
		'button_label' => 'Add Item',
	])
		->addText('text')
		->setRequired()

		->addImage('image', [
			'return_format' => 'url',
		])
		->setRequired()
	->endRepeater()

	->addTab('the_idea_of_logo', [
		'placement' => 'left',
	])
	->addText('idea_title', [
		'label' => 'Title',
	])

	->addImage('idea_image', [
		'return_format' => 'url',
	])

	->addTab('page_footer', [
		'placement' => 'left',
	])
	->addText('footer_title', [
		'label' => 'Title',
	])
	->addTextarea('footer_description', [
		'label' => 'Description',
		'new_lines' => 'br',
	])

	->setLocation('page_template', '==', 'why-colibri.php');

add_action('acf/init', function() use ($why_colibri) {
	acf_add_local_field_group($why_colibri->build());
});
