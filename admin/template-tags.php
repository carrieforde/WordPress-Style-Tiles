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

	$background     = get_post_meta( $post_id, 'background_image', true );
	$header         = get_post_meta( $post_id, 'logo', true );
	$colors         = get_post_meta( $post_id, 'colors', true );
	$patterns       = get_post_meta( $post_id, 'patterns', true );
	$brand_words    = get_post_meta( $post_id, 'brand_adjectives', true );
	$typography     = get_post_meta( $post_id, 'typography', true );
	$custom_css     = get_post_meta( $post_id, 'custom_css', true );
	$image_header   = 'wpst_header_img';
	$image_pattern  = 'wpst_pattern_img';

	ob_start(); ?>

	<div class="wpst-style-tile">

		<style>
			<?php echo wp_kses( $custom_css, 'none' ); ?>
		</style>

		<div class="wpst-header"><?php echo wp_get_attachment_image( $header, 'medium' ) ?></div>

		<div class="wpst-colors">

			<h2 class="wpst-style-tile-heading">Possible Colors</h2>

			<?php

			if ( $colors ) {

				for ( $i = 0; $i < $colors; $i++ ) {

					$color = get_post_meta( $post_id, 'colors_' . $i . '_color', true );

					echo '<div class="wpst-color" style="background-color:' . esc_attr( $color ) . ';"></div>';
				}
			}

			?>

		</div>

		<div class="wpst-patterns">

			<h2 class="wpst-style-tile-heading">Patterns & Textures</h2>

			<?php

			if ( $patterns ) {

				for ( $i = 0; $i < $patterns; $i++ ) {

					$pattern = get_post_meta( $post_id, 'patterns_' . $i . '_pattern', true );

					?>

					<div class="wpst-pattern"><?php echo wp_get_attachment_image( $pattern, $image_pattern ); ?></div>

					<?php
				}
			}

			?>
		</div>

		<div class="wpst-brand-words">

			<h2 class="wpst-style-tile-heading">Brand Words</h2>

			<?php

			if( $brand_words ) {

				for ( $i = 0; $i < $brand_words; $i++ ) {

					$word  = get_post_meta( $post_id, 'brand_adjectives_' . $i . '_adjective', true );
					$size  = get_post_meta( $post_id, 'brand_adjectives_' . $i . '_font_size', true );
					$color = get_post_meta( $post_id, 'brand_adjectives_' . $i . '_font_color', true );

					echo '<span class="wpst-brand-word wpst-word-' . ($i + 1) . '" style="color:' . esc_attr( $color ) . '; font-size: ' . esc_attr( $size ) . 'px;">' . esc_attr( $word ) . '</span>';
				}
			}

			?>

		</div>

		<div class="wpst-typography">

			<h2 class="wpst-style-tile-heading">Typography</h2>

			<?php
			foreach ( ( array ) $typography as $count => $typography ) {

				switch ( $typography ) {

					case 'heading' :

						$text = get_post_meta( $post_id, 'typography_' . $count . '_heading_text', true );
						$font = get_post_meta( $post_id, 'typography_' . $count . '_heading_font', true );
						$size = get_post_meta( $post_id, 'typography_' . $count . '_heading_size', true );
						$color = get_post_meta( $post_id, 'typography_' . $count . '_heading_color', true );

						?>

						<heading class="wpst-type-headings">
							<h1 class="wpst-type-heading" style="color: <?php echo esc_attr( $color ); ?>; font-family: '<?php echo esc_attr( $font['font'] ); ?>'; font-size: <?php echo esc_attr( $size ) ?>px;"><?php echo esc_attr( $text ); ?></h1>
						</heading>

						<p class="wpst-font-info">Font: <?php echo esc_attr( $font['font'] ); ?>, <?php echo esc_attr( $size ); ?>px, <?php echo esc_attr( $color ); ?></p>

					<?php

					break;

					case 'sub_heading' :

						$text  = get_post_meta( $post_id, 'typography_' . $count . '_sub_heading_text', true );
						$font  = get_post_meta( $post_id, 'typography_' . $count . '_sub_heading_font', true );
						$size  = get_post_meta( $post_id, 'typography_' . $count . '_sub_heading_size', true );
						$color = get_post_meta( $post_id, 'typography_' . $count . '_sub_heading_color', true );

						?>

						<heading class="wpst-type-headings">
							<h2 class="wpst-type-sub-heading" style="color: <?php echo esc_attr( $color ); ?>; font-family: '<?php echo esc_attr( $font['font'] ); ?>'; font-size: <?php echo esc_attr( $size ) ?>px;"><?php echo esc_attr( $text ); ?></h2>
						</heading>

						<p class="wpst-font-info">Font: <?php echo esc_attr( $font['font'] ); ?>, <?php echo esc_attr( $size ); ?>px, <?php echo esc_attr( $color ); ?></p>

					<?php

					break;

					case 'paragraph_links' :

						$font    = get_post_meta( $post_id, 'typography_' . $count . '_paragraph_font', true );
						$size    = get_post_meta( $post_id, 'typography_' . $count . '_paragraph_font_size', true );
						$p_color = get_post_meta( $post_id, 'typography_' . $count . '_paragraph_color', true );
						$a_color = get_post_meta( $post_id, 'typography_' . $count . '_link_color', true );
						$a_hover_color = get_post_meta( $post_id, 'typography_' . $count . '_link_hover_color', true );
						$text_decoration = get_post_meta( $post_id, 'typography_' . $count . '_link_decoration', true );

						?>

						<p class="wpst-type-paragraph" style="color: <?php echo esc_attr( $p_color ); ?>; font-family: <?php echo esc_attr( $font['font'] ); ?>; font-size: <?php echo esc_attr( $size ); ?>px;">Nonumy mollis usu id. Ei quem enim invidunt nam, nec ne lorem imperdiet intellegebat. Repudiandae signiferumque an usu, id semper commune adipiscing cum, nam enim dicat melius ne. Est eu habeo utinam primis, eu causae docendi interpretaris mel, at est quot simul dissentiet. Ad vim atqui epicuri officiis. Sed in quod adipisci.</p>

						<p class="wpst-type-paragraph" style="font-family: <?php echo esc_attr( $font['font'] ); ?>; font-size: <?php echo esc_attr( $size ); ?>px;"><a href="#" class="wpst-type-link" style="color: <?php echo esc_attr( $a_color ) ?>; text-decoration: <?php echo esc_attr( $text_decoration ); ?>; border: <?php echo esc_attr( $text_decoration ); ?>; box-shadow: <?php echo esc_attr( $text_decoration ); ?>;" onmouseover="this.style.color='<?php echo esc_js( $a_hover_color ); ?>'" onmouseout="this.style.color='<?php echo esc_js( $a_color ); ?>'">Click here for more information.</a></p>

						<p class="wpst-font-info">Font: <?php echo esc_attr( $font['font'] ); ?>, <?php echo esc_attr( $size ); ?>px, <?php echo esc_attr( $color ); ?></p>

						<?php

					break;
				}
			}

			?>

		</div>

		<div class="wpst-custom-css">

			<a class="wpst-custom-css-toggle">Add Custom CSS</a>

			<?php

			$options = array(
				'fields'       => array( 'custom_css' ),
				'submit_value' => __( 'Save CSS', 'wp-style-tiles' ),
			);
			$user    = current_user_can( 'edit_post' );

			if ( $user ) {

				acf_form( $options );
			}

			?>

		</div>

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
