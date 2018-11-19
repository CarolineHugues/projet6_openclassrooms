<?php
/**
 * Template part for displaying useful links section on Caen page
 *
 */

?>

<article id="useful-links-section">
	
    <div class="wrap">
    	<fieldset>
    		<legend>
				<header class="entry-header">
    				<h2 class="entry-title"><?php echo get_title_section(119); ?></h2>
    				<?php twentyseventeen_edit_link( get_the_ID() ); ?>
    			</header><!-- .entry-header -->
    		</legend>

    		<div class="entry-content-wide">
        		<?php echo get_content_section(119); ?>
    		</div><!-- .entry-content -->
    	</fieldset>	
	</div><!-- .wrap -->
	
</article><!-- #post-## -->