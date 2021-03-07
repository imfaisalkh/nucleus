<?php if ( is_active_sidebar( 'page-sidebar' ) ) { ?>

	<?php dynamic_sidebar( 'page-sidebar' ); ?>

<?php } else { ?>

	<p class="no-widget"><?php esc_html_e('You have not defined any widget for this sidebar yet.', '_nucleus'); ?></p>
	
<?php }  ?>