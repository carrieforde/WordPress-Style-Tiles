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

					echo '<span class="wpst-brand-word wpst-work-' . $key . '" style="color: ' . $word['font_color'] . '; font-size: ' . $word['font_size'] . 'px;">' . $word['brand_word'] . '</span>';
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
							<h1 class="wpst-type-heading"><?php echo esc_html( $heading['heading_text'] ); ?></h1>
						</heading>

						<p class="wpst-font-info">Font: <?php echo esc_html( $heading['heading_font'] ); ?>, <?php echo esc_html( $heading['heading_size'] ); ?>px, <?php echo esc_html( $heading['heading_color'] ); ?></p>
						<?php
					}
				}

			if ( $subheadings ) {

				foreach( ( array ) $subheadings as $subheading ){

					?>

					<heading class="wpst-type-headings">
						<h2 class="wpst-type-subheading"><?php echo esc_html( $subheading['sub_heading_text'] ); ?></h2>
					</heading>

					<p class="wpst-font-info">Font: <?php echo esc_html( $subheading['sub_heading_font'] ); ?>, <?php echo esc_html( $subheading['sub_heading_size'] ); ?>px, <?php echo esc_html( $subheading['sub_heading_color'] ); ?></p>
					<?php
				}
			}

			if ( $paragraph ) {

				foreach( ( array ) $paragraph as $p ){

					?>
					<p class="wpst-type-paragraph">
						Nonumy mollis usu id. Ei quem enim invidunt nam, nec ne lorem imperdiet intellegebat. Repudiandae signiferumque an usu, id semper commune adipiscing cum, nam enim dicat melius ne. Est eu habeo utinam primis, eu causae docendi interpretaris mel, at est quot simul dissentiet. Ad vim atqui epicuri officiis. Sed in quod adipisci.
					</p>

					<p class="wpst-type-paragraph">
						<a href="#" class="wpst-type-link">Click here for more information</a>
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

add_action( 'wp_head', 'wpst_style_tile_style_output' );
/**
 * Move the Style Tile styling to style tags in the <head>
 */
function wpst_style_tile_style_output( $post_id = 0 ) {

	if ( ! $post_id ) {

		$post_id = get_the_id();
	}

	if ( 'style-tile' == get_post_type() ) {

		$heading          = get_post_meta( $post_id, 'heading', true );
		$heading_color    = $heading[0]['heading_color'];
		$heading_font     = $heading[0]['heading_font'];
		$heading_size     = $heading[0]['heading_size'];
		$subheading       = get_post_meta( $post_id, 'sub_heading', true );
		$subheading_color = $subheading[0]['sub_heading_color'];
		$subheading_font  = $subheading[0]['sub_heading_font'];
		$subheading_size  = $subheading[0]['sub_heading_size'];
		$paragraph        = get_post_meta( $post_id, 'paragraph', true );
		$paragraph_color  = $paragraph[0]['paragraph_color'];
		$paragraph_font   = $paragraph[0]['paragraph_font'];
		$paragraph_size   = $paragraph[0]['paragraph_size'];
		$link_color       = $paragraph[0]['link_color'];
		$link_color_hover = $paragraph[0]['link_hover_color'];
		$link_underline   = $paragraph[0]['link_underline'];

		?>
		<style>
			.wpst-type-heading {
				color: <?php echo esc_attr( $heading_color ) ?>;
				font-family: '<?php echo esc_attr( $heading_font ); ?>';
				font-size: <?php echo esc_attr( $heading_size ); ?>px;
			}

			.wpst-type-subheading {
				color: <?php echo esc_attr( $subheading_color ); ?>;
				font-family: '<?php echo esc_attr( $subheading_font ); ?>';
				font-size: <?php echo esc_attr( $subheading_size ); ?>px;
			}

			.wpst-type-paragraph {
				color: <?php echo esc_attr( $paragraph_color ); ?>;
				font-family: '<?php echo esc_attr( $paragraph_font ); ?>';
				font-size: <?php echo esc_attr( $paragraph_size ); ?>px;
			}

			a.wpst-type-link {
				color: <?php echo esc_attr( $link_color ); ?>;
				<?php if ( 'none' == $link_underline ) : echo 'border: none; box-shadow: none; text-decoration: none;' ?>
				<?php endif; ?>
			}

			a.wpst-type-link:hover {
				color: <?php echo esc_attr( $link_color_hover ); ?>;
				<?php if ( 'none' == $link_underline ) : echo 'border: none; box-shadow: none; text-decoration: none;' ?>
				<?php endif; ?>
			}
		</style>
		<?php
	}
}
