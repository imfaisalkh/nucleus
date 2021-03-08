<?php
    // Helper Variable(s)
    $button_text = get_theme_mod('nucleus_header_button_text', esc_html__('Let\'s Talk', '_nucleus'));
    $button_link = get_theme_mod('nucleus_header_button_link', '#no-link-defined');

?>

<a class="button element" href="<?php echo esc_url($button_link); ?>" data-visibility="<?php echo esc_attr(isset($element['visibility']) ? $element['visibility'] : 'desktop'); ?>">
    <?php echo esc_html($button_text); ?>
    <ion-icon name="arrow-forward-outline"></ion-icon>
</a>
