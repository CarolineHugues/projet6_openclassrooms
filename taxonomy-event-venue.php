<?php
/**
 * The template for displaying the venue page customized
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" role="main" class="content-area">

	<header class="page-header">
		
		<?php $venue_id = get_queried_object_id(); ?>
		
		<h1 class="page-title">
			<?php if ( (FALSE != get_post_status( 281 ) ) && ( 'publish' === get_post_status ( 281 ) ) ) {
				echo get_title_section(281) . ' : à ' . eo_get_venue_name( $venue_id ); 
			}
			else {
				printf( __( 'Events at: %s', 'eventorganiser' ), '<span>' . eo_get_venue_name( $venue_id ) . '</span>' );
			}
			?>
		</h1>
		
		<?php $address = eo_get_venue_address(eo_get_venue()); ?>
		<p>  <?php echo $address['address'] . ' ' . $address['postcode'] . ' ' . $address['city']; ?> </p>

		<?php
		if ( $venue_description = eo_get_venue_description( $venue_id ) ) {
			echo '<div class="venue-archive-meta">' . $venue_description . '</div>';
		}
		?>

		<!-- Display the venue map. If you specify a class, ensure that class has height/width dimensions-->
		<?php
		if ( eo_venue_has_latlng( $venue_id ) ) {
			echo eo_get_venue_map( $venue_id, array( 'width' => '100%' ) );
		}
		?>
	
	</header>
		
	<?php eo_get_template_part( 'template-parts/page/events/eo', 'loop-events' ); //Lists the events ?>

</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();
