<?php
/**
 * Single post template.
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
				<p class="entry-meta"><?php atomic_wp_starter_post_meta(); ?></p>
			</header>
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="entry-featured alignwide">
					<?php the_post_thumbnail( 'large', array( 'loading' => 'eager', 'fetchpriority' => 'high' ) ); ?>
				</figure>
			<?php endif; ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
		<div class="post-navigation-wrap layout-content">
			<?php the_post_navigation(); ?>
		</div>
	<?php endwhile; ?>
</main>

<?php
get_footer();
