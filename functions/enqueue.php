<?php
function enqueue_assets() {
	wp_enqueue_style("bootstrap-style", "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css", [], "", "all"); 
	wp_enqueue_style("font-awesome", "https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css", [], "", "all"); 
	wp_enqueue_style("stylecss", get_stylesheet_uri());
	wp_enqueue_script("jquery");
	wp_enqueue_script("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", "", "", true);
	wp_enqueue_script("functions", get_template_directory_uri() . "assets/js/functions.js", "", "", true);
	wp_localize_script("functions", "wp_var",
		[
			"ajax_url" => admin_url("admin-ajax.php"),
		]
	);
}
add_action("wp_enqueue_scripts", "enqueue_assets");