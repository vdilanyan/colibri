<?php
global $wp_query;

$context = Timber::get_context();

$found_posts = $wp_query->found_posts;
$posts_per_page = 9;

$args = [
	'posts_per_page' => $posts_per_page,
	'post_status' => 'publish',
];

$terms = get_terms([
	'taxonomy' => 'category',
]);

$context['blog'] = [
	'page_title' => get_field('page_title', get_option('page_for_posts')),
	'page_content' => get_field('page_content', get_option('page_for_posts')),
	'posts' => Timber::get_posts($args),
	'terms' => $terms,
	'posts_per_page' => $posts_per_page,
	'found_posts' => $found_posts,
];

Timber::render('templates/blog.twig', $context);
