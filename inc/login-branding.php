<?php
/**
 * Atomic Studio login branding.
 *
 * @package Atomic_WP_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Use the configured site logo, with Atomic Studio as the starter fallback.
 */
function atomic_wp_starter_login_branding(): void {
	$stylesheet_path = get_template_directory() . '/assets/css/login.css';
	$logo_id         = get_theme_mod( 'custom_logo' );
	$logo_url        = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';

	if ( ! $logo_url ) {
		$logo_url = get_theme_file_uri( 'assets/brand/atomic-studio-mark-black.svg' );
	}

	wp_enqueue_style(
		'atomic-wp-starter-login',
		get_theme_file_uri( 'assets/css/login.css' ),
		array(),
		file_exists( $stylesheet_path ) ? (string) filemtime( $stylesheet_path ) : ATOMIC_WP_STARTER_VERSION
	);

	wp_add_inline_style(
		'atomic-wp-starter-login',
		'.login h1 a { background-image: url("' . esc_url_raw( $logo_url ) . '"); }'
	);
}
add_action( 'login_enqueue_scripts', 'atomic_wp_starter_login_branding' );

/**
 * Send the login logo to the site homepage.
 */
function atomic_wp_starter_login_logo_url(): string {
	return home_url( '/' );
}
add_filter( 'login_headerurl', 'atomic_wp_starter_login_logo_url' );

/**
 * Provide an accurate, useful label for the login logo.
 */
function atomic_wp_starter_login_logo_label(): string {
	/* translators: %s: Site name. */
	return sprintf( __( 'Return to %s', 'atomic-wp-starter' ), get_bloginfo( 'name' ) );
}
add_filter( 'login_headertext', 'atomic_wp_starter_login_logo_label' );
