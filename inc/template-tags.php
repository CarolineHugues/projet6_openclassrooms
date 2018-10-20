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

/* ------------------------------------------------------------------------
				Events - function for the plugin Event organiser
---------------------------------------------------------------------------*/

function get_nextYear_monthly_archive(){
	$year = eo_get_event_archive_date( 'Y' );
	$month = eo_get_event_archive_date( 'm' );
	if($month == 12)
	{
		return $nextyear = $year + 1;
	}
	else
	{
		return $year;
	}
}
		
function get_previousYear_monthly_archive(){
	$year = eo_get_event_archive_date( 'Y' );
	$month = eo_get_event_archive_date( 'm' );
	if($month == 01)
	{
		return $previousyear = $year - 1;
	}
	else
	{
		return $year;
	}
}
		
function get_nextYear_annual_archive(){
	$year = eo_get_event_archive_date( 'Y' );
	return $nextyear = $year + 1;
}
		
function get_previousYear_annual_archive(){
	$year = eo_get_event_archive_date( 'Y' );
	return $previousyear = $year - 1;
}
		
function get_nextMonth(){
	$month = eo_get_event_archive_date( 'm' );
	if ($month == 12){
		$nextmonth = "01";
	}
	else if ($month < 9)
	{
		$nextmonth = "0" . ($month + 1);
	}
	else{
			$nextmonth = $month + 1;
	}
		return $nextmonth;
}
			
function get_previousMonth(){
	$month = eo_get_event_archive_date( 'm' );
	if ($month == 01){
		$previousmonth = "12";
	}
	else if ($month < 11)
	{
		$previousmonth = "0" . ($month - 1);
	}
	else{
		$previousmonth = $month - 1;
	}
	return $previousmonth;
}

function get_nextMonth_page_currentmonth(){
	return $nextmonth = date("Y/m",strtotime("now + 1 month"));
}

function get_previousMonth_page_currentmonth(){
	return $previousmonth = date("Y/m",strtotime("now - 1 month"));
}

function get_french_current_month_and_year(){
	setlocale(LC_TIME, "fr_FR");
	return $date = strftime("%B %Y"); 
}

function get_english_month($monthnumber){
	$array = array('jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec');
	$number = $monthnumber -1;
	return $month = $array[$number];
}

function get_current_month_events(){
	$category = $_POST['cat']; 
	if (empty($category)){
		$category = 'all';
	}

	$monthnumber = $_POST['month']; 
	if (empty($monthnumber)){ 
		$month = date('M'); 
		$year = date('Y');
	}
	else
	{
		$month = get_english_month($monthnumber);

		if(date('m') > 8)
		{
			if($monthnumber > 8)
			{
				$year = date('Y');
			}
			else {
				$year = date('Y') +1;
			}
		}
		elseif (date('m') < 9){
			if($monthnumber < 9)
			{
				$year = date('Y');
			}
			else {
				$year = date('Y') -1;
			}
		}
	}

	return $events = eo_get_events(array(
        'numberposts'=>-1,
        'post_type' =>  'event',
        'orderby'=> 'eventstart',
		'order'=> 'ASC',
        'event_start_after'=> 'first day of ' . $month . ' ' . $year,
        'event_end_before'=> 'last day of ' . $month . ' ' . $year,
        'showpastevents'=>true,
        'tax_query'=>array( 
			array(
	            'taxonomy'=>'event-category',
	            'operator' => 'IN',
	            'field'=>'id',
	            'terms'=>array($category)
	        )
        ),
    ));
}

function get_args_sorting_categories(){
	return $cat_args = array(
		'show_option_none' => __( 'Toutes catégories' ),
		'option_none_value'  => 'all',
		'orderby'      => 'name',
		'taxonomy'     => 'event-category',
		'id'           => 'eo-event-cat',		
	); 
}

function get_upcomming_event(){
	return $event = eo_get_events(array(
        'numberposts'=>1,
        'post_type' =>  'event',
        'orderby'=> 'eventstart',
		'order'=> 'ASC',
        'event_start_after'=> 'now',
    ));
}

function get_similar_events($categories){
	return $similarevents = eo_get_events( array(
		'numberposts' => 3,
		'post_type' =>  'event',
		'event_start_after'=> 'now',
		'tax_query'=>array( 
			array(
	            'taxonomy'=>'event-category',
	            'operator' => 'IN',
	            'field'=>'slug',
	            'terms'=>array($categories)
	        )
        ),
        'exclude' => array(get_the_ID()), 
	));
}