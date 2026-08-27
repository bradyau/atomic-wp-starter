<?php
/**
 * Not-found template.
 *
 * @package Atomic_WP_Starter
 */

get_header();
?>

<main id="main" class="site-main error-page">
	<div class="error-page__inner layout-wide">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Error 404', 'atomic-wp-starter' ); ?></p>
			<h1><?php esc_html_e( 'This page could not be found.', 'atomic-wp-starter' ); ?></h1>
		</div>
		<div class="error-page__action">
			<p><?php esc_html_e( 'Try a search, or return to the homepage.', 'atomic-wp-starter' ); ?></p>
			<?php get_search_form(); ?>
			<p><a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'atomic-wp-starter' ); ?></a></p>
		</div>
	</div>
</main>

<?php
get_footer();
