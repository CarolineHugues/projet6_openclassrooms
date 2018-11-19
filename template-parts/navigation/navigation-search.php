<?php 
/* 
* Template part for displaying search button and search form 
*/

?>

<button id="openSearch" class="openBtn" onclick="openSearch()">
	<img src="/wp-content/uploads/2018/10/icons8-chercher-filled-30.png" />
</button>

<div id="myOverlay" class="overlay">
    <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
    <div class="overlay-content">
    	<h1>Vous recherchez un évènement, un bon plan ... ?</h1>
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
		   	<input type="text" placeholder="Rechercher..." value="<?php echo get_search_query(); ?>" name="s">
		    <button type="submit"><img src="/wp-content/uploads/2018/10/icons8-chercher-filled-30.png" /></button>
		</form>
	</div>
</div>