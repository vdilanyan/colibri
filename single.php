<?php
$context = Timber::context();

$context = [
	'post' => new Timber\Post(),
	'banner_image' => get_field('blog_banner_image'),
];

Timber::render('templates/single.twig', $context);
