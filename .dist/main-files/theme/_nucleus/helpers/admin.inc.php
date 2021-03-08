<?php


#-------------------------------------------------------------------------------#
#  Changing the order of WordPress admin menu.
#-------------------------------------------------------------------------------#


	function nucleus_reorder_admin_menu( $__return_true ) {
	    return array(
	         'index.php', // Dashboard
	         'separator1', // --Space--
	         'edit.php?post_type=page', // Pages
	         'edit.php', // Posts
	         'edit.php?post_type=portfolio', // Portfolio
	         'wpcf7', // Contact Form 7
	         'upload.php', // Media
	         'edit-comments.php', // Comments
	   );
	}
	add_filter( 'custom_menu_order', 'nucleus_reorder_admin_menu' );
	add_filter( 'menu_order', 'nucleus_reorder_admin_menu' );
