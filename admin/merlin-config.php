<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory'            => 'admin/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'merlin', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => !defined('WP_ENV') && !get_theme_mod('nucleus_enable_dev_mode', false) ? false : true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => esc_url( home_url('/') ), // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Theme Setup', 'nucleus' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'nucleus' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'nucleus' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'nucleus' ),

		'btn-skip'                 => esc_html__( 'Skip', 'nucleus' ),
		'btn-next'                 => esc_html__( 'Next', 'nucleus' ),
		'btn-start'                => esc_html__( 'Start', 'nucleus' ),
		'btn-no'                   => esc_html__( 'Cancel', 'nucleus' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'nucleus' ),
		'btn-child-install'        => esc_html__( 'Install', 'nucleus' ),
		'btn-content-install'      => esc_html__( 'Install', 'nucleus' ),
		'btn-import'               => esc_html__( 'Import', 'nucleus' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'nucleus' ),
		'btn-license-skip'         => esc_html__( 'Later', 'nucleus' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'nucleus' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'nucleus' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'nucleus' ),
		'license-label'            => esc_html__( 'License key', 'nucleus' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'nucleus' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'nucleus' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'nucleus' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'nucleus' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'nucleus' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'nucleus' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'nucleus' ),

		'child-header'             => esc_html__( 'Install Child Theme', 'nucleus' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'nucleus' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'nucleus' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'nucleus' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'nucleus' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'nucleus' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'nucleus' ),

		'plugins-header'           => esc_html__( 'Install Plugins', 'nucleus' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'nucleus' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'nucleus' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'nucleus' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'nucleus' ),

		'import-header'            => esc_html__( 'Import Content', 'nucleus' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'nucleus' ),
		'import-action-link'       => esc_html__( 'Advanced', 'nucleus' ),

		'ready-header'             => esc_html__( 'All done. Have fun!', 'nucleus' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'nucleus' ),
		'ready-action-link'        => esc_html__( 'Extras', 'nucleus' ),
		'ready-big-button'         => esc_html__( 'View your website', 'nucleus' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'mailto:support@wpscouts.net', esc_html__( 'Get Theme Support', 'nucleus' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'mailto:inquiry@wpscouts.net', esc_html__( 'Get Customization Quote', 'nucleus' ) ),
	)
);

/**
 * Set location of import files.
 */

#-----------------------------------------------------------------#
# Set location of import files.
#-----------------------------------------------------------------#

	function nucleus_local_import_files() {
		return array(
			array(
				'import_file_name'             => 'Demo Import',
				'local_import_file'            => get_parent_theme_file_path( '/demo/content.xml' ),
				'local_import_widget_file'     => get_parent_theme_file_path( '/demo/widgets.wie' ),
				'local_import_customizer_file' => get_parent_theme_file_path( '/demo/customizer.dat' ),
				'import_preview_image_url'     => 'https://demo.wpscouts.net/nucleus/wp-content/themes/nucleus/screenshot.png',
				'import_notice'                => __( 'A special note for this import.', 'nucleus' ),
				'preview_url'                  => 'https://demo.wpscouts.net/nucleus/',
			),
		);
	}
	add_filter( 'merlin_import_files', 'nucleus_local_import_files' );

#-----------------------------------------------------------------#
# Do some actions after Merlin Import
#-----------------------------------------------------------------#

	function nucleus_merlin_after_import() {
	
		// Assign menus to their locations.
		$site_menu_desktop = get_term_by( 'name', 'Site Menu - Desktop', 'nav_menu' );
		$site_menu_mobile = get_term_by( 'name', 'Site Menu - Mobile', 'nav_menu' );
		$menus = array(
			'nucleus-desktop-navigation' => $site_menu_desktop->term_id,
			'nucleus-mobile-navigation' => $site_menu_mobile->term_id,
		);
		set_theme_mod( 'nav_menu_locations', $menus );
	}
	add_action( 'merlin_after_all_import', 'nucleus_merlin_after_import' );



#-----------------------------------------------------------------#
# Locate your Homepage for Merlin
#-----------------------------------------------------------------#

	function nucleus_merlin_content_home_page_title( $output ) {
		return 'Works - Classic';
	}
	add_filter( 'merlin_content_home_page_title', 'nucleus_merlin_content_home_page_title' );


#-----------------------------------------------------------------#
# Locate your Blog page for Merlin
#-----------------------------------------------------------------#

	function nucleus_merlin_content_blog_page_title( $output ) {
		return 'News';
	}
	add_filter( 'merlin_content_blog_page_title', 'nucleus_merlin_content_blog_page_title' );


#-----------------------------------------------------------------#
# Unset Default Widgets from following Sidebar
#-----------------------------------------------------------------#

	function nucleus_merlin_unset_default_widgets_args( $widget_areas ) {
		$widget_areas = array(
			'page-sidebar' => array(),
            'blog-sidebar' => array(),
		);
		return $widget_areas;
	}
	add_filter( 'merlin_unset_default_widgets_args', 'nucleus_merlin_unset_default_widgets_args' );