<?php
/**
 * A single event in a events loop customized of the similar events. Used by single-event.php
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */
?>
<div class="similar-event">

	<header class="eo-event-header entry-header">

		<div class="eo-event-date">
			<?php echo eo_get_the_start( 'l j F Y', $event->ID, $event->occurrence_id ) . ' - ' . eo_get_the_start( 'H', $event->ID, $event->occurrence_id ) . ' h ' . eo_get_the_start( 'i', $event->ID, $event->occurrence_id  ); ?>
		</div>

	</header><!-- .entry-header -->

	<div class="similar-event-content">
		<?php if ( has_post_thumbnail($event->ID) ) { ?>
			<a href="<?php echo eo_get_permalink($event->ID); ?>" itemprop="url">
				<?php echo get_the_post_thumbnail( $event->ID); ?>
			</a>
		<?php
		} ?>

		<div <?php if ( has_post_thumbnail($event->ID) ) {echo 'class="overlay"';}?>>
			<div <?php if ( has_post_thumbnail($event->ID) ) {echo 'class="similar-event-text"'; }?>>
				<a href="<?php echo eo_get_permalink($event->ID); ?>" itemprop="url">
					<h3 class="eo-event-title entry-title">
						<span itemprop="summary"><?php echo title(10, $event->ID); ?></span>
					</h3>
				</a>

				<p class="eo-event-content <?php if ( has_post_thumbnail($event->ID) ) {echo 'white-text'; }?>" itemprop="description">
					<?php if(has_excerpt($event->ID))
					{
						echo excerpt(25, $event->ID);
					} ?>
				</p>
			</div>
		</div>
	</div>
</div>