<?php if ( $footer_style == 'full-width' ) { ?>

	<?php
		$footer_copyright_text = wp_kses_post( __('&copy; 2017 Nucleus Theme <br> Crafted & Designed by WP Scout.', 'nucleus') );
		$footer_contact_text   = sprintf( wp_kses_post( __( 'Want to work with us? Let&rsquo;s boogie. <a href="%1$s">hello@example.com</a>.', 'nucleus' ) ), esc_url( 'mailto:hello@example.com' ) );
	?>

	<div class="inner-wrap row">
		<div class="copyright column" data-span="2">
			<p><?php echo get_theme_mod('nucleus_copyright_text', $footer_copyright_text); ?></p>
		</div>

		<div class="contact-text column" data-span="2">
			<p><?php echo get_theme_mod('nucleus_contact_text', $footer_contact_text); ?></p>
		</div>

		<div class="social-icons column" data-span="2">
			<?php get_template_part( 'partials/scaffolding/social-profiles' ); ?>
		</div>
	</div>

<?php } else { ?>

	<?php
		$footer_title_default = esc_html__( 'Let\'s Talk', 'nucleus');
		$footer_text_default  = wp_kses_post( __('Have a Project or an idea you would like to discuss? <br> Then what are you waiting for?', 'nucleus') );
	?>

	<div class="inner-wrap">
		<h3 class="title"><?php echo get_theme_mod('nucleus_footer_title', $footer_title_default); ?></h3>
		<p class="desc"><?php echo get_theme_mod('nucleus_footer_text', $footer_text_default); ?></p>
		<?php get_template_part( 'partials/scaffolding/social-profiles' ); ?>
	</div>

<?php }?>
