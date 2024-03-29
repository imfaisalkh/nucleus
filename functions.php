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
		load_theme_textdomain( '_nucleus', get_template_directory() . '/languages' );

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
			'default-color' => '#000',
		) );

		// Support for HTML5 Tags
		add_theme_support( 'html5', [ 'script', 'style', 'comment-form', 'comment-list' ] );

		// Custom Image Sizes
		add_image_size( 'nucleus-site-logo', 200, 200 );
		add_image_size( 'nucleus-background-image', 1920);

		add_image_size( 'nucleus-blog-magazine-featured', 720, 400, true );
		add_image_size( 'nucleus-blog-magazine-grid', 400, 250, true );
		add_image_size( 'nucleus-blog-minimal', 400 );
		add_image_size( 'nucleus-blog-single', 1080 );

		add_image_size( 'nucleus-portfolio-grid-slider', 1440, 650, true );
		add_image_size( 'nucleus-portfolio-grid', 800);
		add_image_size( 'nucleus-portfolio-carousel', 800, 460, true );
		add_image_size( 'nucleus-portfolio-portrait', 245, 590, true );

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

	}

	add_action('after_setup_theme', 'nucleus_theme_setup');


#-----------------------------------------------------------------#
# Register WP3.0+ Menu(s)
#-----------------------------------------------------------------#

	function nucleus_register_menu() {
		register_nav_menu('nucleus-primary-menu', esc_html__('Primary', '_nucleus'));
		register_nav_menu('nucleus-secondary-menu', esc_html__('Secondary', '_nucleus'));
		register_nav_menu('nucleus-top-bar-menu', esc_html__('Top Bar', '_nucleus'));
		register_nav_menu('nucleus-full-screen-menu', esc_html__('Full Screen (e.g. Mobile)', '_nucleus'));
	}
	

#-----------------------------------------------------------------#
# Register Sidebar(s)
#-----------------------------------------------------------------#

	function nucleus_register_sidebar() {

		// Register Blog Sidebar
		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', '_nucleus' ),
			'id' => 'blog-sidebar',
			'description'   => esc_html__('This sidebar will be displayed on all blog pages.', '_nucleus'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );

		// Register Page Sidebar
		register_sidebar( array(
			'name' => esc_html__( 'Page Sidebar', '_nucleus' ),
			'id' => 'page-sidebar',
			'description'   => esc_html__('This sidebar will be displayed on your site page.', '_nucleus'),
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
			wp_register_script('headroom', NUCLEUS_VENDORS_URI . '/headroom.js/headroom.js', array('jquery'), null, true);
			wp_register_script('jquery-headroom', NUCLEUS_VENDORS_URI . '/headroom.js/jquery.headroom.js', array('jquery'), null, true);
			wp_register_script('tendina', NUCLEUS_VENDORS_URI .'/tendina/tendina.min.js', array('jquery'), null, true);
			wp_register_script('flickity', NUCLEUS_VENDORS_URI . '/flickity/flickity.pkgd.min.js', array('jquery'), null, true);
			wp_register_script('flickity-fade', NUCLEUS_VENDORS_URI . '/flickity/flickity-fade.js', array('jquery'), null, true);
			wp_register_script('packery', NUCLEUS_VENDORS_URI . '/packery/packery.pkgd.min.js', array('jquery'), null, true);
			wp_register_script('infinite-scroll', NUCLEUS_VENDORS_URI . '/infinite-scroll/infinite-scroll.pkgd.min.js', array('jquery'), null, true);
			wp_register_script('jquery-smooth-scroll', NUCLEUS_VENDORS_URI . '/jquery-smooth-scroll/jquery.smooth-scroll.min.js', array('jquery'), null, true);
			wp_register_script('jquery-scrollbar', NUCLEUS_VENDORS_URI . '/jquery-scrollbar/jquery.scrollbar.min.js', array('jquery'), null, true);
			wp_register_script('imagesloaded', NUCLEUS_VENDORS_URI . '/imagesloaded/imagesloaded.pkgd.min.js', array('jquery'), null, true);
			wp_register_script('tinycolor', NUCLEUS_VENDORS_URI . '/tinycolor/tinycolor.min.js', array('jquery'), null, true);
			wp_register_script('fitvids', NUCLEUS_VENDORS_URI . '/fitvids/jquery.fitvids.js', array('jquery'), null, true);
			wp_register_script('ionicons', 'https://unpkg.com/ionicons@5.0.0/dist/ionicons.js', array('jquery'), null, true);
			wp_enqueue_script('nucleus-main', NUCLEUS_JS_URI . '/main.min.js', array('jquery', 'modernizr', 'superfish', 'fancybox', 'headroom', 'jquery-headroom', 'tendina', 'flickity', 'flickity-fade', 'packery', 'infinite-scroll', 'jquery-smooth-scroll', 'jquery-scrollbar', 'imagesloaded', 'tinycolor', 'fitvids', 'ionicons'), null, true);

			// Enqueue Other Scripts
			wp_localize_script( 'nucleus-main', 'theme_ajax', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'query_vars' => json_encode( $wp_query->query )
			));

			// Enqueue (conditional)
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
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
			wp_enqueue_style('normalize', NUCLEUS_VENDORS_URI . '/normalize.css/normalize.css');
			wp_enqueue_style('balloon', NUCLEUS_VENDORS_URI . '/balloon.css/balloon.min.css');
			wp_enqueue_style('font-awesome', NUCLEUS_VENDORS_URI . '/font-awesome/css/all.min.css');
			wp_enqueue_style('fancybox', NUCLEUS_VENDORS_URI . '/fancybox/jquery.fancybox.min.css');
			wp_enqueue_style('flickity', NUCLEUS_VENDORS_URI . '/flickity/flickity.min.css');
			wp_enqueue_style('flickity-fade', NUCLEUS_VENDORS_URI . '/flickity/flickity-fade.css');
			wp_enqueue_style('jquery-scrollbar', NUCLEUS_VENDORS_URI . '/jquery-scrollbar/jquery.scrollbar.css');
			wp_enqueue_style('nucleus-main', NUCLEUS_CSS_URI . '/main.min.css');
			wp_enqueue_style('nucleus-editor', get_template_directory_uri() . '/custom-editor-style.css');
			
			// Google Fonts
			wp_enqueue_style( 'google-fonts', nucleus_fonts_url(), array(), null );

			// Add Inline Styles (dynamic)
			ob_start();
			require( get_template_directory() .'/styles/general.php' );
			$general_css = ob_get_clean();

			ob_start();
			require( get_template_directory() .'/styles/colors.php' );
			$colors_css = ob_get_clean();

			ob_start();
			require( get_template_directory() .'/styles/typography.php' );
			$typography_css = ob_get_clean();

	        wp_add_inline_style('nucleus-main', $general_css);
	        wp_add_inline_style('nucleus-main', $colors_css);
	        wp_add_inline_style('nucleus-main', $typography_css);
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

	// require HELPER theme functions
	require_once NUCLEUS_HELPERS . '/functions.php';