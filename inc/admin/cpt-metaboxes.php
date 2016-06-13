<?php
/**
 * Set up the metaboxes for the Style Tile post type.
 */

add_action( 'cmb2_admin_init', 'wpst_post_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function wpst_post_metaboxes() {

	//$prefix = '_wpst_';

	/**
	 * Initialize the metabox.
	 */
	$cmb = new_cmb2_box( array(
		'id'           => 'wpst_tile',
		'title'        => __( 'Style Tile settings', 'wp-style-tile' ),
		'object_types' => array( 'style-tile' ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true,
	) );

	// Background Image
	$cmb->add_field( array(
		'name'    => 'Background Image',
		'desc'    => 'Upload an image to use as the background of the tile.',
		'id'      => 'background_image',
		'type'    => 'file',
		'options' => array(
			'url' => false,
		),
		'text'    => array(
			'add_upload_file_text' => 'Add Background Image'
		),
	) );

	// Custom Header or Logo
	$cmb->add_field( array(
		'name'    => 'Logo / Header',
		'desc'    => 'Upload a custom header or a logo.',
		'id'      => 'header_image',
		'type'    => 'file',
		'options' => array(
			'url' => false,
		),
		'text'    => array( 'add_upload_file_text' => 'Add Header' ),
	) );

	// Patterns & Textures
	$cmb->add_field( array(
		'name'       => 'Patterns & Textures',
		'desc'       => 'Upload patterns and/or textures.',
		'id'         => 'patterns',
		'type'       => 'file_list',
		'preview_size' => array( 300, 300 ),
	) );

	// Heading
	$group_heading = $cmb->add_field( array(
		'id'          => 'heading',
		'type'        => 'group',
		'description' => __( 'Heading styles', 'wp-style-tiles' ),
		'options'     => array(
			'group_title'   => __( 'Heading', 'wp-style-tiles' ),
			'remove_button' => __( 'Remove Word', 'wp-style-tiles' ),
			'sortable'      => false,
		),
		'repeatable'  => false,
	) );

	// Font Size
	$cmb->add_group_field( $group_heading, array(
		'name'     => 'Heading text',
		'desc'     => 'Enter custom text for the heading.',
		'id'       => 'heading_text',
		'type'     => 'text',
	) );

	$cmb->add_group_field( $group_heading, array(
		'name' => 'Heading Font',
		'desc' => 'Enter the name of the heading font.',
		'id'   => 'heading_font',
		'type' => 'text_medium',
	) );

	$cmb->add_group_field( $group_heading, array(
		'name' => 'Heading Size',
		'desc' => 'Enter font size for the heading.',
		'id'   => 'heading_size',
		'type' => 'text_small',
	) );

	// Font Color
	$cmb->add_group_field( $group_heading, array(
		'name'       => 'Heading Font Color',
		'desc'       => 'Select color for the heading.',
		'id'         => 'heading_color',
		'type'       => 'colorpicker',
		'default'    => '#666666',
	) );

	// Sub Heading
	$group_subheading = $cmb->add_field( array(
		'id'          => 'sub_heading',
		'type'        => 'group',
		'description' => __( 'Sub Heading styles', 'wp-style-tiles' ),
		'options'     => array(
			'group_title'   => __( 'Sub Heading', 'wp-style-tiles' ),
			'remove_button' => __( 'Remove Word', 'wp-style-tiles' ),
			'sortable'      => false,
		),
		'repeatable'  => false,
	) );

	// Font Size
	$cmb->add_group_field( $group_subheading, array(
		'name'     => 'Sub Heading text',
		'desc'     => 'Enter custom text for the heading.',
		'id'       => 'sub_heading_text',
		'type'     => 'text',
	) );

	$cmb->add_group_field( $group_subheading, array(
		'name' => 'Sub Heading Font',
		'desc' => 'Enter the name of the heading font.',
		'id'   => 'sub_heading_font',
		'type' => 'text_medium',
	) );

	$cmb->add_group_field( $group_subheading, array(
		'name' => 'Sub Heading Size',
		'desc' => 'Enter font size for the heading.',
		'id'   => 'sub_heading_size',
		'type' => 'text_small',
	) );

	// Font Color
	$cmb->add_group_field( $group_subheading, array(
		'name'       => 'Sub Heading Font Color',
		'desc'       => 'Select color for the heading.',
		'id'         => 'sub_heading_color',
		'type'       => 'colorpicker',
		'default'    => '#666666',
	) );

	// Paragraph & Link
	$group_paragraph = $cmb->add_field( array(
		'id'          => 'paragraph',
		'type'        => 'group',
		'description' => __( 'Paragraph styles', 'wp-style-tiles' ),
		'options'     => array(
			'group_title'   => __( 'Paragraph', 'wp-style-tiles' ),
			'remove_button' => __( 'Remove Word', 'wp-style-tiles' ),
			'sortable'      => false,
		),
		'repeatable'  => false,
	) );

	// Font name
	$cmb->add_group_field( $group_paragraph, array(
		'name' => 'Paragraph Font',
		'desc' => 'Enter the name of the paragraph font.',
		'id'   => 'paragraph_font',
		'type' => 'text_medium',
	) );

	$cmb->add_group_field( $group_paragraph, array(
		'name' => 'Paragraph Size',
		'desc' => 'Enter font size for the paragraph.',
		'id'   => 'paragraph_size',
		'type' => 'text_small',
	) );

	// Font Color
	$cmb->add_group_field( $group_paragraph, array(
		'name'       => 'Paragraph Font Color',
		'desc'       => 'Select color for the paragraph.',
		'id'         => 'paragraph_color',
		'type'       => 'colorpicker',
		'default'    => '#666666',
	) );

	// Link Color
	$cmb->add_group_field( $group_paragraph, array(
		'name'       => 'Link Color',
		'desc'       => 'Select color for the link.',
		'id'         => 'link_color',
		'type'       => 'colorpicker',
		'default'    => '#666666',
	) );

	// Link Hover Color
	$cmb->add_group_field( $group_paragraph, array(
		'name'       => 'Link Hover Color',
		'desc'       => 'Select hover color for the link.',
		'id'         => 'link_hover_color',
		'type'       => 'colorpicker',
		'default'    => '#666666',
	) );

	// Link Underline
	$cmb->add_group_field( $group_paragraph, array(
		'name'         => 'Link Underline',
		'id'           => 'link_underline',
		'type'         => 'radio',
		'options'          => array(
			'underline' => __( 'Yes', 'wp-style-tiles' ),
			'none'      => __( 'No', 'wp-style-tiles' ),
		),
	) );

	// Custom CSS
	$cmb->add_field( array(
		'name' => 'Custom CSS',
		'desc' => 'Use this box to write custom CSS for this Style Tile.',
		'id'   => 'custom_css',
		'type' => 'textarea_code',
	) );
}
