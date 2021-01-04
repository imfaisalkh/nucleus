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
# Color Scheme (Parent)
#-----------------------------------------------------------------#

	// Meta Panel
	$color_scheme 	= get_field('color_scheme', $post_ID);


#-----------------------------------------------------------------#
# General (Tab)
#-----------------------------------------------------------------#

	// Meta Panel
	$base_colors 	= get_field('base_colors', $post_ID);
	$accent_colors 	= get_field('accent_colors', $post_ID);

	// Final (merging "Meta Panel + Default")
	$background_color   = $base_colors['background_color'];
	$text_color   			= $base_colors['text_color'];
	
	$primary_accent   	= $accent_colors['primary_accent'];
	$secondary_accent   = $accent_colors['secondary_accent'];


#-----------------------------------------------------------------#
# Background Media (Tab)
#-----------------------------------------------------------------#

	// Meta Panel
	$bg_image 		= get_field('background_image', $post_ID);
	$bg_effects 	= get_field('background_effects', $post_ID);

	// Final (merging "Meta Panel + Default")
	$background_image   		 = $bg_image['background_image'];
	$background_fit   		 	 = $bg_image['background_fit'];
	
	$background_opacity   		   = $bg_effects['background_opacity'];
	$background_opacity_scroll   = $bg_effects['background_opacity_scroll'];
	

#-----------------------------------------------------------------#
# Form (Tab)
#-----------------------------------------------------------------#

	// Meta Panel
	$form_text_styling 	  = get_field('form_text_styling', $post_ID);
	$form_field_styling   = get_field('form_field_styling', $post_ID);
	$form_button_styling  = get_field('form_button_styling', $post_ID);
	
	// Final (merging "Meta Panel + Default")
	$form_text_label_color   		 				= $form_text_styling['label_color'];
	$form_text_req_symbol_color   			= $form_text_styling['req_symbol_color'];
		
	$form_field_background_color   			= $form_field_styling['background_color'];
	$form_field_border_color   		 			= $form_field_styling['border_color'];
	$form_field_text_color   		 				= $form_field_styling['text_color'];
	$form_field_background_color_focus  = $form_field_styling['background_color_focus'];
	$form_field_border_color_focus   		= $form_field_styling['border_color_focus'];
	$form_field_text_color_focus   			= $form_field_styling['text_color_focus'];


	$form_button_background_color   		= $form_button_styling['background_color'];
	$form_button_border_color   				= $form_button_styling['border_color'];
	$form_button_text_color   		 			= $form_button_styling['text_color'];
	$form_button_background_color_hover = $form_button_styling['background_color_hover'];
	$form_button_border_color_hover   	= $form_button_styling['border_color_hover'];
	$form_button_text_color_hover   		= $form_button_styling['text_color_hover'];


?>

/** == CUSTOM PROPERTIES == */
/** ================================================== */

	/** Global Variables */
	:root {
		/** BACKGROUND: Background Media */
		--background-image										: <?php echo 'url(' . $background_image . ')'; ?>;
		--background-fit											: <?php echo $background_fit; ?>;
		--background-opacity-scroll						: <?php echo $background_opacity; ?>;
		--background-opacity-scroll						: <?php echo $background_opacity_scroll; ?>;

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
		--background-color: #FFF;
		--text-color: #000;
		--primary-accent: #FF6000;
		--secondary-accent : #43f3b7;

		/** COLORS: Forms */
		--form-text-label-color   		 				: #000;
		--form-text-req-symbol-color   				: red;

		--form-field-background-color   			: #FFF;
		--form-field-border-color   		 			: #EEEEEE;
		--form-field-text-color   		 				: #000;
		--form-field-background-color-focus  	: #FFF;
		--form-field-border-color-focus   		: #E2E2E2;
		--form-field-text-color-focus   			: #000;

		--form-button-background-color   			: #FF6000;
		--form-button-border-color   					: #FF6000;
		--form-button-text-color   		 				: #FFF;
		--form-button-background-color-hover 	: #262626;
		--form-button-border-color-hover   		: #262626;
		--form-button-text-color-hover   			: #FFF;

		/** COLORS: Menu */
		--menu-bg-color: #292929;
		--menu-text-color: #FFF;

	}


	/** Dark Color Scheme */
	body.dark-color-scheme {
		--background-color: #000;
		--text-color: #FFF;
		--primary-accent: #ffea36;
		--secondary-accent : #43f3b7;

		/** COLORS: Forms */
		--form-text-label-color   		 				: #838383;
		--form-text-req-symbol-color   				: #ff0000;

		--form-field-background-color   			: #242424;
		--form-field-border-color   		 			: #393939;
		--form-field-text-color   		 				: #B7B7B7;
		--form-field-background-color-focus  	: #242424;
		--form-field-border-color-focus   		: #555555;
		--form-field-text-color-focus   			: #B7B7B7;

		--form-button-background-color   			: #0FFFBE;
		--form-button-border-color   					: #0FFFBE;
		--form-button-text-color   		 				: #000;
		--form-button-background-color-hover 	: #EAEAEA;
		--form-button-border-color-hover   		: #EAEAEA;
		--form-button-text-color-hover   			: #000;

		/** COLORS: Menu */
		--menu-bg-color: #FFF;
		--menu-text-color: #292929;

	}

	/** Custom Color Scheme */
	body.custom-color-scheme {
		/** COLORS: General */
		--background-color  									: <?php echo $background_color; ?>;
		--text-color 													: <?php echo $text_color; ?>;
		--primary-accent											: <?php echo $primary_accent; ?>;
		--secondary-accent										: <?php echo $secondary_accent; ?>;

		/** COLORS: Forms */
		--form-text-label-color   		 				: <?php echo $form_text_label_color; ?>;
		--form-text-req-symbol-color   				: <?php echo $form_text_req_symbol_color; ?>;

		--form-field-background-color   			: <?php echo $form_field_background_color; ?>;
		--form-field-border-color   		 			: <?php echo $form_field_border_color; ?>;
		--form-field-text-color   		 				: <?php echo $form_field_text_color; ?>;
		--form-field-background-color-focus  	: <?php echo $form_field_background_color_focus; ?>;
		--form-field-border-color-focus   		: <?php echo $form_field_border_color_focus; ?>;
		--form-field-text-color-focus   			: <?php echo $form_field_text_color_focus; ?>;

		--form-button-background-color   			: <?php echo $form_button_background_color; ?>;
		--form-button-border-color   					: <?php echo $form_button_border_color; ?>;
		--form-button-text-color   		 				: <?php echo $form_button_text_color; ?>;
		--form-button-background-color-hover 	: <?php echo $form_button_background_color_hover; ?>;
		--form-button-border-color-hover   		: <?php echo $form_button_border_color_hover; ?>;
		--form-button-text-color-hover   			: <?php echo $form_button_text_color_hover; ?>;
	}
	