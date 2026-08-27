<?php
/**
 * Site footer.
 *
 * @package Atomic_WP_Starter
 */
?>
	<footer class="site-footer">
		<div class="site-footer__inner layout-wide">
			<p class="site-footer__credit">
				&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</p>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => 'nav',
					'container_aria_label' => esc_attr__( 'Footer navigation', 'atomic-wp-starter' ),
					'menu_class'     => 'footer-menu',
					'fallback_cb'    => false,
					'depth'          => 1,
				)
			);
			?>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
