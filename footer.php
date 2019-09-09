<?php
$context = Timber::get_context();

$social_links = get_field('social_links', 'option');

$context['footer'] = [
	'social_links' => $social_links,
];

Timber::render('templates/footer.twig', $context);
