<?php
/**
 * Atomic WP Starter functions.
 *
 * @package Atomic_WP_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ATOMIC_WP_STARTER_VERSION', '1.0.0' );

require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/site-features.php';
require_once get_template_directory() . '/inc/login-branding.php';

/**
 * Configure theme supports and navigation locations.
 */
function atomic_wp_starter_setup(): void {
	load_theme_textdomain( 'atomic-wp-starter', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/site.css' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-list',
			'comment-form',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 360,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation', 'atomic-wp-starter' ),
			'footer'  => __( 'Footer navigation', 'atomic-wp-starter' ),
		)
	);
}
add_action( 'after_setup_theme', 'atomic_wp_starter_setup' );

/**
 * Set a readable default content width.
 */
function atomic_wp_starter_content_width(): void {
	$GLOBALS['content_width'] = apply_filters( 'atomic_wp_starter_content_width', 1200 );
}
add_action( 'after_setup_theme', 'atomic_wp_starter_content_width', 0 );

/**
 * Enqueue the small front-end bundle.
 */
function atomic_wp_starter_assets(): void {
	$stylesheet_path = get_template_directory() . '/assets/css/site.css';
	$script_path     = get_template_directory() . '/assets/js/site.js';

	wp_enqueue_style(
		'atomic-wp-starter-site',
		get_theme_file_uri( 'assets/css/site.css' ),
		array(),
		file_exists( $stylesheet_path ) ? (string) filemtime( $stylesheet_path ) : ATOMIC_WP_STARTER_VERSION
	);

	wp_enqueue_script(
		'atomic-wp-starter-site',
		get_theme_file_uri( 'assets/js/site.js' ),
		array(),
		file_exists( $script_path ) ? (string) filemtime( $script_path ) : ATOMIC_WP_STARTER_VERSION,
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);

	if ( atomic_wp_starter_comments_enabled() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'atomic_wp_starter_assets' );

/**
 * Use a useful page-list fallback before a menu is assigned.
 *
 * @param array<string, mixed> $args Menu arguments.
 */
function atomic_wp_starter_page_menu( array $args ): void {
	unset( $args );

	echo '<ul class="menu">';
	wp_list_pages(
		array(
			'title_li' => '',
			'depth'    => 1,
		)
	);
	echo '</ul>';
}
