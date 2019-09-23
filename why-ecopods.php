<?php
// Template Name: Why Ecopods

$context = Timber::get_context();

$context['why_ecopods'] = [
	'top_banner_image' => get_field('top_banner_image'),
	'top_banner_text' => get_field('top_banner_text'),
	'avoid_plastic_title' => get_field('avoid_plastic_title'),
	'avoid_plastic_description' => get_field('avoid_plastic_description'),
	'avoid_plastic_steps' => get_field('avoid_plastic_steps'),
	'page_footer_image' => get_field('page_footer_image'),
];

Timber::render('templates/why-ecopods.twig', $context);
