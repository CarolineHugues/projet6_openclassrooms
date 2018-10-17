<?php
/**
 * Template part for displaying around caen section on Caen page
 *
 */

$id = 131;
$included_page = get_post( $id );
$title = apply_filters('the_title', $included_page->post_title);
$content = apply_filters('the_content', $included_page->post_content); 

?>

<article id="around-caen-section">
	
    <div class="wrap">
    	<header class="entry-header">
    		<h2 class="entry-title"><?php echo $title; ?></h2>
    		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
    	</header><!-- .entry-header -->

    	<div class="entry-content-wide">
        	<?php echo $content; ?>
    	</div><!-- .entry-content -->	
	</div><!-- .wrap -->
	
</article><!-- #post-## -->