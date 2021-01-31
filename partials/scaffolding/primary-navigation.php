<?php
    // Helper Variable(s)
    $header_style = (get_field('site_header') == 'traditional' || get_field('site_header') == 'modern') ? get_field('site_header') : get_theme_mod('nucleus_menu_type', 'traditional');
    $site_logo = get_field('custom_logo') ? get_field('custom_logo') : (has_custom_logo() ? the_custom_logo() : false);
?>

<div class="bg-wrap">
    <div class="media"></div>
</div>

<div class="inner-wrap" data-header-style="<?php echo $header_style; ?>">

    <div class="logo-wrap">

        <?php
            ?>

            <a id="site-logo" href="<?php echo esc_url( home_url('/') ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                <?php if ($site_logo) { ?>
                    <img class="logo image" src="<?php echo esc_url($site_logo); ?>" itemprop="logo" alt="<?php echo get_bloginfo('name'); ?>">
                <?php } else { ?>
                    <h3 class="logo text"><?php echo get_bloginfo('name'); ?></h3>
                <?php } ?>
            </a>

    </div>

    <?php if( $header_style == "traditional" || $header_style == "center" ) { ?>

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
                    <a href="#">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>