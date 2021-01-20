<?php

#-----------------------------------------------------------------#
#
#	Here we have all the custom functions for the theme.
#	Please be extremely cautious editing this file,
#	When things go wrong, they intend to go wrong in a big way.
#	You have been warned!
#
#-----------------------------------------------------------------#


#-----------------------------------------------------------------#
# Define Theme Constants
#-----------------------------------------------------------------#

	define('NUCLEUS_ADMIN', get_template_directory() .'/admin');
	define('NUCLEUS_ADMIN_URI', get_template_directory_uri() .'/admin');
	define('NUCLEUS_JS', get_template_directory() .'/scripts/js');
	define('NUCLEUS_JS_URI', get_template_directory_uri() .'/scripts/js');
	define('NUCLEUS_CSS', get_template_directory() .'/styles/css');
	define('NUCLEUS_CSS_URI', get_template_directory_uri() .'/styles/css');
	define('NUCLEUS_IMG', get_template_directory() .'/images');
	define('NUCLEUS_IMG_URI', get_template_directory_uri() .'/images');
	define('NUCLEUS_HELPERS', get_template_directory() .'/helpers');
	define('NUCLEUS_HELPERS_URI', get_template_directory_uri() .'/helpers');
	define('NUCLEUS_CLASSES', get_template_directory() .'/classes');
	define('NUCLEUS_CLASSES_URI', get_template_directory_uri() .'/classes');


#-----------------------------------------------------------------#
# Theme Setup
#-----------------------------------------------------------------#

	function nucleus_theme_setup() {

		global $content_width;

		// Set Content Width
		if ( !isset($content_width) ) {
			$content_width = 960;
		}

		// Load Translation Text Domain
		load_theme_textdomain( 'nucleus', get_template_directory() . '/languages' );

		// Support for Feed Links
		add_theme_support('automatic-feed-links');

		// Support for Title Tag
		add_theme_support( 'title-tag' );

		// Support for Theme Logo (since 4.5)
		add_theme_support( 'custom-logo' , array(
		    'size' => 'nucleus-site-logo'
		));


		// Suport for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Suport for Custom Background
		add_theme_support( 'custom-background', array(
			'default-color'        => '#000',
		) );


		// Enable support for Post Formats
		add_theme_support( 'post-formats', array(
			'video',
			'audio',
		) );

    // Custom Image Sizes
	add_image_size( 'nucleus-site-logo', 200, 200 );
    add_image_size( 'nucleus-portfolio-index', 281, '', true );
    add_image_size( 'nucleus-blog-carousel-featured', 900, 500, true );
    add_image_size( 'nucleus-blog-carousel-regular-odd', 510, 315, true );
    add_image_size( 'nucleus-blog-carousel-regular-even', 235, 315, true );
    add_image_size( 'nucleus-blog-full', 910, 605, true );
    add_image_size( 'nucleus-blog-grid', 435, 325, true );

	    // Register WP3.0+ Menus
	    add_action('init', 'nucleus_register_menu');

	    // Register Sidebars
	    add_action('widgets_init', 'nucleus_register_sidebar');

	    // Register and Enqueue Frontend JS
	    add_action('wp_enqueue_scripts', 'nucleus_frontend_js');

	    // Register and Enqueue Frontend CSS
	    add_action('wp_enqueue_scripts', 'nucleus_frontend_styles');
			add_action('wp_enqueue_scripts', 'nucleus_child_frontend_styles', 20);

	    // Register and Enqueue Backend CSS
	    add_action('admin_enqueue_scripts', 'nucleus_backend_styles');

	    // Register Customizer Funtion(s)
	    add_action( 'customize_register', 'nucleus_load_customize_controls', 0 );

	}

	add_action('after_setup_theme', 'nucleus_theme_setup');


#-----------------------------------------------------------------#
# Register WP3.0+ Menu(s)
#-----------------------------------------------------------------#

	function nucleus_register_menu() {
		register_nav_menu('nucleus-desktop-navigation', esc_html__('Desktop Navigation', 'nucleus'));
		register_nav_menu('nucleus-mobile-navigation', esc_html__('Mobile Navigation', 'nucleus'));
	}
	

