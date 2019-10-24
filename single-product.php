<?php
$context = Timber::get_context();

$product = new Timber\Post();

$gallery_ids = $product->_product_image_gallery;
$gallery_ids_array = $gallery_ids ? explode(',', $gallery_ids) : false;
$gallery_images = [];

if ($gallery_ids_array) {
	foreach ($gallery_ids_array as $id) {
		$gallery_images[] = wp_get_attachment_url($id);
	}
}

$product_args = [
	'post_type' => 'product',
	'posts_per_page' => 5,
	'order' => 'ASC',
	'post__not_in' => [$product->ID],
];

$attahced_review_args = [
	'post_type' => 'reviews',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'meta_key' => 'attach_review',
	'meta_value' => $product->ID,
];

$attached_reviews = get_posts($attahced_review_args);

$reviews_args = [
	'post_type' => 'reviews',
	'post_status' => 'publish',
	'posts_per_page' => -1,
];

$reviews = get_posts($reviews_args);

$total_review_stars = 0;

foreach ($reviews as $review) {
	$total_review_stars += (int)get_field('star_rating', $review->ID);
}

$total_review_stars = round($total_review_stars / count($reviews));

$context['single_product'] = [
	'post' => $product,
	'gallery' => $gallery_images,
	'product_features' => get_field('product_features'),
	'button_name' => get_field('wtb_button_name'),
	'button_link' => get_field('where_to_buy_link'),
	'tabs' => get_field('tabs'),
	'how_it_works' => get_field('how_it_works'),
	'faqs_title' => get_field('faqs_title'),
	'faqs' => get_field('faqs'),
	'full_width_image' => get_field('full_width_image'),
	'attached_reviews' => $attached_reviews,
	'reviews' => $reviews,
	'total_product_rating' => $total_review_stars,
	'other_products' => Timber::get_posts($product_args),
];

Timber::render('templates/single-product.twig', $context);
