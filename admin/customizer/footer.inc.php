<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Footer Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_footer_settings' );

	function nucleus_customize_footer_settings() {

		// SECTION: Footer
		Kirki::add_section( 'nucleus_footer_layout', array(
            'priority'       => 30,
            'title'          => esc_html__( 'Footer Settings', '_nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the site footer.', '_nucleus' ),
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'select',
            'settings'    => 'nucleus_footer_version',
            'label'       => esc_html__( 'Footer version', '_nucleus' ),
            'section'     => 'nucleus_footer_layout',
            'default'     => 'v1',
            'placeholder' => esc_html__( 'Select an option...', '_nucleus' ),
            'priority'    => 10,
            'multiple'    => 1,
            'choices'     => [
                'v1' => esc_html__( 'Footer V1', '_nucleus' ),
                'v2' => esc_html__( 'Footer V2', '_nucleus' ),
            ],
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'text',
            'settings' => 'nucleus_footer_v1_heading',
            'label'    => esc_html__( 'Heading', '_nucleus' ),
            'section'  => 'nucleus_footer_layout',
            'default'  => esc_html__('Let\'s Talk', '_nucleus'),
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_footer_version',
                    'operator' => '==',
                    'value'    => 'v1',
                ],
            ]
        ] );
        
        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_footer_v1_text',
            'label'    => esc_html__( 'Text Block', '_nucleus' ),
            'section'  => 'nucleus_footer_layout',
            'description'   => esc_html__('You can use <br> tag or other HTML tags here.', '_nucleus'),
            'default'  => wp_kses( __('Have a Project or an idea you would like to discuss? <br> Then what are you waiting for?', '_nucleus'), 'general' ),
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_footer_version',
                    'operator' => '==',
                    'value'    => 'v1',
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_footer_v2_copyright',
            'label'    => esc_html__( 'Copyright Text', '_nucleus' ),
            'section'  => 'nucleus_footer_layout',
            'default' => wp_kses( __('2021 Nucleus Theme <br> Crafted & Designed by Black Sailor.', '_nucleus'), 'general' ),
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_footer_version',
                    'operator' => '==',
                    'value'    => 'v2',
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_footer_v2_contact',
            'label'    => esc_html__( 'Contact Text', '_nucleus' ),
            'section'  => 'nucleus_footer_layout',
            'priority' => 10,
            'default' => sprintf( wp_kses( __( 'Want to work with us? Lets boogie. <a href="%1$s">hello@example.com</a>.', '_nucleus' ), 'general' ), esc_url( 'mailto:hello@example.com' ) ),
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_footer_version',
                    'operator' => '==',
                    'value'    => 'v2',
                ],
            ]
        ] );        
    
        Kirki::add_field( 'nucleus_config', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_footer_full_width',
            'label'       => esc_html__( 'Footer Full Width', '_nucleus' ),
            'section'     => 'nucleus_footer_layout',
            'default'     => '0',
            'priority'    => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_footer_version',
                    'operator' => '==',
                    'value'    => 'v2',
                ],
            ]
        ] );        

	}