<div class="primary-menu">
    <?php 
    $args = array(
        'theme_location'  => 'nucleus-primary-menu',
        'menu_id'         => 'primary-menu',
        'menu_class'      => 'sf-menu',
        'fallback_cb'     => 'nucleus_default_menu'
    );

    wp_nav_menu($args);
    ?>
</div>