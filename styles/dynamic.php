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


#-----------------------------------------------------------------#
# Page Style (Meta Panel)
#-----------------------------------------------------------------#

	// Color Scheme
	$color_scheme 	= get_field('color_scheme', $post_ID);
	$custom_color   = get_field('custom_colors', $post_ID);

	// Custom Colors
	$primary_accent   	= $custom_color ? $custom_color['primary_accent'] : '';
	$secondary_accent   = $custom_color ? $custom_color['secondary_accent'] : '';
	$background_color   = $custom_color ? $custom_color['background_color'] : '';
	$text_color   		= $custom_color ? $custom_color['text_color'] : '';
	

#-----------------------------------------------------------------#
# Page Background (Meta Panel)
#-----------------------------------------------------------------#

	$background_image   		 = get_field('background_image', $post_ID);
	$background_video   		 = get_field('background_video', $post_ID);
	$background_fit   		 	 = 'cover';
	$background_opacity    		 = get_field('background_opacity', $post_ID);

?>

/** == CUSTOM PROPERTIES == */
/** ================================================== */

	/** Global Variables */
	:root {
		/** BACKGROUND: Background Media */
		--background-image: <?php echo 'url(' . $background_image . ')'; ?>;
		--background-video: <?php echo 'url(' . $background_video . ')'; ?>;
		--background-fit: <?php echo $background_fit; ?>;
		--background-opacity-scroll: <?php echo $background_opacity; ?>;

		/** TYPOGRAPHY: Fonts */
		--primary-font-stack:    'Lora', sans-serif;
		--secondary-font-stack:  'Open Sans', sans-serif;
		--tertiary-font-stack:   'Libre Franklin', sans-serif;
	}

	/** Light Color Scheme */
	body.light-color-scheme,
	body.blog, body.archive
	{
		--primary-accent: #FF6000;
		--secondary-accent : #43f3b7;
		--background-color: #FFF;
		--text-color: #000;
	}

	/** Dark Color Scheme */
	body.dark-color-scheme {
		--primary-accent: #ffea36;
		--secondary-accent : #43f3b7;
		--background-color: #000;
		--text-color: #FFF;
	}

	/** Custom Color Scheme */
	body.custom-color-scheme {
		--primary-accent : <?php echo $primary_accent; ?>;
		--secondary-accent : <?php echo $secondary_accent; ?>;
		--background-color : <?php echo $background_color; ?>;
		--text-color : <?php echo $text_color; ?>;
	}
	