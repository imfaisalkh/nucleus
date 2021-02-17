/** == FONT STACKS == */
/** ================================================== */

	<?php
		$typography_primary_stack = get_theme_mod( 'nucleus_typography_general_primary', [] );
		$typography_secondary_stack = get_theme_mod( 'nucleus_typography_general_secondary', [] );
		$typography_tertiary_stack = get_theme_mod( 'nucleus_typography_general_tertiary', [] );
	?>

	:root {
		<?php if ($typography_primary_stack) { ?>
		--primary-font-stack: <?php echo esc_html($typography_primary_stack['font-family']); ?>;
		<?php } ?>

		<?php if ($typography_secondary_stack) { ?>
		--secondary-font-stack: <?php echo esc_html($typography_secondary_stack['font-family']); ?>;
		<?php } ?>

		<?php if ($typography_tertiary_stack) { ?>
		--tertiary-font-stack: <?php echo esc_html($typography_tertiary_stack['font-family']); ?>;
		<?php } ?>
	}


/** == BLOG MASTER == */
/** ================================================== */

	<?php
		$typography_blog_master_standard_title = get_theme_mod( 'nucleus_typography_blog_master_standard_title', [] );
		$typography_blog_master_standard_desc = get_theme_mod( 'nucleus_typography_blog_master_standard_desc', [] );
        $typography_blog_master_standard_meta = get_theme_mod( 'nucleus_typography_blog_master_standard_meta', [] );
        
		$typography_blog_master_featured_title = get_theme_mod( 'nucleus_typography_blog_master_featured_title', [] );
		$typography_blog_master_featured_desc = get_theme_mod( 'nucleus_typography_blog_master_featured_desc', [] );
		$typography_blog_master_featured_meta = get_theme_mod( 'nucleus_typography_blog_master_featured_meta', [] );
		$typography_blog_master_featured_tag = get_theme_mod( 'nucleus_typography_blog_master_featured_tag', [] );
	?>

	:root {
		<?php if ($typography_blog_master_standard_title) { ?>
		--blog-standard-title-font-family: <?php echo esc_html($typography_blog_master_standard_title['font-family']); ?>;
		--blog-standard-title-variant: <?php echo esc_html($typography_blog_master_standard_title['variant']); ?>;
		--blog-standard-title-font-size: <?php echo esc_html($typography_blog_master_standard_title['font-size']); ?>;
		--blog-standard-title-line-height: <?php echo esc_html($typography_blog_master_standard_title['line-height']); ?>;
		--blog-standard-title-letter-spacing: <?php echo esc_html($typography_blog_master_standard_title['letter-spacing']); ?>;
		--blog-standard-title-text-transform: <?php echo esc_html($typography_blog_master_standard_title['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_blog_master_standard_desc) { ?>
		--blog-standard-desc-font-family: <?php echo esc_html($typography_blog_master_standard_desc['font-family']); ?>;
		--blog-standard-desc-variant: <?php echo esc_html($typography_blog_master_standard_desc['variant']); ?>;
		--blog-standard-desc-font-size: <?php echo esc_html($typography_blog_master_standard_desc['font-size']); ?>;
		--blog-standard-desc-line-height: <?php echo esc_html($typography_blog_master_standard_desc['line-height']); ?>;
		--blog-standard-desc-letter-spacing: <?php echo esc_html($typography_blog_master_standard_desc['letter-spacing']); ?>;
		--blog-standard-desc-text-transform: <?php echo esc_html($typography_blog_master_standard_desc['text-transform']); ?>;
		<?php } ?>

        <?php if ($typography_blog_master_standard_meta) { ?>
		--blog-standard-meta-font-family: <?php echo esc_html($typography_blog_master_standard_meta['font-family']); ?>;
		--blog-standard-meta-variant: <?php echo esc_html($typography_blog_master_standard_meta['variant']); ?>;
		--blog-standard-meta-font-size: <?php echo esc_html($typography_blog_master_standard_meta['font-size']); ?>;
		--blog-standard-meta-line-height: <?php echo esc_html($typography_blog_master_standard_meta['line-height']); ?>;
		--blog-standard-meta-letter-spacing: <?php echo esc_html($typography_blog_master_standard_meta['letter-spacing']); ?>;
		--blog-standard-meta-text-transform: <?php echo esc_html($typography_blog_master_standard_meta['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_blog_master_featured_title) { ?>
		--blog-featured-title-font-family: <?php echo esc_html($typography_blog_master_featured_title['font-family']); ?>;
		--blog-featured-title-variant: <?php echo esc_html($typography_blog_master_featured_title['variant']); ?>;
		--blog-featured-title-font-size: <?php echo esc_html($typography_blog_master_featured_title['font-size']); ?>;
		--blog-featured-title-line-height: <?php echo esc_html($typography_blog_master_featured_title['line-height']); ?>;
		--blog-featured-title-letter-spacing: <?php echo esc_html($typography_blog_master_featured_title['letter-spacing']); ?>;
		--blog-featured-title-text-transform: <?php echo esc_html($typography_blog_master_featured_title['text-transform']); ?>;
		<?php } ?>

        <?php if ($typography_blog_master_featured_desc) { ?>
		--blog-featured-desc-font-family: <?php echo esc_html($typography_blog_master_featured_desc['font-family']); ?>;
		--blog-featured-desc-variant: <?php echo esc_html($typography_blog_master_featured_desc['variant']); ?>;
		--blog-featured-desc-font-size: <?php echo esc_html($typography_blog_master_featured_desc['font-size']); ?>;
		--blog-featured-desc-line-height: <?php echo esc_html($typography_blog_master_featured_desc['line-height']); ?>;
		--blog-featured-desc-letter-spacing: <?php echo esc_html($typography_blog_master_featured_desc['letter-spacing']); ?>;
		--blog-featured-desc-text-transform: <?php echo esc_html($typography_blog_master_featured_desc['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_blog_master_featured_meta) { ?>
		--blog-featured-meta-font-family: <?php echo esc_html($typography_blog_master_featured_meta['font-family']); ?>;
		--blog-featured-meta-variant: <?php echo esc_html($typography_blog_master_featured_meta['variant']); ?>;
		--blog-featured-meta-font-size: <?php echo esc_html($typography_blog_master_featured_meta['font-size']); ?>;
		--blog-featured-meta-line-height: <?php echo esc_html($typography_blog_master_featured_meta['line-height']); ?>;
		--blog-featured-meta-letter-spacing: <?php echo esc_html($typography_blog_master_featured_meta['letter-spacing']); ?>;
		--blog-featured-meta-text-transform: <?php echo esc_html($typography_blog_master_featured_meta['text-transform']); ?>;
		<?php } ?>

        <?php if ($typography_blog_master_featured_tag) { ?>
		--blog-featured-tag-font-family: <?php echo esc_html($typography_blog_master_featured_tag['font-family']); ?>;
		--blog-featured-tag-variant: <?php echo esc_html($typography_blog_master_featured_tag['variant']); ?>;
		--blog-featured-tag-font-size: <?php echo esc_html($typography_blog_master_featured_tag['font-size']); ?>;
		--blog-featured-tag-line-height: <?php echo esc_html($typography_blog_master_featured_tag['line-height']); ?>;
		--blog-featured-tag-letter-spacing: <?php echo esc_html($typography_blog_master_featured_tag['letter-spacing']); ?>;
		--blog-featured-tag-text-transform: <?php echo esc_html($typography_blog_master_featured_tag['text-transform']); ?>;
		<?php } ?>
	}


/** == BLOG DETAIL == */
/** ================================================== */

	<?php
		$typography_blog_detail_title = get_theme_mod( 'nucleus_typography_blog_detail_title', [] );
		$typography_blog_detail_meta = get_theme_mod( 'nucleus_typography_blog_detail_meta', [] );
		$typography_blog_detail_tag = get_theme_mod( 'nucleus_typography_blog_detail_tag', [] );
        $typography_blog_detail_body = get_theme_mod( 'nucleus_typography_blog_detail_body', [] );
	?>

	:root {
		<?php if ($typography_blog_detail_title) { ?>
		--blog-detail-title-font-family: <?php echo esc_html($typography_blog_detail_title['font-family']); ?>;
		--blog-detail-title-variant: <?php echo esc_html($typography_blog_detail_title['variant']); ?>;
		--blog-detail-title-font-size: <?php echo esc_html($typography_blog_detail_title['font-size']); ?>;
		--blog-detail-title-line-height: <?php echo esc_html($typography_blog_detail_title['line-height']); ?>;
		--blog-detail-title-letter-spacing: <?php echo esc_html($typography_blog_detail_title['letter-spacing']); ?>;
		--blog-detail-title-text-transform: <?php echo esc_html($typography_blog_detail_title['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_blog_detail_meta) { ?>
		--blog-detail-meta-font-family: <?php echo esc_html($typography_blog_detail_meta['font-family']); ?>;
		--blog-detail-meta-variant: <?php echo esc_html($typography_blog_detail_meta['variant']); ?>;
		--blog-detail-meta-font-size: <?php echo esc_html($typography_blog_detail_meta['font-size']); ?>;
		--blog-detail-meta-line-height: <?php echo esc_html($typography_blog_detail_meta['line-height']); ?>;
		--blog-detail-meta-letter-spacing: <?php echo esc_html($typography_blog_detail_meta['letter-spacing']); ?>;
		--blog-detail-meta-text-transform: <?php echo esc_html($typography_blog_detail_meta['text-transform']); ?>;
		<?php } ?>

        <?php if ($typography_blog_detail_tag) { ?>
		--blog-detail-tag-font-family: <?php echo esc_html($typography_blog_detail_tag['font-family']); ?>;
		--blog-detail-tag-variant: <?php echo esc_html($typography_blog_detail_tag['variant']); ?>;
		--blog-detail-tag-font-size: <?php echo esc_html($typography_blog_detail_tag['font-size']); ?>;
		--blog-detail-tag-line-height: <?php echo esc_html($typography_blog_detail_tag['line-height']); ?>;
		--blog-detail-tag-letter-spacing: <?php echo esc_html($typography_blog_detail_tag['letter-spacing']); ?>;
		--blog-detail-tag-text-transform: <?php echo esc_html($typography_blog_detail_tag['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_blog_detail_body) { ?>
		--blog-detail-body-font-family: <?php echo esc_html($typography_blog_detail_body['font-family']); ?>;
		--blog-detail-body-variant: <?php echo esc_html($typography_blog_detail_body['variant']); ?>;
		--blog-detail-body-font-size: <?php echo esc_html($typography_blog_detail_body['font-size']); ?>;
		--blog-detail-body-line-height: <?php echo esc_html($typography_blog_detail_body['line-height']); ?>;
		--blog-detail-body-letter-spacing: <?php echo esc_html($typography_blog_detail_body['letter-spacing']); ?>;
		--blog-detail-body-text-transform: <?php echo esc_html($typography_blog_detail_body['text-transform']); ?>;
		<?php } ?>
	}



/** == LOGO TYPOGRAPHY == */
/** ================================================== */

	<?php
		$typography_logo_text = get_theme_mod( 'nucleus_typography_logo_text', [] );
	?>

	:root {
		<?php if ($typography_logo_text) { ?>
		--site-logo-font-family: <?php echo esc_html($typography_logo_text['font-family']); ?>;
		--site-logo-variant: <?php echo esc_html($typography_logo_text['variant']); ?>;
		--site-logo-font-size: <?php echo esc_html($typography_logo_text['font-size']); ?>;
		--site-logo-line-height: <?php echo esc_html($typography_logo_text['line-height']); ?>;
		--site-logo-letter-spacing: <?php echo esc_html($typography_logo_text['letter-spacing']); ?>;
		--site-logo-text-transform: <?php echo esc_html($typography_logo_text['text-transform']); ?>;
		<?php } ?>
	}


/** == TOPBAR TYPOGRAPHY == */
/** ================================================== */

	<?php
		$typography_top_bar_regular = get_theme_mod( 'nucleus_typography_top_bar_regular_text', [] );
		$typography_top_bar_menu = get_theme_mod( 'nucleus_typography_top_bar_menu_text', [] );
	?>

	:root {
		<?php if ($typography_top_bar_regular) { ?>
		--top-bar-regular-font-family: <?php echo esc_html($typography_top_bar_regular['font-family']); ?>;
		--top-bar-regular-variant: <?php echo esc_html($typography_top_bar_regular['variant']); ?>;
		--top-bar-regular-font-size: <?php echo esc_html($typography_top_bar_regular['font-size']); ?>;
		--top-bar-regular-line-height: <?php echo esc_html($typography_top_bar_regular['line-height']); ?>;
		--top-bar-regular-letter-spacing: <?php echo esc_html($typography_top_bar_regular['letter-spacing']); ?>;
		--top-bar-regular-text-transform: <?php echo esc_html($typography_top_bar_regular['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_top_bar_menu) { ?>
		--top-bar-menu-font-family: <?php echo esc_html($typography_top_bar_menu['font-family']); ?>;
		--top-bar-menu-variant: <?php echo esc_html($typography_top_bar_menu['variant']); ?>;
		--top-bar-menu-font-size: <?php echo esc_html($typography_top_bar_menu['font-size']); ?>;
		--top-bar-menu-line-height: <?php echo esc_html($typography_top_bar_menu['line-height']); ?>;
		--top-bar-menu-letter-spacing: <?php echo esc_html($typography_top_bar_menu['letter-spacing']); ?>;
		--top-bar-menu-text-transform: <?php echo esc_html($typography_top_bar_menu['text-transform']); ?>;
		<?php } ?>
	}
	


/** == MENU TYPOGRAPHY == */
/** ================================================== */

	<?php
		$typography_menu_root = get_theme_mod( 'nucleus_typography_menu_root', [] );
		$typography_menu_child = get_theme_mod( 'nucleus_typography_menu_child', [] );
	?>

	:root {
		<?php if ($typography_menu_root) { ?>
		--menu-root-font-family: <?php echo esc_html($typography_menu_root['font-family']); ?>;
		--menu-root-variant: <?php echo esc_html($typography_menu_root['variant']); ?>;
		--menu-root-font-size: <?php echo esc_html($typography_menu_root['font-size']); ?>;
		--menu-root-line-height: <?php echo esc_html($typography_menu_root['line-height']); ?>;
		--menu-root-letter-spacing: <?php echo esc_html($typography_menu_root['letter-spacing']); ?>;
		--menu-root-text-transform: <?php echo esc_html($typography_menu_root['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_menu_child) { ?>
		--menu-child-font-family: <?php echo esc_html($typography_menu_child['font-family']); ?>;
		--menu-child-variant: <?php echo esc_html($typography_menu_child['variant']); ?>;
		--menu-child-font-size: <?php echo esc_html($typography_menu_child['font-size']); ?>;
		--menu-child-line-height: <?php echo esc_html($typography_menu_child['line-height']); ?>;
		--menu-child-letter-spacing: <?php echo esc_html($typography_menu_child['letter-spacing']); ?>;
		--menu-child-text-transform: <?php echo esc_html($typography_menu_child['text-transform']); ?>;
		<?php } ?>
	}


/** == PAGE HEADER TYPOGRAPHY == */
/** ================================================== */

	<?php
		$typography_page_header_title = get_theme_mod( 'nucleus_typography_page_header_title', [] );
		$typography_page_header_subtitle = get_theme_mod( 'nucleus_typography_page_header_subtitle', [] );
		$typography_page_header_backdrop = get_theme_mod( 'nucleus_typography_page_header_backdrop', [] );
	?>

	:root {
		<?php if ($typography_page_header_title) { ?>
		--page-header-title-font-family: <?php echo esc_html($typography_page_header_title['font-family']); ?>;
		--page-header-title-variant: <?php echo esc_html($typography_page_header_title['variant']); ?>;
		--page-header-title-font-size: <?php echo esc_html($typography_page_header_title['font-size']); ?>;
		--page-header-title-line-height: <?php echo esc_html($typography_page_header_title['line-height']); ?>;
		--page-header-title-letter-spacing: <?php echo esc_html($typography_page_header_title['letter-spacing']); ?>;
		--page-header-title-text-transform: <?php echo esc_html($typography_page_header_title['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_page_header_subtitle) { ?>
		--page-header-subtitle-font-family: <?php echo esc_html($typography_page_header_subtitle['font-family']); ?>;
		--page-header-subtitle-variant: <?php echo esc_html($typography_page_header_subtitle['variant']); ?>;
		--page-header-subtitle-font-size: <?php echo esc_html($typography_page_header_subtitle['font-size']); ?>;
		--page-header-subtitle-line-height: <?php echo esc_html($typography_page_header_subtitle['line-height']); ?>;
		--page-header-subtitle-letter-spacing: <?php echo esc_html($typography_page_header_subtitle['letter-spacing']); ?>;
		--page-header-subtitle-text-transform: <?php echo esc_html($typography_page_header_subtitle['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_page_header_backdrop) { ?>
		--page-header-backdrop-font-family: <?php echo esc_html($typography_page_header_backdrop['font-family']); ?>;
		--page-header-backdrop-variant: <?php echo esc_html($typography_page_header_backdrop['variant']); ?>;
		--page-header-backdrop-font-size: <?php echo esc_html($typography_page_header_backdrop['font-size']); ?>;
		--page-header-backdrop-line-height: <?php echo esc_html($typography_page_header_backdrop['line-height']); ?>;
		--page-header-backdrop-letter-spacing: <?php echo esc_html($typography_page_header_backdrop['letter-spacing']); ?>;
		--page-header-backdrop-text-transform: <?php echo esc_html($typography_page_header_backdrop['text-transform']); ?>;
		<?php } ?>
	}


/** == FORMS TYPOGRAPHY == */
/** ================================================== */

	<?php
		$typography_form_label = get_theme_mod( 'nucleus_typography_form_label', [] );
		$typography_form_field_text = get_theme_mod( 'nucleus_typography_form_field_text', [] );
		$typography_form_button_text = get_theme_mod( 'nucleus_typography_form_button_text', [] );
	?>

	:root {
		<?php if ($typography_form_label) { ?>
		--form-label-font-family: <?php echo '"'. esc_attr($typography_form_label['font-family']). '"'; ?>;
		--form-label-variant: <?php echo esc_attr($typography_form_label['variant']); ?>;
		--form-label-font-size: <?php echo esc_attr($typography_form_label['font-size']); ?>;
		--form-label-line-height: <?php echo esc_attr($typography_form_label['line-height']); ?>;
		--form-label-letter-spacing: <?php echo esc_attr($typography_form_label['letter-spacing']); ?>;
		--form-label-text-transform: <?php echo esc_attr($typography_form_label['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_form_field_text) { ?>
		--form-field-font-family: <?php echo esc_attr($typography_form_field_text['font-family']); ?>;
		--form-field-variant: <?php echo esc_attr($typography_form_field_text['variant']); ?>;
		--form-field-font-size: <?php echo esc_attr($typography_form_field_text['font-size']); ?>;
		--form-field-line-height: <?php echo esc_attr($typography_form_field_text['line-height']); ?>;
		--form-field-letter-spacing: <?php echo esc_attr($typography_form_field_text['letter-spacing']); ?>;
		--form-field-text-transform: <?php echo esc_attr($typography_form_field_text['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_form_button_text) { ?>
		--form-button-font-family: <?php echo esc_attr($typography_form_button_text['font-family']); ?>;
		--form-button-variant: <?php echo esc_attr($typography_form_button_text['variant']); ?>;
		--form-button-font-size: <?php echo esc_attr($typography_form_button_text['font-size']); ?>;
		--form-button-line-height: <?php echo esc_attr($typography_form_button_text['line-height']); ?>;
		--form-button-letter-spacing: <?php echo esc_attr($typography_form_button_text['letter-spacing']); ?>;
		--form-button-text-transform: <?php echo esc_attr($typography_form_button_text['text-transform']); ?>;
		<?php } ?>
	}



/** == COMMENTS TYPOGRAPHY == */
/** ================================================== */

	<?php
		$typography_comments_title = get_theme_mod( 'nucleus_typography_comments_title', [] );
		$typography_comments_subtitle = get_theme_mod( 'nucleus_typography_comments_subtitle', [] );
		$typography_comments_author = get_theme_mod( 'nucleus_typography_comments_author', [] );
		$typography_comments_text = get_theme_mod( 'nucleus_typography_comments_text', [] );
	?>

	:root {
		<?php if ($typography_comments_title) { ?>
		--comments-title-font-family: <?php echo '"'. esc_attr($typography_comments_title['font-family']). '"'; ?>;
		--comments-title-variant: <?php echo esc_attr($typography_comments_title['variant']); ?>;
		--comments-title-font-size: <?php echo esc_attr($typography_comments_title['font-size']); ?>;
		--comments-title-line-height: <?php echo esc_attr($typography_comments_title['line-height']); ?>;
		--comments-title-letter-spacing: <?php echo esc_attr($typography_comments_title['letter-spacing']); ?>;
		--comments-title-text-transform: <?php echo esc_attr($typography_comments_title['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_comments_subtitle) { ?>
		--comments-subtitle-font-family: <?php echo esc_attr($typography_comments_subtitle['font-family']); ?>;
		--comments-subtitle-variant: <?php echo esc_attr($typography_comments_subtitle['variant']); ?>;
		--comments-subtitle-font-size: <?php echo esc_attr($typography_comments_subtitle['font-size']); ?>;
		--comments-subtitle-line-height: <?php echo esc_attr($typography_comments_subtitle['line-height']); ?>;
		--comments-subtitle-letter-spacing: <?php echo esc_attr($typography_comments_subtitle['letter-spacing']); ?>;
		--comments-subtitle-text-transform: <?php echo esc_attr($typography_comments_subtitle['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_comments_author) { ?>
		--comments-author-font-family: <?php echo esc_attr($typography_comments_author['font-family']); ?>;
		--comments-author-variant: <?php echo esc_attr($typography_comments_author['variant']); ?>;
		--comments-author-font-size: <?php echo esc_attr($typography_comments_author['font-size']); ?>;
		--comments-author-line-height: <?php echo esc_attr($typography_comments_author['line-height']); ?>;
		--comments-author-letter-spacing: <?php echo esc_attr($typography_comments_author['letter-spacing']); ?>;
		--comments-author-text-transform: <?php echo esc_attr($typography_comments_author['text-transform']); ?>;
		<?php } ?>

        <?php if ($typography_comments_text) { ?>
		--comments-text-font-family: <?php echo esc_attr($typography_comments_text['font-family']); ?>;
		--comments-text-variant: <?php echo esc_attr($typography_comments_text['variant']); ?>;
		--comments-text-font-size: <?php echo esc_attr($typography_comments_text['font-size']); ?>;
		--comments-text-line-height: <?php echo esc_attr($typography_comments_text['line-height']); ?>;
		--comments-text-letter-spacing: <?php echo esc_attr($typography_comments_text['letter-spacing']); ?>;
		--comments-text-text-transform: <?php echo esc_attr($typography_comments_text['text-transform']); ?>;
		<?php } ?>
	}


/** == SITE FOOTER TYPOGRAPHY == */
/** ================================================== */

	<?php
		$typography_site_footer_title = get_theme_mod( 'nucleus_typography_site_footer_title', [] );
		$typography_site_footer_text = get_theme_mod( 'nucleus_typography_site_footer_text', [] );
	?>

	:root {
		<?php if ($typography_site_footer_title) { ?>
		--site-footer-title-font-family: <?php echo esc_html($typography_site_footer_title['font-family']); ?>;
		--site-footer-title-variant: <?php echo esc_html($typography_site_footer_title['variant']); ?>;
		--site-footer-title-font-size: <?php echo esc_html($typography_site_footer_title['font-size']); ?>;
		--site-footer-title-line-height: <?php echo esc_html($typography_site_footer_title['line-height']); ?>;
		--site-footer-title-letter-spacing: <?php echo esc_html($typography_site_footer_title['letter-spacing']); ?>;
		--site-footer-title-text-transform: <?php echo esc_html($typography_site_footer_title['text-transform']); ?>;
		<?php } ?>

		<?php if ($typography_site_footer_text) { ?>
		--site-footer-text-font-family: <?php echo esc_html($typography_site_footer_text['font-family']); ?>;
		--site-footer-text-variant: <?php echo esc_html($typography_site_footer_text['variant']); ?>;
		--site-footer-text-font-size: <?php echo esc_html($typography_site_footer_text['font-size']); ?>;
		--site-footer-text-line-height: <?php echo esc_html($typography_site_footer_text['line-height']); ?>;
		--site-footer-text-letter-spacing: <?php echo esc_html($typography_site_footer_text['letter-spacing']); ?>;
		--site-footer-text-text-transform: <?php echo esc_html($typography_site_footer_text['text-transform']); ?>;
		<?php } ?>
	}
	