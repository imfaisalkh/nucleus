<?php
    $site_logo = get_field('custom_logo') ? get_field('custom_logo') : (has_custom_logo() ? the_custom_logo() : false);
?>
<a id="site-logo" href="<?php echo esc_url( home_url('/') ); ?>" class="custom-logo-link" rel="home" itemprop="url">
    <?php if ($site_logo) { ?>
        <img class="logo image" src="<?php echo esc_url($site_logo); ?>" itemprop="logo" alt="<?php echo get_bloginfo('name'); ?>">
    <?php } else { ?>
        <h3 class="logo text"><?php echo get_bloginfo('name'); ?></h3>
    <?php } ?>
</a>