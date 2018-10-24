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

	<?php if ( eo_get_venue() ) {?>
		<h2 class="subtitle-event-venue">Adresse :</h2>
		<?php $tax = get_taxonomy( 'event-venue' ); ?>
		<p class="event-venue-name"><a href="<?php eo_venue_link(); ?>"> <?php eo_venue_name(); ?></a></p>
	<?php } ?>

	<?php $address = eo_get_venue_address(eo_get_venue()); ?>
	<p class="event-address">  <?php echo $address['address'] . ' ' . $address['postcode'] . ' ' . $address['city']; ?> </p>

	<!-- Does the event have a venue? -->
	<?php if ( eo_get_venue() && eo_venue_has_latlng( eo_get_venue() ) ) : ?>
		<!-- Display map -->
		<div class="eo-venue-map">
			<?php echo eo_get_venue_map( eo_get_venue(), array( 'width' => '100%' ) ); ?>
		</div>
	<?php endif; ?>
	

	<ul class="event-meta">

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

					<li><strong><?php _e( 'Upcoming Dates', 'eventorganiser' ); ?> : </strong>
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

		<?php if ( get_the_terms( get_the_ID(), 'event-tag' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-tag' ) ) ) { ?>
			<li class="event-tags"><strong><?php esc_html_e( 'Tags', 'eventorganiser' ); ?> : </strong> <?php echo get_the_term_list( get_the_ID(), 'event-tag', '', ', ', '' ); ?></li>
		<?php } ?>

		<?php do_action( 'eventorganiser_additional_event_meta' ) ?>

	</ul>


	<div style="clear:both"></div>

</div><!-- .entry-meta -->
