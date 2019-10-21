<?php
use Timber\Timber;

/* WYSIWYG defaults */
/** change tinymce's paste-as-text functionality */
function paste_as_text($mceInit, $editor_id) {
	//turn on paste_as_text by default
	//NB this has no effect on the browser's right-click context menu's paste!
	$mceInit["paste_as_text"] = true;
	return $mceInit;
}
add_filter("tiny_mce_before_init", "paste_as_text", 1, 2);

/** Set the Attachment Display Settings, This function is attached to the 'after_setup_theme' action hook. */
function default_attachment_display_setting() {
	update_option("image_default_align", "left");
	update_option("image_default_link_type", "none");
	update_option("image_default_size", "large");
}
add_action("after_setup_theme", "default_attachment_display_setting");

// CUSTOM MENUS
function custom_menus() {
	register_nav_menus(
		[
			"primary-menu" => __("Primary Menu"),
			"footer-menu-products" => __("Footer Menu (Products)"),
			"footer-menu-help" => __("Footer Menu (Help)"),
			"footer-menu-about" => __("Footer Menu (About)"),
		]
	);
}
add_action("init", "custom_menus");

function add_to_context($context) {
	$context["main_menu"] = new \Timber\Menu("primary-menu");
	$context["footer_menu_products"] = new \Timber\Menu("footer-menu-products");
	$context["footer_menu_help"] = new \Timber\Menu("footer-menu-help");
	$context["footer_menu_about"] = new \Timber\Menu("footer-menu-about");

	return $context;
}
add_filter("timber/context", "add_to_context");

function acf_google_map_api_init($api) {
	acf_update_setting("google_api_key", "AIzaSyBK3O9lbhFfnYlpKptVZNjOghEGTzzEQyg");
}
add_filter("acf/init", "acf_google_map_api_init");

function share_buttons() {
	$context = Timber::get_context();

	$context["share"] = [
		"link" => get_the_permalink(),
		"title" => get_the_title(),
		"src" => get_bloginfo("url"),
	];

	Timber::render("templates/share.twig", $context);
}

function add_opengraph_doctype($output) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter("language_attributes", "add_opengraph_doctype");

function insert_fb_in_head() {
	global $post;
	if(!is_singular()) {
		return;
	} else {
		$metadesc = strip_tags(get_post_field("post_content", $post->ID));
		echo "<meta property=\"fb:admins\" content=\"YOUR USER ID\"/>";
		echo "<meta property=\"fb:app_id\" content='1977246855685394'/>";
		echo "<meta property=\"og:url\" content='" . get_permalink() . "'/>";
		echo "<meta property=\"og:type\" content=\"article\"/>";
		echo "<meta property=\"og:title\" content='" . get_the_title() . "'/>";
		echo "<meta property=\"og:description\" content='" . wp_trim_words($metadesc, 25) . "'/>";
		echo "<meta property=\"og:site_name\" content='" . get_bloginfo("title") . "'/>";

		if (has_post_thumbnail($post->ID)) {
			$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large");
			echo "<meta property=\"og:image\" content='" . esc_attr($thumbnail_src[0]) . "'/>";
			echo "";
		}
	}
}
add_action("wp_head", "insert_fb_in_head", 5);
