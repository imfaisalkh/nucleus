<?php

#-------------------------------------------------------------------------------#
#  Theme Customizer - Social Settings
#-------------------------------------------------------------------------------#

	add_action( 'init', 'nucleus_customize_misc_settings' );

	function nucleus_customize_misc_settings() {

        Kirki::add_field( 'nucleus_config', [
            'type'        => 'toggle',
            'settings'    => 'nucleus_site_preloader',
            'label'       => __( 'Enable Site Preloader', 'nucleus' ),
            'description' => esc_html__( 'Do you want to enable site preloader animation?', 'nucleus' ),
            'section'     => 'title_tagline',
            'default'     => '1',
            'priority'    => 10,
        ] );

	}