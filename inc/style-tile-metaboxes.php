<?php
/**
 * The Style Tile custom post type custom metaboxes (using ACF).
 *
 * @package wp-style-tiles
 * @since 1.0.0
 */

if( function_exists( 'register_field_group' ) ) {
	register_field_group(array (
		'id'      => 'acf_custom-css',
		'title'   => 'Custom CSS',
		'fields'  => array (
			array (
				'key'           => 'field_57d57a9a6dda4',
				'label'         => 'Custom CSS',
				'name'          => 'wpst_custom_css',
				'type'          => 'textarea',
				'instructions'  => 'Enter any custom styles you\'d like to add to this style here.',
				'default_value' => '',
				'placeholder'   => '',
				'maxlength'     => '',
				'rows'          => '',
				'formatting'    => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'style-tile',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param'    => 'user_type',
					'operator' => '==',
					'value'    => 'administrator',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'style-tile',
					'order_no' => 0,
					'group_no' => 1,
				),
				array (
					'param'    => 'user_type',
					'operator' => '==',
					'value'    => 'editor',
					'order_no' => 1,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position'       => 'normal',
			'layout'         => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id'      => 'acf_fonts',
		'title'   => 'Fonts',
		'fields'  => array (
			array (
				'key'           => 'field_57d579f7d9f87',
				'label'         => 'Google Fonts',
				'name'          => 'wpst_google_fonts',
				'type'          => 'text',
				'instructions'  => 'Enter Google Fonts link to enqueue Google fonts to this tile. E.g. //fonts.googleapis.com/css?family=Roboto',
				'default_value' => '',
				'placeholder'   => '//fonts.googleapis.com/css?family=Roboto',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			),
		),
		'location' => array (
			array (
				array (
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'style-tile',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
				'position' => 'side',
				'layout' => 'default',
				'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
