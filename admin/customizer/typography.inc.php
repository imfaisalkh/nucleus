<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Typography Settings
#-------------------------------------------------------------------------------#

    function google_font_stacks() {
        if (get_theme_mod('nucleus_typography_general_primary')) {
            $font_stacks[] = get_theme_mod('nucleus_typography_general_primary')['font-family'];
        }
        if (get_theme_mod('nucleus_typography_general_secondary')) {
            $font_stacks[] = get_theme_mod('nucleus_typography_general_secondary')['font-family'];
        }
        if (get_theme_mod('nucleus_typography_general_tertiary')) {
            $font_stacks[] = get_theme_mod('nucleus_typography_general_tertiary')['font-family'];
        }
        if (get_theme_mod('nucleus_typography_general_quaternary')) {
            $font_stacks[] = get_theme_mod('nucleus_typography_general_quaternary')['font-family'];
        }
        if (get_theme_mod('nucleus_typography_general_quinary')) {
            $font_stacks[] = get_theme_mod('nucleus_typography_general_quinary')['font-family'];
        }

        return $font_stacks;
    }

#-------------------------------------------------------------------------------#
#  Theme Customizer - Typography Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_typography_settings' );

	function nucleus_customize_typography_settings() {

		// PANEL: Dashboard Settings
		Kirki::add_panel( 'nucleus_typography_settings', array(
			'priority'       => 10,
            'title'          => esc_html__( 'Typography Settings', 'nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the site typography.', 'nucleus' ),
        ) );

		// SECTION: Font Families Typography
		Kirki::add_section( 'nucleus_typography_stacks', array(
            'priority'       => 0,
            'title'          => esc_html__( 'Font Families--------', 'nucleus' ),
            'description'    => esc_html__( 'Font families chosen here will be available to use in other typography panels. Make sure to refresh the page after choosing the font-families here.', 'nucleus' ),
            'panel'          => 'nucleus_typography_settings',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_general_primary',
            'label'       => esc_html__( 'Primary Font', 'kirki' ),
            'section'     => 'nucleus_typography_stacks',
            'default'     => [
                'font-family'    => 'DM Serif Text',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_general_secondary',
            'label'       => esc_html__( 'Secondary Font', 'kirki' ),
            'section'     => 'nucleus_typography_stacks',
            'default'     => [
                'font-family'    => 'Open Sans',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_general_tertiary',
            'label'       => esc_html__( 'Tertiary Font', 'kirki' ),
            'section'     => 'nucleus_typography_stacks',
            'default'     => [
                'font-family'    => '',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_general_quaternary',
            'label'       => esc_html__( 'Quaternary Font', 'kirki' ),
            'section'     => 'nucleus_typography_stacks',
            'default'     => [
                'font-family'    => '',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_general_quinary',
            'label'       => esc_html__( 'Quinary Font', 'kirki' ),
            'section'     => 'nucleus_typography_stacks',
            'default'     => [
                'font-family'    => '',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        // PANEL: Site Header Typography
		Kirki::add_panel( 'nucleus_typography_site_header', array(
            'panel'          => 'nucleus_typography_settings',
			'priority'       => 10,
            'title'          => esc_html__( 'Site Header', 'nucleus' ),
        ) );

        // SECTION: Logo Typography
		Kirki::add_section( 'nucleus_top_bar_typography', array(
            'title'          => esc_html__( 'Top Bar', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the topbar.', 'nucleus' ),
            'panel'          => 'nucleus_typography_site_header',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_top_bar_regular_text',
            'label'       => esc_html__( 'Regular Text', 'kirki' ),
            'section'     => 'nucleus_top_bar_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '14px',
                'line-height'    => '1.65',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );
        
        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_top_bar_menu_text',
            'label'       => esc_html__( 'Menu Text', 'kirki' ),
            'section'     => 'nucleus_top_bar_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '14px',
                'line-height'    => '1.65',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        // SECTION: Logo Typography
		Kirki::add_section( 'nucleus_logo_typography', array(
            'title'          => esc_html__( 'Logo', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the text logo.', 'nucleus' ),
            'panel'          => 'nucleus_typography_site_header',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_logo_text',
            'label'       => esc_html__( 'Logo Text', 'kirki' ),
            'section'     => 'nucleus_logo_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Lato',
                'variant'        => '400',
                'font-size'      => '3.2rem',
                'line-height'    => '1.6',
                'letter-spacing' => '0.4px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );
        
		// SECTION: Menu Typography
		Kirki::add_section( 'nucleus_menu_typography', array(
            'title'          => esc_html__( 'Menu', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the menu.', 'nucleus' ),
            'panel'          => 'nucleus_typography_site_header',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_menu_root',
            'label'       => esc_html__( 'Menu Root', 'kirki' ),
            'section'     => 'nucleus_menu_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_menu_child',
            'label'       => esc_html__( 'Menu Child', 'kirki' ),
            'section'     => 'nucleus_menu_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '16px',
                'line-height'    => '1',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

         // PANEL: Portfolio Typography
		Kirki::add_panel( 'nucleus_typography_portfolio', array(
            'panel'          => 'nucleus_typography_settings',
			'priority'       => 60,
            'title'          => esc_html__( 'Portfolio', 'nucleus' ),
        ) );

        // SECTION: Page Header Typography
        Kirki::add_section( 'nucleus_portfolio_grid_typography', array(
            'title'          => esc_html__( 'Grid', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for classic portfolio layout.', 'nucleus' ),
            'panel'          => 'nucleus_typography_portfolio',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_slider_title',
            'label'       => esc_html__( 'Slider Title', 'kirki' ),
            'section'     => 'nucleus_portfolio_grid_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_slider_subtitle',
            'label'       => esc_html__( 'Slider Subtitle', 'kirki' ),
            'section'     => 'nucleus_portfolio_grid_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_grid_title',
            'label'       => esc_html__( 'Grid Title', 'kirki' ),
            'section'     => 'nucleus_portfolio_grid_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_grid_subtitle',
            'label'       => esc_html__( 'Grid Subtitle', 'kirki' ),
            'section'     => 'nucleus_portfolio_grid_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        // SECTION: Page Header Typography
        Kirki::add_section( 'nucleus_portfolio_carousel_typography', array(
            'title'          => esc_html__( 'Carousel', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for horizon, spotlight, textual and forza portfolio layouts.', 'nucleus' ),
            'panel'          => 'nucleus_typography_portfolio',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_carousel_title',
            'label'       => esc_html__( 'Title', 'kirki' ),
            'section'     => 'nucleus_portfolio_carousel_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_carousel_subtitle',
            'label'       => esc_html__( 'Subtitle', 'kirki' ),
            'section'     => 'nucleus_portfolio_carousel_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_carousel_desc',
            'label'       => esc_html__( 'Description', 'kirki' ),
            'section'     => 'nucleus_portfolio_carousel_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_carousel_caption',
            'label'       => esc_html__( 'Caption', 'kirki' ),
            'section'     => 'nucleus_portfolio_carousel_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        // PANEL: Site Body Typography
		Kirki::add_panel( 'nucleus_typography_site_body', array(
            'panel'          => 'nucleus_typography_settings',
			'priority'       => 20,
            'title'          => esc_html__( 'Site Body', 'nucleus' ),
        ) );
        
        // SECTION: Page Header Typography
        Kirki::add_section( 'nucleus_page_header_typography', array(
            'title'          => esc_html__( 'Page Header', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the page header.', 'nucleus' ),
            'panel'          => 'nucleus_typography_site_body',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_page_header_title',
            'label'       => esc_html__( 'Title', 'kirki' ),
            'section'     => 'nucleus_page_header_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '400',
                'font-size'      => '44px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'capitalize',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_page_header_subtitle',
            'label'       => esc_html__( 'Subtitle', 'kirki' ),
            'section'     => 'nucleus_page_header_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '18px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ]);
        
        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_page_header_backdrop',
            'label'       => esc_html__( 'Backdrop', 'kirki' ),
            'section'     => 'nucleus_page_header_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '400',
                'font-size'      => '200px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );        


        // SECTION: Forms Typography
        Kirki::add_section( 'nucleus_forms_typography', array(
            'title'          => esc_html__( 'Form', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the page header.', 'nucleus' ),
            'panel'          => 'nucleus_typography_site_body',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_form_label',
            'label'       => esc_html__( 'Label', 'kirki' ),
            'section'     => 'nucleus_forms_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '17px',
                'line-height'    => '46px',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_form_field_text',
            'label'       => esc_html__( 'Field Text', 'kirki' ),
            'section'     => 'nucleus_forms_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '16px',
                'line-height'    => '48px',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_form_button_text',
            'label'       => esc_html__( 'Button Text', 'kirki' ),
            'section'     => 'nucleus_forms_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '17px',
                'line-height'    => '1.1',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        // PANEL: Blog Typography
		Kirki::add_panel( 'nucleus_typography_blog', array(
            'panel'          => 'nucleus_typography_settings',
			'priority'       => 70,
            'title'          => esc_html__( 'Blog', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the blog.', 'nucleus' ),
        ) );

        // PANEL: Blog Typography
		Kirki::add_panel( 'nucleus_typography_blog_master', array(
            'panel'          => 'nucleus_typography_blog',
			'priority'       => 70,
            'title'          => esc_html__( 'Blog Master', 'nucleus' ),
        ) );

        // SECTION: Menu Typography
        Kirki::add_section( 'nucleus_typography_blog_master_minimal', array(
            'title'          => esc_html__( 'Minimal Blog', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the minimal blog master page.', 'nucleus' ),
            'panel'          => 'nucleus_typography_blog_master',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_minimal_title',
            'label'       => esc_html__( 'Title', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_minimal',
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '400',
                'font-size'      => '24px',
                'line-height'    => '1.3',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_minimal_meta',
            'label'       => esc_html__( 'Meta', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_minimal',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '14px',
                'line-height'    => '1.3',
                'letter-spacing' => '0',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_minimal_counter',
            'label'       => esc_html__( 'Counter', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_minimal',
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '800',
                'font-size'      => '26px',
                'line-height'    => '1',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );


        // SECTION: Menu Typography
        Kirki::add_section( 'nucleus_typography_blog_master_magazine', array(
            'title'          => esc_html__( 'Magazine Blog', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the magazine blog master page.', 'nucleus' ),
            'panel'          => 'nucleus_typography_blog_master',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_magazine_standard_title',
            'label'       => esc_html__( 'Standard Post - Title', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_magazine',
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '400',
                'font-size'      => '28px',
                'line-height'    => '1.2',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );
        
        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_magazine_standard_desc',
            'label'       => esc_html__( 'Standard Post - Description', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_magazine',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '300',
                'font-size'      => '18px',
                'line-height'    => '1.2',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_magazine_standard_meta',
            'label'       => esc_html__( 'Standard Post - Meta', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_magazine',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '16px',
                'line-height'    => '1.6',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_magazine_featured_title',
            'label'       => esc_html__( 'Featured Post - Title', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_magazine',
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '400',
                'font-size'      => '36px',
                'line-height'    => '1.2',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );
        
        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_magazine_featured_desc',
            'label'       => esc_html__( 'Featured Post - Description', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_magazine',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '300',
                'font-size'      => '20px',
                'line-height'    => '1.6',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_magazine_featured_meta',
            'label'       => esc_html__( 'Featured Post - Meta', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_magazine',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '16px',
                'line-height'    => '1.6',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_magazine_featured_tag',
            'label'       => esc_html__( 'Fetaured Post - Tag', 'kirki' ),
            'section'     => 'nucleus_typography_blog_master_magazine',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '13px',
                'line-height'    => '1.6',
                'letter-spacing' => '1px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        // SECTION: Menu Typography
        Kirki::add_section( 'nucleus_typography_blog_detail', array(
            'title'          => esc_html__( 'Blog Detail', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the blog master page.', 'nucleus' ),
            'panel'          => 'nucleus_typography_blog',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_detail_title',
            'label'       => esc_html__( 'Title', 'kirki' ),
            'section'     => 'nucleus_typography_blog_detail',
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_detail_meta',
            'label'       => esc_html__( 'Meta', 'kirki' ),
            'section'     => 'nucleus_typography_blog_detail',
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_detail_tag',
            'label'       => esc_html__( 'Tag', 'kirki' ),
            'section'     => 'nucleus_typography_blog_detail',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );
        
        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_detail_body',
            'label'       => esc_html__( 'Body Text', 'kirki' ),
            'section'     => 'nucleus_typography_blog_detail',
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );


        // SECTION: Comments Typography
        Kirki::add_section( 'nucleus_comments_typography', array(
            'title'          => esc_html__( 'Comments', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the comments section.', 'nucleus' ),
            'panel'          => 'nucleus_typography_site_body',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_comments_title',
            'label'       => esc_html__( 'Section Title', 'kirki' ),
            'section'     => 'nucleus_comments_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_comments_subtitle',
            'label'       => esc_html__( 'Section Subtitle', 'kirki' ),
            'section'     => 'nucleus_comments_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_comments_author',
            'label'       => esc_html__( 'Author Name', 'kirki' ),
            'section'     => 'nucleus_comments_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_comments_text',
            'label'       => esc_html__( 'Comment Text', 'kirki' ),
            'section'     => 'nucleus_comments_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );


        // SECTION: Site Footer Typography
        Kirki::add_section( 'nucleus_site_footer_typography', array(
            'title'          => esc_html__( 'Site Footer', 'nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the page header.', 'nucleus' ),
            'panel'          => 'nucleus_typography_settings',
            'priority'       => 30,
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_site_footer_title',
            'label'       => esc_html__( 'Title', 'kirki' ),
            'section'     => 'nucleus_site_footer_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_site_footer_text',
            'label'       => esc_html__( 'Text', 'kirki' ),
            'section'     => 'nucleus_site_footer_typography',
            'choices' => [
                'fonts' => [
                    'google' => google_font_stacks(),
                ],
            ],
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0.5px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

	}