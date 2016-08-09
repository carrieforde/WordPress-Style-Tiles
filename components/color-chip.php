<?php
/**
 * WP Style Tiles
 *
 * Component: Color Chip
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Build and return the Color Chip Component.
 *
 * @since   1.0.0
 *
 * @param   array  $args  The args.
 *
 * @return  string        The HTML.
 */
function wpst_color_chip( $args ) {

	$component = 'wpst-color-chip';

	// Set the defaults and use them as needed.
	$defaults = array(
		'color_1' => '#eee',
		'color_2' => '',
		'color_3' => '',
		'color_4' => '',
		'color_5' => '',
		'style'   => '',
		'class'   => '',
	);
	$args = wp_parse_args( (array)$args, $defaults );

	// Set up the color chip classes.
	$classes = array();
	$classes[] = 'wpst-colors';
	if ( ! empty( $args['class'] ) ) {
		 $classes[] = $args['class'];
	}
	if ( ! empty( $args['style'] ) ) {
		$classes[] = $args['style'];
	}

	$classes = implode( ' ', $classes );

	// Build the output.
	ob_start(); ?>

	<section class="<?php echo esc_attr( $classes ); ?>">

		<div class="wpst-color-chip" style="background-color: <?php echo esc_attr( $args['color_1'] ); ?>;"></div>

	</section>

	<?php

	return ob_get_clean();
}

add_shortcode( 'wpst_color_chip', 'wpst_color_chip_shortcode' );
/**
 * Color Chip shortcode.
 *
 * @since   1.0.0
 *
 * @param   array   $atts  Shortcode attributes.
 *
 * @return  string         Shortcode output.
 */
function wpst_color_chip_shortcode( $atts = array(), $content ) {

	if ( $content ) {
		$atts['color_text'] = $content;
	}

	return wpst_color_chip( $atts );
}

add_action( 'register_shortcode_ui', 'wpst_color_chip_shortcode_ui' );
/**
 * Register UI for Shortcake integration.
 *
 * @since 1.0.0
 */
function wpst_color_chip_shortcode_ui() {

	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		return;
	}

	shortcode_ui_register_for_shortcode(
		'wpst_color_chip',
		array(
			'label' => esc_html__( 'WPST Color Chip', 'wp-style-tiles' ),
			'attrs' => array(
				array(
					'label'       => esc_html__( 'Chip Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a color for the chip.', 'wp-style-tiles' ),
					'attr'        => 'hex_code',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Color Chip Style', 'wp-style-tiles' ),
					'description' => esc_html_e( 'Select a style for the chip', 'wp-style-tiles' ),
					'attr'        => 'style',
					'type'        => 'select',
					'options'     => array(
						''      => esc_html__( 'Square', 'wp-style-tile' ),
						'round' => esc_html__( 'Round', 'wp-style-tile' ),
					),
				),
				array(
					'label'       => esc_html__( 'CSS Class', 'wp-style-tile' ),
					'description' => esc_html__( 'Add an optional class for CSS styling', 'wp-style-tiles' ),
					'attr'        => 'class',
					'type'        => 'text',
				),
				array(
					'label'       => esc_html__( 'Chip Name', 'wp-style-tiles' ),
					'description' => esc_html__( 'Optionally name the color chip', 'wp-style-tiles' ),
					'attr'        => 'color_text',
					'type'        => 'text',
				),
			),
		)
	);
}
