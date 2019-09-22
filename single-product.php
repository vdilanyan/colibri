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
	'other_products' => Timber::get_posts($product_args),
];

Timber::render('templates/single-product.twig', $context);