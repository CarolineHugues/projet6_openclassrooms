<?php
/**
 * The events loop customized. Used by archive-events.php, taxonomy-event-venue.php,
 * taxonomy-event-category.php and taxonomy-event-tag.php
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */
?>


<?php if ( have_posts() ) { ?>

	<?php eo_get_template_part( 'eo-events-nav' ); //Events navigation ?>

	<?php
	while ( have_posts() ) : the_post();
		eo_get_template_part( 'template-parts/page/events/eo', 'loop-single-event' );
	endwhile;
	?>

	<?php eo_get_template_part( 'eo-events-nav' ); //Events navigation ?>

<?php } else { ?>

	<!-- If there are no events -->
	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h2 class="entry-title">Aucun évènement organisé</h2>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			if ( eo_is_event_archive( 'day' ) ) { ?>
				<p>Consultez un autre jour !</p>
			<?php } elseif ( eo_is_event_archive( 'month' ) ) { ?>
				<p>Consultez un autre mois !</p>
			<?php
			} elseif ( eo_is_event_archive( 'year' ) ) { ?>
				<p>Consultez une autre année !</p>
			<?php
			} 
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php };