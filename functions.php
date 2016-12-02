<?php
/**
 * WP Style Tiles
 *
 * Functions
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Return an array of font weights.
 *
 * @return  array  The font weights.
 */
function wpst_get_font_weights() {

	$font_weights = array(
		'100' => esc_html__( 'Extra Light (100)', 'wp-style-tiles' ),
		'300' => esc_html__( 'Light (300)', 'wp-style-tiles' ),
		'400' => esc_html__( 'Normal(400)', 'wp-style-tiles' ),
		'700' => esc_html__( 'Bold (700)', 'wp-styles-tiles' ),
		'900' => esc_html__( 'Black (900)', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_font_weights', $font_weights );
}

