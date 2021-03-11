<?php
    // Helper Variable(s)
    $container_class = get_theme_mod('nucleus_header_full_width', false) ? 'full-width' : 'boxed';
    $is_top_bar = get_theme_mod('nucleus_header_top_bar_visibility', true);

    // Top Bar Elements - Defaults
    $bar_left_elements = [['element'  => 'menu', 'visibility' => 'both']];
    $bar_center_elements = [];
    $bar_right_elements = [['element'  => 'social-icons', 'visibility' => 'both']];

    $bar_left_elements = get_theme_mod('nucleus_header_top_bar_left', $bar_left_elements);
    $bar_center_elements = get_theme_mod('nucleus_header_top_bar_center', $bar_center_elements);
    $bar_right_elements = get_theme_mod('nucleus_header_top_bar_right', $bar_right_elements);
?>

<?php if ($is_top_bar && ($bar_left_elements || $bar_center_elements || $bar_right_elements)) { ?>
    <div id="top-bar">
        <div class="container <?php echo esc_attr($container_class); ?>">
        
            <?php if ($bar_left_elements) { ?>
                <div class="left-elements elements">
                    <?php foreach ($bar_left_elements as $element) { ?>
                        <?php include(locate_template( 'partials/scaffolding/top-bar/'. $element['element'] .'.php' )); ?>
                    <?php } ?>
                </div>
            <?php } ?>
        
            <?php if ($bar_center_elements) { ?>
                <div class="center-elements elements">
                    <?php foreach ($bar_center_elements as $element) { ?>
                        <?php include(locate_template( 'partials/scaffolding/top-bar/'. $element['element'] .'.php' )); ?>
                    <?php } ?>
                </div>
            <?php } ?>
        
            <?php if ($bar_right_elements) { ?>
                <div class="right-elements elements">
                    <?php foreach ($bar_right_elements as $element) { ?>
                        <?php include(locate_template( 'partials/scaffolding/top-bar/'. $element['element'] .'.php' )); ?>
                    <?php } ?>
                </div>
            <?php } ?>
        
        </div>
    </div>
<?php } ?>