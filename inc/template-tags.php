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

/* Monthly navigation on monthly events archive - links for next and previous month */

function get_nextYear_month_monthly_archive(){
	$year = eo_get_event_archive_date( 'Y' );
	$month = eo_get_event_archive_date( 'm' );
	return $nextmonth = date("Y/m",strtotime("$year/$month/01 + 1 month"));
}
		
function get_previousYear_month_monthly_archive(){
	$year = eo_get_event_archive_date( 'Y' );
	$month = eo_get_event_archive_date( 'm' );
	return $previousmonth = date("Y/m",strtotime("$year/$month/01 - 1 month"));
}

/* Annual navigation on annual events archive - links for next and previous year */

function get_nextYear_annual_archive(){
	$year = eo_get_event_archive_date( 'Y' );
	return $nextyear = $year + 1;
}
		
function get_previousYear_annual_archive(){
	$year = eo_get_event_archive_date( 'Y' );
	return $previousyear = $year - 1;
}

/* Monthly navigation on current month/sorting events page - links for next and previous month*/

function get_nextMonth_page_current_or_sorting_month(){
	if(!empty($_GET['month'])) {
		$month =  get_month_number($_GET['month']);
		if (empty($_GET['year']))
		{
			$year = get_year_page_events($_GET['month']);
		}
		else 
		{
			$year = $_GET['year'];
		}
		return $nextmonth = date("Y/m",strtotime("$year/$month/01 + 1 month"));
	}
	else{
		return $nextmonth = date("Y/m",strtotime("now + 1 month"));
	}
}

function get_previousMonth_page_current_or_sorting_month(){
	if(!empty($_GET['month'])) {
		$month = get_month_number($_GET['month']);
		if (empty($_GET['year']))
		{
			$year = get_year_page_events($_GET['month']);
		}
		else {
			$year = $_GET['year'];
		}
		return $previousmonth = date("Y/m",strtotime("$year/$month/01 - 1 month"));
	}
	else{
		return $previousmonth = date("Y/m",strtotime("now - 1 month"));
	}
}

/* Display month in french and year on current month/sorting events page */

function get_french_current_or_sorting_month(){

	if(!empty($_GET['month'])){
		if ($_GET['month'] == 'fevrier'){
			return $month = 'février';
		}
		else
		{
		return $month = $_GET['month'];
		}
	}
	else{
		setlocale(LC_TIME, "fr_FR");
		return $date = strftime("%B"); 
	}
}

function get_current_or_sorting_year(){
	if(!empty($_GET['month'])) {
		if (empty($_GET['year']))
		{
			return $year = get_year_page_events($_GET['month']);
		}
		else {
			return $year = $_GET['year'];
		}
	}
	else
	{
		return $year = date('Y'); 
	}
}

/* Display french next month for monthly navigation */

function get_french_nextMonth(){
	if (eo_is_event_archive( 'month' ) )
	{
		$year = eo_get_event_archive_date( 'Y' );
		$month = eo_get_event_archive_date( 'm' );
		$nextmonth = date("m",strtotime("$year/$month/01 + 1 month"));
		return get_french_month($nextmonth);
	}
	elseif(!empty($_GET['month'])) {
		$month =  get_month_number($_GET['month']);
		if (empty($_GET['year']))
		{
			$year = get_year_page_events($_GET['month']);
		}
		else 
		{
			$year = $_GET['year'];
		}
		$nextmonth = date("m",strtotime("$year/$month/01 + 1 month"));
		return get_french_month($nextmonth);
	}
	else{
		$nextmonth = date("m",strtotime("now + 1 month"));
		return get_french_month($nextmonth);
	}
}

/* Calculate the years of the months' current school year in the dropdown list */

function get_year_page_events($month){
	$monthnumber = get_month_number($month);
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
	return $year;
}

/* Get month number from month in french */

function get_month_number($month){
	$array = array(1 => 'janvier', 2 =>  'fevrier', 3 => 'mars', 4 => 'avril', 5 => 'mai', 6 => 'juin', 7 => 'juillet', 8 => 'aout', 9 => 'septembre', 10 => 'octobre', 11 => 'novembre', 12 => 'decembre');
	return $monthnumber = array_search($month, $array);
}

/* Get french month from monthnumber */

function get_french_month($monthnumber){
	$array = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre');
	return $monthnumber = $array[$monthnumber-1];
}

/* Get english month */

function get_english_month($month){
	$monthnumber =  get_month_number($month);
	$array = array('jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec');
	$number = $monthnumber -1;
	return $month = $array[$number];
}

/* Get events of current month or events of sorting by category and month */

function get_current_month_or_sorting_events(){
	$category = $_GET['cat']; 
	if (empty($category) || $_GET['cat'] == 'tous'){
		$category = 'all';
	}

	if(!empty($_GET['month'])) {
		$month = get_english_month($_GET['month']);
		if (empty($_GET['year']))
		{
			$year = get_year_page_events($_GET['month']);
		}
		else {
			$year = $_GET['year'];
		}
	}
	else { 
		$month = date('M'); 
		$year = date('Y');
	}

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	if ($category == 'all')
	{
		$valuefield = 'id';
	}
	else{
		$valuefield = 'slug';
	}

	return $events = array(
	    'posts_per_page' => 4,
	    'paged'         => $paged,
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
	            'field'=> $valuefield,
	            'terms'=>array($category)
	        )
        ),
    );
}

/* Arguments for the categories dropdown list */

function get_args_sorting_categories(){
	return $cat_args = array(
		'show_option_none' => __( 'Toutes catégories' ),
		'option_none_value'  => 'tous',
		'orderby'      => 'name',
		'taxonomy'     => 'event-category',
		'id'           => 'eo-event-cat',
		'value_field'  => 'slug',
	); 
}

/* Get the upcomming event */

function get_upcomming_event(){
	return $event = array(
        'posts_per_page' => 1,
        'post_type' =>  'event',
        'orderby'=> 'eventstart',
		'order'=> 'ASC',
        'event_start_after'=> 'now',
    );
}

/* Get the similar events based on the same category */

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

/* ------------------------------------------------------------------------
							Numbered pagination
---------------------------------------------------------------------------*/

/* Display a numbered pagination */

function numbered_pagination() {
	global $wp_query, $wp_rewrite;

	$max = $wp_query->max_num_pages;
	if (!$num_courant = get_query_var('paged'))
	{ 
		$num_courant = 1;
	}
	$total = 1;

	$args = array(
		'total' => $max,
		'current' => $num_courant,
		'mid_size' => 5,
		'end_size' => 1,
		'prev_text' => '< ',
		'next_text' => ' >'
	);

	if ($max > 1) {
		echo '<div class="numbered-pagination">';
	}
	echo paginate_links($args);
	if ($max > 1) {
		echo '</div>';
	}
}

/* ------------------------------------------------------------------------
				Limit number of words displayed
---------------------------------------------------------------------------*/

/* ------------------ for excerpt --------------------------*/
function excerpt($limit, $id) {
  $excerpt = explode(' ', get_the_excerpt($id), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' ...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/* ------------------ for title --------------------------*/
function title($limit, $id) {
  $title = explode(' ', get_the_title($id), $limit);
  if (count($title)>=$limit) {
    array_pop($title);
    $title = implode(" ",$title).' ...';
  } else {
    $title = implode(" ",$title);
  }	
  $title = preg_replace('`[[^]]*]`','',$title);
  return $title;
}