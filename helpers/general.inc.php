<?php


#-----------------------------------------------------------------#
# Fallback for ACF get_field() function
#-----------------------------------------------------------------# 

	if ( !is_admin() && !function_exists('get_field') ) {

	    function get_field($key, $post_ID = NULL) {
	    	$post_ID = isset($post_ID) ? $post_ID : get_the_ID();
	        return get_post_meta($post_ID, $key, true);
	    }

	}



#-----------------------------------------------------------------#
# CPT Custom Functions
#-----------------------------------------------------------------#


	// Get array of term attr(s) of any taxonomy   
	if ( !function_exists('nucleus_get_term_fields') ) {

		function nucleus_get_term_fields($taxonomy, $field) {

			global $post;

			$taxonomy_terms = get_the_terms($post->ID, $taxonomy);

			if ( !empty($taxonomy_terms) ) {
				foreach ( $taxonomy_terms as $term ) {
				  $term_field[] = $term->$field;
				}
			}

			return $term_field;

		}

	}


#-------------------------------------------------------------------------------#
#  Convert Hex code to RGB code
#-------------------------------------------------------------------------------#


	function nucleus_disable_wp_updates( $r, $url ) {
	    if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
	        return $r; // Not a theme update request. Bail immediately.
	    $themes = unserialize( $r['body']['themes'] );
	    unset( $themes['theme-slug'] );
	    unset( $themes[ get_option( 'stylesheet' ) ] );
	    $r['body']['themes'] = serialize( $themes );
	    return $r;
	}

	add_filter( 'http_request_args', 'nucleus_disable_wp_updates', 5, 2 );



#-------------------------------------------------------------------------------#
#  Convert Hex code to RGB code
#-------------------------------------------------------------------------------#


	function hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);

		return $rgb; // returns an array with the rgb values
	}
