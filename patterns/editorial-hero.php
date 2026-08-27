<?php
/**
 * Title: Editorial hero
 * Slug: atomic-wp-starter/editorial-hero
 * Categories: featured, banner
 * Description: A restrained headline, supporting copy, and two actions.
 * Viewport Width: 1200
 *
 * @package Atomic_WP_Starter
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"className":"eyebrow"} -->
	<p class="eyebrow"><?php esc_html_e( 'A clear point of view', 'atomic-wp-starter' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"fontSize":"x-large"} -->
	<h1 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Lead with the idea that matters most.', 'atomic-wp-starter' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"large","style":{"spacing":{"margin":{"right":"30%"}}}} -->
	<p class="has-large-font-size" style="margin-right:30%"><?php esc_html_e( 'Use a concise supporting statement to establish context and help visitors choose a useful next step.', 'atomic-wp-starter' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Primary action', 'atomic-wp-starter' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'Secondary action', 'atomic-wp-starter' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
