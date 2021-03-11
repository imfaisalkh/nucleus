<div class="secondary-menu element" data-visibility="<?php echo esc_attr(isset($element['visibility']) ? $element['visibility'] : 'desktop'); ?>">
    <?php 
    $args = array(
        'theme_location'  => 'nucleus-secondary-menu',
        'menu_id'         => 'secondary-menu',
        'menu_class'      => 'sf-menu',
        'fallback_cb'     => ''
    );

    wp_nav_menu($args);
    ?>
</div>