<?php
use Timber\Timber;

function load_more() {
	$context = Timber::get_context();

	if (!wp_verify_nonce($_REQUEST['wp_nonce'], $_REQUEST['action'])) {
		wp_die('No naughty business please');
	}

	$cat_slug = $_REQUEST['cat_slug'];
	$posts_per_page = $_REQUEST['posts_per_page'];
	$offset = $_REQUEST['offset'];

	$args = [
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $posts_per_page,
		'offset' => $offset,
	];

	$args['category_name'] = $cat_slug == 'all' ? '' : $cat_slug;

	$posts = query_posts($args);

	if ($posts) {
		global $wp_query;
		$result['have_posts'] = true;
		$result['found_posts'] = $wp_query->found_posts;
		$context = [
			'posts' => new \Timber\PostQuery($posts),
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

add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');