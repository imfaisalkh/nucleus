<?php


#-----------------------------------------------------------------#
# Fallback for ACF get_field() function
#-----------------------------------------------------------------# 

	function example_mejs_add_container_class() {
		if ( ! wp_script_is( 'mediaelement', 'done' ) ) {
			return;
		}
		?>
		<script>
		(function() {
			var settings = window._wpmejsSettings || {};
			settings.features = settings.features || mejs.MepDefaults.features;
			settings.features.push( 'exampleclass' );
			MediaElementPlayer.prototype.buildexampleclass = function( player ) {
				player.container.addClass( 'example-mejs-container' );
			};
		})();
		</script>
		<?php
	}
	add_action( 'wp_print_footer_scripts', 'example_mejs_add_container_class' );
