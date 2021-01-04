<?php


#-------------------------------------------------------------------------------#
#  Fallback for wp_nav_menu()
#-------------------------------------------------------------------------------#


	if ( !function_exists('nucleus_default_menu') ) {

		function nucleus_default_menu() { ?>

		    <div id="classic-menu-container" class="menu-main-menu-container">
		        <ul id="main-menu" class="sf-menu">
		            <li class="menu-item"><a href="<?php echo esc_url( admin_url('nav-menus.php') ); ?>"><?php esc_html_e( 'Create Menu', 'nucleus' ); ?></a></li>
		        </ul>
		    </div>

		<?php
		}

	}


#-------------------------------------------------------------------------------#
#  Mark parent navigation active when on custom post type single page
#-------------------------------------------------------------------------------#


	
	function nucleus_add_current_nav_class($classes, $item) {

		if ( is_singular('portfolio') ) {
		
			// Getting the current post details
			global $post;
			
			// Getting the post type of the current post
			$current_post_type = get_post_type();
			$parent_type_global = get_permalink(get_theme_mod('nucleus_portfolio_page'));
			$parent_type_override = get_field('portfolio_page');
			$parent_type_permalink = $parent_type_override ? $parent_type_override : $parent_type_global;

			// Getting the URL of the menu item
			$menu_url = $item->url;

			// If the menu item URL contains the current post types slug add the current-menu-item class
			if ( $menu_url == $parent_type_permalink) {
			
			   $classes[] = 'current-menu-item';
			
			}
			
		}

		// Return the corrected set of classes to be added to the menu item
		return $classes;

	}

	add_action('nav_menu_css_class', 'nucleus_add_current_nav_class', 10, 2 );
