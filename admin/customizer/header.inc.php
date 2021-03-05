<?php

#-------------------------------------------------------------------------------#
#  Global Options
#-------------------------------------------------------------------------------#

    function element_visibility() {

        return [
            'both' => esc_html__( 'Mobile + Desktop', '_nucleus' ),
            'mobile' => esc_html__( 'Mobile Only', '_nucleus' ),
            'desktop' => esc_html__( 'Desktop Only', '_nucleus' ),
        ];
    }

    function header_elements() {

        return [
            '' => esc_html__( '', '_nucleus' ),
            'logo' => esc_html__( 'Logo', '_nucleus' ),
            'primary-menu' => esc_html__( 'Primary Menu', '_nucleus' ),
            'secondary-menu' => esc_html__( 'Secondary Menu', '_nucleus' ),
            'hamburger-icon' => esc_html__( 'Hamburger Icon', '_nucleus' ),
            'search-icon' => esc_html__( 'Search Icon', '_nucleus' ),
            'full-screen-icon' => esc_html__( 'Fullscreen Icon', '_nucleus' ),
            'social-icons' => esc_html__( 'Social Icons', '_nucleus' ),
            'button' => esc_html__( 'Button', '_nucleus' ),
            'text-1' => esc_html__( 'Text Block # 1', '_nucleus' ),
            'text-2' => esc_html__( 'Text Block # 2', '_nucleus' ),
            'text-3' => esc_html__( 'Text Block # 3', '_nucleus' ),
        ];
    }

    function top_bar_elements() {

        return [
            'menu' => esc_html__( 'Menu', '_nucleus' ),
            'language-selector' => esc_html__( 'Language Selector', '_nucleus' ),
            'social-icons' => esc_html__( 'Social Icons', '_nucleus' ),
            'text-1' => esc_html__( 'Text Block # 1', '_nucleus' ),
            'text-2' => esc_html__( 'Text Block # 2', '_nucleus' ),
            'text-3' => esc_html__( 'Text Block # 3', '_nucleus' ),
        ];
    }


