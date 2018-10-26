<?php
/**
 * Template name: Partners template
 */

?>

<?php get_header(); ?>

<div id="primary" role="main" class="content-area">

	<!-- Page header-->
	<header class="page-header">
		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>

		<p class="category-subtitle">
			<?php if($_GET['cat'] != 'tous')
			{
				echo $_GET['cat']; 
			}?>			
		</p>

		<div class="partners-sorting-navigation">
			<?php get_template_part( 'template-parts/page/partners/partners', 'sorting-form-category' ); ?>
		</div>
	</header>

	<?php $the_query = new WP_Query( get_partners() ); 

	global $wp_query;
	$tmp_query = $wp_query;
	$wp_query = null;
	$wp_query = $the_query; ?>

	<?php if ( $the_query->have_posts() ) { ?>
		<section class="articles-resume">
			<?php
			while ( $the_query->have_posts() ) : $the_query->the_post(); 
				get_template_part( 'template-parts/page/loop', 'single-article' ); 
			endwhile; ?>
		</section>
		
		<section class="articles-navigation">
			<?php 
		    if (function_exists('numbered_pagination')) numbered_pagination(); ?>

	    </section>
	<?php
	}

    else {?>
		<!-- If there are no events -->
		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h2 class="entry-title">Aucun partenariat</h2>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>Consultez une autre catégorie !</p>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php }?>

</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();