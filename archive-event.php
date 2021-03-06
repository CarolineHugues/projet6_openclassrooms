<?php
/**
 * The customized template for displaying lists of events
 *
 * Queries to do with events will default to this template if a more appropriate template cannot be found
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

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

		<?php
		if ( eo_is_event_archive( 'day' ) ) { 
			//Viewing date archive ?>
			<p class="day-date-events">
				<?php echo eo_get_event_archive_date( 'j F Y' ); ?>
			</p>
		<?php
		} elseif ( eo_is_event_archive( 'month' ) ) {
			//Viewing month archive ?>
			<div class="events-sorting-navigation">
				<p class="archive-navigation">
					<a href="<?php echo eo_get_event_archive_link(get_previousYear_month_monthly_archive()); ?>"> < </a>
						<?php echo eo_get_event_archive_date( 'F Y' ); ?>
					<a href="<?php echo eo_get_event_archive_link(get_nextYear_month_monthly_archive()); ?>"> ></a>
				</p>
					
				<?php get_template_part( 'template-parts/page/events/events', 'sorting-form-category-month' ); ?>
			</div>
		<?php
		} elseif ( eo_is_event_archive( 'year' ) ) {
			//Viewing year archive ?>
			<p class="archive-navigation">
				<a href="<?php echo eo_get_event_archive_link(get_previousYear_annual_archive()); ?>/"> < </a>
					<?php echo ' ' . eo_get_event_archive_date( 'Y' ) . ' '; ?>
				<a href="<?php echo eo_get_event_archive_link(get_nextYear_annual_archive()); ?>/"> ></a>
			</p>
		<?php
		} 
		?>
	</header>

	<?php eo_get_template_part( 'template-parts/page/events/eo', 'loop-events' ); //Lists the events ?>

</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();
