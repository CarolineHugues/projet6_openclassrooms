<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header large">
		<div class="single-category"><?php the_category(); ?></div>

		<?php if ( has_post_thumbnail()) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->
		<?php endif; 

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
				if ( is_single() ) {
					twentyseventeen_posted_on();
				} else {
					echo twentyseventeen_time_link();
					twentyseventeen_edit_link();
				};
			echo '</div><!-- .entry-meta -->';
		};
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content();
		?>
	</div><!-- .entry-content -->

	<section class="similar-articles">
		
		<?php 

		$similararticles = new WP_Query(get_similar_articles(get_the_category()));

		if ( $similararticles->have_posts() ) { ?>
			<h2>Articles similaires</h2>
			<?php
			while ( $similararticles->have_posts() ) : $similararticles->the_post(); 

				get_template_part( 'template-parts/post/content-similar-article' );

			endwhile; 
		} ?>
	</section>

</article><!-- #post-## -->
