<?php
/**
 * Displays home page widgets if assigned
 *
 */

?>

<?php
if ( is_active_sidebar( 'section-page-partnership' ) ||
	 is_active_sidebar( 'section-download-app' ) ) :
?>
	<section id="section-home-widgets">
		<?php
		if ( is_active_sidebar( 'section-page-partnership' ) ) { ?>
			<div id="section-page-partnership" class="widget-column">
				<?php dynamic_sidebar( 'section-page-partnership' ); ?>
			</div>
		<?php }  
		if ( is_active_sidebar( 'section-calendar' ) ) { ?>
			<div id="section-calendar" class="widget-column">
				<?php dynamic_sidebar( 'section-calendar' ); ?>
			</div>
		<?php } 
		if ( is_active_sidebar( 'section-download-app' ) ) { ?>
			<div id="section-download-app" class="widget-column">
				<?php dynamic_sidebar( 'section-download-app' ); ?>
			</div>
		<?php } ?>
		<!-- .widget-area -->
	</section>

<?php endif; ?>