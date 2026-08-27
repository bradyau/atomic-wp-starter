<?php
/**
 * Card used in post listings.
 *
 * @package Atomic_WP_Starter
 */

$atomic_post_type_object = get_post_type_object( get_post_type() );
$atomic_post_type_label  = $atomic_post_type_object ? $atomic_post_type_object->labels->singular_name : __( 'Entry', 'atomic-wp-starter' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<?php atomic_wp_starter_post_thumbnail( 'large' ); ?>
	<div class="post-card__content">
		<p class="eyebrow"><?php echo esc_html( $atomic_post_type_label ); ?></p>
		<?php the_title( '<h2 class="post-card__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
		<div class="post-card__excerpt"><?php the_excerpt(); ?></div>
	</div>
</article>