#-------------------------------------------------------------------------------#
#  Theme Customizer - Header Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_header_settings' );

	function nucleus_customize_header_settings() {

		// PANEL: Dashboard Settings
		Kirki::add_panel( 'nucleus_header_settings', array(
			'priority'       => 25,
            'title'          => esc_html__( 'Header Settings', '_nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the site header.', '_nucleus' ),
        ) );
        

		// SECTION: Header
		Kirki::add_section( 'nucleus_header_top_bar', array(
            'title'          => esc_html__( 'Top Bar', '_nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the top bar.', '_nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_header_top_bar_visibility',
            'label'       => esc_html__( 'Show top bar?', '_nucleus' ),
            'section'     => 'nucleus_header_top_bar',
            'default'     => '0',
            'priority'    => 10,
        ] );        

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Left Section', '_nucleus' ),
            'section'     => 'nucleus_header_top_bar',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', '_nucleus' ),
            'settings'     => 'nucleus_header_top_bar_left',
            'fields' => [
                'element' => [
                    'label'       => esc_html__( 'Element', '_nucleus' ),
                    'type'        => 'select',
                    'choices'     => top_bar_elements(),
                ],
                'visibility' => [
                    'label'       => esc_html__( 'Visibility', '_nucleus' ),
                    'type'        => 'select',
                    'default'     => 'desktop',
                    'choices'     => element_visibility(),
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

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Center Section', '_nucleus' ),
            'section'     => 'nucleus_header_top_bar',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', '_nucleus' ),
            'settings'     => 'nucleus_header_top_bar_center',
            'fields' => [
                'element' => [
                    'label'       => esc_html__( 'Element', '_nucleus' ),
                    'type'        => 'select',
                    'default'     => '',
                    'choices'     => top_bar_elements(),
                ],
                'visibility' => [
                    'label'       => esc_html__( 'Visibility', '_nucleus' ),
                    'type'        => 'select',
                    'default'     => 'desktop',
                    'choices'     => element_visibility(),
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

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Right Section', '_nucleus' ),
            'section'     => 'nucleus_header_top_bar',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', '_nucleus' ),
            'settings'     => 'nucleus_header_top_bar_right',
            'fields' => [
                'element' => [
                    'label'       => esc_html__( 'Element', '_nucleus' ),
                    'type'        => 'select',
                    'choices'     => top_bar_elements(),
                ],
                'visibility' => [
                    'label'       => esc_html__( 'Visibility', '_nucleus' ),
                    'type'        => 'select',
                    'default'     => 'desktop',
                    'choices'     => element_visibility(),
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

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_top_bar_height',
            'label'       => esc_html__( 'Height (px)', '_nucleus' ),
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

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'color',
            'settings'    => 'nucleus_header_top_bar_text_color',
            'label'       => __( 'Text Color', '_nucleus' ),
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
        
        Kirki::add_field( 'nucleus_config', [
            'type'        => 'color',
            'settings'    => 'nucleus_header_top_bar_bg_color',
            'label'       => __( 'Background Color', '_nucleus' ),
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

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_top_bar_text_block_1',
            'label'    => esc_html__( 'Text Block # 1', '_nucleus' ),
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

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_top_bar_text_block_2',
            'label'    => esc_html__( 'Text Block # 2', '_nucleus' ),
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

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_top_bar_text_block_3',
            'label'    => esc_html__( 'Text Block # 3', '_nucleus' ),
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
            'title'          => esc_html__( 'Header Layout', '_nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the header layout.', '_nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'select',
            'settings'    => 'nucleus_header_version',
            'label'       => esc_html__( 'Header version', '_nucleus' ),
            'section'     => 'nucleus_header_layout',
            'default'     => 'v1',
            'placeholder' => esc_html__( 'Select an option...', '_nucleus' ),
            'priority'    => 10,
            'multiple'    => 1,
            'choices'     => [
                'v1' => esc_html__( 'Header V1', '_nucleus' ),
                'v2' => esc_html__( 'Header V2', '_nucleus' ),
                'v3' => esc_html__( 'Header V3', '_nucleus' ),
                'v4' => esc_html__( 'Header V4', '_nucleus' ),
                'v5' => esc_html__( 'Header V5', '_nucleus' ),
                'custom' => esc_html__( 'Custom', '_nucleus' ),
            ],
        ] );        

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Left Section', '_nucleus' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', '_nucleus' ),
            'settings'     => 'nucleus_header_left',
            'fields' => [
                'element' => [
                    'label'       => esc_html__( 'Element', '_nucleus' ),
                    'type'        => 'select',
                    'choices'     => header_elements(),
                ],
                'visibility' => [
                    'label'       => esc_html__( 'Visibility', '_nucleus' ),
                    'type'        => 'select',
                    'default'     => 'desktop',
                    'choices'     => element_visibility(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'custom',
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Center Section', '_nucleus' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', '_nucleus' ),
            'settings'     => 'nucleus_header_center',
            'fields' => [
                'element' => [
                    'label'       => esc_html__( 'Element', '_nucleus' ),
                    'type'        => 'select',
                    'default'     => '',
                    'choices'     => header_elements(),
                ],
                'visibility' => [
                    'label'       => esc_html__( 'Visibility', '_nucleus' ),
                    'type'        => 'select',
                    'default'     => 'desktop',
                    'choices'     => element_visibility(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'custom',
                ],
            ]
        ] );        

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Right Section', '_nucleus' ),
            'section'     => 'nucleus_header_layout',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'field',
                'field' => 'element'
            ],
            'button_label' => esc_html__('Add new element', '_nucleus' ),
            'settings'     => 'nucleus_header_right',
            'fields' => [
                'element' => [
                    'label'       => esc_html__( 'Element', '_nucleus' ),
                    'type'        => 'select',
                    'choices'     => header_elements(),
                ],
                'visibility' => [
                    'label'       => esc_html__( 'Visibility', '_nucleus' ),
                    'type'        => 'select',
                    'default'     => 'desktop',
                    'choices'     => element_visibility(),
                ],
            ],
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'custom',
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_header_full_width',
            'label'       => esc_html__( 'Header Full Width', '_nucleus' ),
            'section'     => 'nucleus_header_layout',
            'default'     => '0',
            'priority'    => 10,
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'text',
            'settings' => 'nucleus_header_button_text',
            'label'    => esc_html__( 'Button Text', '_nucleus' ),
            'default'  => esc_html__( 'Let\'s Talk', '_nucleus' ),
            'section'  => 'nucleus_header_layout',
            'priority' => 10,
            'active_callback'  => [[
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'v2',
                ],
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'custom',
                ],
            ]]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'text',
            'settings' => 'nucleus_header_button_link',
            'label'    => esc_html__( 'Button Link', '_nucleus' ),
            'section'  => 'nucleus_header_layout',
            'priority' => 10,
            'active_callback'  => [[
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'v2',
                ],
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'custom',
                ],
            ]]
        ] );
        
        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_text_block_1',
            'label'    => esc_html__( 'Text Block # 1', '_nucleus' ),
            'section'  => 'nucleus_header_layout',
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'custom',
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_text_block_2',
            'label'    => esc_html__( 'Text Block # 2', '_nucleus' ),
            'section'  => 'nucleus_header_layout',
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'custom',
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_header_text_block_3',
            'label'    => esc_html__( 'Text Block # 3', '_nucleus' ),
            'section'  => 'nucleus_header_layout',
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_header_version',
                    'operator' => '==',
                    'value'    => 'custom',
                ],
            ]
        ] );        

		// SECTION: Header
		Kirki::add_section( 'nucleus_header_size', array(
            'title'          => esc_html__( 'Header Size', '_nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the header size.', '_nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        Kirki::add_field( 'nucleus_header_desktop_height', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_desktop_height',
            'label'       => esc_html__( 'Desktop Height (px)', '_nucleus' ),
            'section'     => 'nucleus_header_size',
            'default'     => 88,
            'choices'     => [
                'min'  => 50,
                'max'  => 250,
                'step' => 1,
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_mobile_height',
            'label'       => esc_html__( 'Mobile Height (px)', '_nucleus' ),
            'section'     => 'nucleus_header_size',
            'default'     => 60,
            'choices'     => [
                'min'  => 40,
                'max'  => 120,
                'step' => 1,
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_sticky_height',
            'label'       => esc_html__( 'Sticky Header (px)', '_nucleus' ),
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
            'title'          => esc_html__( 'Logo Size', '_nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the logo size.', '_nucleus' ),
            'panel'          => 'nucleus_header_settings',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_desktop_logo_height',
            'label'       => esc_html__( 'Desktop Logo Height (px)', '_nucleus' ),
            'section'     => 'nucleus_header_logo_size',
            'default'     => 24,
            'choices'     => [
                'min'  => 15,
                'max'  => 200,
                'step' => 1,
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_mobile_logo_height',
            'label'       => esc_html__( 'Mobile Logo Height (px)', '_nucleus' ),
            'section'     => 'nucleus_header_logo_size',
            'default'     => 24,
            'choices'     => [
                'min'  => 15,
                'max'  => 100,
                'step' => 1,
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'slider',
            'settings'    => 'nucleus_header_sticky_logo_height',
            'label'       => esc_html__( 'Sticky Header Logo (px)', '_nucleus' ),
            'section'     => 'nucleus_header_logo_size',
            'default'     => 24,
            'choices'     => [
                'min'  => 15,
                'max'  => 200,
                'step' => 1,
            ]
        ] );
	
	}