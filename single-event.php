<?php
/**
 * The template for displaying a single event customized
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>

<div id="primary">
	<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				
				<?php if ( get_the_terms( get_the_ID(), 'event-category' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-category' ) ) ) { ?>
						<p> <?php echo $categories = get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></p>
					<?php } ?>

				<?php
					//If it has one, display the thumbnail
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'thumbnail', array( 'class' => 'attachment-thumbnail eo-event-thumbnail' ) );
					} ?>
			
			</header><!-- .entry-header -->
	
			<div class="entry-content">
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<!-- Get event information, see template: event-meta-event-single.php -->
				<?php eo_get_template_part( 'template-parts/page/events/event-meta', 'event-single' ); ?>

				<!-- The content or the description of the event-->
				<?php the_content(); ?>
			</div><!-- .entry-content -->

			</article><!-- #post-<?php the_ID(); ?> -->

			<section id="similar-events">

				<?php $similarevents = get_similar_events($categories);

				if($similarevents): ?>
					<h2>Evènements similaires</h2>
		     		<?php foreach ($similarevents as $event):
		     			set_query_var( 'event', $event );
						get_template_part( 'template-parts/page/events/eo', 'loop-similar-event', 'event' );
		        	endforeach;
		        endif;?>
			</section>

			<!-- If comments are enabled, show them -->
			<div class="comments-template">
				<?php comments_template(); ?>
			</div>				

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</div><!-- #primary -->

<!-- Call template footer -->
<?php get_footer();