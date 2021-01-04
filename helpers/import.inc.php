<?php


#-------------------------------------------------------------------------------#
#  Filter wp_link_pages to wrap current page in span.
#-------------------------------------------------------------------------------#

	if ( !function_exists('nucleus_import_files') ) {

		function nucleus_import_files() {
		  return array(
		    array(
		      'import_file_name'           	 => 'Demo Import',
		      'local_import_file'            => NUCLEUS_ADMIN . '/import/content-import.xml',
		      'local_import_widget_file'     => NUCLEUS_ADMIN . '/import/widgets-import.wie',
		      'local_import_customizer_file' => NUCLEUS_ADMIN . '/import/customizer-import.dat',
		      'import_notice'              	 => esc_html__( 'After you import this demo, you will have to assign your front page manually.', 'nucleus' ),
		    ),
		  );
		}

	}
	add_filter( 'pt-ocdi/import_files', 'nucleus_import_files' );

