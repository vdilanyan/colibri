<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$contacts = new FieldsBuilder('contact_page_options', [
	'position' => 'acf_after_title',
]);

$contacts
	->setLocation('page_template', '==', 'contacts.php');

add_action('acf/init', function() use ($contacts) {
	acf_add_local_field_group($contacts->build());
});
