<?php
/**
 * Template name: Events template
 */

?>

<?php get_header(); ?>

<div id="primary" role="main" class="content-area">

	<!-- Page header-->
	<header class="page-header">
		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>

		<p>
			<a href="<?php echo eo_get_event_archive_link(get_previousMonth_page_currentmonth()); ?>"> < </a>
				<?php echo get_french_current_month_and_year(); ?>
			<a href="<?php echo eo_get_event_archive_link(get_nextMonth_page_currentmonth()); ?>"> ></a>
		</p>

       <?php $cat_args = array(
			'show_option_none' => __( 'Toutes catégories' ),
			'option_none_value'  => 'all',
			'orderby'      => 'name',
			'taxonomy'     => 'event-category',
			'id'           => 'eo-event-cat',
		); ?>

<li id="categories">
	<h2><?php _e( 'Categories:' ); ?></h2>
	<form id="category-select" class="category-select" action="<?php echo home_url( '/evenements-organises-par-le-bde/' ) ; ?>" method="post">
		<?php wp_dropdown_categories( $cat_args ); ?>
		<select name="month">
			<option value="">Mois</option>
			<option value="01">janvier</option>
			<option value="02">février</option>
			<option value="03">mars</option>
			<option value="04">avril</option>
			<option value="05">mail</option>
			<option value="06">juin</option>
			<option value="07">juillet</option>
			<option value="08">aout</option>
			<option value="09">septembre</option>
			<option value="10">octobre</option>
			<option value="11">novembre</option>
			<option value="12">decembre</option>
		</select>
		<input type="submit" name="submit" value="Rechercher" />
	</form>
</li>

<?php $category = $_POST['cat'];?> 


	</header>

	<?php
	$events = get_current_month_events($category);
    if($events):
        foreach ($events as $event):
           	set_query_var( 'event', $event );
     		eo_get_template_part( 'template-parts/page/events/eo', 'loop-single-event-querry', 'event' );
        endforeach;

    else : ?>
		<!-- If there are no events -->
		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h2 class="entry-title">Aucun évènement organisé ce mois-ci</h2>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>Consultez les mois suivants !</p>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php endif;?>

</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();