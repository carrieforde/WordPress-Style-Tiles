<?php
/**
 * WP Style Tiles
 *
 * Component: Patterns & Textures
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Build and return the Patterns & Textures Component.
 *
 * @since   1.0.0
 *
 * @param   array  $args  The args.
 *
 * @return  string        The HTML.
 */
function wpst_patterns_and_textures( $args ) {

	$component = 'wpst-patterns-textures';

	// Set the defaults and use them as needed.
	$defaults = array(
		'pattern_1' => '',
		'pattern_2' => '',
		'pattern_3' => '',
		'class'     => '',
	);
	$args = wp_parse_args( (array)$args, $defaults );

	// Clean up params to make them easier to use.
	$pattern_1  = $args['pattern_1'];
	$pattern_2  = $args['pattern_2'];
	$pattern_3  = $args['pattern_3'];
	$image_size = 'wpst-pattern-img';


	// Set up the patterns & textures classes.
	$classes = array();
	$classes[] = $component;
	if ( ! empty( $args['class'] ) ) {
		$classes = $args['class'];
	}

	$classes = implode( ' ', $classes );

	// Build the output.
	ob_start(); ?>

	<section class="<?php esc_attr_e( $classes ); ?>">

		<?php if ( $pattern_1 ) : ?>
		<div class="wpst-pattern-img">
			<?php echo wp_kses_post( wp_get_attachment_image( $pattern_1, $image_size ) ); ?>
		</div>
		<?php endif; ?>

		<?php if ( $pattern_2 ) : ?>
		<div class="wpst-pattern-img">
			<?php echo wp_kses_post( wp_get_attachment_image( $pattern_2, $image_size ) ); ?>
		</div>
		<?php endif; ?>

		<?php if ( $pattern_3 ) : ?>
		<div class="wpst-pattern-img">
			<?php echo wp_kses_post( wp_get_attachment_image( $pattern_3, $image_size ) ); ?>
		</div>
		<?php endif; ?>

	</section>

	<?php return ob_get_clean();
}

add_shortcode( 'wpst_patterns_and_textures', 'wpst_patterns_and_textures_shortcode' );
/**
 * Patterns & Textures shortcode.
 *
 * @since   1.0.0
 *
 * @param   array   $atts  Shortcode attributes.
 *
 * @return  string         Shortcode output.
 */
function wpst_patterns_and_textures_shortcode( $atts = array(), $content ) {

	return wpst_patterns_and_textures( $atts );
}

add_action( 'register_shortcode_ui', 'wpst_patterns_and_textures_shortcode_ui' );
/**
 * Register UI for Shortcake integration.
 *
 * @since 1.0.0
 */
function wpst_patterns_and_textures_shortcode_ui() {

	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		return;
	}

	shortcode_ui_register_for_shortcode(
		'wpst_patterns_and_textures',
		array(
			'label' => esc_html__( 'WPST Patterns and Textures', 'wp-style-tiles' ),
			'attrs' => array(
				array(
					'label'       => esc_html__( 'Pattern or Texture', 'wp-style-tiles' ),
					'description' => esc_html__( 'Upload a pattern or texture.', 'wp-style-tiles' ),
					'attr'        => 'pattern_1',
					'type'        => 'attachment',
				),
				array(
					'label'       => esc_html__( 'Pattern or Texture', 'wp-style-tiles' ),
					'description' => esc_html__( 'Upload a pattern or texture.', 'wp-style-tiles' ),
					'attr'        => 'pattern_2',
					'type'        => 'attachment',
				),
				array(
					'label'       => esc_html__( 'Pattern or Texture', 'wp-style-tiles' ),
					'description' => esc_html__( 'Upload a pattern or texture.', 'wp-style-tiles' ),
					'attr'        => 'pattern_3',
					'type'        => 'attachment',
				),
			),
		)
	);
}
