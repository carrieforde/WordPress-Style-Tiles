<?php
/**
 * Plugin Name: WordPress Style Tiles
 * Plugin URI: http://tiles.carrieforde.co
 * Description: A plugin for designers to quickly generate Style Tiles directly within WordPress.
 * Version:     0.1
 * Author:      Carrie Forde
 * Author URI:  https://carrieforde.com
 * License:     GPL2
 * License URL: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: wp-style-tiles
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
		WP_STYLE_TILES_URL . 'assets/css/wp-style-tiles.css',
		array(),
		WP_STYLE_TILES_VERSION
	);

	wp_enqueue_script(
		'wpst-scripts',
		WP_STYLE_TILES_URL . 'assets/js/wp-style-tiles.js',
		array( 'jquery' ),
		WP_STYLE_TILES_VERSION
	);
}

register_activation_hook( __FILE__, 'wpst_install_cpt' );
/**
 * Set up the custom post types and flush the rewrite rules.
 */
function wpst_install_cpt() {

	// Trigger the function that registers the Style Tile CPT.
	wpst_style_tile_cpt();

	// Clear the permalinks after the post type is registered.
	flush_rewrite_rules();
}

/**
 * Check the current user's role.
 *
 * @since 1.0.0
 *
 * @param   string   $role     The role to check.
 * @param   int      $user_id  The current user's ID.
 *
 * @return  bool
 */
function wpst_check_user_role( $role, $user_id = null ) {

	if ( is_numeric( $user_id ) ) {
		$user = get_userdata( $user_id );
	} else {
		$user = wp_get_current_user();
	}

	if ( empty( $user ) ) {
		return false;
	}

	return in_array( $role, (array)$user->roles );
}

add_image_size( 'wpst_header_img', 1200, 300, false );
add_image_size( 'wpst_pattern_img', 550, 550, true );

require_once WP_STYLE_TILES_PATH . '/inc/style-tile-cpt.php';

require_once WP_STYLE_TILES_PATH . '/components/brand-words.php';

require_once WP_STYLE_TILES_PATH . '/components/colors.php';
