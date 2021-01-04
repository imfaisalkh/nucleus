<!-- BEGIN: SITE CONTROLS -->
<div id="off-canvas-menu-wrap" off-canvas="modern-menu right overlay">
    
    <a href="#" class="close-menu"><i class="fi fi-close" aria-hidden="true"></i></a>

    <section class="menu-wrap">
        <h4 class="title">Menu</h4>
        <?php 
        $args = array(
            'theme_location'  => 'nucleus-desktop-navigation',
            'menu_class'      => 'off-canvas-menu',
            'fallback_cb'     => 'nucleus_default_menu'
        );

        wp_nav_menu($args);
        ?>
    </section>

</div>
<!-- END: SITE CLIPBOARD -->