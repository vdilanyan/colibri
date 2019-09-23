<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$why_ecopods = new FieldsBuilder('why_ecopods_page_options', [
	'position' => 'acf_after_title',
]);

$why_ecopods
	->addTab('top_banner', [
		'placement' => 'left',
	])
	->addImage('top_banner_image', [
		'return_format' => 'url',
	])
	->setRequired()
	->addText('top_banner_text', [
		'label' => 'Caption Text',
	])
	->setRequired()

	->addTab('avoid_plastic', [
		'placement' => 'left',
	])
	->addText('avoid_plastic_title', [
		'label' => 'Title',
	])
	->setRequired()
	->addText('avoid_plastic_description', [
		'label' => 'Description',
	])

	->addRepeater('avoid_plastic_steps', [
		'min' => 1,
		'max' => 6,
		'layout' => 'block',
	])
		->addText('title')
		->setRequired()

		->addTextarea('description', [
			'new_lines' => 'br',
		])
		->setRequired()

		->addImage('image', [
			'return_format' => 'url',
		])
		->setRequired()
	->endRepeater()

	->addTab('page_footer_image', [
		'placement' => 'left',
	])
	->addImage('page_footer_image', [
		'return_format' => 'url',
	])

	->setLocation('page_template', '==', 'why-ecopods.php');

add_action('acf/init', function() use ($why_ecopods) {
	acf_add_local_field_group($why_ecopods->build());
});
