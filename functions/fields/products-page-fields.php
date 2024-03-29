<?php
use StoutLogic\AcfBuilder\FieldsBuilder;
require_once('partials/faq-fields.php');

$products_page_options = new FieldsBuilder('products_page_options', [
	'position' => 'acf_after_title',
]);

$faq_fields = new FAQ_Fields();

$products_page_options
	->addTab('product_information', [
		'placement' => 'left',
	])
	->addTextarea('product_information')
	->setRequired()

	->addTab('benefits', [
		'placement' => 'left',
	])
	->addText('benefits_title', [
		'label' => 'Title',
	])

	->addRepeater('product_benefits', [
		'button_label' => 'Add Benefit',
		'max' => 3,
	])
		->addImage('icon', [
			'return_format' => 'url',
			'max_width' => 100,
			'max_height' => 100,
		])
		->setWidth(50)
		->setRequired()

		->addText('benefit_text')
		->setWidth(50)
		->setRequired()
	->endRepeater()

	->addTab('faqs', [
		'placement' => 'left',
		'label' => 'FAQs',
	])
	->addFields($faq_fields->get_fields())

	->addTab('surfaces', [
		'placement' => 'left',
	])
	->addImage('surfaces_banner_image', [
		'return_format' => 'url',
	])
	->setRequired()

	->setLocation('page_template', '==', 'page-products.php');

add_action('acf/init', function() use ($products_page_options) {
	acf_add_local_field_group($products_page_options->build());
});
