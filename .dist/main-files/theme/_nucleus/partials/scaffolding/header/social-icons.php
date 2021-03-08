<?php
    // Helper Variable(s)
    $social_profile_group = get_theme_mod( 'nucleus_social_profiles_group');
?>
<?php if ($social_profile_group) { ?>
    <ul class="social-profiles element" data-visibility="<?php echo esc_attr(isset($element['visibility']) ? $element['visibility'] : 'desktop'); ?>">
        <?php foreach ($social_profile_group as $profile) { ?>
            <li><a href="<?php echo esc_url($profile['url']); ?>" target="_blank"><i class="<?php echo esc_attr($profile['plateform']); ?>"></i></a></li>
        <?php } ?>
    </ul>
<?php } ?>