<?php
/**
 * A single event in a events loop customized of the similar events. Used by single-event.php
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */
?>
<div>

	<header class="eo-event-header entry-header">

		<div class="eo-event-date">
			<?php echo eo_get_the_start( 'l j F Y', $event->ID, $event->occurrence_id ) . ' - ' . eo_get_the_start( 'H', $event->ID, $event->occurrence_id ) . ' h ' . eo_get_the_start( 'i', $event->ID, $event->occurrence_id  ); ?>
		</div>

	</header><!-- .entry-header -->

	<div>
		<?php if ( has_post_thumbnail($event->ID) ) { ?>
			<a href="<?php echo eo_get_permalink($event->ID); ?>" itemprop="url">
				<?php echo get_the_post_thumbnail( $event->ID, 'thumbnail', array( 'class' => 'attachment-thumbnail eo-event-thumbnail' ) ); ?>
			</a>
		<?php
		} ?>
	</div>

	<div>
		<a href="<?php echo eo_get_permalink($event->ID); ?>" itemprop="url">
			<h3 class="eo-event-title entry-title">
				<span itemprop="summary"><?php echo get_the_title( $event->ID ); ?></span>
			</h3>
		</a>

		<p class="eo-event-content" itemprop="description">
			<?php echo get_the_excerpt($event->ID); ?>
		</p>
	</div>
</div>