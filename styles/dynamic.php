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
	$primary_accent   	= $custom_color['primary_accent'];
	$secondary_accent   = $custom_color['secondary_accent'];
	$background_color   = $custom_color['background_color'];
	$text_color   		= $custom_color['text_color'];
	

#-----------------------------------------------------------------#
# Page Background (Meta Panel)
#-----------------------------------------------------------------#

	$background_image   		 = get_field('background_image', $post_ID);
	$background_fit   		 	 = 'cover';
	$background_image_opacity    = get_field('background_image_opacity', $post_ID);

?>

/** == CUSTOM PROPERTIES == */
/** ================================================== */

	/** Global Variables */
	:root {
		/** BACKGROUND: Background Media */
		--background-image								: <?php echo 'url(' . $background_image . ')'; ?>;
		--background-fit								: <?php echo $background_fit; ?>;
		--background-opacity-scroll						: <?php echo $background_image_opacity; ?>;

		/** TYPOGRAPHY: Fonts */
		--primary-font-stack:    'Lora', sans-serif;
		--secondary-font-stack:  'Open Sans', sans-serif;
		--tertiary-font-stack:   'Libre Franklin', sans-serif;
	}

	/** Light Color Scheme */
	body.light-color-scheme,
	body.blog, body.archive
	{
		/** COLORS: General */
		--primary-accent: #FF6000;
		--secondary-accent : #43f3b7;
		--background-color: #FFF;
		--text-color: #000;

		/** COLORS: Menu */
		--menu-bg-color: #292929;
		--menu-text-color: #FFF;
	}


	/** Dark Color Scheme */
	body.dark-color-scheme {
		--primary-accent: #ffea36;
		--secondary-accent : #43f3b7;
		--background-color: #000;
		--text-color: #FFF;

		/** COLORS: Menu */
		--menu-bg-color: #FFF;
		--menu-text-color: #292929;

	}

	/** Custom Color Scheme */
	body.custom-color-scheme {
		/** COLORS: General */
		--primary-accent										: <?php echo $primary_accent; ?>;
		--secondary-accent										: <?php echo $secondary_accent; ?>;
		--background-color  									: <?php echo $background_color; ?>;
		--text-color 											: <?php echo $text_color; ?>;
	}
	