<?php
/**
 * Template part of partners sorting form by category
 */

?>

<div id="categories">
	<form id="category-dropdown" class="category-dropdown" action="<?php echo home_url( '/bons-plans-partenariats/' ) ; ?>" method="get">
		<span class="custom-dropdown">	
			<?php wp_dropdown_categories( get_args_partners_sorting_categories() ); ?>
		</span>
		<input type="submit" value="Rechercher" class="button"/>
	</form>
</div>