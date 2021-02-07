<div class="secondary-menu">
    <?php 
    $args = array(
        'theme_location'  => 'nucleus-secondary-menu',
        'menu_id'         => 'secondary-menu',
        'menu_class'      => 'sf-menu',
        'fallback_cb'     => 'nucleus_default_menu'
    );

    wp_nav_menu($args);
    ?>
</div>