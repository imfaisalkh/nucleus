<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Social Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_info_box_settings' );

	function nucleus_customize_info_box_settings() {

		// SECTION: Social Networks
		Kirki::add_section( 'nucleus_info_box', array(
            'priority'       => 70,
            'title'          => esc_html__( 'Info Box', 'nucleus' ),
            'description'    => esc_html__( 'This section configure info box settings, which appear at top right corner of the site.', 'nucleus' ),
        ) );

        Kirki::add_field( 'nucleus_info_box_title', [
            'type'     => 'text',
            'settings' => 'nucleus_info_box_title',
            'label'    => esc_html__( 'Title', 'nucleus' ),
            'section'  => 'nucleus_info_box',
            'priority' => 10,
        ] );
        
        Kirki::add_field( 'nucleus_info_box_content', [
            'type'     => 'textarea',
            'settings' => 'nucleus_info_box_content',
            'label'    => esc_html__( 'Content', 'nucleus' ),
            'section'  => 'nucleus_info_box',
            'description'   => esc_html__('You can use <br> tag or other HTML tags here.', 'nucleus'),
            'priority' => 10,
        ] );

        Kirki::add_field( 'nucleus_info_box_tooltip', [
            'type'     => 'text',
            'settings' => 'nucleus_info_box_tooltip',
            'label'    => esc_html__( 'Tooltip Text', 'nucleus' ),
            'section'  => 'nucleus_info_box',
            'description'   => esc_html__('Displayed when you hover the notification icon.', 'nucleus'),
            'priority' => 10,
        ] );

	}