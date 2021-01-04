<?php


#-----------------------------------------------------------------#
# Custom Gallery Markup for WordPress
#-----------------------------------------------------------------#

	if ( !function_exists('nucleus_gallery_markup') ) {

		function nucleus_gallery_markup( $output = '', $atts, $instance ) {
			$return = $output; // fallback


			if ( !empty($atts['ids']) ) { // proceed only if ids exist

				$atts['columns'] = !empty($atts['columns']) ? $atts['columns'] : null;

				$gallery_ids = explode(',', $atts['ids']);

				$return = '<div id="gallery-'. rand(10,100) .'" class="wp-gallery" data-col="'. $atts['columns'] .'">';

				foreach( $gallery_ids as $image_id ) {

					$attachment_meta = wp_prepare_attachment_for_js($image_id);

					$return .= '<div class="image '. $attachment_meta['alt'] .'">';
					$return .= '<a href="'. $attachment_meta['url'] .'" title="'. esc_attr( $attachment_meta['title'] ) .'" data-caption="'. esc_attr( $attachment_meta['caption'] ) .'" rel="lightbox">';
					$return .= '<img src="'. $attachment_meta['url'] .'" alt="'. $attachment_meta['alt'] .'" />';
					$return .= !empty($attachment_meta['caption']) ? '<span class="wp-caption">'. esc_attr( $attachment_meta['caption'] ) .'</span>' : '';
					$return .= '</a>';
					$return .= '</div>';

				}

				$return .= '</div>';

			}

			return $return;
		}

	}

	add_filter( 'post_gallery', 'nucleus_gallery_markup', 10, 3 );