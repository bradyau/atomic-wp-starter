<?php
/**
 * Empty-results message.
 *
 * @package Atomic_WP_Starter
 */

?>
<section class="no-results layout-content">
	<h2><?php esc_html_e( 'Nothing matched yet.', 'atomic-wp-starter' ); ?></h2>
	<p><?php esc_html_e( 'Try a different search or return to the homepage.', 'atomic-wp-starter' ); ?></p>
	<?php get_search_form(); ?>
</section>
