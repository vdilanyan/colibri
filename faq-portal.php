<?php
// Template Name: FAQ Portal

$context = Timber::get_context();

$context['faq_page'] = [
	'faqs_title' => get_field('faqs_title'),
	'faqs' => get_field('faqs'),
	'form_id' => get_field('form_id'),
];

Timber::render('templates/faq-page.twig', $context);
