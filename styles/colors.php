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

	// 0: BASE COLOR SCHEME
	$base_color_scheme 	= get_field('base_color_scheme', $post_ID);
	$base_custom_colors   = get_field('base_colors', $post_ID);

	// Base Colors
	$primary_accent   	= $base_custom_colors ? $base_custom_colors['primary_accent'] : '';
	$secondary_accent   = $base_custom_colors ? $base_custom_colors['secondary_accent'] : '';
	$background_color   = $base_custom_colors ? $base_custom_colors['background_color'] : '';
	$text_color   		= $base_custom_colors ? $base_custom_colors['text_color'] : '';
	

	// 1: FORM COLOR SCHEME
	$form_color_scheme 		= get_field('form_color_scheme', $post_ID);
	$form_text_colors   	= get_field('form_text_colors', $post_ID);
	$form_field_colors   	= get_field('form_field_colors', $post_ID);
	$form_button_colors   	= get_field('form_button_colors', $post_ID);

	// Text Colors
	$form_label_color   	= $form_text_colors ? $form_text_colors['label'] : '';
	$form_req_symbol   		= $form_text_colors ? $form_text_colors['required'] : '';
	
	// Field Colors
	$form_field_background   	= $form_field_colors ? $form_field_colors['background'] : '';
	$form_field_border   		= $form_field_colors ? $form_field_colors['border'] : '';
	$form_field_text   			= $form_field_colors ? $form_field_colors['text'] : '';

	$form_field_background_focus   	= $form_field_colors ? $form_field_colors['background_focus'] : '';
	$form_field_border_focus   		= $form_field_colors ? $form_field_colors['border_focus'] : '';
	$form_field_text_focus   		= $form_field_colors ? $form_field_colors['text_focus'] : '';

	// Button Colors
	$form_button_background   		= $form_button_colors ? $form_button_colors['background'] : '';
	$form_button_border   			= $form_button_colors ? $form_button_colors['border'] : '';
	$form_button_text   			= $form_button_colors ? $form_button_colors['text'] : '';

	$form_button_background_hover   	= $form_button_colors ? $form_button_colors['background_hover'] : '';
	$form_button_border_hover   		= $form_button_colors ? $form_button_colors['border_hover'] : '';
	$form_button_text_hover   			= $form_button_colors ? $form_button_colors['text_hover'] : '';


	// 2: MENU COLOR SCHEME
	$menu_color_scheme 		= get_field('menu_color_scheme', $post_ID);
	$menu_colors   			= get_field('menu_colors', $post_ID);

	// Menu Colors
	$menu_background   		= $menu_colors ? $menu_colors['background'] : '';
	$menu_text   			= $menu_colors ? $menu_colors['text'] : '';

	$menu_background_hover  = $menu_colors ? $menu_colors['background_hover'] : '';
	$menu_text_hover   		= $menu_colors ? $menu_colors['text_hover'] : '';

?>

/** == CUSTOM PROPERTIES == */
/** ================================================== */

	/** Light Color Scheme */
	body.light-base-color-scheme	{
		--primary-accent: #FF6000;
		--secondary-accent : #43f3b7;
		--background-color: #FFF;
		--text-color: #000;
	}

	/** Dark Color Scheme */
	body.dark-base-color-scheme {
		--primary-accent: #FFEA36;
		--secondary-accent : #43f3b7;
		--background-color: #000;
		--text-color: #FFF;
	}

	/** Error Page */
	body.error404 {
		--primary-accent: #FF6000;
		--secondary-accent : #000000;
		--background-color: #F8FF3C;
		--text-color: #000;
	}

	<?php if ($base_color_scheme == 'custom') { ?>
	/** Base Color Scheme */
	body.custom-base-color-scheme {
		--primary-accent : <?php echo esc_html($primary_accent); ?>;
		--secondary-accent : <?php echo esc_html($secondary_accent); ?>;
		--background-color : <?php echo esc_html($background_color); ?>;
		--text-color : <?php echo esc_html($text_color); ?>;
	}
	<?php } ?>

	<?php if ($form_color_scheme == 'custom') { ?>
	/** Form - Text Colors */
	body.custom-form-color-scheme {
		--form-text-label-color: <?php echo esc_html($form_label_color); ?>;
		--form-text-req-symbol-color: <?php echo esc_html($form_req_symbol); ?>;
	}

	/** Form - Field Colors */
	body.custom-form-color-scheme {
		--form-field-background-color: <?php echo esc_html($form_field_background); ?>;
		--form-field-text-color: <?php echo esc_html($form_field_text); ?>;
		--form-field-border-color: <?php echo esc_html($form_field_border); ?>;

		--form-field-background-color-focus: <?php echo esc_html($form_field_background_focus); ?>;
		--form-field-text-color-focus: <?php echo esc_html($form_field_text_focus); ?>;
		--form-field-border-color-focus: <?php echo esc_html($form_field_border_focus); ?>;
	}

	/** Form - Button Colors */
	body.custom-form-color-scheme {
		--form-button-background-color: <?php echo esc_html($form_button_background); ?>;
		--form-button-border-color: <?php echo esc_html($form_button_border); ?>;
		--form-button-text-color: <?php echo esc_html($form_button_text); ?>;

		--form-button-background-color-hover: <?php echo esc_html($form_button_background_hover); ?>;
		--form-button-border-color-hover: <?php echo esc_html($form_button_border_hover); ?>;
		--form-button-text-color-hover: <?php echo esc_html($form_button_text_hover); ?>;
	}
	<?php } ?>


	<?php if ($menu_color_scheme == 'custom') { ?>
	/** Menu Colors */
	body.custom-menu-color-scheme {
		--menu-background: <?php echo esc_html($menu_background); ?>;
		--menu-text: <?php echo esc_html($menu_text); ?>;

		--menu-background-hover: <?php echo esc_html($menu_background_hover); ?>;
		--menu-text-hover: <?php echo esc_html($menu_text_hover); ?>;
	}
	<?php } ?>

	/** Site Notification */
	:root {
		--site-notification-background: <?php echo get_theme_mod('nucleus_info_box_bg_color', '#F4F2A5'); ?>;
		--site-notification-text: <?php echo get_theme_mod('nucleus_info_box_text_color', '#000'); ?>;
	}