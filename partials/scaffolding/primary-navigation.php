<div class="bg-wrap">
    <div class="media"></div>
</div>

<div class="inner-wrap">

    <div class="logo-wrap">

        <?php
            // Post or Page ID
            if( is_home() || is_archive() || is_search() ) {
                $post_ID = get_option('page_for_posts');
            } else {
                $post_ID = get_the_ID();
            }

            // Global: Desktop Logo Image URL
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $desktop_logo_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

            // Global: Default Logos
            $page_logos_default = array(
                'desktop_logo'  => $desktop_logo_image[0],
                'mobile_logo'   => !empty(get_theme_mod('nucleus_mobile_logo')) ? get_theme_mod('nucleus_mobile_logo') : $desktop_logo_image[0],
            );

            // Override: Custom Logos
            $page_logos = get_field('page_logos', $post_ID);

            // Final Logos
            $desktop_logo   = $page_logos['desktop_logo'] ? $page_logos['desktop_logo'] : $page_logos_default['desktop_logo'];
            $mobile_logo    = $page_logos['mobile_logo'] ? $page_logos['mobile_logo'] : $page_logos_default['mobile_logo'];

            // var_dump($mobile_logo);
            ?>

            <a id="site-logo" href="<?php echo esc_url( home_url('/') ); ?>" class="custom-logo-link" rel="home" itemprop="url">

                <?php if ( $desktop_logo && empty($mobile_logo) ) { ?>
                    <img class="desktop-logo" src="<?php echo $desktop_logo; ?>" itemprop="logo" alt="<?php echo get_bloginfo('name'); ?>">
                    <img class="mobile-logo" src="<?php echo $desktop_logo; ?>" itemprop="logo" alt="<?php echo get_bloginfo('name'); ?>">
                <?php } else if ( empty($desktop_logo) && $mobile_logo ) { ?>
                    <img class="desktop-logo" src="<?php echo $mobile_logo; ?>" itemprop="logo" alt="<?php echo get_bloginfo('name'); ?>">
                    <img class="mobile-logo" src="<?php echo $mobile_logo; ?>" itemprop="logo" alt="<?php echo get_bloginfo('name'); ?>">
                <?php } else if ( $desktop_logo && $mobile_logo ) { ?>
                    <img class="desktop-logo" src="<?php echo $desktop_logo; ?>" itemprop="logo" alt="<?php echo get_bloginfo('name'); ?>">
                    <img class="mobile-logo" src="<?php echo $mobile_logo; ?>" itemprop="logo" alt="<?php echo get_bloginfo('name'); ?>">
                <?php } else { ?>
                    <h3 class="desktop-logo text"><?php echo get_bloginfo('name'); ?></h3>
                    <h3 class="mobile-logo text"><?php echo get_bloginfo('name'); ?></h3>
                <?php } ?>
                
            </a>

    </div>

    <?php $menu_type = isset($_GET['nav']) ? $_GET['nav'] : get_theme_mod('nucleus_menu_type', 'traditional'); ?>
    <?php if( $menu_type == "traditional" ) { ?>

        <div class="menu-wrap">
            
            <?php 
            $args = array(
                'theme_location'  => 'nucleus-desktop-navigation',
                'menu_id'         => 'main-menu',
                'menu_class'      => 'sf-menu',
                'fallback_cb'     => 'nucleus_default_menu'
            );

            wp_nav_menu($args);
            ?>

        </div>

    <?php } ?>

    <div class="icons-wrap">
        <div id="icons-menu-container">
            <ul id="icons-menu">
                <?php if( !get_theme_mod('nucleus_menu_cart_icon', true) ) { ?>
                    <li class="cart-icon">
                        <a href="#" data-tooltip="Purchase Theme"><i class="fi fi-shopping-cart" aria-hidden="true"></i></a>
                        <span class="count">0</span>
                    </li>
                <?php } ?>
                <li class="fullscreen-icon">
                    <a href="#"><i class="fi fi-fullscreen" aria-hidden="true"></i></a>
                </li>
                <?php if( !get_theme_mod('nucleus_menu_search_icon') ) { ?>
                    <li class="search-icon">
                        <a href="#"><i class="fi fi-search" aria-hidden="true"></i></a>
                    </li>
                <?php } ?>
                <li class="menu-icon">
                    <a href="#"><i class="fi fi-menu" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>

</div>