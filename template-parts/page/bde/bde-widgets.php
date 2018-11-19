<?php
/**
 * Displays bde page widgets if assigned
 *
 */

?>

<?php
if ( is_active_sidebar( 'section-contact-bde' ) ||
	 is_active_sidebar( 'section-social-networks' ) ) :
?>
	<section id="section-page-bde-widgets">
		<?php
		if ( is_active_sidebar( 'section-contact-bde' ) ) { ?>
			<div id="section-contact-bde" class="widget-column">
				<?php dynamic_sidebar( 'section-contact-bde' ); ?>
			</div>
		<?php } 
		if ( is_active_sidebar( 'section-social-networks' ) ) { ?>
			<div id="section-social-networks" class="widget-column">
				<?php dynamic_sidebar( 'section-social-networks' ); ?>
			</div>
		<?php } ?>
		<!-- .widget-area -->
	</section>

<?php endif; ?>