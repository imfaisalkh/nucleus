<?php
    $site_logo = get_field('custom_logo') ? get_field('custom_logo') : (has_custom_logo() ? the_custom_logo() : false);
?>
<a id="site-logo"  data-visibility="<?php echo esc_attr(isset($element['visibility']) ? $element['visibility'] : 'desktop'); ?>" href="<?php echo esc_url( home_url('/') ); ?>" class="custom-logo-link element" rel="home" itemscope itemtype="https://schema.org/Brand">
    <?php if ($site_logo) { ?>
        <img class="logo image" src="<?php echo esc_url($site_logo); ?>" itemprop="logo" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <?php } else { ?>
        <h3 class="logo text"><?php echo get_bloginfo('name'); ?></h3>
    <?php } ?>
</a>
