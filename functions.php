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
 * Return an array of font styles.
 *
 * @return  array  The font styles.
 */
function wpst_get_font_styles() {

	$font_styles = array(
		'normal' => esc_html__( 'Normal', 'wp-style-tiles' ),
		'italic' => esc_html__( 'Italic', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_font_styles', $font_styles );
}

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

/**
 * Return an array of text transforms.
 *
 * @return  array  The text transforms.
 */
function wpst_get_text_transforms() {

	$text_transforms = array(
		'none'        => esc_html__( 'None', 'wp-style-tiles' ),
		'capitalize'  => esc_html__( 'Capitalize', 'wp-style-tiles' ),
		'lowercase'   => esc_html__( 'Lowercase', 'wp-style-tiles' ),
		'uppercase'   => esc_html__( 'Uppercase', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_text_transforms', $text_transforms );
}

/**
 * Return an array of color chip styles.
 *
 * @return  array  The color chip styles.
 */
function wpst_get_color_chip_styles() {

	$color_chip_style = array(
		'square' => esc_html__( 'Square', 'wp-style-tiles' ),
		'round'  => esc_html__( 'Round', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_color_chip_styles', $color_chip_style );
}

/**
 * Return an array of heading levels.
 *
 * @return  array  The heading levels.
 */
function wpst_get_heading_levels() {

	$heading_levels = array(
		'h1' => esc_html__( 'Heading 1', 'wp-style-tiles' ),
		'h2' => esc_html__( 'Heading 2', 'wp-style-tiles' ),
		'h3' => esc_html__( 'Heading 3', 'wp-style-tiles' ),
		'h4' => esc_html__( 'Heading 4', 'wp-style-tiles' ),
		'h5' => esc_html__( 'Heading 5', 'wp-style-tiles' ),
		'h6' => esc_html__( 'Heading 6', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_heading_levels', $heading_levels );
}
