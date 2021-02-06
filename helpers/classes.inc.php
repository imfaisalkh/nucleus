<?php


#-------------------------------------------------------------------------------#
#  Filter Body Classes
#-------------------------------------------------------------------------------#


	if ( !function_exists('nucleus_body_class') ) {

		function nucleus_body_class( $classes ) {

			// Post or Page ID
			if( is_home() || is_archive() || is_search() ) {
				$post_ID = get_option('page_for_posts');
			} else {
				$post_ID = get_the_ID();
			}

			// get values defined in 'globals.inc.php'
		    $vendor_classes 	= wp_script_is( 'nucleus-js-vendors', 'enqueued' ) ? ' is-isotope-enabled is-packery-enabled is-infinite-scroll-enabled is-flickity-enabled is-fancybox-enabled' : '';
		    $is_site_preloader  = get_theme_mod('nucleus_site_preloader') ? ' site-preloader-disabled' : '';
		    $menu_type 			= (get_field('site_header') == 'traditional' || get_field('site_header') == 'modern') ? get_field('site_header') : get_theme_mod('nucleus_menu_type', 'traditional');
			$color_scheme 		= (get_query_var('blog') == 'magazine') ? 'light-color-scheme ' : (get_field('color_scheme', $post_ID) ? get_field('color_scheme', $post_ID) . '-color-scheme ' : 'dark-color-scheme');
			$portfolio_layout   = get_field('portfolio_style') ? 'portfolio-'. get_field('portfolio_style') : '';
			$blog_layout   		= get_query_var('blog') ? 'blog-'. get_query_var('blog') : 'blog-'. get_theme_mod('nucleus_blog_layout', 'minimal');
				
			// add custom classes to the $classes array
			$classes[] = $color_scheme . $is_site_preloader .' '. $menu_type . '-menu '.' '. $vendor_classes .' '. $portfolio_layout .' '. $blog_layout;

			// return the $classes array
			return $classes;
		}

	}

	add_filter( 'body_class', 'nucleus_body_class' );


#-------------------------------------------------------------------------------#
#  Filter Post Classes
#-------------------------------------------------------------------------------#


	if ( !function_exists('nucleus_post_class') ) {

		function nucleus_post_class( $classes ) {

			$classes[] = '';

			// If 'portfolio' Custom Post Type 
			if ( get_post_type() == "portfolio" ) {

				$folio_cats_slug 	= implode(' ', nucleus_get_term_fields('portfolio_category', 'slug'));

				// add custom classes to the $classes array
				$classes[] = $folio_cats_slug;

			}

			// return the $classes array
			return $classes;
		}

	}

	add_filter( 'post_class', 'nucleus_post_class' );

