<?php
/**
 * WP Style Tiles plugin template tags.
 *
 * @package wp-style-tiles
 * @since 1.0.0
 */

/**
 * Build and return the WordPress Style Tile post.
 *
 * @since 1.0.0
 *
 * @return  string   The HTML.
 */
function wpst_style_tile_output( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_id();
	}

	$background  = get_post_meta( $post_id, 'background_image', true );
	$header      = get_post_meta( $post_id, 'logo', true );
	$colors      = get_post_meta( $post_id, 'colors', true );
	$patterns    = get_post_meta( $post_id, 'patterns', true );
	$brand_words = get_post_meta( $post_id, 'brand_adjectives', true );
	$typography  = get_post_meta( $post_id, 'typography', true );

	ob_start(); ?>

	<div class="wpst-header"><?php wp_get_attachment_image( $header, 'full' ); ?></div>

	<div class="wpst-colors">

		<?php

		if ( $colors ) {

			for ( $i = 0; $i < $colors; $i++ ) {

				$color = get_post_meta( $post_id, 'colors_' . $i . '_color', true );

				echo '<div class="wpst-color" style="background-color:' . esc_attr( $color ) . '></div>';
			}
		}

		?>

	</div>

	<div class="wpst-patterns">

		<?php

		if ( $patterns ) {

			for ( $i = 0; $i < $patterns; $i++ ) {

				$pattern = get_post_meta( $post_id, 'patterns_' . $i . '_pattern', true );

				echo '<div class="wpst-pattern>' . wp_get_attachment_image( $pattern, 'medium' ) . '</div>';
			}
		}

		?>
	</div>

	<div class="wpst-brand-words">

		<?php

		if( $brand_words ) {

			for ( $i = 0; $i < $brand_words; $i++ ) {

				$word  = get_post_meta( $post_id, 'brand_adjectives_' . $i . '_adjective', true );
				$size  = get_post_meta( $post_id, 'brand_adjectives_' . $i . '_font_size', true );
				$color = get_post_meta( $post_id, 'brand_adjectives_' . $i . '_font_color', true );

				echo '<span class="wpst-adjective" style="color:' . esc_attr( $color ); . 'font-size: ' . esc_attr( $size ); . '">' . esc_attr( $word ); . '</span>';
			}
		}

		?>

	</div>

	<?php return ob_get_clean();
}

add_shortcode( 'wpst_style_tile', 'wpst_style_tile_shortcode' );
/**
 * A shortcode to output the Style Tile CPT.
 *
 * Example: [wpst_style_tile]
 *
 * @since 1.0.0
 */
function wpst_style_tile_shortcode() {

	echo wpst_style_tile_output();
}
