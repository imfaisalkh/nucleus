<div class="top-bar-menu">
    <?php 
    $args = array(
        'theme_location'  => 'nucleus-top-bar-menu',
        'menu_id'         => 'top-bar-menu',
        'menu_class'      => 'sf-menu',
        'fallback_cb'     => 'nucleus_default_menu'
    );

    wp_nav_menu($args);
    ?>
</div>