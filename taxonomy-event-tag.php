<?php
/**
 * The template for displaying an event-tag page customized
 *
 * @package Event Organiser (plug-in)
 * @since 1.2.0
 */

//Call the template header
get_header(); ?>

<div id="primary" role="main" class="content-area">

	<!-- Page header, display tag title-->
	<header class="page-header">
		<h1 class="page-title">
			<?php if ( (FALSE != get_post_status( 281 ) ) && ( 'publish' === get_post_status ( 281 ) ) ) {
				echo get_title_section(281) . ' : ' . single_cat_title( '', false );
			}
			else
			{
				printf( __( 'Event Tag: %s', 'eventorganiser' ), '<span>' . single_cat_title( '', false ) . '</span>' ); 
			}?>
		</h1>

		<!-- If the tag has a description display it-->
		<?php
		$tag_description = category_description();
		if ( ! empty( $tag_description ) ) {
			echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $tag_description . '</div>' );
		}
		?>
	</header>

	<?php eo_get_template_part( 'template-parts/page/events/eo', 'loop-events'); //Lists the events ?>

</div><!-- #primary -->

<!-- Call template sidebar and footer -->
<?php get_sidebar(); ?>
<?php get_footer();
