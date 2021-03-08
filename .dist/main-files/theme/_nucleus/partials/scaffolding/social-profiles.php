<?php
    // Helper Variable(s)
    $social_profile_group = get_theme_mod( 'nucleus_social_profiles_group');
?>
<?php if ($social_profile_group) { ?>
    <nav class="widget widget-social-links">
        <ul class="social-profiles">
            <?php foreach ($social_profile_group as $profile) { ?>
                <li><a href="<?php echo esc_url($profile['url']); ?>" target="_blank"><i class="<?php echo esc_attr($profile['plateform']); ?>"></i></a></li>
            <?php } ?>
        </ul>
    </nav>
<?php } ?>