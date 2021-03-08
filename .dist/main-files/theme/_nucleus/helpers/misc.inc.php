<?php


#-------------------------------------------------------------------------------#
#  Ignore DEV Folders for Theme Check
#-------------------------------------------------------------------------------#

	add_filter( 'tc_skip_development_directories', '__return_true' );
