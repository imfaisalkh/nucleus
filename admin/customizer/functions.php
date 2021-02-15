<?php

#-----------------------------------------------------------------#
#
#	Here we have all the HELPER functions for the theme
#	Please be extremely cautious editing this file,
#	When things go wrong, they intend to go wrong in a big way.
#	You have been warned!
#
#-----------------------------------------------------------------#

    if ( class_exists( 'Kirki' ) ) {
        foreach ( glob( get_template_directory() . "/admin/customizer/*.inc.php" ) as $filename) {
            include $filename;
        }
    }
