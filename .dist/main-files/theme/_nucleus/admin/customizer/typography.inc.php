<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Typography Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_typography_settings' );

	function nucleus_customize_typography_settings() {

		// PANEL: Dashboard Settings
		Kirki::add_panel( 'nucleus_typography_settings', array(
			'priority'       => 60,
            'title'          => esc_html__( 'Typography Settings', '_nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the site typography.', '_nucleus' ),
        ) );

        // PANEL: Site Header Typography
		Kirki::add_panel( 'nucleus_typography_site_header', array(
            'panel'          => 'nucleus_typography_settings',
			'priority'       => 10,
            'title'          => esc_html__( 'Site Header', '_nucleus' ),
        ) );

        // SECTION: Logo Typography
		Kirki::add_section( 'nucleus_top_bar_typography', array(
            'title'          => esc_html__( 'Top Bar', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the topbar.', '_nucleus' ),
            'panel'          => 'nucleus_typography_site_header',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_top_bar_regular_text',
            'label'       => esc_html__( 'Regular Text', '_nucleus' ),
            'section'     => 'nucleus_top_bar_typography',
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
            'label'       => esc_html__( 'Menu Text', '_nucleus' ),
            'section'     => 'nucleus_top_bar_typography',
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
            'title'          => esc_html__( 'Logo', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the text logo.', '_nucleus' ),
            'panel'          => 'nucleus_typography_site_header',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_logo_text',
            'label'       => esc_html__( 'Logo Text', '_nucleus' ),
            'section'     => 'nucleus_logo_typography',
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
            'title'          => esc_html__( 'Menu', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the menu.', '_nucleus' ),
            'panel'          => 'nucleus_typography_site_header',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_menu_root',
            'label'       => esc_html__( 'Menu Root', '_nucleus' ),
            'section'     => 'nucleus_menu_typography',
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
            'label'       => esc_html__( 'Menu Child', '_nucleus' ),
            'section'     => 'nucleus_menu_typography',
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
            'title'          => esc_html__( 'Portfolio', '_nucleus' ),
        ) );

        // SECTION: Page Header Typography
        Kirki::add_section( 'nucleus_portfolio_grid_typography', array(
            'title'          => esc_html__( 'Grid', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for classic portfolio layout.', '_nucleus' ),
            'panel'          => 'nucleus_typography_portfolio',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_slider_title',
            'label'       => esc_html__( 'Slider Title', '_nucleus' ),
            'section'     => 'nucleus_portfolio_grid_typography',
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
            'label'       => esc_html__( 'Slider Subtitle', '_nucleus' ),
            'section'     => 'nucleus_portfolio_grid_typography',
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
            'label'       => esc_html__( 'Grid Title', '_nucleus' ),
            'section'     => 'nucleus_portfolio_grid_typography',
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
            'label'       => esc_html__( 'Grid Subtitle', '_nucleus' ),
            'section'     => 'nucleus_portfolio_grid_typography',
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
            'title'          => esc_html__( 'Carousel', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for horizon, spotlight, textual and forza portfolio layouts.', '_nucleus' ),
            'panel'          => 'nucleus_typography_portfolio',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_portfolio_carousel_title',
            'label'       => esc_html__( 'Title', '_nucleus' ),
            'section'     => 'nucleus_portfolio_carousel_typography',
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
            'label'       => esc_html__( 'Subtitle', '_nucleus' ),
            'section'     => 'nucleus_portfolio_carousel_typography',
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
            'label'       => esc_html__( 'Description', '_nucleus' ),
            'section'     => 'nucleus_portfolio_carousel_typography',
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
            'label'       => esc_html__( 'Caption', '_nucleus' ),
            'section'     => 'nucleus_portfolio_carousel_typography',
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
            'title'          => esc_html__( 'Site Body', '_nucleus' ),
        ) );
        
        // SECTION: Page Header Typography
        Kirki::add_section( 'nucleus_page_header_typography', array(
            'title'          => esc_html__( 'Page Header', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the page header.', '_nucleus' ),
            'panel'          => 'nucleus_typography_site_body',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_page_header_title',
            'label'       => esc_html__( 'Title', '_nucleus' ),
            'section'     => 'nucleus_page_header_typography',
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
            'label'       => esc_html__( 'Subtitle', '_nucleus' ),
            'section'     => 'nucleus_page_header_typography',
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
            'label'       => esc_html__( 'Backdrop', '_nucleus' ),
            'section'     => 'nucleus_page_header_typography',
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
            'title'          => esc_html__( 'Form', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the page header.', '_nucleus' ),
            'panel'          => 'nucleus_typography_site_body',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_form_label',
            'label'       => esc_html__( 'Label', '_nucleus' ),
            'section'     => 'nucleus_forms_typography',
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
            'label'       => esc_html__( 'Field Text', '_nucleus' ),
            'section'     => 'nucleus_forms_typography',
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
            'label'       => esc_html__( 'Button Text', '_nucleus' ),
            'section'     => 'nucleus_forms_typography',
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
            'title'          => esc_html__( 'Blog', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the blog.', '_nucleus' ),
        ) );

        // PANEL: Blog Typography
		Kirki::add_panel( 'nucleus_typography_blog_master', array(
            'panel'          => 'nucleus_typography_blog',
			'priority'       => 70,
            'title'          => esc_html__( 'Blog Master', '_nucleus' ),
        ) );

        // SECTION: Menu Typography
        Kirki::add_section( 'nucleus_typography_blog_master_minimal', array(
            'title'          => esc_html__( 'Minimal Blog', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the minimal blog master page.', '_nucleus' ),
            'panel'          => 'nucleus_typography_blog_master',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_minimal_title',
            'label'       => esc_html__( 'Title', '_nucleus' ),
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
            'label'       => esc_html__( 'Meta', '_nucleus' ),
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
            'label'       => esc_html__( 'Counter', '_nucleus' ),
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
            'title'          => esc_html__( 'Magazine Blog', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the magazine blog master page.', '_nucleus' ),
            'panel'          => 'nucleus_typography_blog_master',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_magazine_standard_title',
            'label'       => esc_html__( 'Standard Post - Title', '_nucleus' ),
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
            'label'       => esc_html__( 'Standard Post - Description', '_nucleus' ),
            'section'     => 'nucleus_typography_blog_master_magazine',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '300',
                'font-size'      => '17.5px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_master_magazine_standard_meta',
            'label'       => esc_html__( 'Standard Post - Meta', '_nucleus' ),
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
            'label'       => esc_html__( 'Featured Post - Title', '_nucleus' ),
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
            'label'       => esc_html__( 'Featured Post - Description', '_nucleus' ),
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
            'label'       => esc_html__( 'Featured Post - Meta', '_nucleus' ),
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
            'label'       => esc_html__( 'Fetaured Post - Tag', '_nucleus' ),
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

        // SECTION: Blog Detail Typography
        Kirki::add_section( 'nucleus_typography_blog_detail', array(
            'title'          => esc_html__( 'Blog Detail', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the blog master page.', '_nucleus' ),
            'panel'          => 'nucleus_typography_blog',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_detail_title',
            'label'       => esc_html__( 'Title', '_nucleus' ),
            'section'     => 'nucleus_typography_blog_detail',
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '400',
                'font-size'      => '52px',
                'line-height'    => '1.3',
                'letter-spacing' => '-0.5px',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_detail_meta',
            'label'       => esc_html__( 'Meta', '_nucleus' ),
            'section'     => 'nucleus_typography_blog_detail',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '18px',
                'line-height'    => '1.3',
                'letter-spacing' => '-0.5px',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_detail_tag',
            'label'       => esc_html__( 'Tag', '_nucleus' ),
            'section'     => 'nucleus_typography_blog_detail',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '14px',
                'line-height'    => '1.5',
                'letter-spacing' => '1px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );
        
        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_blog_detail_body',
            'label'       => esc_html__( 'Body Text', '_nucleus' ),
            'section'     => 'nucleus_typography_blog_detail',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '18px',
                'line-height'    => '1.65',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );


        // SECTION: Comments Typography
        Kirki::add_section( 'nucleus_comments_typography', array(
            'title'          => esc_html__( 'Comments', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the comments section.', '_nucleus' ),
            'panel'          => 'nucleus_typography_site_body',
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_comments_title',
            'label'       => esc_html__( 'Section Title', '_nucleus' ),
            'section'     => 'nucleus_comments_typography',
            'default'     => [
                'font-family'    => 'DM Serif Text',
                'variant'        => '400',
                'font-size'      => '36px',
                'line-height'    => '1.3',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_comments_subtitle',
            'label'       => esc_html__( 'Section Subtitle', '_nucleus' ),
            'section'     => 'nucleus_comments_typography',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '16px',
                'line-height'    => '1.65',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_comments_author',
            'label'       => esc_html__( 'Author Name', '_nucleus' ),
            'section'     => 'nucleus_comments_typography',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '18px',
                'line-height'    => '1.6',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_comments_text',
            'label'       => esc_html__( 'Comment Text', '_nucleus' ),
            'section'     => 'nucleus_comments_typography',
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


        // SECTION: Site Footer Typography
        Kirki::add_section( 'nucleus_site_footer_typography', array(
            'title'          => esc_html__( 'Site Footer', '_nucleus' ),
            'description'    => esc_html__( 'This section configure typography for the page header.', '_nucleus' ),
            'panel'          => 'nucleus_typography_settings',
            'priority'       => 30,
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_site_footer_title',
            'label'       => esc_html__( 'Title', '_nucleus' ),
            'section'     => 'nucleus_site_footer_typography',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '600',
                'font-size'      => '18px',
                'line-height'    => '1.5',
                'letter-spacing' => '-1px',
                'text-transform' => 'uppercase',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'typography',
            'settings'    => 'nucleus_typography_site_footer_text',
            'label'       => esc_html__( 'Text', '_nucleus' ),
            'section'     => 'nucleus_site_footer_typography',
            'default'     => [
                'font-family'    => 'Open Sans',
                'variant'        => '400',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'priority'    => 10,
            'transport'   => 'auto',
        ] );

	}