<?php
/**
 * Comment list and native WordPress comment form.
 *
 * @package Atomic_WP_Starter
 */

if ( post_password_required() || ! atomic_wp_starter_comments_enabled() ) {
	return;
}
?>

<section id="comments" class="comments-area layout-content">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$atomic_wp_starter_comment_count = get_comments_number();
			printf(
				/* translators: %s: Number of comments. */
				esc_html( _n( '%s response', '%s responses', $atomic_wp_starter_comment_count, 'atomic-wp-starter' ) ),
				esc_html( number_format_i18n( $atomic_wp_starter_comment_count ) )
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 56,
					'style'       => 'ol',
					'short_ping'  => true,
					'type'        => 'comment',
				)
			);
			?>
		</ol>

		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'atomic-wp-starter' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</section>
