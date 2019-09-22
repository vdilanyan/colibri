<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$product_fields = new FieldsBuilder('product_additional_options', [
	'position' => 'side',
]);

$product_fields
	->addImage('homepage_image', [
		'return_format' => 'url',
	])
	->setRequired()
	->addImage('homepage_image_hover', [
		'return_format' => 'url',
	])
	->setRequired()

	->addImage('products_page_image', [
		'return_format' => 'url',
	])
	->setRequired()
	->addImage('products_page_image_hover', [
		'return_format' => 'url',
	])
	->setRequired()

	->setLocation('post_type', '==', 'product');

add_action('acf/init', function() use ($product_fields) {
	acf_add_local_field_group($product_fields->build());
});


$product_options = new FieldsBuilder('product_options', [
	'position' => 'acf_after_title',
]);

$product_options
	->addTab('product_features', [
		'placement' => 'left',
	])
	->addRepeater('product_features', [
		'max' => 6,
	])
		->addText('feature')
		->setRequired()
	->endRepeater()

	->addTab('where_to_buy', [
		'placement' => 'left',
	])
	->addText('wtb_button_name', [
		'label' => 'Button Name',
	])
	->setWidth(50)
	->setInstructions(LEAVE_EMPTY)

	->addUrl('where_to_buy_link')
	->setWidth(50)
	->setRequired()
	->conditional('wtb_button_name', '!=', '')

	->addTab('tabs', [
		'placement' => 'left',
	])
	->addRepeater('tabs', [
		'max' => 3,
		'layout' => 'block',
	])
		->addText('tab_title')
		->setRequired()

		->addTextarea('tab_content')
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

	->addTab('faqs', [
		'placement' => 'left',
		'label' => 'FAQs',
	])
	->addText('faqs_title', [
		'label' => 'Title',
	])

	->addRepeater('faqs', [
		'button_label' => 'Add FAQs',
	])
		->addPostObject('faq', [
			'post_type' => [
				0 => 'faq',
			]
		])
		->setRequired()
	->endRepeater()

	->addTab('full_width_image', [
		'placement' => 'left',
	])
	->addImage('full_width_image', [
		'return_format' => 'url',
	])

	->setLocation('post_type', '==', 'product');

add_action('acf/init', function() use ($product_options) {
	acf_add_local_field_group($product_options->build());
});
