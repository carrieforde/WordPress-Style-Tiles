<?php
/**
 * WP Style Tiles
 *
 * Component: Icons
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Build and return the Icons Component.
 *
 * @since   1.0.0
 *
 * @param   array  $args  The args.
 *
 * @return  string        The HTML.
 */
function wpst_icons( $args ) {

	$component = 'wpst-icons';

	// Set the defaults and use them as needed.
	$defaults = array(
		'icon_1' => '',
		'icon_2' => '',
		'icon_3' => '',
		'class'  => '',
	);
	$args = wp_parse_args( (array)$args, $defaults );

	// Clean up params to make them easier to use.
	$icon_1  = $args['icon_1'];
	$icon_2  = $args['icon_2'];
	$icon_3  = $args['icon_3'];
	$image_size = 'wpst-icon';


	// Set up the icon classes.
	$classes = array();
	$classes[] = $component;
	if ( ! empty( $args['class'] ) ) {
		$classes = $args['class'];
	}

	$classes = implode( ' ', $classes );

	// Build the output.
	ob_start(); ?>

	<section class="<?php esc_attr_e( $classes ); ?>">

		<?php if ( $icon_1 ) : ?>
		<div class="wpst-icon-img">
			<?php echo wp_kses_post( wp_get_attachment_image( $icon_1, $image_size ) ); ?>
		</div>
		<?php endif; ?>

		<?php if ( $icon_2 ) : ?>
		<div class="wpst-icon-img">
			<?php echo wp_kses_post( wp_get_attachment_image( $icon_2, $image_size ) ); ?>
		</div>
		<?php endif; ?>

		<?php if ( $icon_3 ) : ?>
		<div class="wpst-icon-img">
			<?php echo wp_kses_post( wp_get_attachment_image( $icon_3, $image_size ) ); ?>
		</div>
		<?php endif; ?>

	</section>

	<?php return ob_get_clean();
}

add_shortcode( 'wpst_icons', 'wpst_icons_shortcode' );
/**
 * Icons shortcode.
 *
 * @since   1.0.0
 *
 * @param   array   $atts  Shortcode attributes.
 *
 * @return  string         Shortcode output.
 */
function wpst_icons_shortcode( $atts = array(), $content ) {

	return wpst_icons( $atts );
}

add_action( 'register_shortcode_ui', 'wpst_icons_shortcode_ui' );
/**
 * Register UI for Shortcake integration.
 *
 * @since 1.0.0
 */
function wpst_icons_shortcode_ui() {

	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		return;
	}

	shortcode_ui_register_for_shortcode(
		'wpst_icons',
		array(
			'label' => esc_html__( 'WPST Icons', 'wp-style-tiles' ),
			'attrs' => array(
				array(
					'label'       => esc_html__( 'Icon', 'wp-style-tiles' ),
					'description' => esc_html__( 'Upload an icon.', 'wp-style-tiles' ),
					'attr'        => 'icon_1',
					'type'        => 'attachment',
				),
				array(
					'label'       => esc_html__( 'Icon', 'wp-style-tiles' ),
					'description' => esc_html__( 'Upload an icon.', 'wp-style-tiles' ),
					'attr'        => 'icon_2',
					'type'        => 'attachment',
				),
				array(
					'label'       => esc_html__( 'Icon', 'wp-style-tiles' ),
					'description' => esc_html__( 'Upload an icon.', 'wp-style-tiles' ),
					'attr'        => 'icon_3',
					'type'        => 'attachment',
				),
			),
		)
	);
}
