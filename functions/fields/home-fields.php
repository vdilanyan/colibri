<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

const LEAVE_EMPTY = 'Leave epmty to disable.';

$benefits = new FieldsBuilder('benefits_list');
$benefits
	->addImage('benefit_icon', [
		'label' => 'Icon',
		'return_format' => 'url',
		'max_width' => 50,
		'max_height' => 50,
	])
	->setRequired()
	->addText('benefit_text', [
		'label' => 'Text',
	])
	->setRequired();

$benefits_config = [
	'min' => 1,
	'max' => 4,
	'button_label' => 'Add Benefits',
];

$home_page_fields = new FieldsBuilder('homepage_options', [
	'position' => 'acf_after_title',
]);

$home_page_fields
	->addTab('banner', [
		'placement' => 'left',
	])
	->addText('product_name')

	->addText('slogan')
	->setRequired()

	->addImage('banner_image', [
		'return_format' => 'url',
	])

	->addText('banner_button_name')
	->setInstructions(LEAVE_EMPTY)
	->setWidth(50)

	->addPageLink('banner_button_link', [
		'post_type' => [
			0 => 'page',
		],
	])
	->setRequired()
	->setWidth(50)
	->conditional('banner_button_name', '!=', '')

	->addTab('why_ecopods', [
		'placement' => 'left',
	])
	->addText('we_button_name', [
		'label' => 'Button Name',
	])
	->setInstructions(LEAVE_EMPTY)
	->setWidth(50)

	->addPageLink('we_button_link', [
		'label' => 'Button Link',
		'post_type' => [
			0 => 'page',
		],
	])
	->setRequired()
	->setWidth(50)
	->conditional('we_button_name', '!=', '')

	->addTab('benefits', [
		'placement' => 'left',
	])
	->addText('benefits_title', [
		'label' => 'Title',
	])
	->setInstructions(LEAVE_EMPTY)

	->addImage('benefits_image', [
		'label' => 'Image',
		'return_format' => 'url',
	])
	->setRequired()

	->addRepeater('benefits_first_column', $benefits_config)
		->addFields($benefits)
	->endRepeater()

	->addRepeater('benefits_second_column', $benefits_config)
		->addFields($benefits)
	->endRepeater()

	->addTab('steps', [
		'placement' => 'left',
	])
	->addText('steps_title', [
		'label' => 'Title',
	])

	->addImage('steps_image', [
		'return_format' => 'url',
	])

	->addRepeater('steps', [
		'min' => 1,
		'max' => 5,
	])
		->addText('step')
		->setRequired()
	->endRepeater()

	->addText('steps_button_name', [
		'label' => 'Button Name',
	])
	->setInstructions(LEAVE_EMPTY)
	->setWidth(50)

	->addPageLink('steps_button_link', [
		'label' => 'Button Link',
		'post_type' => [
			0 => 'page',
		],
	])
	->setRequired()
	->setWidth(50)
	->conditional('steps_button_name', '!=', '')

	->addTab('product_information', [
		'placement' => 'left',
	])
	->addImage('pi_image', [
		'label' => 'Image',
		'return_format' => 'url',
	])

	->addText('product_information')
	->setRequired()

	->addText('pi_button_name', [
		'label' => 'Button Name',
	])
	->setInstructions(LEAVE_EMPTY)
	->setWidth(50)

	->addPageLink('pi_button_link', [
		'label' => 'Button Link',
		'post_type' => [
			0 => 'page',
		],
	])
	->setRequired()
	->setWidth(50)
	->conditional('pi_button_name', '!=', '')

	->addTab('our_customers', [
		'placement' => 'left',
	])
	->addText('our_customers_title', [
		'label' => 'Title',
	])

	->addRepeater('our_customers', [
		'min' => 2,
		'layout' => 'block',
		'button_label' => 'Add Testimonial'
	])
		->addImage('customer_photo', [
			'return_format' => 'url',
			'max_width' => 200,
			'max_height' => 200,
		])
		->setRequired()

		->addText('customer_name')
		->setRequired()

		->addTextarea('testimonial')
		->setRequired()
	->endRepeater()

	->addTab('our_values', [
		'placement' => 'left',
	])
	->addText('ov_title', [
		'label' => 'Title',
	])

	->addImage('ov_image', [
		'return_format' => 'url',
		'label' => 'Image',
	])

	->addText('ov_description', [
		'label' => 'Description',
	])
	->setRequired()

	->addText('ov_button_name', [
		'label' => 'Button Name',
	])
	->setInstructions(LEAVE_EMPTY)
	->setWidth(50)

	->addPageLink('ov_button_link', [
		'label' => 'Button Link',
		'post_type' => [
			0 => 'page',
		],
	])
	->setRequired()
	->setWidth(50)
	->conditional('ov_button_name', '!=', '')

	->setLocation('page_type', '==', 'front_page');

add_action('acf/init', function() use ($home_page_fields) {
	acf_add_local_field_group($home_page_fields->build());
});
