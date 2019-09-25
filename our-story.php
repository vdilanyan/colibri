<?php
// Template Name: Our Story

$context = Timber::get_context();

$context['our_story'] = [
	'page_title' => get_field('page_title'),
	'first_paragraph' => get_field('first_paragraph'),
	'first_paragraph_small_image' => get_field('first_paragraph_small_image'),
	'first_paragraph_large_image' => get_field('first_paragraph_large_image'),
	'second_paragraph' => get_field('second_paragraph'),
	'second_paragraph_first_small_image' => get_field('second_paragraph_first_small_image'),
	'second_paragraph_second_small_image' => get_field('second_paragraph_second_small_image'),
	'second_paragraph_large_image' => get_field('second_paragraph_large_image'),
	'third_paragraph' => get_field('third_paragraph'),
	'section_title' => get_field('section_title'),
	'ceo_image' => get_field('ceo_image'),
	'ceo_name' => get_field('ceo_name'),
	'ceo_position' => get_field('ceo_position'),
	'ceo_bio' => get_field('ceo_bio'),
	'ceo_signature' => get_field('ceo_signature'),
	'team_members' => get_field('team_members'),
];

Timber::render('templates/our-story.twig', $context);
