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
	define('NUCLEUS_VENDORS', get_template_directory() .'/vendors');
	define('NUCLEUS_VENDORS_URI', get_template_directory_uri() .'/vendors');


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

		// Register Page Sidebar
		register_sidebar( array(
			'name' => esc_html__( 'Page Sidebar', 'nucleus' ),
			'id' => 'page-sidebar',
			'description'   => esc_html__('This sidebar will be displayed on your site page.', 'nucleus'),
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
			wp_register_script('modernizr', NUCLEUS_VENDORS_URI . '/modernizr/modernizr-custom.js', array('jquery'), null, true);
			wp_register_script('superfish', NUCLEUS_VENDORS_URI . '/superfish/superfish.js', array('jquery'), null, true);
			wp_register_script('fancybox', NUCLEUS_VENDORS_URI . '/fancybox/jquery.fancybox.min.js', array('jquery'), null, true);
			wp_register_script('headroom.js', NUCLEUS_VENDORS_URI . '/headroom.js/headroom.js', array('jquery'), null, true);
			wp_register_script('jquery-headroom.js', NUCLEUS_VENDORS_URI . '/headroom.js/jquery.headroom.js', array('jquery'), null, true);
			wp_register_script('tendina', NUCLEUS_VENDORS_URI .'/tendina/tendina.min.js', array('jquery'), null, true);
			wp_register_script('flickity', NUCLEUS_VENDORS_URI . '/flickity/flickity.pkgd.min.js', array('jquery'), null, true);
			wp_register_script('flickity-fade', NUCLEUS_VENDORS_URI . '/flickity/flickity-fade.js', array('jquery'), null, true);
			wp_register_script('packery', NUCLEUS_VENDORS_URI . '/packery/packery.pkgd.min.js', array('jquery'), null, true);
			wp_register_script('infinite-scroll', NUCLEUS_VENDORS_URI . '/infinite-scroll/infinite-scroll.pkgd.min.js', array('jquery'), null, true);
			wp_register_script('jquery-smooth-scroll', NUCLEUS_VENDORS_URI . '/jquery-smooth-scroll/jquery.smooth-scroll.min.js', array('jquery'), null, true);
			wp_register_script('imagesloaded', NUCLEUS_VENDORS_URI . '/imagesloaded/imagesloaded.pkgd.min.js', array('jquery'), null, true);
			wp_register_script('tinycolor', NUCLEUS_VENDORS_URI . '/tinycolor/tinycolor.min.js', array('jquery'), null, true);
			wp_enqueue_script('nucleus-main', NUCLEUS_JS_URI . '/main.min.js', array('jquery', 'modernizr', 'superfish', 'fancybox', 'headroom.js', 'jquery-headroom.js', 'tendina', 'flickity', 'flickity-fade', 'packery', 'infinite-scroll', 'jquery-smooth-scroll', 'imagesloaded', 'tinycolor'), null, true);

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
# Register and Enqueue Frontend CSS
#-----------------------------------------------------------------#

	function nucleus_frontend_styles() {
		if ( !is_admin() ) {

			// Plugin Styles
			wp_enqueue_style('normalize.css', NUCLEUS_VENDORS_URI . '/normalize.css/normalize.css');
			wp_enqueue_style('balloon.css', NUCLEUS_VENDORS_URI . '/balloon.css/balloon.min.css');
			wp_enqueue_style('font-awesome', NUCLEUS_VENDORS_URI . '/font-awesome/css/all.min.css');
			wp_enqueue_style('fancybox', NUCLEUS_VENDORS_URI . '/fancybox/jquery.fancybox.min.css');
			wp_enqueue_style('flickity', NUCLEUS_VENDORS_URI . '/flickity/flickity.min.css');
			wp_enqueue_style('flickity-fade', NUCLEUS_VENDORS_URI . '/flickity/flickity-fade.css');
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

	// require Merlin resources
	if ( is_admin() ) {
		require_once NUCLEUS_ADMIN .'/merlin/vendor/autoload.php';
		require_once NUCLEUS_ADMIN .'/merlin/class-merlin.php';
		require_once NUCLEUS_ADMIN .'/merlin-config.php';
	}

	// require CLASSES resources
	require_once NUCLEUS_CLASSES . '/functions.php';

	// require HELPER theme functions
	require_once NUCLEUS_HELPERS . '/functions.php';