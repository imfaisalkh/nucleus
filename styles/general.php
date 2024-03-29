<?php

#-----------------------------------------------------------------#
# Helper Variable(s) and Function(s)
#-----------------------------------------------------------------#

	// Post or Page ID
	if( is_home() || is_archive() || is_search() ) {
		$post_ID = get_option('page_for_posts');
	} else {
		$post_ID = get_the_ID();
	}

?>

/** == HEADER & LOGO SIZE == */
/** ================================================== */

	/** Header Size */
	:root {
		--header-desktop-size: <?php echo get_theme_mod('nucleus_header_desktop_height', 88) . 'px'; ?>;
		--header-mobile-size: <?php echo get_theme_mod('nucleus_header_mobile_height', 60) . 'px'; ?>;
		--header-sticky-size: <?php echo get_theme_mod('nucleus_header_sticky_height', 112) . 'px'; ?>;
	}

	/** Logo Size */
	:root {
		--header-desktop-logo-size: <?php echo get_theme_mod('nucleus_header_desktop_logo_height', 88) . 'px'; ?>;
		--header-mobile-logo-size: <?php echo get_theme_mod('nucleus_header_mobile_logo_height', 60) . 'px'; ?>;
		--header-sticky-logo-size: <?php echo get_theme_mod('nucleus_header_sticky_logo_height', 112) . 'px'; ?>;
	}

	/** Top Bar */
	:root {
		--top-bar-size: <?php echo get_theme_mod('nucleus_header_top_bar_height', 40) . 'px'; ?>;
		--top-bar-text-color: <?php echo get_theme_mod('nucleus_header_top_bar_text_color', '#FFF'); ?>;
		--top-bar-background-color: <?php echo get_theme_mod('nucleus_header_top_bar_bg_color', '#232323'); ?>;
	}


/** == PAGE BACKGROUND == */
/** ================================================== */

	<?php
		$background_image   		 = attachment_url_to_postid(get_field('background_image', $post_ID)); // get ID from the image URL
		$background_video   		 = get_field('background_video', $post_ID);
		$background_fit   		 	 = 'cover';
		$background_opacity    		 = get_field('background_opacity', $post_ID);
	?>

	:root {
		<?php if ($background_image) { ?>
		--background-image: <?php echo 'url(' . wp_get_attachment_image_url($background_image, 'nucleus-background-image') . ')'; ?>;
		<?php } ?>
		
		<?php if ($background_video) { ?>
		--background-video: <?php echo 'url(' . $background_video . ')'; ?>;
		<?php } ?>

		<?php if ($background_fit) { ?>
		--background-fit: <?php echo esc_html($background_fit); ?>;
		<?php } ?>

		<?php if ($background_opacity) { ?>
		--background-opacity-scroll: <?php echo esc_html($background_opacity); ?>;
		<?php } ?>
	}