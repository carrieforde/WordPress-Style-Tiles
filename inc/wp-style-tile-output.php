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

	$background_image = get_post_meta( $post_id, 'background_image_id', true );
	$header           = get_post_meta( $post_id, 'header_image_id', true );
	$colors           = get_post_meta( $post_id, 'colors', true );
	$brand_words      = get_post_meta( $post_id, 'brand_words', true );
	$patterns         = get_post_meta( $post_id, 'patterns', true );
	$headings         = get_post_meta( $post_id, 'heading', true );
	$subheadings      = get_post_meta( $post_id, 'sub_heading', true );
	$paragraph        = get_post_meta( $post_id, 'paragraph', true );
	$image_header     = 'wpst_header_img';
	$image_pattern    = 'wpst_pattern_img';

	ob_start(); ?>

	<div class="wpst-style-tile" style="background-image: url('<?php echo wp_get_attachment_url( $background_image, 'full' ); ?>')">

		<div class="wpst-header"><?php echo wp_get_attachment_image( $header, $image_header ); ?></div>

		<div class="wpst-colors">

			<h2 class="wpst-style-tile-heading">Colors</h2>

			<?php

			if ( $colors ) {

				foreach( $colors as $color ){

					echo '<div class="wpst-color" style="background-color: ' . $color . ';"></div>';
				}
			}

			?>
		</div>

		<div class="wpst-patterns">

			<h2 class="wpst-style-tile-heading">Patterns & Textures</h2>

			<?php
			if ( $patterns ) {

				foreach( ( array ) $patterns as $attachment_id => $attachment_url ) {

					echo '<div class="wpst-pattern">' . wp_get_attachment_image( $attachment_id, $image_pattern ) . '</div>';
				}
			}
			?>
		</div>

		<div class="wpst-brand-words">

			<h2 class="wpst-style-tile-heading">Brand Words</h2>

			<?php

			if ( $brand_words ) {

				foreach( $brand_words as $i=>$word ){

					echo '<span class="wpst-brand-word wpst-word-';
					echo $i;
					echo '" style="color: ';
					echo $word['font_color'];
					echo '; font-size: ';
					echo $word['font_size'];
					echo 'px;">';
					echo $word['brand_word'];
					echo '</span>';
				}
			}

			?>

		</div>

		<div class="wpst-typography">

			<h2 class="wpst-style-tile-heading">Typography</h2>

			<?php

				if ( $headings ) {

					foreach( ( array ) $headings as $heading ) {

						?>
						<heading class="wpst-type-headings">
							<h1 class="wpst-type-heading" style="color: <?php echo esc_attr( $heading['heading_color'] ); ?>; font-family: <?php echo esc_attr( $heading['heading_font'] ); ?>; font-size: <?php echo esc_attr( $heading['heading_size'] ); ?>px;"><?php echo esc_html( $heading['heading_text'] ); ?></h1>
						</heading>

						<p class="wpst-font-info">Font: <?php echo esc_html( $heading['heading_font'] ); ?>, <?php echo esc_html( $heading['heading_size'] ); ?>px, <?php echo esc_html( $heading['heading_color'] ); ?></p>
						<?php
					}
				}

			if ( $subheadings ) {

				foreach( ( array ) $subheadings as $subheading ){

					?>

					<heading class="wpst-type-headings">
						<h2 class="wpst-type-subheading" style="color: <?php echo esc_attr( $subheading['sub_heading_color'] ); ?>; font-family: <?php echo esc_attr( $subheading['sub_heading_font'] ); ?>; font-size: <?php echo esc_attr( $subheading['sub_heading_size'] ); ?>px;"><?php echo esc_html( $subheading['sub_heading_text'] ); ?></h2>
					</heading>

					<p class="wpst-font-info">Font: <?php echo esc_html( $subheading['sub_heading_font'] ); ?>, <?php echo esc_html( $subheading['sub_heading_size'] ); ?>px, <?php echo esc_html( $subheading['sub_heading_color'] ); ?></p>
					<?php
				}
			}

			if ( $paragraph ) {

				foreach( ( array ) $paragraph as $p ){

					?>
					<p class="wpst-type-paragraph" style="color: <?php echo esc_attr( $p['paragraph_color'] ); ?>; font-family: <?php echo esc_attr( $p['paragraph_font'] ); ?>; font-size: <?php echo esc_attr( $p['paragraph_size'] ); ?>;">
						Nonumy mollis usu id. Ei quem enim invidunt nam, nec ne lorem imperdiet intellegebat. Repudiandae signiferumque an usu, id semper commune adipiscing cum, nam enim dicat melius ne. Est eu habeo utinam primis, eu causae docendi interpretaris mel, at est quot simul dissentiet. Ad vim atqui epicuri officiis. Sed in quod adipisci.
					</p>

					<p class="wpst-type-paragraph" style="color: <?php echo esc_attr( $p['paragraph_color'] ); ?>; font-family: <?php echo esc_attr( $p['paragraph_font'] ); ?>; font-size: <?php echo esc_attr( $p['paragraph_size'] ); ?>;">
						<a href="#" class="wpst-type-link" style="color: <?php echo esc_attr( $p['link_color'] ); ?>; text-decoration: <?php echo esc_attr( $p['link_underline'] ); ?>" onmouseover="this.style.color='<?php echo esc_js( $p['link_hover_color'] ); ?>'" onmouseout="this.style.color='<?php echo esc_js( $p['link_color'] ); ?>'">Click here for more information</a>
					</p>
					<?php
				}
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
