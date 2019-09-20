<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$product_fields = new FieldsBuilder('prodcut_additional_options', [
	'position' => 'side',
]);

$product_fields
	->addImage('homepage_image', [
		'return_format' => 'url',
	])
	->setRequired()

	->addImage('products_page_image', [
		'return_format' => 'url',
	])
	->setRequired()

	->setLocation('post_type', '==', 'product');

add_action('acf/init', function() use ($product_fields) {
	acf_add_local_field_group($product_fields->build());
});
