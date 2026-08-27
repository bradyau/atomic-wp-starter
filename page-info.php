<?php
/**
 * Template Name: Information / Legal
 * Template Post Type: page
 *
 * @package Atomic_WP_Starter
 */

get_header();
?>

<main id="main" class="site-main info-page">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
			<header class="entry-header info-page__header layout-content">
				<p class="eyebrow"><?php esc_html_e( 'Information', 'atomic-wp-starter' ); ?></p>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<p class="entry-updated">
					<?php
					printf(
						/* translators: %s: date the page was last updated. */
						esc_html__( 'Last updated %s', 'atomic-wp-starter' ),
						esc_html( get_the_modified_date() )
					);
					?>
				</p>
			</header>
			<div class="entry-content info-page__content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
