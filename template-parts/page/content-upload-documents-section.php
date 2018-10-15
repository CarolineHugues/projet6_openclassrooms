<?php
/**
 * Template part for displaying upload documents section on front page
 *
 */

global $twentyseventeencounter;

?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<div class="panel-content">
		<div class="wrap">
			<fieldset>
				<legend>
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
						<?php twentyseventeen_edit_link( get_the_ID() ); ?>
					</header><!-- .entry-header -->
				</legend>

				<div class="entry-content">
					<?php the_content(); ?>	
				</div><!-- .entry-content -->
			</fieldset>		

			<div>
				<p id="button-section-upload-files">
					<a href="/documents-mis-a-disposition">
						<button>Tous les documents</button>
					</a>
				</p>
			</div>

		</div><!-- .wrap -->
	</div><!-- .panel-content -->
	
</article><!-- #post-## -->