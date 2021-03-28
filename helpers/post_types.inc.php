<?php



#-------------------------------------------------------------------------------#
#  Custom Pagination Link for CPT
#-------------------------------------------------------------------------------#


	function get_next_post_types_link( $label = null, $max_page = 0, $current_page = 1, $custom_query ) {

		if ( !$max_page )
			$max_page = $custom_query->max_num_pages;

		if ( !$current_page )
			$current_page = 1;

		$nextpage = intval($current_page) + 1;

		if ( null === $label )
			$label = esc_html__( 'Next Page &raquo;', '_nucleus' );

		if ( !is_single() && ( $nextpage <= $max_page ) ) {
			$attr = apply_filters( 'next_posts_link_attributes', '' );

			return '<a href="' . esc_url(next_post_types( $max_page, $current_page, false )) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';
		}
	}


	function next_post_types_link( $label = null, $max_page = 0, $current_page = 1, $custom_query ) {
		echo get_next_post_types_link(  $label, $max_page, $current_page, $custom_query  );
	}

	function next_post_types( $max_page = 0, $current_page, $echo = true ) {
	    $output = esc_url( get_next_post_types_page_link( $max_page, $current_page ) );
	 
	    if ( $echo )
	        echo wp_kses($output, 'general');
	    else
	        return $output;
	}

	function get_next_post_types_page_link($max_page = 0, $current_page) {
	 
	    if ( !is_single() ) {
	        if ( !$current_page )
	            $current_page = 1;
	        $nextpage = intval($current_page) + 1;
	        if ( !$max_page || $max_page >= $nextpage )
	            return get_pagenum_link($nextpage);
	    }
	}