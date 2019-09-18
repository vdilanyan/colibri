<?php
$context = Timber::get_context();

$banner_image = get_optional_image(get_field('banner_image'));
$steps_image = get_optional_image(get_field('steps_image'));
$pi_image = get_optional_image(get_field('pi_image'));
$ov_image = get_optional_image(get_field('ov_image'));

$product_args = [
	'post_type' => 'product',
	'posts_per_page' => 5,
	'order' => 'ASC',
];

$context['home'] = [
	'product_name' => get_field('product_name'),
	'slogan' => get_field('slogan'),
	'banner_image' => $banner_image,
	'banner_button_name' => get_field('banner_button_name'),
	'banner_button_link' => get_field('banner_button_link'),
	'we_button_name' => get_field('we_button_name'),
	'we_button_link' => get_field('we_button_link'),
	'benefits_first' => get_field('benefits_first_column'),
	'benefits_second' => get_field('benefits_second_column'),
	'benefits_title' => get_field('benefits_title'),
	'benefits_image' => get_field('benefits_image'),
	'steps_title' => get_field('steps_title'),
	'steps_image' => $steps_image,
	'steps' => get_field('steps'),
	'steps_button_name' => get_field('steps_button_name'),
	'steps_button_link' => get_field('steps_button_link'),
	'pi_image' => $pi_image,
	'product_information' => get_field('product_information'),
	'pi_button_name' => get_field('pi_button_name'),
	'pi_button_link' => get_field('pi_button_link'),
	'our_customers_title' => get_field('our_customers_title'),
	'our_customers' => get_field('our_customers'),
	'ov_title' => get_field('ov_title'),
	'ov_description' => get_field('ov_description'),
	'ov_image' => $ov_image,
	'ov_button_name' => get_field('ov_button_name'),
	'ov_button_link' => get_field('ov_button_link'),
	'products' => Timber::get_posts($product_args),
];

Timber::render('templates/front-page.twig', $context);
