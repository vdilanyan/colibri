<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$contacts = new FieldsBuilder('contact_page_options', [
	'position' => 'acf_after_title',
]);

$contacts
	->addTab('map', [
		'placement' => 'left',
	])
	->addGoogleMap('google_map')
	->setRequired()

	->addTab('form', [
		'placement' => 'left',
	])
	->addNumber('form_id', [
		'label' => 'Form ID',
		'min' => 1,
	])
	->setRequired()

	->addTab('address', [
		'placement' => 'left',
	])
	->addText('company_name')
	->setRequired()
	->addText('address')
	->setRequired()

	->addTab('phone', [
		'placement' => 'left',
	])
	->addText('general_enquiries')
	->setRequired()
	->addText('technical_enquiries')
	->setRequired()

	->setLocation('page_template', '==', 'contacts.php');

add_action('acf/init', function() use ($contacts) {
	acf_add_local_field_group($contacts->build());
});
