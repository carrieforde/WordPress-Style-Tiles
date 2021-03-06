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
function wpst_colors( $args = array() ) {

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
	$args = wp_parse_args( $args, $defaults );

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

		<?php if ( ! empty( $args['color_2'] ) ) : ?>
		<div class="wpst-color-chip" style="background-color: <?php echo esc_attr( $args['color_2'] ); ?>;"></div>
		<?php endif; ?>

		<?php if ( ! empty( $args['color_3'] ) ) : ?>
		<div class="wpst-color-chip" style="background-color: <?php echo esc_attr( $args['color_3'] ); ?>;"></div>
		<?php endif; ?>

		<?php if ( ! empty( $args['color_4'] ) ) : ?>
		<div class="wpst-color-chip" style="background-color: <?php echo esc_attr( $args['color_4'] ); ?>;"></div>
		<?php endif; ?>

		<?php if ( ! empty( $args['color_5'] ) ) : ?>
		<div class="wpst-color-chip" style="background-color: <?php echo esc_attr( $args['color_5'] ); ?>;"></div>
		<?php endif; ?>
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

	return wpst_colors( $atts );
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

	$color_chip_styles = wpst_get_color_chip_styles();

	shortcode_ui_register_for_shortcode(
		'wpst_color_chip',
		array(
			'label' => esc_html__( 'WPST Color Chip', 'wp-style-tiles' ),
			'attrs' => array(
				array(
					'label'       => esc_html__( 'Chip Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a color for the chip.', 'wp-style-tiles' ),
					'attr'        => 'color_1',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Chip Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a color for the chip.', 'wp-style-tiles' ),
					'attr'        => 'color_2',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Chip Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a color for the chip.', 'wp-style-tiles' ),
					'attr'        => 'color_3',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Chip Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a color for the chip.', 'wp-style-tiles' ),
					'attr'        => 'color_4',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Chip Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a color for the chip.', 'wp-style-tiles' ),
					'attr'        => 'color_5',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Color Chip Style', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a style for the chip', 'wp-style-tiles' ),
					'attr'        => 'style',
					'type'        => 'select',
					'options'     => $color_chip_styles,
				),
				array(
					'label'       => esc_html__( 'CSS Class', 'wp-style-tile' ),
					'description' => esc_html__( 'Add an optional class for CSS styling', 'wp-style-tiles' ),
					'attr'        => 'class',
					'type'        => 'text',
				),
			),
		)
	);
}
