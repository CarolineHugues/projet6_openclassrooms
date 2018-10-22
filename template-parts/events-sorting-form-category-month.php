<?php
/**
 * Template part of events sorting form by category and/or month
 */

?>

<div id="categories">
	<form id="category-select" class="category-select" action="<?php echo home_url( '/evenements-organises-par-le-bde/' ) ; ?>" method="get">
		<?php wp_dropdown_categories( get_args_sorting_categories() ); ?>
		<input type="hidden" value="<?php if (eo_is_event_archive( 'month' ) ) 
				{echo eo_get_event_archive_date( 'Y' ); } ?>"/>
		<select name="month">
			<option value="<?php if (eo_is_event_archive( 'month' ) ) 
				{echo eo_get_event_archive_date( 'm' ); } 
				else{ echo $_GET['month']; } ?>"> 
				Mois
			</option>
			<option value="9">septembre</option>
			<option value="10">octobre</option>
			<option value="11">novembre</option>
			<option value="12">decembre</option>
			<option value="1">janvier</option>
			<option value="2">février</option>
			<option value="3">mars</option>
			<option value="4">avril</option>
			<option value="5">mai</option>
			<option value="6">juin</option>
			<option value="7">juillet</option>
			<option value="8">aout</option>
		</select>
		<input type="submit" value="Rechercher"/>
	</form>
</div>