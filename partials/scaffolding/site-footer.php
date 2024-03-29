<?php
	// Helper Variable(s)
	$container_class = get_theme_mod('nucleus_footer_full_width', false) ? 'full-width' : 'boxed';

	if (get_query_var('footer')) {
		$footer_style = get_query_var('footer');
	} else {
		$footer_style = (get_field('site_footer') && get_field('site_footer') != 'global') ? get_field('site_footer') : get_theme_mod('nucleus_footer_version', 'none');
	}

	// Footer V1
	$footer_v1_heading = get_theme_mod('nucleus_footer_v1_heading', esc_html__( 'Let\'s Talk', '_nucleus'));
	$footer_v1_text = get_theme_mod('nucleus_footer_v1_text', wp_kses( __('Have a Project or an idea you would like to discuss? <br> Then what are you waiting for?', '_nucleus'), 'general' ));

	// Footer V2
	$footer_v2_copyright = get_theme_mod('nucleus_footer_v2_copyright', wp_kses( __('&copy; 2021 Nucleus Theme <br> Crafted & Designed by Black Sailor.', '_nucleus'), 'general' ));
	$footer_v2_contact = get_theme_mod('nucleus_footer_v2_contact', sprintf( wp_kses( __( 'Want to work with us? Let&rsquo;s boogie. <a href="%1$s">hello@example.com</a>.', '_nucleus' ), 'general' ), esc_url( 'mailto:hello@example.com' ) ));

?>


<div class="container <?php echo esc_attr($container_class); ?> row" data-footer-style="<?php echo esc_attr($footer_style); ?>">

	<?php if ( $footer_style == 'v2' ) { ?>
		<div class="copyright column" data-span="2">
			<p><?php echo wp_kses($footer_v2_copyright, 'general'); ?></p>
		</div>
		<div class="contact-text column" data-span="2">
			<p><?php echo wp_kses($footer_v2_contact, 'general'); ?></p>
		</div>
		<div class="social-icons column" data-span="2">
			<?php get_template_part( 'partials/scaffolding/social-profiles' ); ?>
		</div>
	<?php } else if ( $footer_style == 'v1' ) { ?>
		<span class="dot"></span>
		<div class="column">
			<h3 class="title"><?php echo esc_html($footer_v1_heading); ?></h3>
			<p class="desc"><?php echo wp_kses($footer_v1_text, 'general'); ?></p>
			<?php get_template_part( 'partials/scaffolding/social-profiles' ); ?>
		</div>
	<?php }?>

</div>
