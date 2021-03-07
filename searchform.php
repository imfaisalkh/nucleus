<div class="search-form-wrap">	
	<form role="search" method="get" id="searchform" class="modal-widget" action="<?php echo esc_url( home_url() ); ?>/">
		<h4 class="widget-title"><?php esc_html_e( 'Type & Hit Enter', '_nucleus' ); ?></h4>
		<div class="form-fields">
			<input type="text" name="s" id="widget-search" placeholder="<?php esc_html_e('Search Term', '_nucleus'); ?>">
			<input value="<?php esc_html_e('Go', '_nucleus'); ?>" type="submit">
		</div>
	</form>	
</div>
