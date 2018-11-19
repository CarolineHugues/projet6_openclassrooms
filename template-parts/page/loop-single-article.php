<?php
/**
 * A single article in an articles loop or partners loop.
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h2 class="white-text background-blue text-center">
			<?php the_title() ?>
		</h2>

	</header><!-- .entry-header -->

	<section class="article-resume-presentation">

		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php echo eo_get_permalink(); ?>" itemprop="url">
				<p class="text-center">
					<?php the_post_thumbnail(); ?>
				</p>
			</a>
		<?php 
		} ?>

		<div class="article-resume-entry-meta">

			<?php if(empty($_GET['cat']) || $_GET['cat'] == 'tous')
			{ 
				if (has_tag('partenariat'))
				{
					$category = get_the_category(); ?>
					<p class="single-category"> 
						<a href="<?php echo home_url('/bons-plans-partenariats/?cat=' . $category[0]->name . '');?>"><?php echo $category[0]->name; ?></a>
					</p>
				<?php
				}
				else
				{ ?>
					<div class="single-category"><?php the_category(); ?></div>
				<?php
				}
			} ?>

		</div><!-- .event-entry-meta -->

		<div class="article-resume-content">
			<?php the_excerpt(); ?>
		</div>
	</section>

	<div class="button-more-informations">
		<a href="<?php the_permalink(); ?> ">
			<button>Informations supplémentaires</button>
		</a>
	</div>

	<div style="clear:both;"></div>

</article>