#-----------------------------------------------------------------#
# Register Sidebar(s)
#-----------------------------------------------------------------#

	function nucleus_register_sidebar() {

		// Register Blog Sidebar
		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'nucleus' ),
			'id' => 'blog-sidebar',
			'description'   => esc_html__('This sidebar will be displayed on all blog pages.', 'nucleus'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );

		// Register Footer Sidebar
		register_sidebar( array(
			'name' => esc_html__( 'Footer Sidebar', 'nucleus' ),
			'id' => 'footer-sidebar',
			'description'   => esc_html__('This sidebar will be displayed on your site footer.', 'nucleus'),
			'before_widget' => '<div id="%1$s" class="widget %2$s column">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );

	}


#-----------------------------------------------------------------#
# Register and Enqueue Frontend JS
#-----------------------------------------------------------------#

	function nucleus_frontend_js() {
		if ( !is_admin() ) {

			global $wp_query;

			// Enqueue Theme Scripts
			wp_enqueue_script('modernizr', NUCLEUS_JS_URI . '/lib/modernizr-custom.js', array('jquery'), null, true);
			wp_enqueue_script('superfish', 'https://unpkg.com/superfish@1.7.10/dist/js/superfish.js', null, null, true);
			wp_enqueue_script('fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', null, null, true);
			wp_enqueue_script('headroom.js', 'https://unpkg.com/headroom.js@0.12.0/dist/headroom.js', null, null, true);
			wp_enqueue_script('flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', null, null, true);
			wp_enqueue_script('flickity-fade', 'https://unpkg.com/flickity-fade@1/flickity-fade.js', null, null, true);
			wp_enqueue_script('packery', 'https://unpkg.com/packery@2.1.2/dist/packery.pkgd.min.js', null, null, true);
			wp_enqueue_script('infinite-scroll', 'https://unpkg.com/infinite-scroll@4.0.1/dist/infinite-scroll.pkgd.min.js', null, null, true);
			wp_enqueue_script('jquery-smooth-scroll', 'https://cdn.statically.io/gh/kswedberg/jquery-smooth-scroll/3948290d/jquery.smooth-scroll.min.js', null, null, true);
			wp_enqueue_script('imagesloaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', null, null, true);
			wp_enqueue_script('nucleus-js-main', NUCLEUS_JS_URI . '/main.min.js', array('jquery'), null, true);

			// Enqueue Other Scripts
			wp_localize_script( 'nucleus-js-main', 'theme_ajax', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'query_vars' => json_encode( $wp_query->query )
			));

			if ( is_singular( 'post' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

		}
	}



#-----------------------------------------------------------------#
# Ajax Load More
#-----------------------------------------------------------------#

	function nucleus_ajax_load_more() {
			
		get_template_part( 'query-ajax', $_GET['type'] );


		die(); // to avoide 0 at the end

	}

	add_action( 'wp_ajax_nopriv_nucleus_ajax_load_more', 'nucleus_ajax_load_more' );
	add_action( 'wp_ajax_nucleus_ajax_load_more', 'nucleus_ajax_load_more' );


#-----------------------------------------------------------------#
# Register and Enqueue Frontend CSS
#-----------------------------------------------------------------#

	function nucleus_frontend_styles() {
		if ( !is_admin() ) {

			// Plugin Styles
			wp_enqueue_style('normalize.css', 'https://unpkg.com/normalize.css@8.0.1/normalize.css');
			wp_enqueue_style('balloon.css', 'https://unpkg.com/balloon-css/balloon.min.css');
			wp_enqueue_style('font-awesome', 'https://unpkg.com/font-awesome@4.7.0/css/font-awesome.min.css');
			wp_enqueue_style('fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
			wp_enqueue_style('flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css');
			wp_enqueue_style('flickity-fade', 'https://unpkg.com/flickity-fade@1/flickity-fade.css');
			wp_enqueue_style('nucleus-css-main', NUCLEUS_CSS_URI . '/main.css');
			wp_enqueue_style('nucleus-css-editor', get_template_directory_uri() . '/custom-editor-style.css');
			
			// Google Fonts
			wp_enqueue_style( 'google-fonts', nucleus_fonts_url(), array(), null );

			// Add Inline Styles (dynamic)
			ob_start();
			require( get_template_directory() .'/styles/dynamic.php' );
			$dynamic_css = ob_get_clean();

	        wp_add_inline_style('nucleus-css-main', $dynamic_css);

		}
	}


	function nucleus_child_frontend_styles() {
		if ( !is_admin() && is_child_theme() ) {

			// Enqueue
		    wp_enqueue_style( 'nucleus-child-style', get_stylesheet_directory_uri().'/style.css');

		}
	}


	function nucleus_backend_styles() {
	    wp_enqueue_style('nucleus-admin-css', NUCLEUS_ADMIN_URI . '/plugins/css/style.css');
	}


#-----------------------------------------------------------------#
# Register Google Fonts
#-----------------------------------------------------------------#


	function nucleus_fonts_url() {
	  	
	  	// Setup font arguments
		$query_args = array(
			'family' => 'Open+Sans:300,400,400italic,500,600,700%7CLato:300,400,400italic,500,600,700,900%7CDM+Serif+Text:400,400italic',
			'subset' => 'latin,latin-ext',
		);

		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

		return $fonts_url;

	}


#-----------------------------------------------------------------#
# Register Customizer Funtion(s)
#-----------------------------------------------------------------#

	function nucleus_load_customize_controls() {
		require_once NUCLEUS_ADMIN . '/customizer/lib/control-checkbox-multiple.php';
	}


#-----------------------------------------------------------------#
# Require PHP Theme Resources
#-----------------------------------------------------------------#

	// require ADMIN resources
	require_once NUCLEUS_ADMIN . '/customizer/functions.php';
	require_once NUCLEUS_ADMIN . '/metaboxes/functions.php';
	require_once NUCLEUS_ADMIN . '/plugins/functions.php';

	// require CLASSES resources
	require_once NUCLEUS_CLASSES . '/functions.php';

	// require HELPER theme functions
	require_once NUCLEUS_HELPERS . '/functions.php';