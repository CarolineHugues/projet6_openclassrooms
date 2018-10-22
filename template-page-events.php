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
			<a href="<?php echo eo_get_event_archive_link(get_previousMonth_page_current_or_sorting_month()); ?>"> < </a>
				<?php echo get_french_current_or_sorting_month() . ' ' . get_current_or_sorting_year(); ?>
			<a href="<?php echo eo_get_event_archive_link(get_nextMonth_page_current_or_sorting_month()); ?>"> ></a>
		</p>

		<?php get_template_part( 'template-parts/page/events/events', 'sorting-form-category-month' ); ?>
	</header>

	<?php $the_query = new WP_Query( get_current_month_or_sorting_events() ); 

	global $wp_query;
	// Put default query object in a temp variable
	$tmp_query = $wp_query;
	// Now wipe it out completely
	$wp_query = null;
	// Re-populate the global with our custom query
	$wp_query = $the_query; ?>

	<?php if ( $the_query->have_posts() ) { ?>

	<?php
	while ( $the_query->have_posts() ) : $the_query->the_post();
		eo_get_template_part( 'template-parts/page/events/eo', 'loop-single-event' );
	endwhile;
	


    if (function_exists('numbered_pagination')) numbered_pagination();
	}

    else {?>
		<!-- If there are no events -->
		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h2 class="entry-title">Aucun évènement organisé</h2>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>Consultez un autre mois !</p>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php }?>

</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();