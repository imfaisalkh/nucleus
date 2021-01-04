<?php


#-------------------------------------------------------------------------------#
#  Filter wp_link_pages to wrap current page in span.
#-------------------------------------------------------------------------------#

	if ( !function_exists('nucleus_link_pages_link') ) {

		function nucleus_link_pages_link( $link ) {
		    if ( ctype_digit( $link ) ) {
		        return '<span class="page-numbers current">' . $link . '</span>';
		    }
		    return $link;
		}

	}
	add_filter( 'wp_link_pages_link', 'nucleus_link_pages_link' );


#-------------------------------------------------------------------------------#
#  Excerpt Length and 'Read More' String
#-------------------------------------------------------------------------------#

	// Excerpt Length
	if ( !function_exists('nucleus_custom_excerpt_length') ) {

		function nucleus_custom_excerpt_length( $length ) {
			return 23;
		}

	}
	add_filter( 'excerpt_length', 'nucleus_custom_excerpt_length', 999 );

	// Custom Excerpt Function
	function newstime_excerpt($limit) {
	    echo wp_trim_words(get_the_excerpt(), $limit);
	}


	// Read More
	if ( !function_exists('nucleus_read_more_link') ) {

		function nucleus_read_more_link() {
		    return '<div class="read-more-wrap"><a class="more-link" href="' . get_permalink() . '">Read More</a></div>';
		}

	}
	add_filter( 'the_content_more_link', 'nucleus_read_more_link' );


	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
