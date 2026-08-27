<?php
/**
 * Small template helpers.
 *
 * @package Atomic_WP_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print a compact post byline.
 */
function atomic_wp_starter_post_meta(): void {
	$meta = sprintf(
		/* translators: 1: published date, 2: author name. */
		__( 'Published %1$s by %2$s', 'atomic-wp-starter' ),
		'<time datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' . esc_html( get_the_date() ) . '</time>',
		'<a href="' . esc_url( get_author_posts_url( (int) get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);

	echo wp_kses(
		$meta,
		array(
			'a'    => array( 'href' => true ),
			'time' => array( 'datetime' => true ),
		)
	);
}

/**
 * Print a linked post thumbnail when one exists.
 *
 * @param string $size Registered image size.
 */
function atomic_wp_starter_post_thumbnail( string $size = 'large' ): void {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	?>
	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php
		the_post_thumbnail(
			$size,
			array(
				'loading'  => 'lazy',
				'decoding' => 'async',
				'alt'      => '',
			)
		);
		?>
	</a>
	<?php
}
