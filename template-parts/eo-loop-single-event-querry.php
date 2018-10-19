<?php
/**
 * A single event in a events loop customized of the current month. Used by template-page-events.php
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope>

	<header class="eo-event-header entry-header">

		<div class="eo-event-date">
			<?php echo eo_get_the_start( 'l j F Y', $event->ID, $event->occurrence_id ) . ' - ' . eo_get_the_start( 'H', $event->ID, $event->occurrence_id ) . ' h ' . eo_get_the_start( 'i', $event->ID, $event->occurrence_id  ); ?>
		</div>

	</header><!-- .entry-header -->

	<div class="eo-event-details event-entry-meta">

		<?php
		//If it has one, display the thumbnail
		if ( has_post_thumbnail($event->ID) ) {
			echo get_the_post_thumbnail( $event->ID, 'thumbnail', array( 'class' => 'attachment-thumbnail eo-event-thumbnail' ) ); 
		} ?>

		<h2 class="eo-event-title entry-title">
			<span itemprop="summary"><?php echo get_the_title( $event->ID ); ?></span>
		</h2>

		<?php
		if ( get_the_terms( $event->ID, 'event-category' ) && ! is_wp_error( get_the_terms( $event->ID , 'event-category' ) ) ) { ?>
			<p><?php echo get_the_term_list( $event->ID,'event-category', '', ', ', '' ); ?></p>
		<?php }  ?>
	</div><!-- .event-entry-meta -->

	<!-- Show Event text as 'the_excerpt' or 'the_content' -->
	<div class="eo-event-content" itemprop="description"><?php echo get_the_excerpt($event->ID); ?></div>

	<div>
		<a href="<?php echo eo_get_permalink($event->ID); ?>" itemprop="url">
			<button>Informations supplémentaires</button>
		</a>
	</div>

	<div style="clear:both;"></div>

</article>