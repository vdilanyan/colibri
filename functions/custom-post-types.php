<?php
// ADD CUSTOM POST TYPE IF NEEDED
/*
function custom_post_type_events() {
	$labels = [
		"name"               => _x("Events", "post type general name"),
		"singular_name"      => _x("Events", "post type singular name"),
		"add_new"            => _x("Add New", "Event"),
		"add_new_item"       => __("Add New Event"),
		"edit_item"          => __("Edit Event"),
		"new_item"           => __("New Event"),
		"all_items"          => __("All Events"),
		"view_item"          => __("View Event"),
		"search_items"       => __("Search Events"),
		"not_found"          => __("No Events found"),
		"not_found_in_trash" => __("No Events found in the Trash"), 
		"parent_item_colon"  => "",
		"menu_name"          => "Events"
	];

	$args = [
		"labels"        => $labels,
		"description"   => "Holds our Events and Event specific data",
		"public"        => true,
		"menu_position" => 5,
		"supports"      => ["title", "editor", "thumbnail", "post-formats" ,"custom-fields"],
		"has_archive"   => true,
	];
	register_post_type("conjunctures", $args);
}
add_action("init", "custom_post_type_events");
*/