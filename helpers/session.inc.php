<?php


#-------------------------------------------------------------------------------#
#  Set Session Variables
#-------------------------------------------------------------------------------#


	if ( !function_exists('nucleus_register_session') ) {

		function nucleus_register_session() {

			if( !session_id() && !is_admin() ) {
				session_start();
			}

		    if ( get_query_var('menu') ) {
		        $_SESSION['menu'] = get_query_var('menu');
			}
			
		}

	}

	add_filter( 'parse_query', 'nucleus_register_session' );
