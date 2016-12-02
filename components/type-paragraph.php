<?php
/**
 * WP Style Tiles
 *
 * Component: Paragraph
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Build and retun the Paragraph Component.
 *
 * @since   1.0.0
 *
 * @param   array  $args  The args.
 *
 * @return  string        The HTML
 */
function wpst_paragraph( $args = array() ) {

	$component = 'wpst-paragraph';

	// Set the defaults and use them as needed.
	$defaults = array(
		'paragraph_ipsum'   => 'traditional',
		'paragraph_color'   => '',
		'paragraph_font'    => '',
		'paragraph_size'    => '',
		'paragraph_weight'  => '',
		'class'             => '',
	);
	$args = wp_parse_args( $args, $defaults );

	// Clean up params to make them easier to use.
	$ipsum   = strtolower( $args['paragraph_ipsum'] );
	$color   = $args['paragraph_color'];
	$font    = $args['paragraph_font'];
	$size    = $args['paragraph_size'];
	$weight  = $args['paragraph_weight'];
	$class   = $args['class'];

	// Set up the paragraph classes.
	$classes = array();
	$classes[] = $component;
	if ( ! empty( $class ) ) {
		$classes[] = $class;
	}

	$classes = implode( ' ', $classes );

	// Build the styles.
	$styles = array();
	if ( ! empty( $color ) ) {
		$styles[] = 'color: ' . $color . ';';
	}
	if ( 1 < (int) $size ) {
		$styles[] = 'font-size: ' . (int) $size . 'px;';
	}
	if ( 1 < (int) $weight ) {
		$styles[] = 'font-weight: ' . (int) $weight . ';';
	}

	$styles = implode( ' ', $styles );

	// Build the output.
	ob_start(); ?>

	<section class="wpst-paragraph-wrap">

		<p class="<?php esc_attr_e( $classes ); ?>" style="<?php esc_attr_e( $styles ); ?>">
			<?php echo wp_kses_post( wpst_get_ipsum_content( $ipsum ) ); ?>
		</p>

		<span class="wpst-paragraph-attributes">Font: <?php esc_html_e( $font ); ?>, <?php esc_attr_e( $color ); ?></span>

	</section>

	<?php return ob_get_clean();
}

add_shortcode( 'wpst_paragraph', 'wpst_paragraph_shortcode' );
/**
 * Paragraph shortcode.
 *
 * @since   1.0.0
 *
 * @param   array   $atts  Shortcode attributes.
 *
 * @return  string         Shortcode output.
 */
function wpst_paragraph_shortcode( $atts = array(), $content ) {

	if ( $content ) {
		$atts['paragraph_ipsum'] = $content;
	}

	return wpst_paragraph( $atts );
}

add_action( 'register_shortcode_ui', 'wpst_paragraph_shortcode_ui' );
/**
 * Register UI for Shortcake integration.
 *
 * @since 1.0.0
 */
function wpst_paragraph_shortcode_ui() {

	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		return;
	}

	$ipsum_choices = wpst_get_ipsum_choices();
	$font_weights  = wpst_get_font_weights();

	shortcode_ui_register_for_shortcode(
		'wpst_paragraph',
		array(
			'label' => esc_html__( 'WPST Paragraph', 'wp-style-tiles' ),
			'attrs' => array(
				array(
					'label'       => esc_html__( 'Paragraph Ipsum', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select the type of ipsum to use. (Warning: Samuel L Ipsum uses strong language)', 'wp-style-tiles' ),
					'attr'        => 'paragraph_ipsum',
					'type'        => 'select',
					'options'     => $ipsum_choices,
				),
				array(
					'label'       => esc_html__( 'Paragraph Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Choose a color for the paragraph text', 'wp-style-tiles' ),
					'attr'        => 'paragraph_color',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Paragraph Font', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter the paragraph font', 'wp-style-tiles' ),
					'attr'        => 'paragraph_font',
					'type'        => 'text',
				),
				array(
					'label'       => esc_html__( 'Paragraph Font Size', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter the font size for the paragraph text.', 'wp-style-tiles' ),
					'attr'        => 'paragraph_size',
					'type'        => 'number',
				),
				array(
					'label'       => esc_html__( 'Paragraph Font Weight', 'wp-style-tiles' ),
					'description' => esc_html__( 'Select the font weight', 'wp-style-tiles' ),
					'attr'        => 'paragraph_weight',
					'type'        => 'select',
					'options'     => $font_weights,
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
