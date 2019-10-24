<?php
use Timber\Timber;

function load_category() {
	$context = Timber::get_context();

	if (!wp_verify_nonce($_REQUEST['wp_nonce'], $_REQUEST['action'])) {
		wp_die('No naughty business please');
	}

	$cat_slug = $_REQUEST['cat_slug'];
	$posts_per_page = $_REQUEST['posts_per_page'];

	$args = [
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $posts_per_page,
	];

	$args['category_name'] = $cat_slug == 'all' ? '' : $cat_slug;

	$posts = query_posts($args);

	if ($posts) {
		global $wp_query;
		$result['have_posts'] = true;
		$result['found_posts'] = $wp_query->found_posts;
		$context = [
			'posts' => new \Timber\PostQuery($posts),
			'triangle_right' => get_template_directory_uri() . '/assets/img/read-more.png',
		];

		ob_start();

		Timber::render('templates/partials/blog-posts.twig', $context);

		$result['html'] = ob_get_clean();
	}

	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		wp_die(json_encode($result));
	} else {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		wp_die();
	}
}

add_action('wp_ajax_load_category', 'load_category');
add_action('wp_ajax_nopriv_load_category', 'load_category');