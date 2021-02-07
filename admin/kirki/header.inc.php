<?php

#-------------------------------------------------------------------------------#
#  Global Options
#-------------------------------------------------------------------------------#

    function header_elements() {

        return [
            'logo' => esc_html__( 'Logo', 'kirki' ),
            'menu' => esc_html__( 'Menu', 'kirki' ),
            'hamburger-icon' => esc_html__( 'Hamburger Icon', 'kirki' ),
            'search-icon' => esc_html__( 'Search Icon', 'kirki' ),
            'full-screen-icon' => esc_html__( 'Fullscreen Icon', 'kirki' ),
            'social-icons' => esc_html__( 'Social Icons', 'kirki' ),
            'text-1' => esc_html__( 'Text Block # 1', 'kirki' ),
            'text-2' => esc_html__( 'Text Block # 2', 'kirki' ),
            'text-3' => esc_html__( 'Text Block # 3', 'kirki' ),
        ];
    }

    function top_bar_elements() {

        return [
            'menu' => esc_html__( 'Menu', 'kirki' ),
            'language-selector' => esc_html__( 'Language Selector', 'kirki' ),
            'social-icons' => esc_html__( 'Social Icons', 'kirki' ),
            'text-1' => esc_html__( 'Text Block # 1', 'kirki' ),
            'text-2' => esc_html__( 'Text Block # 2', 'kirki' ),
            'text-3' => esc_html__( 'Text Block # 3', 'kirki' ),
        ];
    }


#-------------------------------------------------------------------------------#
#  Theme Customizer - Header Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_header_settings' );

	function nucleus_customize_header_settings() {

		// PANEL: Dashboard Settings
		Kirki::add_panel( 'nucleus_header_settings', array(
			'priority'    => 30,
            'title'          => esc_html__( 'Header Settings', 'nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the site header.', 'nucleus' ),
		) );
		
		// SECTION: Header
		Kirki::add_section( 'nucleus_header_layout', array(
            'title'          => esc_html__( 'Header Layout', 'nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the header layout.', 'nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        // OPTION: Select Field
        Kirki::add_field( 'nucleus_header_version', [
            'type'        => 'select',
            'settings'    => 'nucleus_header_version',
            'label'       => esc_html__( 'Header version', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'default'     => 'traditional',
            'placeholder' => esc_html__( 'Select an option...', 'kirki' ),
            'priority'    => 10,
            'multiple'    => 1,
            'choices'     => [
                'traditional' => esc_html__( 'Traditional', 'kirki' ),
                'modern' => esc_html__( 'Modern', 'kirki' ),
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_layout_switch',
                    'operator' => '==',
                    'value'    => false,
                ],
            ]
        ] );       

        // OPTION: Toggle Field
        Kirki::add_field( 'nucleus_header_layout_switch', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_header_layout_switch',
            'label'       => esc_html__( 'Use customer header layout?', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'default'     => '0',
            'priority'    => 10,
        ] );        

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_header_top_left', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Top - Left Section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_top_left',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'choices'     => header_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_layout_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_header_top_center', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Top - Center Section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_top_center',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'default'     => '',
                    'choices'     => header_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_layout_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );        

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_header_top_right', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Top - Right Section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_top_right',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'choices'     => header_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_layout_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );

        // OPTION: Toggle Field
        Kirki::add_field( 'nucleus_header_bottom', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_header_bottom',
            'label'       => esc_html__( 'Show bottom section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'default'     => '0',
            'priority'    => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_layout_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_header_bottom_left', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Bottom - Left Section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_bottom_left',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'choices'     => header_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_layout_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
                [
                    'setting'  => 'nucleus_header_bottom',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
        ] );

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_header_bottom_center', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Bottom - Center Section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_bottom_center',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'choices'     => header_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_layout_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
                [
                    'setting'  => 'nucleus_header_bottom',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
        ] );        

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_header_bottom_right', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Bottom - Right Section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_bottom_right',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'choices'     => header_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_layout_switch',
                    'operator' => '==',
                    'value'    => true,
                ],
                [
                    'setting'  => 'nucleus_header_bottom',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
        ] );

        // OPTION: Toggle Field
        Kirki::add_field( 'nucleus_header_full_width', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_header_full_width',
            'label'       => esc_html__( 'Header Full Width', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'default'     => '0',
            'priority'    => 10,
        ] );        

	
		// SECTION: Header
		Kirki::add_section( 'nucleus_header_top_bar', array(
            'title'          => esc_html__( 'Top Bar', 'nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the top bar.', 'nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        // OPTION: Toggle Field
        Kirki::add_field( 'nucleus_header_top_bar_visibility', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_header_top_bar_visibility',
            'label'       => esc_html__( 'Show top bar?', 'kirki' ),
            'section'     => 'nucleus_header_top_bar',
            'default'     => '0',
            'priority'    => 10,
        ] );        


        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_header_top_bar_left', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Left Section', 'kirki' ),
            'section'     => 'nucleus_header_top_bar',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_top_bar_left',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'choices'     => top_bar_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_top_bar_visibility',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
        ] );

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_header_top_bar_center', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Center Section', 'kirki' ),
            'section'     => 'nucleus_header_top_bar',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_top_bar_center',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'default'     => '',
                    'choices'     => top_bar_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_top_bar_visibility',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
        ] );        

        // OPTION: Repeater Field
        Kirki::add_field( 'nucleus_header_top_bar_right', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Right Section', 'kirki' ),
            'section'     => 'nucleus_header_top_bar',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_top_bar_right',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'choices'     => top_bar_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_top_bar_visibility',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_header_top_bar_height', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_top_bar_height',
            'label'       => esc_html__( 'Height (px)', 'kirki' ),
            'section'     => 'nucleus_header_top_bar',
            'default'     => 40,
            'choices'     => [
                'min'  => 30,
                'max'  => 60,
                'step' => 1,
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_top_bar_visibility',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_header_top_bar_text_color', [
            'type'        => 'color',
            'settings'    => 'nucleus_header_top_bar_text_color',
            'label'       => __( 'Text Color', 'kirki' ),
            'section'     => 'nucleus_header_top_bar',
            'default'     => '#FFF',
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_top_bar_visibility',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
        ] );
        
        Kirki::add_field( 'nucleus_header_top_bar_bg_color', [
            'type'        => 'color',
            'settings'    => 'nucleus_header_top_bar_bg_color',
            'label'       => __( 'Background Color', 'kirki' ),
            'section'     => 'nucleus_header_top_bar',
            'default'     => '#CCC',
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_top_bar_visibility',
                    'operator' => '===',
                    'value'    => true,
                ],
            ]
        ] );

	}