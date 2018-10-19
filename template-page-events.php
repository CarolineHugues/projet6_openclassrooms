<?php
/**
 * Template name: Events template
 */

?>

<?php get_header(); ?>

<div id="primary" role="main" class="content-area">

	<!-- Page header-->
	<header class="page-header">
		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>

		<p>
			<a href="<?php echo eo_get_event_archive_link(get_previousMonth_page_currentmonth()); ?>"> < </a>
				<?php echo get_french_current_month_and_year(); ?>
			<a href="<?php echo eo_get_event_archive_link(get_nextMonth_page_currentmonth()); ?>"> ></a>
		</p>
	</header>

	<?php
	$events = get_current_month_events();
    if($events):
        foreach ($events as $event):
           	set_query_var( 'event', $event );
     		eo_get_template_part( 'template-parts/page/events/eo', 'loop-single-event-current-month', 'event' );
        endforeach;

    else : ?>
		<!-- If there are no events -->
		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h2 class="entry-title">Aucun évènement organisé ce mois-ci</h2>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>Consultez les mois suivants !</p>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php endif;?>

</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();