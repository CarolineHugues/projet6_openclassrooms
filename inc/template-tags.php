<?php
/**
 * Custom template tags for this theme
 *
 */

/* ------------------------------------------------------------------------
						Create pages with sections
---------------------------------------------------------------------------*/

/* Register useful links section for Caen Page */
function get_useful_links_section()
{
	$id = 119;
	if ( (FALSE != get_post_status( $id ) ) && ( 'publish' === get_post_status ( $id ) ) )
	{
		get_template_part( 'template-parts/page/caen/content', 'useful-links-section' );
    }
}