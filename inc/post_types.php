<?php
//===========================================================================
// CUSTOM POST TYPES
//===========================================================================

add_action( 'init', 'register_my_custom_post_types' );

/**
 * Register the custom post type fo integrations
 */
function register_my_custom_post_types() {

	// Sections
	$labels_integraleadtotal = array(
		"name" => __( "Integrations", "" ),
		"singular_name" => __( "Integration", "" ),
		"menu_name" => __( "Integrations", "" ),
		"all_items" => __( "All integrations", "" ),
		"add_new" => __( "Add new integration", "" ),
		"add_new_item" => __( "Add new", "" ),
		"edit_item" => __( "Edit integration", "" ),
		"new_item" => __( "New integration", "" ),
		"view_item" => __( "View integration", "" ),
		"view_items" => __( "View integration", "" ),
		"search_items" => __( "Search", "" ),
		"not_found" => __( "Search not found", "" ),
		"not_found_in_trash" => __( "Search not found", "" ),
		"parent_item_colon" => __( "Related", "" ),
		"featured_image" => __( "Featured image", "" ),
		"set_featured_image" => __( "Edit featured image", "" ),
		"remove_featured_image" => __( "Delete featured image", "" ),
		"parent_item_colon" => __( "Related", "" ),
	);

	$args_integraleadtotal = array(
		"label" => __( "integrations", "" ),
		"labels" => $labels_integraleadtotal,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "integraleadtotal", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-admin-plugins",
		"supports" => array( "title", "thumbnail", "excerpt"),
	);

	register_post_type( "integraleadtotal", $args_integraleadtotal );

	

}

// Taxonomies terms for Inategrations

add_action( 'init', 'pages_tax' );
function pages_tax() {
	$taxonomies = [
		[
			"title" => "Categories",
			"slug" => "categories",
			"post_type" => ["integraleadtotal"],
		],
		
	];
	foreach ($taxonomies as $tax) {
		register_taxonomy(
			$tax["slug"],
			$tax["post_type"],
			array(
				'label' => $tax["title"],
				'rewrite' => array( 'slug' => $tax["slug"] ),
				'hierarchical' => true,
			)
		);
	}
}