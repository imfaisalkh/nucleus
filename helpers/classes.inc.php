<?php


#-------------------------------------------------------------------------------#
#  Filter Body Classes
#-------------------------------------------------------------------------------#


	if ( !function_exists('nucleus_body_class') ) {

		function nucleus_body_classes( $classes ) {

			// Post or Page ID
			if( is_home() || is_archive() || is_search() ) {
				$post_ID = get_option('page_for_posts');
			} else {
				$post_ID = get_the_ID();
			}

			// Get Theme Info
			$current_theme = wp_get_theme();
			$theme_name    = esc_attr( str_replace( ' ', '-', strtolower( $current_theme->get( 'Name' ) ) ) );
			$theme_version = esc_attr( $current_theme->get( 'Version' ) );
			
			// Check if child theme is activated
			if ( $current_theme->parent() ) {
				
				// Add child theme version
				$classes[] = $theme_name . '-child-' . $theme_version;
				
				// Get main theme variables
				$current_theme = $current_theme->parent();
				$theme_name    = esc_attr( str_replace( ' ', '-', strtolower( $current_theme->get( 'Name' ) ) ) );
				$theme_version = esc_attr( $current_theme->get( 'Version' ) );
			}
			
			// Theme Version
			if ( $current_theme->exists() ) {
				$classes[] = $theme_name . '-' . $theme_version;
			}

			// get values defined in 'globals.inc.php'
		    $classes[] = wp_script_is( 'nucleus-js-vendors', 'enqueued' ) ? ' is-isotope-enabled is-packery-enabled is-infinite-scroll-enabled is-flickity-enabled is-fancybox-enabled' : '';
		    $classes[]  = get_theme_mod('nucleus_site_preloader', true) ? '' : ' site-preloader-disabled';

			// Header & Footer Version
			$classes[]	= get_field('site_header') && get_field('site_header') != 'global' ? 'site-header-'. get_field('site_header') : 'site-header-'. get_theme_mod('nucleus_header_version', 'v1');
			$classes[]	= get_field('site_footer') && get_field('site_footer') != 'global'  ? 'site-footer-'. get_field('site_footer') : 'site-footer-'. get_theme_mod('nucleus_footer_version', 'v1');

			// Color Schemes
			$classes[] 	= (get_query_var('blog') == 'magazine') ? 'light-base-color-scheme ' : (get_field('base_color_scheme', $post_ID) ? get_field('base_color_scheme', $post_ID) . '-base-color-scheme ' : 'dark-base-color-scheme ');
			$classes[] 	= get_field('form_color_scheme') ? get_field('form_color_scheme') . '-form-color-scheme ' : 'dynamic-form-color-scheme ';
			$classes[] 	= get_field('menu_color_scheme') ? get_field('menu_color_scheme') . '-menu-color-scheme ' : 'dynamic-menu-color-scheme ';
			
			// Portfolio & Blog Layout
			$classes[]   = get_field('portfolio_style') ? 'portfolio-'. get_field('portfolio_style') : '';
			$classes[]	 = get_query_var('blog') ? 'blog-'. get_query_var('blog') : 'blog-'. get_theme_mod('nucleus_blog_layout', 'minimal');

			// return the $classes array
			return $classes;
		}

	}

	add_filter( 'body_class', 'nucleus_body_classes' );


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

