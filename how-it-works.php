<?php
// Template Name: How It Works

$context = Timber::get_context();

$context['how_it_works'] = [
	'page_title' => get_field('page_title'),
	'page_sub_title' => get_field('page_sub_title'),
	'page_description' => get_field('page_description'),
	'product_image' => get_field('product_image'),
	'how_its_made' => get_field('how_its_made'),
	'how_it_works' => get_field('how_it_works'),
	'bn_title' => get_field('bn_title'),
	'before_image' => get_field('before_image'),
	'after_image' => get_field('after_image'),
	'full_width_image' => get_field('full_width_image'),
	'slogan_text' => get_field('slogan_text'),
];

Timber::render('templates/how-it-works.twig', $context);
