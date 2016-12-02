<?php
/**
 * WP Style Tiles
 *
 * Functions
 *
 * @package wp-style-tiles
 * @since   1.0.0
 */

/**
 * Return an array of font styles.
 *
 * @return  array  The font styles.
 */
function wpst_get_font_styles() {

	$font_styles = array(
		'normal' => esc_html__( 'Normal', 'wp-style-tiles' ),
		'italic' => esc_html__( 'Italic', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_font_styles', $font_styles );
}

/**
 * Return an array of font weights.
 *
 * @return  array  The font weights.
 */
function wpst_get_font_weights() {

	$font_weights = array(
		'100' => esc_html__( 'Extra Light (100)', 'wp-style-tiles' ),
		'300' => esc_html__( 'Light (300)', 'wp-style-tiles' ),
		'400' => esc_html__( 'Normal(400)', 'wp-style-tiles' ),
		'700' => esc_html__( 'Bold (700)', 'wp-styles-tiles' ),
		'900' => esc_html__( 'Black (900)', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_font_weights', $font_weights );
}

/**
 * Return an array of text transforms.
 *
 * @return  array  The text transforms.
 */
function wpst_get_text_transforms() {

	$text_transforms = array(
		'none'        => esc_html__( 'None', 'wp-style-tiles' ),
		'capitalize'  => esc_html__( 'Capitalize', 'wp-style-tiles' ),
		'lowercase'   => esc_html__( 'Lowercase', 'wp-style-tiles' ),
		'uppercase'   => esc_html__( 'Uppercase', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_text_transforms', $text_transforms );
}

/**
 * Return an array of color chip styles.
 *
 * @return  array  The color chip styles.
 */
function wpst_get_color_chip_styles() {

	$color_chip_style = array(
		'square' => esc_html__( 'Square', 'wp-style-tiles' ),
		'round'  => esc_html__( 'Round', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_color_chip_styles', $color_chip_style );
}

/**
 * Return an array of heading levels.
 *
 * @return  array  The heading levels.
 */
function wpst_get_heading_levels() {

	$heading_levels = array(
		'h1' => esc_html__( 'Heading 1', 'wp-style-tiles' ),
		'h2' => esc_html__( 'Heading 2', 'wp-style-tiles' ),
		'h3' => esc_html__( 'Heading 3', 'wp-style-tiles' ),
		'h4' => esc_html__( 'Heading 4', 'wp-style-tiles' ),
		'h5' => esc_html__( 'Heading 5', 'wp-style-tiles' ),
		'h6' => esc_html__( 'Heading 6', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_heading_levels', $heading_levels );
}

/**
 * Return an array of ipsum choices.
 *
 * @return  array  The ipsum choices.
 */
function wpst_get_ipsum_choices() {

	$ipsum_choices = array(
		'traditional'     => esc_html__( 'Traditional', 'wp-style-tiles' ),
		'bacon'           => esc_html__( 'Bacon Ipsum', 'wp-style-tiles' ),
		'cat'             => esc_html__( 'Cat', 'wp-style-tiles' ),
		'hipster'         => esc_html__( 'Hipster', 'wp-style-tiles' ),
		'samuel-l-ipsum'  => esc_html__( 'Samuel L. Ipsum', 'wp-style-tiles' ),
	);

	return apply_filters( 'wpst_ipsum_choices', $ipsum_choices );
}

/**
 * Return an array of ipsum content.
 *
 * @param   string  $ipsum  The type of ipsum.
 * @return  array           The ipsum content.
 */
function wpst_get_ipsum_content( $ipsum ) {

	$ipsum_content = array(
		'traditional'     => 'Te lobortis intellegat usu. Ad erant causae detraxit mel, tacimates voluptatibus pro ex. Soleat reprehendunt ei quo, vim ei nemore option consequat. <em>Sit causae aeterno inermis ea.</em> Reque conceptam mel et. Reque tibique interesset ad has, dicam pertinacia ius eu, ex ius constituto scribentur. <strong>Diam tincidunt duo ex, eum in augue vivendo.</strong>',
		'bacon'           => 'Leberkas ball tip filet mignon sausage landjaeger, hamburger drumstick shank chuck corned beef. Fatback picanha spare ribs pork loin porchetta doner pastrami prosciutto. <em>Biltong frankfurter meatball, picanha ground round ball tip alcatra swine meatloaf pork spare ribs beef capicola kevin tenderloin.</em> Turkey corned beef sausage tongue chicken bacon filet mignon drumstick meatloaf pork chop jowl kevin beef hamburger. <strong>Pig sirloin bresaola shoulder tail, ribeye short ribs chuck pastrami spare ribs boudin meatloaf prosciutto kevin rump.</strong>',
		'cat'             => 'Bathe private parts with tongue then lick owner\'s face massacre a bird in the living room and then look like the cutest and most innocent animal on the planet or eat and than sleep on your face. Missing until dinner time chase red laser dot kitty power! . Poop in the plant pot where is my slave? <em>I&rsquo;m getting hungry for destroy couch as revenge jump around on couch, meow constantly until given food,</em> ignore the squirrels, you&rsquo;ll never catch them anyway, step on your keyboard while you\'re gaming and then turn in a circle . <strong>Eat grass, throw it back up sweet beast, and hiss at vacuum cleaner this human feeds me, i should be a god.</strong>',
		'hipster'         => 'Kitsch cred bitters fap art party helvetica. Slow-carb chillwave PBR&amp;B listicle. Tousled mumblecore godard +1 normcore affogato intelligentsia mixtape authentic sriracha, marfa paleo chicharrones fingerstache. <em>Crucifix lumbersexual authentic organic.</em> Waistcoat locavore portland, drinking vinegar put a bird on it everyday carry pitchfork man bun. Sriracha taxidermy tacos YOLO meditation. <strong>Readymade leggings try-hard tumblr mumblecore, craft beer tousled.</strong>',
		'samuel-l-ipsum'  => 'My money&rsquo;s in that office, right? If she start giving me some bullshit about it ain&rsquo;t there, and we got to go someplace else and get it, I&rsquo;m gonna shoot you in the head then and there. <em>Then I&rsquo;m gonna shoot that bitch in the kneecaps, find out where my goddamn money is.</em> She gonna tell me too. Hey, look at me when I&rsquo; -- thanksm talking to you, motherfucker. You listen: we go in there, and that nigga Winston or anybody else is in there, you the first motherfucker to get shot. <strong>You understand?</strong>',
	);

	return apply_filters( 'wpst_ipsum_content', $ipsum_content[ $ipsum ] );
}
