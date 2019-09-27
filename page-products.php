<?php
// Template Name: Products

$context = Timber::get_context();

$product_args = [
	'post_type' => 'product',
	'posts_per_page' => 5,
	'order' => 'ASC',
];

$context['products_page'] = [
	'products' => Timber::get_posts($product_args),
	'product_information' => get_field('product_information'),
	'benefits_title' => get_field('benefits_title'),
	'product_benefits' => get_field('product_benefits'),
	'faqs_title' => get_field('faqs_title'),
	'faqs' => get_field('faqs'),
	'surfaces_banner_image' => get_field('surfaces_banner_image'),
];

Timber::render('templates/products-page.twig', $context);
