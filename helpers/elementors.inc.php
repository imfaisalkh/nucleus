<?php


#-------------------------------------------------------------------------------#
#  Remove some unnecessary elementors widgets.
#-------------------------------------------------------------------------------#


	function unregister_elementor_widgets( $widgets_manager ){

		$widgets_array = [
			'divider',
			// 'image-box',
			// 'icon',
			// 'icon-box',
			// 'image-gallery',
			// 'image-carousel',
			// 'icon-list',
			// 'counter',
			// 'progress',
			// 'testimonial',
			// 'tabs',
			// 'accordion',
			// 'toggle',
			// 'social-icons',
			// 'alert',
			// 'menu-anchor',
			// 'sidebar',
		];

		foreach ( $widgets_array as $widget_name ) {
			$widgets_manager->unregister_widget_type( $widget_name );
		}

	}
	add_filter( 'elementor/widgets/widgets_registered' , 'unregister_elementor_widgets' );



#-------------------------------------------------------------------------------#
#  Remove default WordPress widgets from elementors panel.
#-------------------------------------------------------------------------------#


	function prefix_blacklist_widgets(){

		$black_list = [
			'WP_Widget_Pages',
			'WP_Widget_Calendar',
			'WP_Widget_Archives',
			'WP_Widget_Links',
			'WP_Widget_Meta',
			'WP_Widget_Search',
			'WP_Widget_Text',
			'WP_Widget_Categories',
			'WP_Widget_Recent_Posts',
			'WP_Widget_Recent_Comments',
			'WP_Widget_RSS',
			'WP_Widget_Tag_Cloud',
			'WP_Nav_Menu_Widget',
		];

		return $black_list;

	}
	add_filter( 'elementor/widgets/black_list' , 'prefix_blacklist_widgets' );
