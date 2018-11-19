<?php
/**
 * Twenty Seventeen child functions and definitions
 *
 */

/**
* Activation child theme
*
*/
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
	wp_enqueue_style('parent-style', get_template_directory_uri() .
'/style.css');
	wp_enqueue_style('child-style', get_stylesheet_uri(), array('parent-style'));
}

/**
* Register new menu 
*
*/
register_nav_menu( 'top-mobile-menu', 'Menu supérieur mobile' );

/**
 * Custom template tags for this theme.
 *
 */
require get_theme_file_path( '/inc/template-tags.php' );

/**
 * Register widget areas.
 *
 */
function twentyseventeen_child_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Section accueil - page partenariats', 'twentyseventeen_child' ),
		'id'            => 'section-page-partnership',
		'description'   => __( 'Ajoutez ici des widgets pour la section mise en avant de la page Bons plans & partenariats sur la page d\'accueil.', 'twentyseventeen_child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Section accueil - calendrier', 'twentyseventeen_child' ),
		'id'            => 'section-calendar',
		'description'   => __( 'Ajoutez ici des widgets pour la section calendrier sur la page d\'accueil.', 'twentyseventeen_child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Section accueil - télécharger application', 'twentyseventeen_child' ),
		'id'            => 'section-download-app',
		'description'   => __( 'Ajoutez ici des widgets pour la section mise en avant du téléchargement de l\'application sur la page d\'accueil.', 'twentyseventeen_child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Section page BDE - contact', 'twentyseventeen_child' ),
		'id'            => 'section-contact-bde',
		'description'   => __( 'Ajoutez ici des widgets pour la section "Contacter le BDE" de la page du BDE.', 'twentyseventeen_child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Section page BDE - reseaux sociaux', 'twentyseventeen_child' ),
		'id'            => 'section-social-networks',
		'description'   => __( 'Ajoutez ici des widgets pour la section "Suivre le BDE sur les réseaux sociaux" de la page du BDE.', 'twentyseventeen_child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_child_widgets_init' );

/**
 * Register javascript file
 *
 */
function theme_js(){
 
	wp_enqueue_script( 'style', '/wp-content/themes/twentyseventeen-child/js/style.js',
	array() );
 
}
add_action( 'wp_footer', 'theme_js' );