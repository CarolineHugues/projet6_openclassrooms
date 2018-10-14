<?php
/**
 * Template part for displaying section upload files on front page
 *
 */

global $twentyseventeencounter;

?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">

				<?php twentyseventeen_edit_link( get_the_ID() ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<fieldset>
					<legend><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></legend>
					<?php the_content(); ?>
				</fieldset>				
				<p id="button-section-upload-files">
					<a href="/documents-mis-a-disposition">
						<button>Tous les documents</button>
					</a>
				</p>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->
	
</article><!-- #post-## -->