<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Social Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_info_box_settings' );

	function nucleus_customize_info_box_settings() {

		// SECTION: Social Networks
		Kirki::add_section( 'nucleus_info_box', array(
            'priority'       => 70,
            'title'          => esc_html__( 'Info Box', '_nucleus' ),
            'description'    => esc_html__( 'This section configure info box settings, which appear at top right corner of the site.', '_nucleus' ),
        ) );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'text',
            'settings' => 'nucleus_info_box_title',
            'label'    => esc_html__( 'Title', '_nucleus' ),
            'section'  => 'nucleus_info_box',
            'priority' => 10,
        ] );
        
        Kirki::add_field( 'nucleus_config', [
            'type'     => 'textarea',
            'settings' => 'nucleus_info_box_content',
            'label'    => esc_html__( 'Content', '_nucleus' ),
            'section'  => 'nucleus_info_box',
            'description'   => esc_html__('You can use <br> tag or other HTML tags here.', '_nucleus'),
            'priority' => 10,
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'     => 'text',
            'settings' => 'nucleus_info_box_tooltip',
            'label'    => esc_html__( 'Tooltip Text', '_nucleus' ),
            'section'  => 'nucleus_info_box',
            'description'   => esc_html__('Displayed when you hover the notification icon.', '_nucleus'),
            'priority' => 10,
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'color',
            'settings'    => 'nucleus_info_box_bg_color',
            'label'       => esc_html__( 'Background Color', '_nucleus' ),
            'section'     => 'nucleus_info_box',
            'default'     => '#F4F2A5',
        ] );

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'color',
            'settings'    => 'nucleus_info_box_text_color',
            'label'       => esc_html__( 'Text Color', '_nucleus' ),
            'section'     => 'nucleus_info_box',
            'default'     => '#000',
        ] );

	}