<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Social Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_actions_settings' );

	function nucleus_customize_actions_settings() {

		// SECTION: Social Networks
		Kirki::add_section( 'nucleus_page_actions', array(
            'priority'       => 60,
            'title'          => esc_html__( 'Page Actions', 'nucleus' ),
            'description'    => esc_html__( 'This section configure page actions settings.', 'nucleus' ),
        ) );

        Kirki::add_field( 'nucleus_enable_page_actions', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_enable_page_actions',
            'label'       => __( 'Enable Page Actions', 'nucleus' ),
            'description' => esc_html__( 'Do you want to enable page action icons at the right hand side of the site?', 'nucleus' ),
            'section'     => 'nucleus_page_actions',
            'default'     => '0',
            'priority'    => 10,
        ] );

        Kirki::add_field( 'nucleus_page_actions_group', array(
			'type'        => 'sortable',
			'settings'    => 'nucleus_page_actions_group',
			'label'       => __( 'Page Actions', 'nucleus' ),
			'description'    => esc_html__( 'Change the order and visibility of page action icons.', 'nucleus' ),
			'section'     => 'nucleus_page_actions',
			'default'     => ['audio', 'info', 'top'],
			'choices'     => [
                'audio' => esc_html__( 'Audio Switch', 'kirki' ),
                'info' => esc_html__( 'Info Box', 'kirki' ),
                'top' => esc_html__( 'Go to Top', 'kirki' ),
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_enable_page_actions',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
		) );

	}