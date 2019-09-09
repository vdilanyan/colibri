<?php
// ADD CUSTOM TAXONOMY IF NEEDED
/*
function custom_taxonomy_type() {
	$labels = [
		"name"              => _x("Event Type", "taxonomy general name"),
		"singular_name"     => _x("Event Type", "taxonomy singular name"),
		"search_items"      => __("Search Event Types"),
		"all_items"         => __("All Event Types"),
		"parent_item"       => __("Parent Event Type"),
		"parent_item_colon" => __("Parent Event Type:"),
		"edit_item"         => __("Edit Event Type"),
		"update_item"       => __("Update Event Type"),
		"add_new_item"      => __("Add New Event Type"),
		"new_item_name"     => __("New Event Type"),
		"menu_name"         => __("Event Type"),
	];

	$args = [
		"hierarchical"      => true,
		"labels"            => $labels,
		"show_ui"           => true,
		"show_admin_column" => true,
		"query_var"         => true,
		"rewrite"           => ["slug" => "event-type"],
	];

	register_taxonomy("event-type", ["conjunctures"], $args);
}
add_action("init", "custom_taxonomy_type", 0);
*/