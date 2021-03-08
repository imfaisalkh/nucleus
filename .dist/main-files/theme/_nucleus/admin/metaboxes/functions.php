<?php

#-------------------------------------------------------------------------------#
#  Disable ACF UI in admin panel (except in 'development' environment)
#-------------------------------------------------------------------------------#

	// Insert following line in your 'wp-config.php' to display admin UI
	// define('WP_ENV', 'development');

	if ( !defined('WP_ENV') ) {

		define( 'ACF_LITE', true );

	}


#-------------------------------------------------------------------------------#
#  Integrate Google Map API with theme
#-------------------------------------------------------------------------------#

	function nucleus_acf_google_map_api( $api ){
		$api['key'] = get_theme_mod('nucleus_gmap_api');
		return $api;
	}

	add_filter('acf/fields/google_map/api', 'nucleus_acf_google_map_api');


#-------------------------------------------------------------------------------#
#  Define JSON files save point
#-------------------------------------------------------------------------------#

	function nucleus_acf_json_save_point( $path ) {

		// update path
		$path = NUCLEUS_ADMIN . '/metaboxes/acf-json';

		// return
		return $path;

	}

	add_filter('acf/settings/save_json', 'nucleus_acf_json_save_point');


#-------------------------------------------------------------------------------#
#  Define JSON files load point (for input panels and NOT edit panels)
#-------------------------------------------------------------------------------#


	function nucleus_acf_json_load_point( $paths ) {
	    
	    // remove original path (optional)
	    unset($paths[0]);
	    
	    // append path
	    $paths[] = NUCLEUS_ADMIN . '/metaboxes/acf-json';
	    
	    // return
	    return $paths;
	    
	}

	add_filter('acf/settings/load_json', 'nucleus_acf_json_load_point');