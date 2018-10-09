<?php
/**
** activation theme
**/
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
	wp_enqueue_style('parent-style', get_template_directory_uri() .
'/style.css');
	wp_enqueue_style('child-style', get_stylesheet_uri(), array('parent-style'));
}

/* Register new menus */
register_nav_menu( 'top-mobile-menu', 'Menu supérieur mobile' );