<?php
/**
 * Title: Split content
 * Slug: atomic-wp-starter/split-content
 * Categories: text, columns
 * Description: A two-column story section with an editorial heading and practical details.
 * Viewport Width: 1200
 *
 * @package Atomic_WP_Starter
 */

?>
<!-- wp:group {"align":"wide","style":{"border":{"top":{"color":"var:preset|color|line","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="border-top-color:var(--wp--preset--color--line);border-top-width:1px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:columns -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"58%"} -->
		<div class="wp-block-column" style="flex-basis:58%">
			<!-- wp:paragraph {"className":"eyebrow"} -->
			<p class="eyebrow"><?php esc_html_e( 'How it works', 'atomic-wp-starter' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Pair a strong idea with the detail needed to trust it.', 'atomic-wp-starter' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"42%"} -->
		<div class="wp-block-column" style="flex-basis:42%">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Explain the approach in plain language. Keep the section specific enough to be useful without turning it into a wall of copy.', 'atomic-wp-starter' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item --><li><?php esc_html_e( 'One clear responsibility', 'atomic-wp-starter' ); ?></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><?php esc_html_e( 'One meaningful outcome', 'atomic-wp-starter' ); ?></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><?php esc_html_e( 'One useful next step', 'atomic-wp-starter' ); ?></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
