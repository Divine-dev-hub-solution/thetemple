<?php
/**
 * Contact Info
 *
 * @package Maharatri
 */
return array(
	'title'            => esc_html__( 'Contact Information', 'maharatri' ),
	'id'               => 'site_info',
	'customizer_width' => '400px',
	'icon'             => 'el el-envelope',
	'fields'           => array(
		array(
			'id'       => 'contact_email',
			'type'     => 'text',
			'title'    => esc_html__( 'Company Email', 'maharatri' ),
			'subtitle' => esc_html__( 'Please enter contact email address.', 'maharatri' ),
			'validate' => 'email',
			'msg'      => esc_html__( 'Please enter valid email.', 'maharatri' ),
		),
		array(
			'id'       => 'contact_phone',
			'type'     => 'text',
			'title'    => esc_html__( 'Company Phone Number', 'maharatri' ),
			'subtitle' => esc_html__( 'Please enter contact phone number.', 'maharatri' ),
		),
		array(
			'id'       => 'contact_address',
			'type'     => 'text',
			'title'    => esc_html__( 'Company Address', 'maharatri' ),
			'subtitle' => esc_html__( 'Please enter contact address.', 'maharatri' ),
		),
		array(
			'id'       => 'contact_map_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Company Google map link', 'maharatri' ),
			'subtitle' => esc_html__( 'Please enter google maps link', 'maharatri' ),
		),
		array(
			'id'       => 'contact_description',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Company Description', 'maharatri' ),
			'subtitle' => esc_html__( 'Please type a small description of your company', 'maharatri' ),
		),
		array(
			'id'       => 'social_infos',
			'type'     => 'select',
			'options'  => array(
				'facebook'  => esc_html__( 'Facebook', 'maharatri' ),
				'twitter'   => esc_html__( 'Twitter', 'maharatri' ),
				'dribbble'  => esc_html__( 'Dribbble', 'maharatri' ),
				'vimeo'     => esc_html__( 'Vimeo', 'maharatri' ),
				'pinterest' => esc_html__( 'Pinterest', 'maharatri' ),
				'linkedin'  => esc_html__( 'LinkedIn', 'maharatri' ),
				'youtube'   => esc_html__( 'Youtube', 'maharatri' ),
				'instagram' => esc_html__( 'Instagram', 'maharatri' ),
			),
			'multi'    => true,
			'sortable' => true,
			'title'    => esc_html__( 'Social info to display.', 'maharatri' ),
			'subtitle' => esc_html__( 'Arrange the fields you wanted to display.', 'maharatri' ),
		),
		array(
			'id'       => 'facebook_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Facebook Url', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter facebook url.', 'maharatri' ),
		),
		array(
			'id'       => 'twitter_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Twitter Url', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter twitter url.', 'maharatri' ),
		),
		array(
			'id'       => 'dribbble_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Dribbble Url', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter dribbble url.', 'maharatri' ),
		),
		array(
			'id'       => 'vimeo_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Vimeo Url', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter vimeo url.', 'maharatri' ),
		),
		array(
			'id'       => 'pinterest_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Pinterest Url', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter pinterest url.', 'maharatri' ),
		),
		array(
			'id'       => 'linkedin_link',
			'type'     => 'text',
			'title'    => esc_html__( 'LinkedIn Url', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter linkedin url.', 'maharatri' ),
		),
		array(
			'id'       => 'youtube_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Youtube Url', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter youtube url.', 'maharatri' ),
		),
		array(
			'id'       => 'instagram_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Instagram Url', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter instagram url.', 'maharatri' ),
		),
		array(
			'id'       => 'pinterest_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Pinterest Url', 'maharatri' ),
			'subtitle' => esc_html__( 'Enter pinterest url.', 'maharatri' ),
		),
	),
);
