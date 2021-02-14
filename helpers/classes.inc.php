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

			// Header Version
			$menu_type		= get_field('site_header') ? get_field('site_header') : get_theme_mod('nucleus_header_version', 'v1');

			// Color Schemes
			$base_color_scheme	= (get_query_var('blog') == 'magazine') ? 'light-base-color-scheme ' : (get_field('base_color_scheme', $post_ID) ? get_field('base_color_scheme', $post_ID) . '-base-color-scheme ' : 'dark-base-color-scheme ');
			$form_color_scheme	= get_field('form_color_scheme') ? get_field('form_color_scheme') . '-form-color-scheme ' : 'dynamic-form-color-scheme ';
			$menu_color_scheme	= get_field('menu_color_scheme') ? get_field('menu_color_scheme') . '-menu-color-scheme ' : 'dynamic-menu-color-scheme ';
			
			// Portfolio & Blog Layout
			$portfolio_layout   = get_field('portfolio_style') ? 'portfolio-'. get_field('portfolio_style') : '';
			$blog_layout   		= get_query_var('blog') ? 'blog-'. get_query_var('blog') : 'blog-'. get_theme_mod('nucleus_blog_layout', 'minimal');
				
			// add custom classes to the $classes array
			$classes[] = $base_color_scheme . $form_color_scheme . $menu_color_scheme . $is_site_preloader .' '. $menu_type . '-site-header '.' '. $vendor_classes .' '. $portfolio_layout .' '. $blog_layout;

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

