<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$review_options = new FieldsBuilder('review_options', [
	'position' => 'acf_after_title',
]);

$review_options
	->addSelect('star_rating', [
		'default_value' => 5,
	])
	->setWidth(50)
	->addChoices([
		4,
		5,
	])

	->addPostObject('attach_review', [
		'label' => 'Attach review to a product',
		'post_type' => [
			0 => 'product',
		],
		'return_format' => 'id',
	])
	->setWidth(50)

	->setLocation('post_type', '==', 'reviews');

add_action('acf/init', function() use ($review_options) {
	acf_add_local_field_group($review_options->build());
});
