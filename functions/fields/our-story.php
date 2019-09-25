<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$our_story = new FieldsBuilder('our_story_page_options', [
	'position' => 'acf_after_title',
]);

$our_story
	->addTab('page_content', [
		'placement' => 'left',
	])
	->addText('page_title')
	->setRequired()

	->addTextarea('first_paragraph', [
		'new_lines' => 'br',
	])
	->setRequired()

	->addImage('first_paragraph_small_image')
	->setRequired()

	->addImage('first_paragraph_large_image')
	->setRequired()

	->addTextarea('second_paragraph', [
		'new_lines' => 'br',
	])
	->setRequired()

	->addImage('second_paragraph_first_small_image')
	->setRequired()

	->addImage('second_paragraph_second_small_image')
	->setRequired()

	->addImage('second_paragraph_large_image')
	->setRequired()

	->addTextarea('third_paragraph', [
		'new_lines' => 'br',
	])
	->setRequired()

	->addTab('our_team', [
		'placement' => 'left',
	])
	->addText('section_title')
	->setRequired()

	->addImage('ceo_image', [
		'label' => 'CEO Image',
		'return_format' => 'url',
	])
	->setRequired()

	->addText('ceo_name', [
		'label' => 'CEO Name',
	])
	->setRequired()

	->addText('ceo_position', [
		'label' => 'CEO Position',
	])
	->setRequired()

	->addTextarea('ceo_bio', [
		'label' => 'CEO Bio',
		'new_lines' => 'br',
	])
	->setRequired()

	->addImage('ceo_signature', [
		'label' => 'CEO Signature',
		'return_format' => 'url',
	])
	->setRequired()

	->addRepeater('team_members', [
		'min' => 1,
		'layout' => 'block',
	])
		->addImage('photo', [
			'return_format' => 'url',
		])
		->setRequired()

		->addText('name')
		->setRequired()

		->addText('position')
		->setRequired()

		->addTextarea('bio')
		->setRequired()
	->endRepeater()

	->setLocation('page_template', '==', 'our-story.php');

add_action('acf/init', function() use ($our_story) {
	acf_add_local_field_group($our_story->build());
});
