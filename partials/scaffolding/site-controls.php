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
            <span class="label"><?php esc_html_e( 'Share:', '_nucleus' ); ?></span>
            <?php
            foreach ($social_sharing_group as $link) {
                switch ($link) {
                    case 'twitter':
                        echo '<span class="share-link"><a class="tw" target="_blank" href="https://twitter.com/home?status='. urlencode(get_the_title() .' '. esc_url(get_permalink())) .'">'. esc_html__('Tw' ,'_nucleus') .'<small>.</small></a></span>';
                        break;
                    case 'facebook':
                        echo '<span class="share-link"><a class="fb" target="_blank" href="https://www.facebook.com/share.php?u='. esc_url(get_permalink()) .'&title='. urlencode(get_the_title()) .'">'. esc_html__('Fb' ,'_nucleus') .'<small>.</small></a></span>';
                        break;
                    case 'pinterest':
                        echo '<span class="share-link"><a class="pin" target="_blank" href="https://pinterest.com/pin/create/button/?url='. esc_url(get_permalink()) .'&media=&description='. urlencode(get_the_title()) .'">'. esc_html__('Pin' ,'_nucleus') .'<small>.</small></a></span>';
                        break;
                    case 'linkedin':
                        echo '<span class="share-link"><a class="lin" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url='. esc_url(get_permalink()) .'">'. esc_html__('Lin' ,'_nucleus') .'<small>.</small></a></span>';
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
                            echo '<a class="page-control sound-bars active" href="#toggle-sound" aria-label="'. esc_html__('Toggle Sound', '_nucleus') .'" data-balloon-pos="left"><span class="bar"></span><span class="bar"></span><span class="bar"></span><span class="bar"></span></a>';
                        }
                        break;
                    case 'info':
                        echo '<a class="page-control notification" href="#site-info" aria-label="'. get_theme_mod('nucleus_info_box_tooltip', esc_html__('Info', '_nucleus')) .'" data-balloon-pos="left"><i class="fi fi-info" aria-hidden="true"></i></a>';
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

    <svg xmlns="http://www.w3.org/2000/svg" xml:lang="en" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500">
        <title>Circular Text Path</title>
        <defs>
            <path id="textcircle"
                d="M250,400
                    a150,150 0 0,1 0,-300a150,150 0 0,1 0,300Z"
                transform="rotate(12,250,250)"/>
        </defs>
        <rect width="100%" height="100%" fill="none" />
        <text>
            <textPath xlink:href="#textcircle"
                    aria-label="All for One &amp; One for All"
                    textLength="942">VIEW THE EXPERIENCE  </textPath>
        </text>
    </svg>

</div>
<!-- END: SITE CONTROLS -->
