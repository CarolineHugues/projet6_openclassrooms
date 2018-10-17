<?php
/**
 * Custom template tags for this theme
 *
 */

/**
 * Display a front page section.
 *
 * @param WP_Customize_Partial $partial Partial associated with a selective refresh request.
 * @param integer              $id Front page section to display.
 */
function twentyseventeen_child_front_page_section( $partial = null, $id = 0 ) {
	if ( is_a( $partial, 'WP_Customize_Partial' ) ) {
		// Find out the id and set it up during a selective refresh.
		global $twentyseventeencounter;
		$id = str_replace( 'panel_', '', $partial->id );
		$twentyseventeencounter = $id;
	}

	global $post; // Modify the global post object before setting up post data.
	if ( get_theme_mod( 'panel_' . $id ) ) {
		$post = get_post( get_theme_mod( 'panel_' . $id ) );
		setup_postdata( $post );
		set_query_var( 'panel', $id );

		$post_panel_id = get_the_ID();
		if ($post_panel_id == 109)
		{
			get_template_part( 'template-parts/page/content', 'upload-documents-section' );
		}
		else
		{
			get_template_part( 'template-parts/page/content', 'front-page-panels' );
		}

		wp_reset_postdata();
	} elseif ( is_customize_preview() ) {
		// The output placeholder anchor.
		echo '<article class="panel-placeholder panel twentyseventeen-panel twentyseventeen-panel' . $id . '" id="panel' . $id . '"><span class="twentyseventeen-panel-title">' . sprintf( __( 'Front Page Section %1$s Placeholder', 'twentyseventeen' ), $id ) . '</span></article>';
	}
}

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

/* Register around Caen section for Caen Page */
function get_around_caen_section()
{
	$id = 131;
	if ( (FALSE != get_post_status( $id ) ) && ( 'publish' === get_post_status ( $id ) ) )
	{
		get_template_part( 'template-parts/page/caen/content', 'around-caen-section' );
    }
}

/* --------- Get section page title ------- */

function get_title_section($id){
	$included_page = get_post( $id );
	$title = apply_filters('the_title', $included_page->post_title);
	return $title;
}


/* --------- Get section page content ------ */

function get_content_section($id){
	$included_page = get_post( $id );
	$content = apply_filters('the_content', $included_page->post_content); 
	return $content;
}