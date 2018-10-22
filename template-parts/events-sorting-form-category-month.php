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
				{echo eo_get_event_archive_date( 'F' ); } 
				else{ echo $_GET['month']; } ?>"> 
				Mois
			</option>
			<option value="septembre">septembre</option>
			<option value="octobre">octobre</option>
			<option value="novembre">novembre</option>
			<option value="decembre">decembre</option>
			<option value="janvier">janvier</option>
			<option value="fevrier">février</option>
			<option value="mars">mars</option>
			<option value="avril">avril</option>
			<option value="mai">mai</option>
			<option value="juin">juin</option>
			<option value="juillet">juillet</option>
			<option value="aout">aout</option>
		</select>
		<input type="submit" value="Rechercher"/>
	</form>
</div>