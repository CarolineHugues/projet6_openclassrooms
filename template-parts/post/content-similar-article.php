<?php
/**
 * Template part for displaying similar article content
 *
 */

?>

<div class="similar-article">

	<header class="entry-header">
		<a href="<?php echo eo_get_permalink($similararticles->ID); ?>">
			<h3 class="entry-title">
				<?php echo title(10, $similararticles->ID); ?>
			</h3>
		</a>
	</header><!-- .entry-header -->

	<div class="similar-article-content">
		<?php if ( has_post_thumbnail($similararticles->ID) ) { ?>
			<a href="<?php echo eo_get_permalink($similararticles->ID); ?>" itemprop="url">
				<?php echo get_the_post_thumbnail( $similararticles->ID); ?>
			</a>
		<?php
		} ?>

		<?php if(has_excerpt($similararticles->ID))
		{ ?>
			<div <?php if ( has_post_thumbnail($similararticles->ID) ) {echo 'class="overlay"';}?>>
				<div <?php if ( has_post_thumbnail($similararticles->ID) ) {echo 'class="similar-article-text"'; }?>>
					<p class="similar-article-excerpt <?php if ( has_post_thumbnail($similararticles->ID) ) {echo 'white-text'; }?>">
							<?php echo excerpt(25, $similararticles->ID);?>
					</p>
				</div>
			</div>
		<?php } ?>
	</div>
</div>