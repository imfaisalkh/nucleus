<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Social Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_social_settings' );

	function nucleus_customize_social_settings() {

        // PANEL: Dashboard Settings
		Kirki::add_panel( 'nucleus_social_networks', array(
			'priority'    => 50,
			'title'       => esc_html__( 'Social Networks', '_nucleus' ),
            'description' => esc_html__( 'This section configure links to your social profiles, this could be used through out site.', '_nucleus' ),
		) );

		// SECTION: Social Networks
		Kirki::add_section( 'nucleus_social_sharing', array(
            'title'          => esc_html__( 'Sharing Links', '_nucleus' ),
            'description'    => esc_html__( 'This section configure sharing links settings.', '_nucleus' ),
            'panel'          => 'nucleus_social_networks',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_enable_social_sharing',
            'label'       => __( 'Enable Social Sharing', '_nucleus' ),
            'description' => esc_html__( 'Do you want to enable social sharing links at the left hand side of the site?', '_nucleus' ),
            'section'     => 'nucleus_social_sharing',
            'default'     => '0',
            'priority'    => 10,
        ] );

        Kirki::add_field( 'nucleus_config', array(
			'type'        => 'sortable',
			'settings'    => 'nucleus_social_sharing_group',
			'label'       => __( 'Sharing Links', '_nucleus' ),
			'description'    => esc_html__( 'Change the order and visibility of social sharing links.', '_nucleus' ),
			'section'     => 'nucleus_social_sharing',
			'default'     => ['twitter', 'facebook', 'pinterest'],
			'choices'     => [
                'twitter' => esc_html__( 'Twitter', '_nucleus' ),
                'facebook' => esc_html__( 'Facebook', '_nucleus' ),
                'pinterest' => esc_html__( 'Pinterest', '_nucleus' ),
                'linkedin' => esc_html__( 'LinkedIn', '_nucleus' ),
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
            'title'          => esc_html__( 'Social Profiles', '_nucleus' ),
            'description'    => esc_html__( 'This section configures links to your social profiles.', '_nucleus' ),
            'panel'          => 'nucleus_social_networks',
        ) );

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_config', array(
            'type'        => 'repeater',
            'settings'    => 'nucleus_social_profiles_group',
            'label'       => esc_html__( 'Profile Links', '_nucleus' ),
            'section'     => 'nucleus_social_profiles',
            'row_label' => array(
                'type'  => 'field',
                'value' => esc_html__('Social Profile', '_nucleus' ),
                'field' => 'plateform',
            ),
            'button_label' => esc_html__('Add New Profile', '_nucleus' ),
            'default'      => array(),
            'fields' => array(
                'plateform' => array(
                    'type'        => 'select',
                    'label'       => esc_html__( 'Plateform', '_nucleus' ),
                    'description' => esc_html__( 'Choose a social media plateform for which you want to define your profile URL.', '_nucleus' ),
                    'choices'     => array(
                        '' => esc_html__( 'Choose Plateform', '_nucleus' ),
                        'fa fa-twitter' => esc_html__( 'Twitter', '_nucleus' ),
                        'fa fa-facebook' => esc_html__( 'Facebook', '_nucleus' ),
                        'fa fa-dribbble' => esc_html__( 'Dribbble', '_nucleus' ),
                        'fa fa-linkedin' => esc_html__( 'LinkedIn', '_nucleus' ),
                        'fa fa-instagram' => esc_html__( 'Instagram', '_nucleus' ),
                        'fa fa-pinterest' => esc_html__( 'Pinterest', '_nucleus' ),
                        'fa fa-yelp' => esc_html__( 'Yelp', '_nucleus' ),
                        'fa fa-google-plus' => esc_html__( 'Google Plus', '_nucleus' ),
                        'fa fa-tumblr' => esc_html__( 'Tumblr', '_nucleus' ),
                        'fa fa-youtube' => esc_html__( 'Youtube', '_nucleus' ),
                        'fa fa-vimeo' => esc_html__( 'Vimeo', '_nucleus' ),
                        'fa fa-soundcloud' => esc_html__( 'Soundcloud', '_nucleus' ),
                        'fa fa-rss' => esc_html__( 'RSS', '_nucleus' ),
                    ),
                ),
                'url' => array(
                    'type'        => 'text',
                    'label'       => esc_html__( 'Profile URL', '_nucleus' ),
                    'description' => esc_html__( 'Define URL for your above selected social media plateform.', '_nucleus' ),
                    'default'     => '',
                ),
            )
        ) );

	}