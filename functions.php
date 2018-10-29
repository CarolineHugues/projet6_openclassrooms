<?php
/**
 * Twenty Seventeen child functions and definitions
 *
 */

/**
 * Register javascript file
 *
 */
function theme_js(){
 
	wp_enqueue_script( 'style', '/wp-content/themes/twentyseventeen-child/js/style.js',
	array() );
 
}
 
add_action( 'wp_footer', 'theme_js' );