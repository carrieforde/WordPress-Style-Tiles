<?php
/**
 * The Style Tile custom post type.
 *
 * @package wp-style-tiles
 * @since 1.0.0
 */

add_action( 'init', 'wpst_style_tile_cpt', 8 );
/**
 * Register the Style Tiles custom post type.
 */
function wpst_style_tile_cpt() {
	$labels = array(
		'name' => 'Style Tiles',
		'singular_name' => 'Style Tile',
		'menu_name' => 'Style Tiles',
		'all_items' => 'All Style Tiles',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Style Tile',
		'edit' => 'Edit',
		'edit_item' => 'Edit Style Tile',
		'new_item' => 'New Style Tile',
		'view' => 'View',
		'view_item' => 'View Style Tile',
		'search_items' => 'Search Style Tiles',
		'not_found' => 'No Style Tiles Found',
		'not_found_in_trash' => 'No Style Tiles Found in Trash',
		'parent' => 'Parent Style Tile',
		);

	$args = array(
		'labels' => $labels,
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_rest' => false,
		'has_archive' => false,
		'show_in_menu' => true,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'style-tile', 'with_front' => true ),
		'query_var' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-admin-appearance',
		'supports' => array( 'title', 'thumbnail', 'page-attributes' ),
	);
	register_post_type( 'style-tile', $args );
}
