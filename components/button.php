<?php
/**
 * WP Style Tiles
 *
 * Component: Button
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Build and return the Button Component.
 *
 * @since   1.0.0
 *
 * @param   array  $args  The args.
 *
 * @return  string        The HTML.
 */
function wpst_button( $args = array() ) {

	$component = 'wpst-button';

	// Set the defaults and use them as needed.
	$defaults = array(
		'button_text'             => '',
		'background_color'        => '',
		'background_color_hover'  => '',
		'border_color'            => '',
		'border_color_hover'      => '',
		'border_weight'           => '',
		'font_color'              => '',
		'font_color_hover'        => '',
		'font_size'               => '',
		'font_weight'             => '',
		'text_transform'          => '',
		'class'                   => '',
	);
	$args = wp_parse_args( $args, $defaults );

	// Clean up params to make them easier to use.
	$button_text             = $args['button_text'];
	$background_color        = $args['background_color'];
	$background_color_hover  = $args['background_color_hover'];
	$border_color            = $args['border_color'];
	$border_color_hover      = $args['border_color_hover'];
	$border_weight           = $args['border_weight'];
	$font_color              = $args['font_color'];
	$font_color_hover        = $args['font_color_hover'];
	$font_size               = $args['font_size'];
	$font_weight             = $args['font_weight'];
	$text_transform          = $args['text_transform'];
	$class                   = $args['class'];

	// Set up the button classes.
	$classes = array();
	$classes[] = $component;
	if ( ! empty( $class ) ) {
		$clases[] = $class;
	}

	$classes = implode( ' ', $classes );

	// Set up the button styles.
	$styles = array();
	if ( ! empty( $background_color ) ) {
		$styles[] = 'background-color: ' . $background_color . ';';
	}
	if ( ! empty( $border_color ) ) {
		$styles[] = 'border-color: ' . $border_color . ';';
	}
	if ( 1 < (int)$border_weight ) {
		$styles[] = 'border-width: ' . (int) $border_weight . 'px;';
	}
	if ( ! empty( $font_color ) ) {
		$styles[] = 'color: ' . $font_color . ';';
	}
	if ( 1 < (int)$font_size ) {
		$styles[] = 'font-size: ' . (int) $font_size . 'px;';
	}
	if ( ! empty( $font_weight ) ) {
		$styles[] = 'font-weight: ' . (int) $font_weight . ';';
	}
	if ( ! empty( $text_transform ) ) {
		$styles[] = 'text-transform: ' . $text_transform . ';';
	}

	$styles = implode( ' ', $styles );

	// Remove paragraphs & extra whitespace from button text.
	$button_text = wp_kses( trim( $button_text ), '<p>' );

	// Build the output.
	ob_start(); ?>

	<section class="wp-style-tile-button">

		<?php

		$output = sprintf( '<button class="%s" style="%s" onmouseover="this.style.backgroundColor=\'%s\'; this.style.borderColor=\'%s\'; this.style.color=\'%s\';" onmouseout="this.style.backgroundColor=\'%s\'; this.style.borderColor=\'%s\'; this.style.color=\'%s\';">%s</button>',
			esc_attr( $classes ),
			esc_attr( $styles ),
			esc_js( $background_color_hover),
			esc_js( $border_color_hover ),
			esc_js( $font_color_hover ),
			esc_js( $background_color ),
			esc_js( $border_color ),
			esc_js( $font_color ),
			esc_html( $button_text )
		);

		echo $output; ?>

	</section>

	<?php return ob_get_clean();
}

add_shortcode( 'wpst_button', 'wpst_button_shortcode' );
/**
 * Button Shortcode.
 *
 * @since   1.0.0
 *
 * @param   array   $atts  Shortcode attributes.
 *
 * @return  string         Shortcode output.
 */
function wpst_button_shortcode( $atts = array(), $content ) {
	if ( $content ) {
		$atts['button_text'] = $content;
	}

	return wpst_button( $atts );
}

add_action( 'register_shortcode_ui', 'wpst_button_shortcode_ui' );
/**
 * Register UI for Shortcake integration.
 *
 * @since 1.0.0
 */
function wpst_button_shortcode_ui() {

	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		return;
	}

	$font_weights    = wpst_get_font_weights();
	$text_transforms = wpst_get_text_transforms();

	shortcode_ui_register_for_shortcode(
		'wpst_button',
		array(
			'label' => esc_html__( 'WPST Button', 'wp-style-tiles' ),
			'attrs' => array(
				array(
					'label'        => esc_html__( 'Button Text', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Enter the button text', 'wp-style-tiles' ),
					'attr'         => 'button_text',
					'type'         => 'text',
				),
				array(
					'label'        => esc_html__( 'Background Color', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Select a background color for the button', 'wp-style-tiles' ),
					'attr'         => 'background_color',
					'type'         => 'color',
				),
				array(
					'label'        => esc_html__( 'Background Color Hover', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Select a hover background color for the button', 'wp-style-tiles' ),
					'attr'         => 'background_color_hover',
					'type'         => 'color',
				),
				array(
					'label'        => esc_html__( 'Border Color', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Select a border color for the button', 'wp-style-tiles' ),
					'attr'         => 'border_color',
					'type'         => 'color',
				),
				array(
					'label'        => esc_html__( 'Border Hover Color', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Select a border hover color for the button', 'wp-style-tiles' ),
					'attr'         => 'border_color_hover',
					'type'         => 'color',
				),
				array(
					'label'        => esc_html__( 'Border Weight', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Select a border weight', 'wp-style-tiles' ),
					'attr'         => 'border_weight',
					'type'         => 'number'
				),
				array(
					'label'        => esc_html__( 'Font Color', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Select a font color', 'wp-style-tiles' ),
					'attr'         => 'font_color',
					'type'         => 'color',
				),
				array(
					'label'        => esc_html__( 'Font Hover Color', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Select a font hover color', 'wp-style-tiles' ),
					'attr'         => 'font_color_hover',
					'type'         => 'color',
				),
				array(
					'label'        => esc_html__( 'Font Size', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Enter a font size for the button text', 'wp-style-tiles' ),
					'attr'         => 'font_size',
					'type'         => 'number',
				),
				array(
					'label'        => esc_html__( 'Font Weight', 'wp-style-tiles' ),
					'description'  => esc_html__( 'Enter a font weight for the button text', 'wp-style-tiles' ),
					'attr'         => 'font_weight',
					'type'         => 'select',
					'options'      => $font_weights,
				),
				array(
					'label'       => esc_html__( 'Text Transform', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select a text transform', 'wp-style-tiles' ),
					'attr'        => 'text_transform',
					'type'        => 'select',
					'options'     => $text_transforms,

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
