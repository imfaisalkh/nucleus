<?php

#-------------------------------------------------------------------------------#
#  Class For Theme Data
#-------------------------------------------------------------------------------#

	// Core Class
	if ( ! class_exists( 'nucleusData' ) ):

	    class nucleusData {
	        private static $_values = array ();

	        static public function get( $key ) {
	            return isset( static::$_values[ $key ] ) ? static::$_values[ $key ] : null;
	        }

	        static public function set( $key, $value ) {
	            static::$_values[ $key ] = $value;
	            return $value;
	        }
	    }
	endif; // nucleusData


	// Data Function
	if ( !function_exists('nucleus_globals') ) {

		function nucleus_globals() {

			// Page Styling (from meta-panel)
		    $is_custom_skin 	= get_field('is_custom_skin');

			// Save Final Value in Namespaced Variables
			nucleusData::set('is_custom_skin', $is_custom_skin);

		}
	}

	add_action('template_redirect', 'nucleus_globals');
