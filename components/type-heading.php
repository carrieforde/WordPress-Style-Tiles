<?php
/**
 * WP Style Tiles
 *
 * Component: Heading
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Build and return the Heading Component.
 *
 * @since   1.0.0
 *
 * @param   array  $args  The args.
 *
 * @return  string        The HTML.
 */
function wpst_heading( $args = array() ) {

	$component = 'wpst-heading';

	// Set the defaults and use them as needed.
	$defaults = array(
		'heading_text'      => '',
		'heading_level'     => 'h1',
		'heading_color'     => '',
		'heading_font'      => '',
		'heading_size'      => '',
		'heading_style'     => '',
		'heading_weight'    => '',
		'heading_transform' => '',
		'class'             => '',
	);
	$args = wp_parse_args( $args, $defaults );

	// Clean up params to make them easier to use.
	$heading_text      = $args['heading_text'];
	$heading_level     = $args['heading_level'];
	$heading_color     = $args['heading_color'];
	$heading_font      = $args['heading_font'];
	$heading_size      = $args['heading_size'];
	$heading_style     = $args['heading_style'];
	$heading_weight    = $args['heading_weight'];
	$heading_transform = $args['heading_transform'];
	$class             = $args['class'];

	// Set up the heading classes.
	$classes = array();
	$classes[] = $component;
	if ( ! empty( $class ) ) {
		$classes[] = $class;
	}

	$classes = implode( ' ', $classes );

	$styles = array();
	if ( ! empty( $heading_color ) ) {
		$styles[] = 'color: ' . $heading_color . ';';
	}
	if ( 1 < (int) $heading_size ) {
		$styles[] = 'font-size: ' . (int) $heading_size . 'px;';
	}
	if ( ! empty( $heading_style ) ) {
		$styles[] = 'font-style: ' . $heading_style . ';';
	}
	if ( ! empty( $heading_weight ) ) {
		$styles[] = 'font-weight: ' . (int) $heading_weight . ';';
	}
	if ( ! empty( $heading_transform ) ) {
		$styles[] = 'text-transform: ' . $heading_transform . ';';
	}

	$styles = implode( ' ', $styles );

	// Remove paragraphs & extra whitespace from heading text.
	$heading_text = wp_kses( trim( $heading_text ), '<p>' );

	// Build the output.
	ob_start(); ?>

	<heading class="wpst-heading-wrap">

		<?php

		$output = sprintf( '<%s class="%s" style="%s">%s</%s>',
			esc_attr( $heading_level ),
			esc_attr( $classes ),
			esc_attr( $styles ),
			esc_html( $heading_text ),
			esc_attr( $heading_level )
		);

		echo $output; // WPCS: XSS ok.
		?>

		<span class="wpst-heading-attributes">Font: <?php esc_html_e( $heading_font ); ?>, <?php esc_attr_e( $heading_color ); ?></span>

	</heading>

	<?php return ob_get_clean();
}

add_shortcode( 'wpst_heading', 'wpst_heading_shortcode' );
/**
 * Heading shortcode.
 *
 * @since   1.0.0
 *
 * @param   array   $atts  Shortcode attributes.
 *
 * @return  string         Shortcode output.
 */
function wpst_heading_shortcode( $atts = array(), $content ) {

	if ( $content ) {
		$atts['heading_text'] = $content;
	}

	return wpst_heading( $atts );
}

add_action( 'register_shortcode_ui', 'wpst_heading_shortcode_ui' );
/**
 * Register UI for Shortcake integration.
 *
 * @since 1.0.0
 */
function wpst_heading_shortcode_ui() {

	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		return;
	}

	$heading_levels  = wpst_get_heading_levels();
	$font_styles     = wpst_get_font_styles();
	$font_weights    = wpst_get_font_weights();
	$text_transforms = wpst_get_text_transforms();

	shortcode_ui_register_for_shortcode(
		'wpst_heading',
		array(
			'label' => esc_html__( 'WPST Heading', 'wp-style-tiles' ),
			'attrs' => array(
				array(
					'label'       => esc_html__( 'Heading Text', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter the heading text', 'wp-style-tiles' ),
					'attr'        => 'heading_text',
					'type'        => 'text',
				),
				array(
					'label'       => esc_html__( 'Heading Level', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a heading level', 'wp-style-tiles' ),
					'attr'        => 'heading_level',
					'type'        => 'select',
					'options'     => $heading_levels,
				),
				array(
					'label'       => esc_html__( 'Heading Font', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter the name of the font', 'wp-style-tiles' ),
					'attr'        => 'heading_font',
					'type'        => 'text',
				),
				array(
					'label'       => esc_html__( 'Heading Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a color for the heading', 'wp-style-tiles' ),
					'attr'        => 'heading_color',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Heading Size', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter a size for the heading', 'wp-style-tiles' ),
					'attr'        => 'heading_size',
					'type'        => 'number',
				),
				array(
					'label'       => esc_html__( 'Heading Style', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a font style for the heading', 'wp-style-tiles' ),
					'attr'        => 'heading_style',
					'type'        => 'select',
					'options'     => $font_styles,
				),
				array(
					'label'       => esc_html__( 'Heading Weight', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a font weight.', 'wp-style-tiles' ),
					'attr'        => 'heading_weight',
					'type'        => 'select',
					'options'     => $font_weights,
				),
				array(
					'label'       => esc_html__( 'Text Transform', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a text transform.', 'wp-style-tiles' ),
					'attr'        => 'heading_transform',
					'type'        => 'select',
					'options'     => $text_transforms,
				),
				array(
					'label'       => esc_html__( 'CSS Class', 'wp-style-tiles' ),
					'description' => esc_html__( 'Add an optional class for CSS styling.', 'wp-style-tiles' ),
					'attr'        => 'class',
					'type'        => 'text',
				),
			),
		)
	);
}
