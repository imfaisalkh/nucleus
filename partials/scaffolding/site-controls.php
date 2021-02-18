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

    <?php if ( get_theme_mod('nucleus_enable_social_sharing', false) ) { ?>

        <?php $social_sharing_group = get_theme_mod('nucleus_social_sharing_group', array('twitter', 'facebook', 'pinterest')); ?>

        <div id="social-share">
            <span class="label"><?php esc_html_e( 'Share', 'nucleus' ); ?></span>
            <?php
            foreach ($social_sharing_group as $link) {
                switch ($link) {
                    case 'twitter':
                        echo '<span class="share-link"><a class="tw" target="_blank" href="https://twitter.com/home?status='. get_the_title() .' '. esc_url(get_permalink()) .'">'. esc_html__('Tw' ,'nucleus') .'<small>.</small></a></span>';
                        break;
                    case 'facebook':
                        echo '<span class="share-link"><a class="fb" target="_blank" href="https://www.facebook.com/share.php?u='. esc_url(get_permalink()) .'&title='. get_the_title() .'">'. esc_html__('Fb' ,'nucleus') .'<small>.</small></a></span>';
                        break;
                    case 'pinterest':
                        echo '<span class="share-link"><a class="pin" target="_blank" href="https://pinterest.com/pin/create/button/?url='. esc_url(get_permalink()) .'&media=&description='. get_the_title() .'">'. esc_html__('Pin' ,'nucleus') .'<small>.</small></a></span>';
                        break;
                    case 'linkedin':
                        echo '<span class="share-link"><a class="lin" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url='. esc_url(get_permalink()) .'">'. esc_html__('Lin' ,'nucleus') .'<small>.</small></a></span>';
                        break;
                    default:
                        break;
                }
            }
            ?>
        </div>

    <?php } ?>

    <?php if ( get_theme_mod('nucleus_enable_page_actions', false) ) { ?>

        <?php $page_actions_group = get_theme_mod('nucleus_page_actions_group', array('audio', 'info', 'top')); ?>

        <div id="page-controls">
            <?php
            foreach ($page_actions_group as $action) {
                switch ($action) {
                    case 'audio':
                        if (get_field('background_audio')) {
                            echo '<a class="page-control sound-bars active" href="#toggle-sound" aria-label="'. esc_html__('Toggle Sound', 'nucleus') .'" data-balloon-pos="left"><span class="bar"></span><span class="bar"></span><span class="bar"></span><span class="bar"></span></a>';
                        }
                        break;
                    case 'info':
                        echo '<a class="page-control notification" href="#site-info" aria-label="'. get_theme_mod('nucleus_info_box_tooltip', esc_html__('Info', 'nucleus')) .'" data-balloon-pos="left"><i class="fi fi-info" aria-hidden="true"></i></a>';
                        break;
                    case 'top':
                        echo '<a class="page-control go-top" href="#site-container"><i class="fi fi-arrow-up" aria-hidden="true"></i></a>';
                        break;
                    default:
                        break;
                }
            }
            ?>
        </div>

    <?php } ?>

</div>
<!-- END: SITE CONTROLS -->
