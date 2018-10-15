<?php
/**
 * Custom template tags for this theme
 *
 */

/* ------------------------------------------------------------------------
						Create pages with sections
---------------------------------------------------------------------------*/

/* Register around Caen section for Caen Page */
function get_around_caen_section()
{
	$id = 131;
	if ( (FALSE != get_post_status( $id ) ) && ( 'publish' === get_post_status ( $id ) ) )
	{
		get_template_part( 'template-parts/page/caen/content', 'around-caen-section' );
    }
}