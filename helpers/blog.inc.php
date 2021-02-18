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
#  Excerpt Length
#-------------------------------------------------------------------------------#

	// Excerpt Length
	if ( !function_exists('nucleus_custom_excerpt_length') ) {

		function nucleus_custom_excerpt_length( $length ) {
			return 28;
		}

	}
	add_filter( 'excerpt_length', 'nucleus_custom_excerpt_length', 999 );

	// Short Excerpt Function
	function nucleus_excerpt($limit=15) {
		echo wp_trim_words(get_the_excerpt(), $limit);
	}

#-------------------------------------------------------------------------------#
#  'Read More' String
#-------------------------------------------------------------------------------#

	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


#-------------------------------------------------------------------------------#
#  Exclude Slider Posts
#-------------------------------------------------------------------------------#

	function nucleus_search_filter( $query ) {
		$blog_layout = get_query_var('blog') ? get_query_var('blog') : get_theme_mod('nucleus_blog_layout', 'minimal');

		if ( $query->is_home() && !is_admin() && $blog_layout == 'magazine' ) {
			$query->set( 'post__not_in', explode(',', get_theme_mod('nucleus_blog_slider')) );
		}
		return $query;
	}
	add_filter( 'pre_get_posts', 'nucleus_search_filter' );