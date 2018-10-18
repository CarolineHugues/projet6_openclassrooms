<?php
/**
 * The template is used for displaying a single event details on the single event page customized.
 *
 *
 * @package Event Organiser (plug-in)
 * @since 1.7
 */
?>

<div class="eventorganiser-event-meta">

	<!-- Is event recurring or a single event -->
	<?php if ( eo_recurs() ) :?>
		<!-- Event recurs - is there a next occurrence? -->
		<?php $next = eo_get_next_occurrence( eo_get_event_datetime_format() );?>

		<?php if ( $next ) : ?>
			<!-- If the event is occurring again in the future, display the date -->
			<?php printf( '<p>' . __( 'This event is running from %1$s until %2$s. It is next occurring on %3$s', 'eventorganiser' ) . '</p>', eo_get_schedule_start( 'j F Y' ), eo_get_schedule_last( 'j F Y' ), $next );?>

		<?php else : ?>
			<!-- Otherwise the event has finished (no more occurrences) -->
			<?php printf( '<p>' . __( 'This event finished on %s', 'eventorganiser' ) . '</p>', eo_get_schedule_last( 'd F Y', '' ) );?>
		<?php endif; ?>
	<?php endif; ?>

	<ul class="eo-event-meta">

		<?php if ( ! eo_recurs() ) { 
			echo eo_get_the_start( 'l j F Y' ) . ' - ' . eo_get_the_start( 'H' ) . ' h ' . eo_get_the_start( 'i' ); 
		} ?>

		<?php if ( get_the_terms( get_the_ID(), 'event-tag' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-tag' ) ) ) { ?>
			<li><strong><?php esc_html_e( 'Tags', 'eventorganiser' ); ?>:</strong> <?php echo get_the_term_list( get_the_ID(), 'event-tag', '', ', ', '' ); ?></li>
		<?php } ?>

		<?php if ( eo_recurs() ) {
				//Event recurs - display dates.
				$upcoming = new WP_Query(array(
					'post_type'         => 'event',
					'event_start_after' => 'today',
					'posts_per_page'    => -1,
					'event_series'      => get_the_ID(),
					'group_events_by'   => 'occurrence',
				));

				if ( $upcoming->have_posts() ) : ?>

					<li><strong><?php _e( 'Upcoming Dates', 'eventorganiser' ); ?>:</strong>
						<ul class="eo-upcoming-dates">
							<?php
							while ( $upcoming->have_posts() ) {
								$upcoming->the_post();
								echo '<li>' . eo_format_event_occurrence() . '</li>';
							};
							?>
						</ul>
					</li>

					<?php
					wp_reset_postdata();
					//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
					wp_enqueue_script( 'eo_front' );
					?>
				<?php endif; ?>
		<?php } ?>

		<?php do_action( 'eventorganiser_additional_event_meta' ) ?>

	</ul>


	<?php if ( eo_get_venue() ) {
		$tax = get_taxonomy( 'event-venue' ); ?>
		<p><a href="<?php eo_venue_link(); ?>"> <?php eo_venue_name(); ?></a></p>
	<?php } ?>

	<?php $address = eo_get_venue_address(eo_get_venue()); ?>
	<p>  <?php echo $address['address'] . ' ' . $address['postcode'] . ' ' . $address['city']; ?> </p>

	<!-- Does the event have a venue? -->
	<?php if ( eo_get_venue() && eo_venue_has_latlng( eo_get_venue() ) ) : ?>
		<!-- Display map -->
		<div class="eo-event-venue-map">
			<?php echo eo_get_venue_map( eo_get_venue(), array( 'width' => '100%' ) ); ?>
		</div>
	<?php endif; ?>


	<div style="clear:both"></div>

</div><!-- .entry-meta -->
