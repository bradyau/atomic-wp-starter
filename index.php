<?php
/**
 * Main fallback template.
 *
 * @package Atomic_WP_Starter
 */

get_header();

$listing_title = single_post_title( '', false );

if ( ! $listing_title ) {
	$listing_title = get_bloginfo( 'name' );
}
?>

<main id="main" class="site-main listing-page">
	<header class="listing-header layout-wide">
		<h1 class="entry-title"><?php echo esc_html( $listing_title ); ?></h1>
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
