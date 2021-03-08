<?php


#-------------------------------------------------------------------------------#
#  Fallback for wp_nav_menu()
#-------------------------------------------------------------------------------#


	if ( !function_exists('nucleus_default_menu') ) {

		function nucleus_default_menu() { ?>

		    <div id="classic-menu-container" class="menu-main-menu-container">
		        <ul id="primary-menu" class="sf-menu">
		            <li class="menu-item"><a href="<?php echo esc_url( admin_url('nav-menus.php') ); ?>"><?php esc_html_e( 'Create Menu', '_nucleus' ); ?></a></li>
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


#-------------------------------------------------------------------------------#
#  Replaces items with '---' as title with li class="menu_separator"
#-------------------------------------------------------------------------------#

add_filter('walker_nav_menu_start_el', 'nucleus_nav_menu_start_el', 10, 4);

function nucleus_nav_menu_start_el($item_output, $item, $depth, $args) {

	if ($item->url === '#divider') {
		return '<hr>'; // Horizontal line
	} elseif ($item->url === '#title') {
		return '<span class="title">'. esc_html($item->post_title) . '</span>'; // Text without link
	} else {
		$title_attr = !empty($item->attr_title) ? '<span class="subtitle" style="display: none;">'. $item->attr_title .'</span>' : '';
		if ($item->xfn) {
			$xfn_data = explode('-', $item->xfn);
			if ($xfn_data[0] == 'query') {
				return $item_output = '<a href="'. esc_url($item->url) .'?'. $xfn_data[1].'='. $xfn_data[2] .'">'. esc_html($item->post_title) . '</a>' . $title_attr;
			} else {
				return $item_output . $title_attr; // Unmodified output for this link
			}
		} else {
			return $item_output . $title_attr; // Unmodified output for this link
		}
	}
}