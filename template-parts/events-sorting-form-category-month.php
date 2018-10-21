<?php
/**
 * Template part of events sorting form by category and/or month
 */

?>

<div id="categories">
	<form id="category-select" class="category-select" action="<?php echo home_url( '/evenements-organises-par-le-bde/' ) ; ?>" method="post">
		<?php wp_dropdown_categories( get_args_sorting_categories() ); ?>
		<select name="month">
			<option value="<?php echo $_POST['month']; ?>">Mois</option>
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
		<input type="submit" name="submit" value="Rechercher" />
	</form>
</div>