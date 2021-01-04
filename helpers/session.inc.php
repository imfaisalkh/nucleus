<?php


#-------------------------------------------------------------------------------#
#  Set Session Variables
#-------------------------------------------------------------------------------#


	if ( !function_exists('nucleus_register_session') ) {

		function nucleus_register_session() {

		    session_start();

		    if ( isset($_GET['menu']) && !isset($_GET['type']) ) {
		        $_SESSION['menu'] = $_GET['menu'];
		    }
		    
		}

	}

	add_filter( 'init', 'nucleus_register_session' );
