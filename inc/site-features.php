<?php
/**
 * Lean site defaults and optional discussion support.
 *
 * @package Atomic_WP_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Determine whether the site has opted into comments.
 */
function atomic_wp_starter_comments_enabled(): bool {
	return (bool) get_option( 'atomic_wp_starter_enable_comments', false );
}

/**
 * Register the theme discussion setting.
 */
function atomic_wp_starter_register_discussion_setting(): void {
	register_setting(
		'discussion',
		'atomic_wp_starter_enable_comments',
		array(
			'type'              => 'boolean',
			'sanitize_callback' => 'rest_sanitize_boolean',
			'default'           => false,
		)
	);

	add_settings_field(
		'atomic-wp-starter-comments',
		__( 'Atomic WP Starter', 'atomic-wp-starter' ),
		'atomic_wp_starter_discussion_setting_field',
		'discussion',
		'default'
	);
}
add_action( 'admin_init', 'atomic_wp_starter_register_discussion_setting' );

/**
 * Render the theme discussion setting.
 */
function atomic_wp_starter_discussion_setting_field(): void {
	?>
	<label for="atomic-wp-starter-enable-comments">
		<input
			id="atomic-wp-starter-enable-comments"
			name="atomic_wp_starter_enable_comments"
			type="checkbox"
			value="1"
			<?php checked( atomic_wp_starter_comments_enabled() ); ?>
		>
		<?php esc_html_e( 'Enable native WordPress comments', 'atomic-wp-starter' ); ?>
	</label>
	<p class="description">
		<?php esc_html_e( 'Comments are off by default. When enabled, the normal per-post Discussion settings and moderation rules apply. Pingbacks and trackbacks remain off.', 'atomic-wp-starter' ); ?>
	</p>
	<?php
}

/**
 * Remove discussion support when it is not needed and always remove trackbacks.
 */
function atomic_wp_starter_configure_post_type_discussion(): void {
	foreach ( get_post_types( array(), 'names' ) as $post_type ) {
		remove_post_type_support( $post_type, 'trackbacks' );

		if ( ! atomic_wp_starter_comments_enabled() ) {
			remove_post_type_support( $post_type, 'comments' );
		}
	}
}
add_action( 'init', 'atomic_wp_starter_configure_post_type_discussion', 100 );

/**
 * Respect the site comment switch before the post-level setting.
 *
 * @param bool $open Whether comments are open for the current object.
 */
function atomic_wp_starter_comments_open( bool $open ): bool {
	return atomic_wp_starter_comments_enabled() ? $open : false;
}
add_filter( 'comments_open', 'atomic_wp_starter_comments_open', 20 );

/**
 * Hide stored comments while site comments are disabled.
 *
 * @param array<int, WP_Comment> $comments Comments for the current object.
 * @return array<int, WP_Comment>
 */
function atomic_wp_starter_comments_array( array $comments ): array {
	return atomic_wp_starter_comments_enabled() ? $comments : array();
}
add_filter( 'comments_array', 'atomic_wp_starter_comments_array', 20 );

/**
 * Remove comment administration surfaces while comments are disabled.
 */
function atomic_wp_starter_remove_comment_admin(): void {
	if ( ! atomic_wp_starter_comments_enabled() ) {
		remove_menu_page( 'edit-comments.php' );
	}
}
add_action( 'admin_menu', 'atomic_wp_starter_remove_comment_admin' );

/**
 * Remove the comments shortcut while comments are disabled.
 *
 * @param WP_Admin_Bar $wp_admin_bar Admin bar instance.
 */
function atomic_wp_starter_remove_comment_toolbar( WP_Admin_Bar $wp_admin_bar ): void {
	if ( ! atomic_wp_starter_comments_enabled() ) {
		$wp_admin_bar->remove_node( 'comments' );
	}
}
add_action( 'admin_bar_menu', 'atomic_wp_starter_remove_comment_toolbar', 999 );

