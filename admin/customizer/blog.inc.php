<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Blog Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_blog_settings' );

	function nucleus_customize_blog_settings() {

		// SECTION: Blog
		Kirki::add_section( 'nucleus_blog_settings', array(
            'priority'       => 40,
            'title'          => esc_html__( 'Blog Settings', '_nucleus' ),
            'description'    => esc_html__( 'This section configure settings for the blog.', '_nucleus' ),
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_blog_sidebar',
            'label'       => esc_html__( 'Enable Blog Sidebar?', '_nucleus' ),
            'section'     => 'nucleus_blog_settings',
            'default'     => '1',
            'priority'    => 10,
        ] ); 

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'select',
            'settings'    => 'nucleus_blog_layout',
            'label'       => esc_html__( 'Blog Layout', '_nucleus' ),
            'section'     => 'nucleus_blog_settings',
            'default'     => 'minimal',
            'placeholder' => esc_html__( 'Select an option...', '_nucleus' ),
            'priority'    => 10,
            'multiple'    => 1,
            'choices'     => [
                'minimal' => esc_html__( 'Minimal', '_nucleus' ),
                'magazine' => esc_html__( 'Magazine', '_nucleus' ),
            ],
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'text',
            'settings' => 'nucleus_blog_slider',
            'label'    => esc_html__( 'Slider Posts', '_nucleus' ),
            'section'  => 'nucleus_blog_settings',
            'description'   => esc_html__('A comma sperated list of post IDs.', '_nucleus'),
            'priority' => 10,
            'active_callback'  => [
                [
                    'setting'  => 'nucleus_blog_layout',
                    'operator' => '==',
                    'value'    => 'magazine',
                ],
            ]
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'select',
            'settings'    => 'nucleus_blog_pagination',
            'label'       => esc_html__( 'Pagination Type', '_nucleus' ),
            'section'     => 'nucleus_blog_settings',
            'default'     => 'button',
            'priority'    => 10,
            'choices'     => [
                'button' => esc_html__( 'Load More', '_nucleus' ),
                'scroll' => esc_html__( 'Infinite Scroll', '_nucleus' ),
                'number' => esc_html__( 'Numbered', '_nucleus' ),
            ],
        ] );

	}