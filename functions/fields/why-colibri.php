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
	->setRequired()

	->addTab('the_tale', [
		'placement' => 'left',
	])
	->addText('the_tale_title', [
		'label' => 'Title'
	])
	->setRequired()
	->addRepeater('do_nothing', [
		'min' => 1,
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
		'min' => 1,
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
	->setRequired()

	->addImage('idea_image', [
		'return_format' => 'url',
	])
	->setRequired()

	->addTab('page_footer', [
		'placement' => 'left',
	])
	->addText('footer_title', [
		'label' => 'Title',
	])
	->setRequired()
	->addTextarea('footer_description', [
		'label' => 'Description',
		'new_lines' => 'br',
	])
	->setRequired()

	->setLocation('page_template', '==', 'why-colibri.php');

add_action('acf/init', function() use ($why_colibri) {
	acf_add_local_field_group($why_colibri->build());
});
