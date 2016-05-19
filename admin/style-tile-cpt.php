<?php
/**
 * The Style Tile custom post type.
 *
 * @package wp-style-tiles
 * @since 1.0.0
 */

add_action( 'init', 'wpst_style_tile_cpt' );
/**
 * Register the Style Tile CPT.
 */
function wpst_style_tile_cpt() {

	$labels = array(
		'name'          => __( 'Style Tiles', 'wp-style-tiles' ),
		'singular_name' => __( 'Style Tile', 'wp-style-tiles' ),
		);

	$args = array(
		'label'               => __( 'Style Tiles', 'wp-style-tiles' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'has_archive'         => false,
		'show_in_menu'        => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array( 'slug' => 'style-tile', 'with_front' => true ),
		'query_var'           => true,
		'menu_position'       => 20,'menu_icon' => 'dashicons-admin-appearance',
		'supports'            => array( 'title', 'thumbnail' ),
	);
	register_post_type( 'style-tile', $args );

// End of cptui_register_my_cpts_style_tile()
}
