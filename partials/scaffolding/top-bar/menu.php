<div class="top-bar-menu element" data-visibility="<?php echo esc_attr(isset($element['visibility']) ? $element['visibility'] : 'desktop'); ?>">
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