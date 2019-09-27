<?php
use StoutLogic\AcfBuilder\FieldsBuilder;
require_once('partials/faq-fields.php');

$faq_options = new FieldsBuilder('faq_options', [
	'position' => 'acf_after_title',
	'title' => 'FAQ Page Options',
]);

$faq_fields = new FAQ_Fields();

$faq_options
	->addTab('faqs', [
		'placement' => 'left',
		'label' => 'FAQs',
	])
	->addFields($faq_fields->get_fields())
	
	->addTab('form', [
		'placement' => 'left',
	])
	->addNumber('form_id', [
		'label' => 'Form ID',
		'min' => 1,
	])
	->setRequired()
	->setLocation('page_template', '==', 'faq-portal.php');

add_action('acf/init', function() use ($faq_options) {
	acf_add_local_field_group($faq_options->build());
});
