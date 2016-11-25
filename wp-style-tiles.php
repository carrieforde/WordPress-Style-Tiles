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

add_action( 'wp_enqueue_scripts', 'wpst_styles_and_scripts', 30 );
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

add_action( 'wp_enqueue_scripts', 'wpst_tiles_fonts', 8 );
/**
 * Enqueue Style Tile specific fonts.
 */
function wpst_tiles_fonts( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_ID();
	}

	$google_font = get_post_meta( $post_id, 'wpst_google_fonts', true );

	wp_enqueue_style(
		'wpst-google-fonts',
		esc_url( $google_font ),
		false
	);
}

add_action( 'wp_enqueue_scripts', 'wpst_tiles_styles_and_scripts', 40 );
/**
 * Load Style Tile Post specific styles & scripts.
 */
function wpst_tiles_styles_and_scripts( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_ID();
	}

	$custom_css  = get_post_meta( $post_id, 'wpst_custom_css', true );

	wp_add_inline_style( 'wpst-styles', $custom_css );
}

add_action( 'admin_init', 'wpst_admin_styles' );
/**
 * Enqueue styles in the admin.
 */
function wpst_admin_styles() {

	add_editor_style( WP_STYLE_TILES_URL . 'assets/css/wp-style-tiles.css' );
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

add_filter( 'acf/settings/path', 'wpst_acf_settings_path' );
/**
 * Customize the ACF path.
 */
function wpst_acf_settings_path( $path ) {

	// Update the path.
	$path = get_stylesheet_directory() . '/lib/advanced-custom-fields/';

	// Return
	return $path;
}

add_filter( 'acf/settings/dir', 'wpst_acf_settings_dir' );
/**
 * Customize the ACF directory.
 */
function wpst_acf_settings_dir( $dir ) {

	// Upadate path
	$dir = get_stylesheet_directory_uri() . '/acf/';

	// Return
	return $dir;
}

// Hide ACF from Admin
add_filter( 'acf/settings/show_admin', '__return_false' );

add_filter( 'upload_mimes', 'wpst_mime_types' );
/**
 * Allow SVG upload
 *
 * @author  Carrie Forde
 *
 * @param   array  $mimes  The allowed mime type.
 * @return  array          The array of mime types.
 */
function wpst_mime_types( $mimes ) {

	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_image_size( 'wpst-header-img', 1200, 300, false );
add_image_size( 'wpst-pattern-img', 300, 300, array( 'center', 'center' ) );

require_once WP_STYLE_TILES_PATH . '/inc/style-tile-cpt.php';

require_once WP_STYLE_TILES_PATH . '/lib/advanced-custom-fields/acf.php';

require_once WP_STYLE_TILES_PATH . '/inc/style-tile-metaboxes.php';

require_once WP_STYLE_TILES_PATH . '/components/brand-words.php';

require_once WP_STYLE_TILES_PATH . '/components/button.php';

require_once WP_STYLE_TILES_PATH . '/components/colors.php';

require_once WP_STYLE_TILES_PATH . '/components/icons.php';

require_once WP_STYLE_TILES_PATH . '/components/patterns-textures.php';

require_once WP_STYLE_TILES_PATH . '/components/type-heading.php';

require_once WP_STYLE_TILES_PATH . '/components/type-link.php';

require_once WP_STYLE_TILES_PATH . '/components/type-paragraph.php';
