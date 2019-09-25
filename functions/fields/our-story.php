<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$our_story = new FieldsBuilder('our_story_page_options', [
	'position' => 'acf_after_title',
]);

$our_story
	->setLocation('page_template', '==', 'our-story.php');

add_action('acf/init', function() use ($our_story) {
	acf_add_local_field_group($our_story->build());
});
