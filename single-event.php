<?php
/**
 * The template for displaying a single event customized
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary">
	<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header large">
					
					<?php if ( get_the_terms( get_the_ID(), 'event-category' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-category' ) ) ) { ?>
							<p class="event-category"> <?php echo $categories = get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></p>
						<?php } ?>

					<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} ?>
				
				</header><!-- .entry-header -->
	
				<div class="entry-content event-presentation">
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<!-- Is event recurring or a single event -->
					<?php if ( eo_recurs() ) :?>
						<!-- Event recurs - is there a next occurrence? -->
						<?php $next = eo_get_next_occurrence( eo_get_event_datetime_format() );?>

						<?php if ( $next ) : ?>
							<!-- If the event is occurring again in the future, display the date -->
							<?php printf( '<p class="event-dates">' . __( 'Cet événement se déroule du %1$s au %2$s. </br>La prochaine date est le %3$s', 'eventorganiser' ) . '</p>', eo_get_schedule_start( 'j F Y' ), eo_get_schedule_last( 'j F Y' ), $next );?>

						<?php else : ?>
							<!-- Otherwise the event has finished (no more occurrences) -->
							<?php printf( '<p class="event-dates">' . __( 'This event finished on %s', 'eventorganiser' ) . '</p>', eo_get_schedule_last( 'd F Y', '' ) );?>
						<?php endif; ?>

					<?php else : ?>
						<p class="event-dates">
							<?php echo eo_get_the_start( 'l j F Y' ) . ' ' . eo_get_the_start( 'H' ) . ' h ' . eo_get_the_start( 'i' ) . ' - ' . eo_get_the_end( 'H' ) . ' h ' . eo_get_the_end( 'i' ); ?>
						</p>
					<?php
					endif; ?>

					<?php the_content(); ?>

					<?php eo_get_template_part( 'template-parts/page/events/event-meta', 'event-single' ); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-<?php the_ID(); ?> -->

			<section id="section-similar-events">

				<?php $similarevents = get_similar_events($categories);

				if($similarevents): ?>
					<h2>Evènements similaires</h2>
					<div id="similar-events">
			     		<?php foreach ($similarevents as $event):
			     			set_query_var( 'event', $event );
							get_template_part( 'template-parts/page/events/eo', 'loop-similar-event', 'event' );  
			        	endforeach; ?>
		        	</div>
		        <?php
		        endif;?>
			</section>

			<div class="comments-template">
				<?php comments_template(); ?>
			</div>				

		<?php endwhile; ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer();