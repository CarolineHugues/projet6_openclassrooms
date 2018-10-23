<?php
/**
 * The template for displaying an event-category page customized
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" role="main" class="content-area">

	<header class="page-header">
		<h1 class="page-title">
			<?php if ( (FALSE != get_post_status( 281 ) ) && ( 'publish' === get_post_status ( 281 ) ) ) {
				echo get_title_section(281); 
			}
			else {
				echo __( 'Evènements','eventorganiser' );
			}
			?>
		</h1>
		<p>
			<?php printf( '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
		</p>

		<?php
		$category_description = category_description();
		if ( ! empty( $category_description ) ) {
			echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
		}
		?>
	</header>

	<?php eo_get_template_part( 'template-parts/page/events/eo', 'loop-events' ); //Lists the events ?>
	
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();