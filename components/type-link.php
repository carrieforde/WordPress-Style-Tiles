<?php
/**
 * WP Style Tiles
 *
 * Component: Link
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Build and return the Link Component.
 *
 * @since   1.0.0
 *
 * @param   array  $args  The args.
 *
 * @return  string        The HTML.
 */
function wpst_link( $args = array() ) {

	$component = 'wpst-link';

	// Set the defaults and use them as needed.
	$defaults = array(
		'link_text'         => '',
		'link_color'        => '',
		'link_color_hover'  => '',
		'link_font'         => '',
		'link_weight'       => '',
		'link_decoration'   => '',
		'class'             => '',
	);
	$args = wp_parse_args( $args, $defaults );

	// Clean up params to make them easier to use.
	$link_text         = $args['link_text'];
	$link_color        = $args['link_color'];
	$link_color_hover  = $args['link_color_hover'];
	$link_font         = $args['link_font'];
	$link_weight       = $args['link_weight'];
	$link_decoration   = $args['link_decoration'];
	$class             = $args['class'];

	// Set up the link classes.
	$classes = array();
	$classes[] = $component;
	if ( ! empty( $class ) ) {
		$classes[] = $class;
	}

	$classes = implode( ' ', $classes );

	// Set up the link inline-styles.
	$styles = array();
	if ( ! empty( $link_color ) ) {
		$styles[] = 'color: ' . $link_color . ';';
	}
	if ( ! empty( $link_weight ) ) {
		$styles[] = 'font-weight: ' . $link_weight . ';';
	}
	if ( ! empty( $link_decoration ) ) {
		$styles[] = 'text-decoration: ' . $link_decoration . ';';
	}

	$styles = implode( ' ', $styles );

	// Remove paragraphs & extra whitespace from link text.
	$link_text = wp_kses( trim( $link_text ), '<p>' );

	// Build the output.
	ob_start(); ?>

	<section class="wpst-link-wrap">

		<?php
		$output = sprintf( '<a href="#" class="%s" style="%s" onmouseover="this.style.color=\'%s\'"
		onmouseout="this.style.color=\'%s\'">%s</a>',
			esc_attr( $classes ),
			esc_attr( $styles ),
			esc_js( $link_color_hover ),
			esc_js( $link_color ),
			esc_html( $link_text )
		);

		echo $output;
		?>

		<span class="wpst-link-attributes">Font: <?php esc_html_e( $link_font ); ?>, <?php esc_attr_e( $link_color ); ?></span>

	</section>

	<?php return ob_get_clean();
}

add_shortcode( 'wpst_link', 'wpst_link_shortcode' );
/**
 * Link shortcode.
 *
 * @since   1.0.0
 *
 * @param   array   $atts  Shortcode attributes.
 *
 * @return  string         Shortcode output.
 */
function wpst_link_shortcode( $atts = array(), $content ) {

	if( $content ) {
		$atts['link_text'] = $content;
	}

	return wpst_link( $atts );
}

add_action( 'register_shortcode_ui', 'wpst_link_shortcode_ui' );
/**
 * Register UI for Shortcake integration.
 *
 * @since 1.0.0
 */
function wpst_link_shortcode_ui() {

	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		return;
	}

	$font_weights      = wpst_get_font_weights();
	$text_decorations  = wpst_get_text_decorations();

	shortcode_ui_register_for_shortcode(
		'wpst_link',
		array(
			'label' => esc_html__( 'WPST Link', 'wp-style-tiles' ),
			'attrs' => array(
				array(
					'label'       => esc_html__( 'Link text', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter text for the link.', 'wp-style-tiles' ),
					'attr'        => 'link_text',
					'type'        => 'text',
				),
				array(
					'label'       => esc_html__( 'Link Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Choose a link color', 'wp-style-tiles' ),
					'attr'        => 'link_color',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Link Hover Color', 'wp-style-tiles' ),
					'description' => esc_html__( 'Choose a link hover color.', 'wp-style-tiles' ),
					'attr'        => 'link_color_hover',
					'type'        => 'color',
				),
				array(
					'label'       => esc_html__( 'Link Font', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter the name of the link font', 'wp-style-tiles' ),
					'attr'        => 'link_font',
					'type'        => 'text',
				),
				array(
					'label'       => esc_html__( 'Link Weight', 'wp-style-tiles' ),
					'description' => esc_html__( 'Enter the font weight for the link', 'wp-style-tiles' ),
					'attr'        => 'link_weight',
					'type'        => 'select',
					'options'     => $font_weights,
				),
				array(
					'label'       => esc_html__( 'Link Underline', 'wp-style-tiles' ),
					'description' => esc_html__( 'Should the link be underlined?', 'wp-style-tiles' ),
					'attr'        => 'link_decoration',
					'type'        => 'radio',
					'options'     => $text_decorations,
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
