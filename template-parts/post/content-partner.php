<?php
/**
 * Template part for displaying posts partners
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('partners'); ?>>
	<header class="entry-header">
		<div class="single-category">
			<?php $category = get_the_category(); ?>
			<p class="single-category"> 
				<a href="<?php echo home_url('/bons-plans-partenariats/?cat=' . $category[0]->name . '');?>"><?php echo $category[0]->name; ?></a>
			</p>
		</div>

		<?php if ( has_post_thumbnail()) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>

		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<section class="similar-articles">
		
		<?php   

		$similararticles = new WP_Query(get_similar_partners(get_the_category()));

		if ( $similararticles->have_posts() ) { ?>
			<h2>Partenariats similaires</h2>
			<?php
			while ( $similararticles->have_posts() ) : $similararticles->the_post(); 

				get_template_part( 'template-parts/post/content-similar-article' );

			endwhile; 
		} ?>
	</section>

</article><!-- #post-## -->