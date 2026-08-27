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

/**
 * Configure theme supports and navigation locations.
 */
function atomic_wp_starter_setup(): void {
	load_theme_textdomain( 'atomic-wp-starter', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/site.css' );
	add_theme_support(
		'html5',
		array(
			'search-form',
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

/**
 * Remove comment support for this brochure-site starter.
 */
function atomic_wp_starter_disable_comments(): void {
	foreach ( get_post_types( array(), 'names' ) as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
}
add_action( 'admin_init', 'atomic_wp_starter_disable_comments' );
add_filter( 'comments_open', '__return_false', 20 );
add_filter( 'pings_open', '__return_false', 20 );
add_filter( 'comments_array', '__return_empty_array', 10 );

/**
 * Remove comment administration surfaces.
 */
function atomic_wp_starter_remove_comment_admin(): void {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'atomic_wp_starter_remove_comment_admin' );

/**
 * Remove the comments shortcut from the admin bar.
 *
 * @param WP_Admin_Bar $wp_admin_bar Admin bar instance.
 */
function atomic_wp_starter_remove_comment_toolbar( WP_Admin_Bar $wp_admin_bar ): void {
	$wp_admin_bar->remove_node( 'comments' );
}
add_action( 'admin_bar_menu', 'atomic_wp_starter_remove_comment_toolbar', 999 );

/**
 * Remove legacy emoji assets from the public site.
 */
function atomic_wp_starter_disable_emojis(): void {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'atomic_wp_starter_disable_emojis' );

/**
 * Match the login mark to the configured site logo.
 */
function atomic_wp_starter_login_logo(): void {
	$logo_id  = get_theme_mod( 'custom_logo' );
	$logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';

	if ( ! $logo_url ) {
		return;
	}
	?>
	<style>
		.login h1 a {
			background-image: url('<?php echo esc_url( $logo_url ); ?>');
			background-size: contain;
			height: 80px;
			width: min(320px, 80vw);
		}
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'atomic_wp_starter_login_logo' );

/**
 * Send the login logo to the site homepage.
 */
function atomic_wp_starter_login_logo_url(): string {
	return home_url( '/' );
}
add_filter( 'login_headerurl', 'atomic_wp_starter_login_logo_url' );

/**
 * Provide an accurate label for the login logo.
 */
function atomic_wp_starter_login_logo_label(): string {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'atomic_wp_starter_login_logo_label' );
