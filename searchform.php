<?php
/**
 * Accessible search form.
 *
 * @package Atomic_WP_Starter
 */

$atomic_search_id = wp_unique_id( 'search-field-' );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $atomic_search_id ); ?>"><?php esc_html_e( 'Search the site', 'atomic-wp-starter' ); ?></label>
	<div class="search-form__controls">
		<input id="<?php echo esc_attr( $atomic_search_id ); ?>" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>">
		<button type="submit"><?php esc_html_e( 'Search', 'atomic-wp-starter' ); ?></button>
	</div>
</form>
