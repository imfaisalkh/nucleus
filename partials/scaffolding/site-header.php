<?php
    // Helper Variable(s)
    $container_class = get_theme_mod('nucleus_header_full_width', false) ? 'full-width' : 'boxed';
    $is_custom_header = get_theme_mod('nucleus_header_version', 'v1') == 'custom';
    
    if (!get_query_var('header')) {
        $header_style = (get_field('site_header') && get_field('site_header') != 'global') ? get_field('site_header') : get_theme_mod('nucleus_header_version', 'v1');
    } else {
        $header_style = get_query_var('header');
    }

    // Header Layout - Defaults
    $header_left_elements = [];
    $header_center_elements = [];
    $header_right_elements = [];

    if (!$is_custom_header) {
        switch ($header_style) {
            case 'v2':
                $header_left_elements = [['element'  => 'logo', 'visibility' => 'both'], ['element'  => 'primary-menu', 'visibility' => 'desktop']];
                $header_center_elements = '';
                $header_right_elements = [['element'  => 'social-icons', 'visibility' => 'both'], ['element'  => 'button', 'visibility' => 'desktop'], ['element'  => 'hamburger-icon', 'visibility' => 'mobile']];
                break;
            case 'v3':
                $header_left_elements = [['element'  => 'hamburger-icon', 'visibility' => 'desktop'], ['element'  => 'logo', 'visibility' => 'both']];
                $header_center_elements = '';
                $header_right_elements = [['element'  => 'primary-menu', 'visibility' => 'desktop'], ['element'  => 'full-screen-icon', 'visibility' => 'both'], ['element'  => 'search-icon', 'visibility' => 'both'], ['element'  => 'hamburger-icon', 'visibility' => 'mobile']];
                break;
            case 'v4':
                $header_left_elements = [['element'  => 'logo', 'visibility' => 'mobile'], ['element'  => 'hamburger-icon', 'visibility' => 'desktop']];
                $header_center_elements = [['element'  => 'primary-menu', 'visibility' => 'desktop'], ['element'  => 'logo', 'visibility' => 'desktop'], ['element'  => 'secondary-menu', 'visibility' => 'desktop']];
                $header_right_elements = [['element'  => 'full-screen-icon', 'visibility' => 'both'], ['element'  => 'search-icon', 'visibility' => 'both'], ['element'  => 'hamburger-icon', 'visibility' => 'mobile']];
                break;
            case 'v5':
                $header_left_elements = [['element'  => 'logo', 'visibility' => 'both']];
                $header_center_elements = '';
                $header_right_elements = [['element'  => 'full-screen-icon', 'visibility' => 'both'], ['element'  => 'search-icon', 'visibility' => 'both'], ['element'  => 'hamburger-icon', 'visibility' => 'both']];
                break;
            default:
                $header_left_elements = [['element'  => 'logo', 'visibility' => 'both']];
                $header_center_elements = '';
                $header_right_elements = [['element'  => 'primary-menu', 'visibility' => 'desktop'], ['element'  => 'full-screen-icon', 'visibility' => 'desktop'], ['element'  => 'search-icon', 'visibility' => 'both'], ['element'  => 'hamburger-icon', 'visibility' => 'mobile']];
        }
    } else {
        $header_left_elements = get_theme_mod('nucleus_header_left', $header_left_elements);
        $header_center_elements = get_theme_mod('nucleus_header_center', $header_center_elements);
        $header_right_elements = get_theme_mod('nucleus_header_right', $header_right_elements);
    }

?>

<div class="container <?php echo esc_attr($container_class); ?>" data-header-style="<?php echo esc_attr($header_style); ?>">

    <?php if ($header_left_elements) { ?>
        <div class="left-elements elements">
            <?php foreach ($header_left_elements as $element) { ?>
                <?php include(locate_template( 'partials/scaffolding/header/'. $element['element'] .'.php' )); ?>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if ($header_center_elements) { ?>
        <div class="center-elements elements">
            <?php foreach ($header_center_elements as $element) { ?>
                <?php include(locate_template( 'partials/scaffolding/header/'. $element['element'] .'.php' )); ?>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if ($header_right_elements) { ?>
        <div class="right-elements elements">
            <?php foreach ($header_right_elements as $element) { ?>
                <?php include(locate_template( 'partials/scaffolding/header/'. $element['element'] .'.php' )); ?>
            <?php } ?>
        </div>
    <?php } ?>

</div>