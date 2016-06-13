<?php
/**
 * WP Style Tiles
 *
 * Component: Brand Word
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Build and return the Brand Word Component.
 *
 * @since   1.0.0
 *
 * @param   array  $args  The args.
 *
 * @return  string        The HTML.
 */
function wpst_brand_word( $args ) {

	$component = 'wpst-brand-word';

	// Set the defaults and use them as needed.
	$defaults = array(
		'brand_word'  => '',
		'font_color'  => '',
		'font_size'   => '',
		'font_weight' => '400',
		'font_style'  => 'normal',
		'class'       => '',
	);
	$args = wp_parse_args( (array)$args, $defaults );

	// Clean up params to make them easier to use.
	$brand_word = $args['brand_word'];
	$font_color = $args['font_color'];
	$font_size  = $args['font_size'];
	$font_weight = $args['font_weight'];
	$font_style  = $args['font_style'];

	// Set up the brand word classes.
	$classes = array();
	$classes[] = 'wpst-brand-word';
	if( ! empty( $args['class'] ) ) {
		$classes[] = $args['class'];
	}

	$classes = implode( ' ', $classes );

	// Set up the inline styles.
	$styles = array();
	if ( ! empty( $font_color ) ) {
		$styles[] = 'color: ' . $font_color . ';';
	}
	if ( 1 < (int)$font_size ) {
		$styles[] = 'font-size: ' . (int)$font_size . 'px;';
	}
	if ( 1 < (int)$font_weight ) {
		$styles[] = 'font-weight: ' . (int)$font_weight . ';';
	}
	if( ! empty( $font_style ) ) {
		$styles[] = 'font-style: ' . $font_style . ';';
	}
	$styles = implode( ' ', $styles );

	$style_attr = ( ! empty( $styles ) ) ? ' style="' . esc_attr( $styles ) . '"' : '';

	// Remove paragraphs & extra whitespace from brand word text.
	$brand_word = wp_kses( trim( $args['brand_word'] ), '<p>' );

	// Build the output.
	$output = sprintf( '<span class="%s"%s>%s</span>',
		esc_attr( $classes ),
		$style_attr,
		$brand_word
	);

	return $output;
}

add_shortcode( 'wpst_brand_word', 'wpst_brand_word_shortcode' );
/**
 * Brand Word shortcode.
 *
 * @since   1.0.0
 *
 * @param   array   $atts  Shortcode attributes.
 *
 * @return  string         Shortcode output.
 */
function wpst_brand_word_shortcode( $atts = array(), $content ) {

	if ( $content ) {
		$atts['brand_word'] = $content;
	}

	return wpst_brand_word( $atts );
}

add_action( 'register_shortcode_ui', 'wpst_brand_word_shortcode_ui' );
/**
 * Register UI for Shortcake integration.
 *
 * @since 1.0.0
 */
function wpst_brand_word_shortcode_ui() {

	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		return;
	}

	shortcode_ui_register_for_shortcode(
		'wpst_brand_word',
		array(
			'label' => esc_html__( 'WPST Brand Word', 'wp-style-tiles' ),
			'attrs' => array(
				array(
					'label'       => esc_html__( 'Brand Word', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter a word to describe the brand', 'wp-style-tiles' ),
					'attr'        => 'brand_word',
					'type'        => 'text',
				),
				array(
					'label'       => esc_html__( 'Font Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Choose a color for the word.', 'wp-style-tiles' ),
					'attr'        => 'font_color',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Font Size', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter a number for the font size.', 'wp-style-tiles' ),
					'attr'        => 'font_size',
					'type'        => 'text',
				),
				array(
					'label'       => esc_html__( 'Font Weight', 'wp-style-tiles' ),
					'description' => esc_html__( 'Choose a font weight.', 'wp-style-tiles' ),
					'attr'        => 'font_weight',
					'type'        => 'select',
					'options'     => array(
						'400'     => esc_html__( 'Normal (400)', 'wp-style-tiles' ),
						'100'     => esc_html__( 'Extra Light (100)', 'wp-style-tiles' ),
						'300'     => esc_html__( 'Light (300)', 'wp-style-tiles' ),
						'700'     => esc_html__( 'Bold (700)', 'wp-style-tiles' ),
					),
				),
				array(
					'label'       => esc_html__( 'Font Style', 'wp-style-tiles' ),
					'description' => esc_html__( 'Choose a font style', 'wp-style-tiles' ),
					'attr'        => 'font_style',
					'type'        => 'select',
					'options'     => array(
						'normal'  => esc_html__( 'Normal', 'wp-style-tiles' ),
						'italic'  => esc_html__( 'Italic', 'wp-style-tiles' ),
					),
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
