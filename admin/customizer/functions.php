<?php

/*-----------------------------------------------------------------------------------*/
/*  Theme Customization Options
/*-----------------------------------------------------------------------------------*/
 
add_action( 'customize_register', 'nucleus_customize_register' );

function nucleus_customize_register($wp_customize) {

  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('background_image');

  /*-----------------------------------------------------------------------------------*/
  /*  General Settings
  /*-----------------------------------------------------------------------------------*/

  $wp_customize->get_section('title_tagline')->title = esc_html__('General Settings', 'nucleus');
  $wp_customize->get_section('title_tagline')->priority = 10;
    
  // Add: Image
  $wp_customize->add_setting( 'nucleus_mobile_logo', array (
    'sanitize_callback' => 'esc_url_raw',
  ) );

  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nucleus_mobile_logo', array(
    'label'       => esc_html__('Mobile Logo', 'lamark'),
    'description'   => esc_html__('The logo above will be used by default if no mobile logo provided.', 'nucleus'),
    'section'   => 'title_tagline',
    'priority'    => 9
  ) ) );


  // Add: Checkbox
  $wp_customize->add_setting( 'nucleus_social_sharing', array (
    'default' => false,
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control('nucleus_social_sharing', array(
    'label'    => esc_html__('Disable Social Sharing (links)', 'nucleus'),
    'section'  => 'title_tagline',
    'type'     => 'checkbox',
  ) );

  // Add: Checkbox
  $wp_customize->add_setting( 'nucleus_page_actions', array (
    'default' => false,
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control('nucleus_page_actions', array(
    'label'    => esc_html__('Disable Page Actions (icons)', 'nucleus'),
    'section'  => 'title_tagline',
    'type'     => 'checkbox',
  ) );

  // Add: Checkbox
  $wp_customize->add_setting( 'nucleus_site_preloader', array (
    'default' => false,
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control('nucleus_site_preloader', array(
    'label'    => esc_html__('Disable Site Preloader', 'nucleus'),
    'section'  => 'title_tagline',
    'type'     => 'checkbox',
  ) );


  /*-----------------------------------------------------------------------------------*/
  /*  Global Notification
  /*-----------------------------------------------------------------------------------*/

  // Add: Section
    $wp_customize->add_section( 'nucleus_global_notification', array(
      'title'          => esc_html__( 'Global Notification', 'nucleus' ),
      'priority'       => 40,
  ) );


  // Add: Checkbox
  $wp_customize->add_setting( 'nucleus_notification_disable', array (
    'default' => false,
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control('nucleus_notification_disable', array(
    'label'    => esc_html__('Disable Site Notification', 'nucleus'),
    'section'  => 'nucleus_global_notification',
    'type'     => 'checkbox',
  ) );

  // Add: Text Field
  $wp_customize->add_setting( 'nucleus_notification_title', array (
   'sanitize_callback' => 'sanitize_text_field',
  ) );
    
  $wp_customize->add_control('nucleus_notification_title', array(
    'label'       => esc_html__('Title', 'nucleus'),
    'section'     => 'nucleus_global_notification',
  ) );

  // Add: Text Area
  $wp_customize->add_setting( 'nucleus_notification_content', array (
  'sanitize_callback' => 'custom_sanitize_textarea',
  ) );  

  $wp_customize->add_control('nucleus_notification_content', array(
    'label'       => esc_html__('Content', 'nucleus'),
    'description'   => esc_html__('You can use <br> tag or other HTML tags here.', 'nucleus'),
    'section'     => 'nucleus_global_notification',
    'type'        => 'textarea',
  ) );

  // Add: Text Field
  $wp_customize->add_setting( 'nucleus_notification_tooltip', array (
   'sanitize_callback' => 'sanitize_text_field',
  ) );
    
  $wp_customize->add_control('nucleus_notification_tooltip', array(
    'label'       => esc_html__('Tooltip Text', 'nucleus'),
    'description'   => esc_html__('Displayed when you hover the notification icon.', 'nucleus'),
    'section'     => 'nucleus_global_notification',
  ) );


  /*-----------------------------------------------------------------------------------*/
  /*  Site Menu
  /*-----------------------------------------------------------------------------------*/



  // Add: Section
    $wp_customize->add_section( 'menu_settings', array(
      'title'          => esc_html__( 'Menu Settings', 'nucleus' ),
      'priority'       => 10,
      'panel'      => 'nav_menus',
  ) );


  // Add: Select
    $wp_customize->add_setting( 'nucleus_menu_type', array (
    'sanitize_callback' => 'custom_sanitize_select',
    'default' => 'traditional',
    ) );

  $wp_customize->add_control( 'nucleus_menu_type', array(
    'type' => 'select',
    'section' => 'menu_settings', // Add a default or your own section
    'label' => __( 'Menu Type', 'nucleus' ),
    'choices' => array(
      'traditional' => __( 'Traditional', 'nucleus' ),
      'modern' => __( 'Modern', 'nucleus' ),
    ),
  ) );


  // Add: Checkbox
    $wp_customize->add_setting( 'nucleus_menu_search_icon', array (
      'default' => false,
    'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control('nucleus_menu_search_icon', array(
      'label'    => esc_html__('Disable Search Icon', 'nucleus'),
      'section'  => 'menu_settings',
      'type'     => 'checkbox',
  ) );


  // Add: Checkbox
    $wp_customize->add_setting( 'nucleus_menu_cart_icon', array (
      'default' => false,
    'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control('nucleus_menu_cart_icon', array(
      'label'    => esc_html__('Disable Cart Icon', 'nucleus'),
      'section'  => 'menu_settings',
      'type'     => 'checkbox',
  ) );



  /*-----------------------------------------------------------------------------------*/
  /*  Social Profiles
  /*-----------------------------------------------------------------------------------*/


  // Add: Section
    $wp_customize->add_section( 'nucleus_social_profiles', array(
      'title'          => esc_html__( 'Social Profiles', 'nucleus' ),
      'priority'       => 30,
  ) );


  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_facebook_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('nucleus_facebook_profile', array(
      'label'    => esc_html__('FaceBook Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );
  
  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_twitter_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );  
    
    $wp_customize->add_control('nucleus_twitter_profile', array(
      'label'    => esc_html__('Twitter Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_dribbble_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );  
    
    $wp_customize->add_control('nucleus_dribbble_profile', array(
      'label'    => esc_html__('Dribbble Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_deviantart_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );  
    
    $wp_customize->add_control('nucleus_deviantart_profile', array(
      'label'    => esc_html__('DeviantArt Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_instagram_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );  
    
    $wp_customize->add_control('nucleus_instagram_profile', array(
      'label'    => esc_html__('Instagram Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_pinterest_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );  
    
    $wp_customize->add_control('nucleus_pinterest_profile', array(
      'label'    => esc_html__('Pinterest Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );  

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_bloglovin_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );  
    
    $wp_customize->add_control('nucleus_bloglovin_profile', array(
      'label'    => esc_html__('Bloglovin Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );  

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_google_plus_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('nucleus_google_plus_profile', array(
      'label'    => esc_html__('Google Plus Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_tumblr_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('nucleus_tumblr_profile', array(
      'label'    => esc_html__('Tumblr Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_youtube_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('nucleus_youtube_profile', array(
      'label'    => esc_html__('YouTube Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_vimeo_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('nucleus_vimeo_profile', array(
      'label'    => esc_html__('Vimeo Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );  

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_sound_cloud_profile', array (
    'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control('nucleus_sound_cloud_profile', array(
      'label'    => esc_html__('Sound Cloud Profile', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
  ) );  

  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_rss_url', array (
      'default' => get_bloginfo('rss_url'),
    'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control('nucleus_rss_url', array(
      'label'    => esc_html__('RSS URL', 'nucleus'),
      'section'  => 'nucleus_social_profiles',
      'type'     => 'url',
  ) );


  /*-----------------------------------------------------------------------------------*/
  /*  Portfolio Settings
  /*-----------------------------------------------------------------------------------*/


  // Add: Section
    $wp_customize->add_section( 'nucleus_portfolio_settings', array(
      'title'          => esc_html__( 'Portfolio Settings', 'nucleus' ),
      'priority'       => 20,
  ) );


  // Add: Dropdown Pages
  $wp_customize->add_setting( 'nucleus_portfolio_page', array (
   'sanitize_callback' => 'custom_sanitize_dropdown_pages',
  ) );

  $wp_customize->add_control( 'nucleus_portfolio_page', array(
    'type' => 'dropdown-pages',
    'section' => 'nucleus_portfolio_settings',
    'label' => __( 'Default Portfolio Page', 'nucleus' ),
    'description' => __( 'Any single folio page will link to this portfolio page if it is not define in single folio meta panel.', 'nucleus' ),
  ) );


  /*-----------------------------------------------------------------------------------*/
  /*  Blog Settings
  /*-----------------------------------------------------------------------------------*/
  

  // Add: Section
    $wp_customize->add_section( 'nucleus_blog_settings', array(
      'title'  => esc_html__( 'Blog Settings', 'nucleus' ),
      'priority'       => 20,
  ) );

  // Add: Select
  $wp_customize->add_setting( 'nucleus_blog_layout', array (
    'default' => 'full_grid_posts',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control('nucleus_blog_layout', array(
    'label'    => esc_html__('Blog Layout', 'lamark'),
    'section'  => 'nucleus_blog_settings',
    'type'     => 'select',
    'choices'  => array(
      'full_posts'  => 'Full Posts',
      'grid_posts'  => 'Grid Posts',
      'full_grid_posts'   => 'Full Post + Grid Posts',
    ),
  ) );

  // Add: Select
  $wp_customize->add_setting( 'nucleus_archive_layout', array (
    'default' => 'full_grid_posts',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control('nucleus_archive_layout', array(
    'label'    => esc_html__('Archive Layout', 'lamark'),
    'section'  => 'nucleus_blog_settings',
    'type'     => 'select',
    'choices'  => array(
      'full_posts'  => 'Full Posts',
      'grid_posts'  => 'Grid Posts',
      'full_grid_posts'   => 'Full Post + Grid Posts',
    ),
  ) );

  // Add: Select
  $wp_customize->add_setting( 'nucleus_blog_sidebar', array (
    'default' => array( 'blog_detail', 'blog_archive' ),
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  $wp_customize->add_control(
    new JT_Customize_Control_Checkbox_Multiple( $wp_customize, 'nucleus_blog_sidebar',
        array(
            'section' => 'nucleus_blog_settings',
            'label'   => __( 'Enable Sidebar', 'nucleus' ),
            'description'   => esc_html__('Enable "Blog Sidebar" on following pages.', 'nucleus'),
            'choices' => array(
                'blog_master'      => __( 'Blog Master Page', 'nucleus' ),
                'blog_detail'     => __( 'Blog Detail Page', 'nucleus' ),
                'blog_archive'       => __( 'Blog Archive Page', 'nucleus' )
            )
        )
    )
  );


  /*-----------------------------------------------------------------------------------*/
  /*  Footer Settings
  /*-----------------------------------------------------------------------------------*/

  // Add: Section
    $wp_customize->add_section( 'nucleus_footer_settings', array(
      'title'          => esc_html__( 'Footer Settings', 'nucleus' ),
      'priority'       => 50,
  ) );


  // Add: Select
    $wp_customize->add_setting( 'nucleus_footer_style', array (
    'sanitize_callback' => 'custom_sanitize_select',
    'default' => 'center',
    ) );

  $wp_customize->add_control( 'nucleus_footer_style', array(
    'type' => 'select',
    'section' => 'nucleus_footer_settings', // Add a default or your own section
    'label' => __( 'Footer Style', 'nucleus' ),
    'choices' => array(
      'center' => __( 'Central', 'nucleus' ),
      'full-width' => __( 'Full-Width', 'nucleus' ),
    ),
  ) );


  // Add: Text Field
    $wp_customize->add_setting( 'nucleus_footer_title', array (
      'default'       => esc_html__('Let\'s Talk', 'nucleus'),
    'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('nucleus_footer_title', array(
      'label'       => esc_html__('Title', 'nucleus'),
      'section'     => 'nucleus_footer_settings',
  ) );

  // Add: Text Area
    $wp_customize->add_setting( 'nucleus_footer_text', array (
      'default' => wp_kses_post( __('Have a Project or an idea you would like to discuss? <br> Then what are you waiting for?', 'nucleus') ),
    'sanitize_callback' => 'custom_sanitize_textarea',
    ) );  

    $wp_customize->add_control('nucleus_footer_text', array(
      'label'    => esc_html__('Content', 'nucleus'),
      'description'   => esc_html__('You can use <br> tag or other HTML tags here.', 'nucleus'),
      'section'  => 'nucleus_footer_settings',
      'type'     => 'textarea',
  ) );


  // Add: Text Area
    $wp_customize->add_setting( 'nucleus_copyright_text', array (
      'default' => wp_kses_post( __('2017 Nucleus Theme <br> Crafted & Designed by WP Scout.', 'nucleus') ),
    'sanitize_callback' => 'custom_sanitize_textarea',
    ) );

    $wp_customize->add_control('nucleus_copyright_text', array(
      'label'    => esc_html__('Copyright Text', 'nucleus'),
      'section'  => 'nucleus_footer_settings',
      'type'     => 'textarea',
  ) );


  // Add: Text Area
    $wp_customize->add_setting( 'nucleus_contact_text', array (
      'default' => sprintf( wp_kses_post( __( 'Want to work with us? Lets boogie. <a href="%1$s">hello@example.com</a>.', 'nucleus' ) ), esc_url( 'mailto:hello@example.com' ) ),
    'sanitize_callback' => 'custom_sanitize_textarea',
    ) );  

    $wp_customize->add_control('nucleus_contact_text', array(
      'label'    => esc_html__('Contact Text', 'nucleus'),
      'section'  => 'nucleus_footer_settings',
      'type'     => 'textarea',
  ) );



} 


/*-----------------------------------------------------------------------------------*/
/*  Custom Sanitization Function(s)
/*-----------------------------------------------------------------------------------*/

  // Sanitize: Text Area
  function custom_sanitize_textarea( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
  }

  // Sanitize: Select
  function custom_sanitize_select( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

  }

  // Sanitize: Drop Down Pages
  function custom_sanitize_dropdown_pages( $page_id, $setting ) {

    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );

    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );

  }


?>