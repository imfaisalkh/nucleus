<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Social Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_social_settings' );

	function nucleus_customize_social_settings() {

        // PANEL: Dashboard Settings
		Kirki::add_panel( 'nucleus_social_networks', array(
			'priority'    => 50,
			'title'       => esc_html__( 'Social Networks', 'nucleus' ),
            'description' => esc_html__( 'This section configure links to your social profiles, this could be used through out site.', 'nucleus' ),
		) );

		// SECTION: Social Networks
		Kirki::add_section( 'nucleus_social_sharing', array(
            'title'          => esc_html__( 'Sharing Links', 'nucleus' ),
            'description'    => esc_html__( 'This section configure sharing links settings.', 'nucleus' ),
            'panel'          => 'nucleus_social_networks',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_enable_social_sharing',
            'label'       => __( 'Enable Social Sharing', 'nucleus' ),
            'description' => esc_html__( 'Do you want to enable social sharing links at the left hand side of the site?', 'nucleus' ),
            'section'     => 'nucleus_social_sharing',
            'default'     => '0',
            'priority'    => 10,
        ] );

        Kirki::add_field( 'nucleus_config', array(
			'type'        => 'sortable',
			'settings'    => 'nucleus_social_sharing_group',
			'label'       => __( 'Sharing Links', 'nucleus' ),
			'description'    => esc_html__( 'Change the order and visibility of social sharing links.', 'nucleus' ),
			'section'     => 'nucleus_social_sharing',
			'default'     => ['twitter', 'facebook', 'pinterest'],
			'choices'     => [
                'twitter' => esc_html__( 'Twitter', 'kirki' ),
                'facebook' => esc_html__( 'Facebook', 'kirki' ),
                'pinterest' => esc_html__( 'Pinterest', 'kirki' ),
                'linkedin' => esc_html__( 'LinkedIn', 'kirki' ),
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_enable_social_sharing',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
		) );

        // SECTION: Social Networks
		Kirki::add_section( 'nucleus_social_profiles', array(
            'title'          => esc_html__( 'Social Profiles', 'nucleus' ),
            'description'    => esc_html__( 'This section configures links to your social profiles.', 'nucleus' ),
            'panel'          => 'nucleus_social_networks',
        ) );

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_config', array(
            'type'        => 'repeater',
            'settings'    => 'nucleus_social_profiles_group',
            'label'       => esc_html__( 'Profile Links', 'nucleus' ),
            'section'     => 'nucleus_social_profiles',
            'row_label' => array(
                'type'  => 'field',
                'value' => esc_html__('Social Profile', 'nucleus' ),
                'field' => 'plateform',
            ),
            'button_label' => esc_html__('Add New Profile', 'nucleus' ),
            'default'      => array(),
            'fields' => array(
                'plateform' => array(
                    'type'        => 'select',
                    'label'       => esc_html__( 'Plateform', 'nucleus' ),
                    'description' => esc_html__( 'Choose a social media plateform for which you want to define your profile URL.', 'nucleus' ),
                    'choices'     => array(
                        '' => esc_html__( 'Choose Plateform', 'nucleus' ),
                        'fa fa-twitter' => esc_html__( 'Twitter', 'nucleus' ),
                        'fa fa-facebook' => esc_html__( 'Facebook', 'nucleus' ),
                        'fa fa-dribbble' => esc_html__( 'Dribbble', 'nucleus' ),
                        'fa fa-linkedin' => esc_html__( 'LinkedIn', 'nucleus' ),
                        'fa fa-instagram' => esc_html__( 'Instagram', 'nucleus' ),
                        'fa fa-pinterest' => esc_html__( 'Pinterest', 'nucleus' ),
                        'fa fa-yelp' => esc_html__( 'Yelp', 'nucleus' ),
                        'fa fa-google-plus' => esc_html__( 'Google Plus', 'nucleus' ),
                        'fa fa-tumblr' => esc_html__( 'Tumblr', 'nucleus' ),
                        'fa fa-youtube' => esc_html__( 'Youtube', 'nucleus' ),
                        'fa fa-vimeo' => esc_html__( 'Vimeo', 'nucleus' ),
                        'fa fa-soundcloud' => esc_html__( 'Soundcloud', 'nucleus' ),
                        'fa fa-rss' => esc_html__( 'RSS', 'nucleus' ),
                    ),
                ),
                'url' => array(
                    'type'        => 'text',
                    'label'       => esc_html__( 'Profile URL', 'nucleus' ),
                    'description' => esc_html__( 'Define URL for your above selected social media plateform.', 'nucleus' ),
                    'default'     => '',
                ),
            )
        ) );

	}