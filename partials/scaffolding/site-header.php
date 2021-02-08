<?php
    // Helper Variable(s)
    $container_class = get_theme_mod('nucleus_header_full_width', false) ? 'full-width' : 'boxed';
    $is_custom_header = get_theme_mod('nucleus_header_version', 'v1') == 'custom';
    
    if (!get_query_var('header')) {
        $header_style = get_field('site_header') != 'global' ? get_field('site_header') : get_theme_mod('nucleus_header_version', 'v1');
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
                $header_left_elements = [['element'  => 'logo'], ['element'  => 'primary-menu']];
                $header_center_elements = '';
                $header_right_elements = [['element'  => 'social-icons']];
                break;
            case 'v3':
                $header_left_elements = [['element'  => 'hamburger-icon'], ['element'  => 'logo']];
                $header_center_elements = '';
                $header_right_elements = [['element'  => 'primary-menu'], ['element'  => 'full-screen-icon'], ['element'  => 'search-icon']];
                break;
            case 'v4':
                $header_left_elements = [['element'  => 'hamburger-icon']];
                $header_center_elements = [['element'  => 'primary-menu'], ['element'  => 'logo'], ['element'  => 'secondary-menu']];
                $header_right_elements = [['element'  => 'full-screen-icon'], ['element'  => 'search-icon']];
                break;
            case 'v5':
                $header_left_elements = [['element'  => 'logo']];
                $header_center_elements = '';
                $header_right_elements = [['element'  => 'full-screen-icon'], ['element'  => 'search-icon'], ['element'  => 'hamburger-icon']];
                break;
            default:
                $header_left_elements = [['element'  => 'logo']];
                $header_center_elements = '';
                $header_right_elements = [['element'  => 'primary-menu'], ['element'  => 'full-screen-icon'], ['element'  => 'search-icon']];
        }
    } else {
        $header_left_elements = get_theme_mod('nucleus_header_left', $header_left_elements);
        $header_center_elements = get_theme_mod('nucleus_header_center', $header_center_elements);
        $header_right_elements = get_theme_mod('nucleus_header_right', $header_right_elements);
    }

?>

<div class="container <?php echo esc_attr($container_class); ?>" data-header-style="<?php echo $header_style; ?>">

    <?php if ($header_left_elements) { ?>
        <div class="left-elements elements">
            <?php foreach ($header_left_elements as $element) { ?>
                <?php get_template_part( 'partials/scaffolding/header/' . $element['element'] ); ?>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if ($header_center_elements) { ?>
        <div class="center-elements elements">
            <?php foreach ($header_center_elements as $element) { ?>
                <?php get_template_part( 'partials/scaffolding/header/' . $element['element'] ); ?>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if ($header_right_elements) { ?>
        <div class="right-elements elements">
            <?php foreach ($header_right_elements as $element) { ?>
                <?php get_template_part( 'partials/scaffolding/header/' . $element['element'] ); ?>
            <?php } ?>
        </div>
    <?php } ?>

</div>