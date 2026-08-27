<?php
/**
 * Archive template.
 *
 * @package Atomic_WP_Starter
 */

get_header();
?>

<main id="main" class="site-main listing-page">
	<header class="listing-header layout-wide">
		<?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
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
