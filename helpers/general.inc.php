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


#-----------------------------------------------------------------#
# WP KSES Allowed Tags
#-----------------------------------------------------------------#

	function nucleus_kses_allowed_html($tags, $context) {
		switch($context) {
			case 'general': 
				$tags = array( 
					'a' => array('href' => array()),
					'b' => array(),
					'br' => array()
				);
				return $tags;
			default: 
				return $tags;
		}
	}
	
	add_filter( 'wp_kses_allowed_html', 'nucleus_kses_allowed_html', 10, 2);