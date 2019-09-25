<?php
// Template Name: Why Colibri

$context = Timber::get_context();

$context['why_colibri'] = [
	'page_title' => get_field('page_title'),
	'page_content' => get_field('page_content'),
	'photo' => get_field('photo'),
	'the_tale_title' => get_field('the_tale_title'),
	'do_nothing' => get_field('do_nothing'),
	'do_something' => get_field('do_something'),
	'idea_title' => get_field('idea_title'),
	'idea_image' => get_field('idea_image'),
	'footer_title' => get_field('footer_title'),
	'footer_description' => get_field('footer_description'),
];

Timber::render('templates/why-colibri.twig', $context);
