<?php
/**
 * Search results template.
 *
 * @package Atomic_WP_Starter
 */

get_header();
?>

<main id="main" class="site-main listing-page">
	<header class="listing-header layout-wide">
		<p class="eyebrow"><?php esc_html_e( 'Search', 'atomic-wp-starter' ); ?></p>
		<h1 class="entry-title">
			<?php
			printf(
				/* translators: %s: search term. */
				esc_html__( 'Results for “%s”', 'atomic-wp-starter' ),
				esc_html( get_search_query() )
			);
			?>
		</h1>
		<?php get_search_form(); ?>
	</header>

	<div class="post-grid layout-wide">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/content' ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>

	<div class="pagination layout-wide">
		<?php the_posts_pagination(); ?>
	</div>
</main>

<?php
get_footer();
