<?php
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
			"secondary-menu" => __("Secondary Menu"),
			"footer-menu" => __("Footer Menu"),
		]
	);
}
add_action("init", "custom_menus");

function add_to_context($context) {
	$context["main_menu"] = new \Timber\Menu("primary-menu");

	return $context;
}
add_filter("timber/context", "add_to_context");