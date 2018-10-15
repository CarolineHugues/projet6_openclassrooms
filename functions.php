<?php
/**
 * Twenty Seventeen child functions and definitions
 *
 */

/**
 * Register widget area.
 *
 */
function twentyseventeen_child_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Section page partenariats', 'twentyseventeen_child' ),
		'id'            => 'section-page-partnership',
		'description'   => __( 'Ajoutez ici des widgets pour la section mise en avant de la page Bons plans & partenariats sur la page d\'accueil.', 'twentyseventeen_child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Section télécharger application', 'twentyseventeen_child' ),
		'id'            => 'section-download-app',
		'description'   => __( 'Ajoutez ici des widgets pour la section mise en avant du téléchargement de l\'application sur la page d\'accueil.', 'twentyseventeen_child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_child_widgets_init' );