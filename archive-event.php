<?php
/**
 * The customized template for displaying lists of events
 *
 * Queries to do with events will default to this template if a more appropriate template cannot be found
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>



<div id="primary" role="main" class="content-area">

	<!-- Page header-->
	<header class="page-header">
		<h1 class="page-title">
			<?php if ( (FALSE != get_post_status( 281 ) ) && ( 'publish' === get_post_status ( 281 ) ) ) {
				echo get_title_section(281); 
			}
			else {
				echo __( 'Evènements','eventorganiser' );
			}
			?></h1>
		<p>
			<?php
			if ( eo_is_event_archive( 'day' ) ) {
				//Viewing date archive
				echo eo_get_event_archive_date( 'j F Y' );
			} elseif ( eo_is_event_archive( 'month' ) ) {
				//Viewing month archive ?>
				<a href="<?php echo eo_get_event_archive_link(get_previousYear_monthly_archive()); ?>/<?php echo get_previousMonth(); ?>"> < </a>
				<?php echo eo_get_event_archive_date( 'F Y' ); ?>
				<a href="<?php echo eo_get_event_archive_link(get_nextYear_monthly_archive()); ?>/<?php echo get_nextMonth(); ?>"> ></a>
			<?php
			} elseif ( eo_is_event_archive( 'year' ) ) {
				//Viewing year archive ?>
				<a href="<?php echo eo_get_event_archive_link(get_previousYear_annual_archive()); ?>/"> < </a>
				<?php echo ' ' . eo_get_event_archive_date( 'Y' ) . ' '; ?>
				<a href="<?php echo eo_get_event_archive_link(get_nextYear_annual_archive()); ?>/"> ></a>
			<?php
			} 
			?>
		</p>

	</header>

	<?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>

</div><!-- #primary -->

<!-- Call template sidebar and footer -->
<?php get_sidebar(); ?>
<?php get_footer();