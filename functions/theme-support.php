<?php
function blank_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar([
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	]);
}
add_action("widgets_init", "blank_widgets_init");

/* Add Thumbnail Support */
add_theme_support("post-thumbnails"); 
add_image_size("blog-thumb", 200, 200, true); //(width, height, crop)

/* change e-mail name */
function res_fromemail($email) {
	$wpfrom = get_option("admin_email");
	return $wpfrom;
}
add_filter("wp_mail_from", "res_fromemail");

function res_fromname($email) {
	$wpfrom = get_option("blogname");
	return $wpfrom;
}
add_filter("wp_mail_from_name", "res_fromname");
