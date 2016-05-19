<?php
/**
 * Plugin Name: WordPress Style Tiles
 * Version:     1.0
 * Description: A plugin for designers to quickly generate Style Tiles directly within WordPress.
 * Author:      Carrie Forde
 * Author URI:  https://carrieforde.com
 * Plugin URI: PLUGIN SITE HERE
 * Text Domain: wp-style-tiles
 * Domain Path: /languages
 * @package wp-style-tiles
 */

define( 'WP_STYLE_TILES_VERSION', '1.0.0' );
define( 'WP_STYLE_TILES_PATH', plugin_dir_path( __FILE__ ) );
define( 'WP_STYLE_TILES_URL', plugin_dir_url( __FILE__ ) );

add_action( 'wp_enqueue_scripts', 'wpst_styles_and_scripts' );
/**
 * Load plugin scripts and styles.
 */
function wpst_styles_and_scripts() {

	wp_enqueue_style(
		'wpst-styles',
		WP_STYLE_TILES_URL . 'wp-style-tiles.css',
		array(),
		WP_STYLE_TILES_VERSION
	);

	wp_enqueue_script(
		'wpst-scripts',
		WP_STYLE_TILES_URL . 'js/wp-style-tiles.js',
		array( 'jquery' ),
		WP_STYLE_TILES_VERSION
	);
}
