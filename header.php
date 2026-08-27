<?php
/**
 * Site header.
 *
 * @package Atomic_WP_Starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'atomic-wp-starter' ); ?></a>

<div class="site-shell">
	<header class="site-header">
		<div class="site-header__inner layout-wide">
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
					</a>
				<?php endif; ?>
			</div>

			<nav class="site-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'atomic-wp-starter' ); ?>">
				<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu">
					<span class="menu-toggle__label"><?php esc_html_e( 'Menu', 'atomic-wp-starter' ); ?></span>
					<span class="menu-toggle__icon" aria-hidden="true"><span></span><span></span></span>
				</button>
				<div class="menu-panel" id="primary-menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'menu',
							'fallback_cb'    => 'atomic_wp_starter_page_menu',
							'depth'          => 1,
						)
					);
					?>
				</div>
			</nav>
		</div>
	</header>
