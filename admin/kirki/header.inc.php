<?php

#-------------------------------------------------------------------------------#
#  Global Options
#-------------------------------------------------------------------------------#

    function header_elements() {

        return [
            '' => esc_html__( '', 'kirki' ),
            'logo' => esc_html__( 'Logo', 'kirki' ),
            'primary-menu' => esc_html__( 'Primary Menu', 'kirki' ),
            'secondary-menu' => esc_html__( 'Secondary Menu', 'kirki' ),
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
		Kirki::add_section( 'nucleus_header_top_bar', array(
            'title'          => esc_html__( 'Top Bar', 'nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the top bar.', 'nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        Kirki::add_field( 'nucleus_header_top_bar_visibility', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_header_top_bar_visibility',
            'label'       => esc_html__( 'Show top bar?', 'kirki' ),
            'section'     => 'nucleus_header_top_bar',
            'default'     => '0',
            'priority'    => 10,
        ] );        

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

     
        Kirki::add_field( 'nucleus_header_top_bar_text_block_1', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_top_bar_text_block_1',
            'label'    => esc_html__( 'Text Block # 1', 'kirki' ),
            'section'  => 'nucleus_header_top_bar',
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_top_bar_visibility',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_header_top_bar_text_block_2', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_top_bar_text_block_2',
            'label'    => esc_html__( 'Text Block # 2', 'kirki' ),
            'section'  => 'nucleus_header_top_bar',
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_top_bar_visibility',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_header_top_bar_text_block_3', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_top_bar_text_block_3',
            'label'    => esc_html__( 'Text Block # 3', 'kirki' ),
            'section'  => 'nucleus_header_top_bar',
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_top_bar_visibility',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );        
		
		// SECTION: Header
		Kirki::add_section( 'nucleus_header_layout', array(
            'title'          => esc_html__( 'Header Layout', 'nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the header layout.', 'nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        Kirki::add_field( 'nucleus_header_version', [
            'type'        => 'select',
            'settings'    => 'nucleus_header_version',
            'label'       => esc_html__( 'Header version', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'default'     => 'v1',
            'placeholder' => esc_html__( 'Select an option...', 'kirki' ),
            'priority'    => 10,
            'multiple'    => 1,
            'choices'     => [
                'v1' => esc_html__( 'Header V1', 'kirki' ),
                'v2' => esc_html__( 'Header V2', 'kirki' ),
                'v3' => esc_html__( 'Header V3', 'kirki' ),
                'v4' => esc_html__( 'Header V4', 'kirki' ),
                'v5' => esc_html__( 'Header V5', 'kirki' ),
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_custom',
                    'operator' => '==',
                    'value'    => false,
                ],
            ]
        ] );       

        Kirki::add_field( 'nucleus_header_custom', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_header_custom',
            'label'       => esc_html__( 'Use customer header layout?', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'default'     => '0',
            'priority'    => 10,
        ] );        

        Kirki::add_field( 'nucleus_header_left', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Left Section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_left',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'choices'     => header_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_custom',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_header_center', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Center Section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_center',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'default'     => '',
                    'choices'     => header_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_custom',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );        

        Kirki::add_field( 'nucleus_header_right', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Right Section', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', 'kirki' ),
            'settings'     => 'nucleus_header_right',
            'fields' => [
                'element' => [
                    'type'        => 'select',
                    'choices'     => header_elements(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_custom',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_header_full_width', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_header_full_width',
            'label'       => esc_html__( 'Header Full Width', 'kirki' ),
            'section'     => 'nucleus_header_layout',
            'default'     => '0',
            'priority'    => 10,
        ] );
        
        Kirki::add_field( 'nucleus_header_text_block_1', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_text_block_1',
            'label'    => esc_html__( 'Text Block # 1', 'kirki' ),
            'section'  => 'nucleus_header_layout',
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_custom',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_header_text_block_2', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_text_block_2',
            'label'    => esc_html__( 'Text Block # 2', 'kirki' ),
            'section'  => 'nucleus_header_layout',
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_custom',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_header_text_block_3', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_text_block_3',
            'label'    => esc_html__( 'Text Block # 3', 'kirki' ),
            'section'  => 'nucleus_header_layout',
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_custom',
                    'operator' => '==',
                    'value'    => true,
                ],
            ]
        ] );        

		// SECTION: Header
		Kirki::add_section( 'nucleus_header_size', array(
            'title'          => esc_html__( 'Header Size', 'nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the header size.', 'nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        Kirki::add_field( 'nucleus_header_desktop_height', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_desktop_height',
            'label'       => esc_html__( 'Desktop Height (px)', 'kirki' ),
            'section'     => 'nucleus_header_size',
            'default'     => 88,
            'choices'     => [
                'min'  => 50,
                'max'  => 250,
                'step' => 1,
            ]
        ] );

        Kirki::add_field( 'nucleus_header_mobile_height', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_mobile_height',
            'label'       => esc_html__( 'Mobile Height (px)', 'kirki' ),
            'section'     => 'nucleus_header_size',
            'default'     => 60,
            'choices'     => [
                'min'  => 40,
                'max'  => 120,
                'step' => 1,
            ]
        ] );

        Kirki::add_field( 'nucleus_header_sticky_height', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_sticky_height',
            'label'       => esc_html__( 'Sticky Header (px)', 'kirki' ),
            'section'     => 'nucleus_header_size',
            'default'     => 112,
            'choices'     => [
                'min'  => 50,
                'max'  => 250,
                'step' => 1,
            ]
        ] );


		// SECTION: Header
		Kirki::add_section( 'nucleus_header_logo_size', array(
            'title'          => esc_html__( 'Logo Size', 'nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the logo size.', 'nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        Kirki::add_field( 'nucleus_header_desktop_logo_height', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_desktop_logo_height',
            'label'       => esc_html__( 'Desktop Logo Height (px)', 'kirki' ),
            'section'     => 'nucleus_header_logo_size',
            'default'     => 24,
            'choices'     => [
                'min'  => 15,
                'max'  => 200,
                'step' => 1,
            ]
        ] );

        Kirki::add_field( 'nucleus_header_mobile_logo_height', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_mobile_logo_height',
            'label'       => esc_html__( 'Mobile Logo Height (px)', 'kirki' ),
            'section'     => 'nucleus_header_logo_size',
            'default'     => 24,
            'choices'     => [
                'min'  => 15,
                'max'  => 100,
                'step' => 1,
            ]
        ] );

        Kirki::add_field( 'nucleus_header_sticky_logo_height', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_sticky_logo_height',
            'label'       => esc_html__( 'Sticky Header Logo (px)', 'kirki' ),
            'section'     => 'nucleus_header_logo_size',
            'default'     => 24,
            'choices'     => [
                'min'  => 15,
                'max'  => 200,
                'step' => 1,
            ]
        ] );
	
	}