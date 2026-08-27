<?php
/**
 * Standard page template.
 *
 * @package Atomic_WP_Starter
 */

get_header();
?>

<main id="main" class="site-main">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
			<header class="entry-header layout-content">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php
				wp_link_pages(
					array(
						'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page sections', 'atomic-wp-starter' ) . '">',
						'after'  => '</nav>',
					)
				);
				?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
