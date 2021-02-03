<?php
	
	// Post or Page ID
	if( is_home() || is_archive() || is_search() ) {
		$post_ID = get_option('page_for_posts');
	} else {
		$post_ID = get_the_ID();
    }
    
    
?>

<!-- BEGIN: SITE CONTROLS -->
<div id="site-controls">

    <?php if ( !get_theme_mod('nucleus_social_sharing') ) { ?>

        <div id="social-share">
            <span class="label"><?php esc_html_e( 'Share', 'nucleus' ); ?></span>
            <span class="share-link"><a class="tw" target="_blank" href="<?php echo 'https://twitter.com/home?status='. get_the_title() .' '. esc_url(get_permalink()) .''; ?>">Tw<small>.</small></a></span>
            <span class="share-link"><a class="fb" target="_blank" href="<?php echo 'https://www.facebook.com/share.php?u='. esc_url(get_permalink()) .'&title='. get_the_title(); ?>">Fb<small>.</small></a></span>
            <span class="share-link"><a class="pin" target="_blank" href="<?php echo 'https://pinterest.com/pin/create/button/?url='. esc_url(get_permalink()) .'&media=&description='. get_the_title(); ?>">Pin<small>.</small></a></span>
        </div>

    <?php } ?>

    <?php if ( !get_theme_mod('nucleus_page_actions') ) { ?>

        <div id="page-controls">
            <?php if (get_field('background_audio')) { ?>
                <a class="page-control sound-bars active" href="#toggle-sound" aria-label="<?php echo esc_html('Toggle Sound', 'nucleus'); ?>" data-balloon-pos="left">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </a>
            <?php } ?>
            <?php if ( !get_theme_mod('nucleus_notification_disable') && get_theme_mod('nucleus_notification_title') ) { ?>
                <a class="page-control notification" href="#site-info" aria-label="<?php echo get_theme_mod('nucleus_notification_tooltip'); ?>" data-balloon-pos="left"><i class="fi fi-info" aria-hidden="true"></i></a>
            <?php } ?>
            <a class="page-control go-top" href="#site-container"><i class="fi fi-arrow-up" aria-hidden="true"></i></a>
        </div>

    <?php } ?>

</div>
<!-- END: SITE CONTROLS -->
