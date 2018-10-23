<?php
/**
 * A single event in a events loop customized. Used by eo-loop-single-event.php
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope>

	<header class="eo-event-header entry-header">

		<div class="eo-event-date">
			<?php
				echo eo_get_the_start( 'l j F Y' ) . ' - ' . eo_get_the_start( 'H' ) . ' h ' . eo_get_the_start( 'i' ); 
			?>
		</div>

	</header><!-- .entry-header -->

	<div class="eo-event-details event-entry-meta">

		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'thumbnail', array( 'class' => 'attachment-thumbnail eo-event-thumbnail' ) );
		} ?>

		<h2 class="eo-event-title entry-title">
			<span itemprop="summary"><?php the_title() ?></span>
		</h2>

		<?php if ( get_the_terms( get_the_ID(), 'event-category' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-category' ) ) ) { ?>
			<p><?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></p>
		<?php } ?>

	</div><!-- .event-entry-meta -->

	<div class="eo-event-content" itemprop="description">
		<?php the_excerpt(); ?>
	</div>

	<div>
		<a href="<?php echo eo_get_permalink(); ?>" itemprop="url">
			<button>Informations supplémentaires</button>
		</a>
	</div>

	<div style="clear:both;"></div>

</article>