<?php
/**
 * Template part for displaying useful links section on Caen page
 *
 */

$id = 119;
$included_page = get_post( $id );
$title = apply_filters('the_title', $included_page->post_title);
$content = apply_filters('the_content', $included_page->post_content); 

?>

<article id="useful-links-section">
	
    <div class="wrap">
    	<fieldset>
    		<legend>
				<header class="entry-header">
    				<h2 class="entry-title"><?php echo $title; ?></h2>
    				<?php twentyseventeen_edit_link( get_the_ID() ); ?>
    			</header><!-- .entry-header -->
    		</legend>

    		<div class="entry-content">
        		<?php echo $content; ?>
    		</div><!-- .entry-content -->
    	</fieldset>	
	</div><!-- .wrap -->
	
</article><!-- #post-## -->