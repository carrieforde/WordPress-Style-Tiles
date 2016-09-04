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
function wpst_button( $args ) {

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
		'class'                   => '',
	);
	$args = wp_parse_args( (array)$args, $defaults );

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
	$class                   = $args['class'];

	// Set up the button classes.
	$classes = array();
	$classes[] = $component;
	if ( ! empty( $class ) ) {
		$clases[] = $class;
	}

	$classes = implode( ' ', $classes );

	// Remove paragraphs & extra whitespace from button text.
	$button_text = wp_kses( trim( $button_text ), '<p>' );

	// Build the output.
	ob_start(); ?>

	<section class="wp-style-tile-button">

		<style>
			.<?php esc_attr_e( $component ) ?> {
				background-color: <?php esc_attr_e( $background_color ); ?>;
				border: <?php esc_attr_e( $border_weight ); ?>px solid <?php esc_attr_e( $border_color ); ?>;
				color: <?php esc_attr_e( $font_color ); ?>;
				font-size: <?php esc_attr_e( $font_size ); ?>;
				font-weight: <?php esc_attr_e( $font_weight ); ?>;
			}

			.<?php esc_attr_e( $component ); ?>:hover {
				background-color: <?php esc_attr_e( $background_color_hover ); ?>;
				border: <?php esc_attr_e( $border_weight ); ?>px solid <?php esc_attr_e( $border_color_hover ); ?>;
				color: <?php esc_attr_e( $font_color_hover ); ?>
			}
		</style>

		<button class="<?php esc_attr_e( $classes ); ?>"><?php esc_html_e( $button_text ); ?></button>

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
					'type'         => 'number',
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
