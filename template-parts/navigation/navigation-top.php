<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
	<section id="nav-top">
		<div id="logo-bde">
			<?php the_custom_logo(); ?>
		</div>

		<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
			<?php
			echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
			echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
			?>
		</button>
	
		<?php wp_nav_menu( array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		) ); ?>

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<?php wp_nav_menu( array(
				'theme_location' => 'social',
				'menu_id'     => 'top-social-menu',
				) );
			?>
		<?php endif; ?>
	</section>
	
	<?php wp_nav_menu( array(
		'theme_location' => 'top-mobile-menu',
		'menu_id'        => 'top-mobile-menu',
	) ); ?>

</nav><!-- #site-navigation -->