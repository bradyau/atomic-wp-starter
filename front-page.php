<?php
/**
 * Front page template.
 *
 * @package Atomic_WP_Starter
 */

get_header();

$atomic_front_shows_posts = 'posts' === get_option( 'show_on_front' );
?>

<main id="main" class="site-main">
	<header class="front-page__hero layout-wide">
		<div class="front-page__intro">
			<p class="eyebrow"><?php esc_html_e( 'A considered starting point', 'atomic-wp-starter' ); ?></p>
			<h1><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
			<?php if ( get_bloginfo( 'description' ) ) : ?>
				<p class="front-page__lede"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
			<?php endif; ?>
		</div>
		<a class="text-link" href="#page-content"><?php esc_html_e( 'Explore the page', 'atomic-wp-starter' ); ?><span aria-hidden="true">&darr;</span></a>
	</header>

	<?php if ( $atomic_front_shows_posts ) : ?>
		<section id="page-content" class="front-page__content" aria-labelledby="latest-posts-title">
			<header class="layout-wide">
				<p class="eyebrow"><?php esc_html_e( 'From the journal', 'atomic-wp-starter' ); ?></p>
				<h2 id="latest-posts-title"><?php esc_html_e( 'Latest posts', 'atomic-wp-starter' ); ?></h2>
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
		</section>
	<?php elseif ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'front-page' ); ?>>
				<div id="page-content" class="entry-content front-page__content">
					<?php if ( trim( (string) get_the_content() ) ) : ?>
						<?php the_content(); ?>
					<?php else : ?>
						<section class="starter-intro alignwide" aria-labelledby="starter-intro-title">
							<p class="eyebrow"><?php esc_html_e( 'Start with the essentials', 'atomic-wp-starter' ); ?></p>
							<div class="starter-intro__grid">
								<h2 id="starter-intro-title"><?php esc_html_e( 'A lean foundation that leaves room for the work.', 'atomic-wp-starter' ); ?></h2>
								<div>
									<p><?php esc_html_e( 'Replace this sample with native blocks or insert one of the included marketing patterns. The structure is intentionally quiet, responsive, and easy to adapt.', 'atomic-wp-starter' ); ?></p>
									<p class="eyebrow"><?php esc_html_e( 'Add content in the block editor', 'atomic-wp-starter' ); ?></p>
								</div>
							</div>
						</section>
					<?php endif; ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
