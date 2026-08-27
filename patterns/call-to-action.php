<?php
/**
 * Title: Focused call to action
 * Slug: atomic-wp-starter/call-to-action
 * Categories: call-to-action, banner
 * Description: A high-contrast closing section with a single action.
 * Viewport Width: 1200
 *
 * @package Atomic_WP_Starter
 */

?>
<!-- wp:group {"align":"wide","backgroundColor":"ink","textColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"radius":"7px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-surface-color has-ink-background-color has-text-color has-background" style="border-radius:7px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:paragraph {"className":"eyebrow","textColor":"surface"} -->
	<p class="eyebrow has-surface-color has-text-color"><?php esc_html_e( 'A useful next step', 'atomic-wp-starter' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Make the invitation direct and easy to understand.', 'atomic-wp-starter' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Support the action with one sentence that sets an honest expectation.', 'atomic-wp-starter' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"surface","textColor":"ink"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-ink-color has-surface-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a conversation', 'atomic-wp-starter' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
