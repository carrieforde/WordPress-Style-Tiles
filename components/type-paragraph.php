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
function wpst_paragraph( $args ) {

	$component = 'wpst-paragraph';

	// Set the defaults and use them as needed.
	$defaults = array(
		'paragraph_ipsum'   => '',
		'paragraph_color'   => '',
		'paragraph_font'    => '',
		'paragraph_size'    => '',
		'paragraph_weight'  => '',
		'class'             => '',
	);
	$args = wp_parse_args( (array)$args, $defaults );

	// Clean up params to make them easier to use.
	$ipsum   = $args['paragraph_ipsum'];
	$color   = $args['paragraph_color'];
	$font    = $args['paragraph_font'];
	$size    = $args['paragraph_size'];
	$weight  = $args['paragraph_weight'];
	$class   = $argsp['class'];

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
	if ( 1 < (int)$size ) {
		$styles[] = 'font-size: ' . (int)$size . 'px;';
	}
	if ( 1 < (int)$weight ) {
		$styles[] = 'font-weight: ' . (int)$weight . ';';
	}

	$styles = implode( ' ', $styles );

	// Build the output.
	ob_start(); ?>

	<section class="wpst-paragraph-wrap">

		<p class="<?php esc_attr_e( $classes ); ?>" style="<?php esc_attr_e( $styles ); ?>">

		<?php

			switch ( $ipsum ) {

				// Traditional ipsum
				case 'traditional' :

					echo 'Te lobortis intellegat usu. Ad erant causae detraxit mel, tacimates voluptatibus pro ex. Soleat reprehendunt ei quo, vim ei nemore option consequat. <em>Sit causae aeterno inermis ea.</em> Reque conceptam mel et. Reque tibique interesset ad has, dicam pertinacia ius eu, ex ius constituto scribentur. <strong>Diam tincidunt duo ex, eum in augue vivendo.</strong>';

					break;

				// Bacon ipsum
				case 'bacon' :

					echo 'Leberkas ball tip filet mignon sausage landjaeger, hamburger drumstick shank chuck corned beef. Fatback picanha spare ribs pork loin porchetta doner pastrami prosciutto. <em>Biltong frankfurter meatball, picanha ground round ball tip alcatra swine meatloaf pork spare ribs beef capicola kevin tenderloin.</em> Turkey corned beef sausage tongue chicken bacon filet mignon drumstick meatloaf pork chop jowl kevin beef hamburger. <strong>Pig sirloin bresaola shoulder tail, ribeye short ribs chuck pastrami spare ribs boudin meatloaf prosciutto kevin rump.</strong>';

					break;

				// Cat ipsum
				case 'cat' :

					echo 'Bathe private parts with tongue then lick owner\'s face massacre a bird in the living room and then look like the cutest and most innocent animal on the planet or eat and than sleep on your face. Missing until dinner time chase red laser dot kitty power! . Poop in the plant pot where is my slave? <em>I\'m getting hungry for destroy couch as revenge jump around on couch, meow constantly until given food,</em> ignore the squirrels, you\'ll never catch them anyway, step on your keyboard while you\'re gaming and then turn in a circle . <strong>Eat grass, throw it back up sweet beast, and hiss at vacuum cleaner this human feeds me, i should be a god.</strong>';

					break;

				// Hipster ipsum
				case 'hipster' :

					echo 'Kitsch cred bitters fap art party helvetica. Slow-carb chillwave PBR&amp;B listicle. Tousled mumblecore godard +1 normcore affogato intelligentsia mixtape authentic sriracha, marfa paleo chicharrones fingerstache. <em>Crucifix lumbersexual authentic organic.</em> Waistcoat locavore portland, drinking vinegar put a bird on it everyday carry pitchfork man bun. Sriracha taxidermy tacos YOLO meditation. <strong>Readymade leggings try-hard tumblr mumblecore, craft beer tousled.</strong>';

					break;

				// Samuel L Ipsum
				case 'samuel-l-ipsum' :

					echo 'My money\'s in that office, right? If she start giving me some bullshit about it ain\'t there, and we got to go someplace else and get it, I\'m gonna shoot you in the head then and there. <em>Then I\'m gonna shoot that bitch in the kneecaps, find out where my goddamn money is.</em> She gonna tell me too. Hey, look at me when I\'m talking to you, motherfucker. You listen: we go in there, and that nigga Winston or anybody else is in there, you the first motherfucker to get shot. <strong>You understand?</strong>';

					break;
			}

		?>

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
					'options'     => array(
						'traditional'     => esc_html__( 'Traditional', 'wp-style-tiles' ),
						'bacon'           => esc_html__( 'Bacon Ipsum', 'wp-style-tiles' ),
						'cat'             => esc_html__( 'Cat', 'wp-style-tiles' ),
						'hipster'         => esc_html__( 'Hipster', 'wp-style-tiles' ),
						'samuel-l-ipsum'  => esc_html__( 'Samuel L. Ipsum', 'wp-style-tiles' ),
					),
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
					'options'     => array(
						'400' => esc_html__( 'Normal (400)', 'wp-style-tiles' ),
						'100' => esc_html__( 'Extra Light (100)', 'wp-style-tiles' ),
						'300' => esc_html__( 'Light (300)', 'wp-style-tiles' ),
						'600' => esc_html__( 'Semibold (600)', 'wp-style-tiles' ),
						'700' => esc_html__( 'Bold (700)', 'wp-style-tiles' ),
					),
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