/**
 * Remove pingback methods and comment methods that are not in use.
 *
 * @param array<string, string> $methods Registered XML-RPC methods.
 * @return array<string, string>
 */
function atomic_wp_starter_filter_xmlrpc_methods( array $methods ): array {
	unset( $methods['pingback.ping'], $methods['pingback.extensions.getPingbacks'] );

	if ( ! atomic_wp_starter_comments_enabled() ) {
		foreach ( array( 'wp.getCommentCount', 'wp.getComment', 'wp.getComments', 'wp.deleteComment', 'wp.editComment', 'wp.newComment' ) as $method ) {
			unset( $methods[ $method ] );
		}
	}

	return $methods;
}
add_filter( 'xmlrpc_methods', 'atomic_wp_starter_filter_xmlrpc_methods' );

/**
 * Remove the legacy X-Pingback response header.
 *
 * @param array<string, string> $headers HTTP response headers.
 * @return array<string, string>
 */
function atomic_wp_starter_remove_pingback_header( array $headers ): array {
	foreach ( array_keys( $headers ) as $header ) {
		if ( 'x-pingback' === strtolower( $header ) ) {
			unset( $headers[ $header ] );
		}
	}

	return $headers;
}
add_filter( 'wp_headers', 'atomic_wp_starter_remove_pingback_header' );
add_filter( 'pings_open', '__return_false', 20 );

/**
 * Prevent outbound pingbacks and trackbacks.
 *
 * @param array<int, string> $links Links WordPress would ping.
 */
function atomic_wp_starter_disable_outbound_pings( array &$links ): void {
	$links = array();
}
add_action( 'pre_ping', 'atomic_wp_starter_disable_outbound_pings' );

/**
 * Hide core comment REST routes while comments are disabled.
 *
 * @param array<string, array<int, array<string, mixed>>> $endpoints REST routes.
 * @return array<string, array<int, array<string, mixed>>>
 */
function atomic_wp_starter_filter_comment_rest_routes( array $endpoints ): array {
	if ( atomic_wp_starter_comments_enabled() ) {
		return $endpoints;
	}

	foreach ( array_keys( $endpoints ) as $route ) {
		if ( str_starts_with( $route, '/wp/v2/comments' ) ) {
			unset( $endpoints[ $route ] );
		}
	}

	return $endpoints;
}
add_filter( 'rest_endpoints', 'atomic_wp_starter_filter_comment_rest_routes' );

/**
 * Control automatic comment feed discovery.
 */
function atomic_wp_starter_show_comment_feeds(): bool {
	return atomic_wp_starter_comments_enabled();
}
add_filter( 'feed_links_show_comments_feed', 'atomic_wp_starter_show_comment_feeds' );
add_filter( 'feed_links_extra_show_post_comments_feed', 'atomic_wp_starter_show_comment_feeds' );

/**
 * Redirect direct comment feed requests while comments are disabled.
 */
function atomic_wp_starter_disable_comment_feeds(): void {
	if ( ! atomic_wp_starter_comments_enabled() && is_comment_feed() ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'atomic_wp_starter_disable_comment_feeds' );

/**
 * Remove WordPress emoji compatibility assets without altering Unicode content.
 */
function atomic_wp_starter_disable_emojis(): void {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles' );
	remove_action( 'admin_enqueue_scripts', 'wp_enqueue_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'atomic_wp_starter_disable_emojis' );
add_filter( 'emoji_svg_url', '__return_false' );

/**
 * Remove the legacy emoji plugin from the classic editor.
 *
 * @param array<int, string> $plugins TinyMCE plugins.
 * @return array<int, string>
 */
function atomic_wp_starter_disable_editor_emojis( array $plugins ): array {
	return array_values( array_diff( $plugins, array( 'wpemoji' ) ) );
}
add_filter( 'tiny_mce_plugins', 'atomic_wp_starter_disable_editor_emojis' );
