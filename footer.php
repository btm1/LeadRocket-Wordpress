<?php
/**
 * Footer Template
 *
 * @package leadrocket
 */
?>

	</div> <!-- End Wrapper -->

	<footer id="footer">
		<div class="container">
			<?php
				if (get_option('lr_facebook')) {
					printf('<a href="%s" class="facebook">%s</a>', get_option( 'lr_facebook', 'http://www.facebook.com'), 'Facebook' );
				}

				if (get_option('lr_twitter')) {
					printf('<a href="%s" class="twitter">%s</a>', get_option( 'lr_twitter', 'http://www.twitter.com'), 'Twitter' );
				}
			?>

			<?php wp_nav_menu( array(
				'menu'              => 'footer',
				'theme_location'    => 'footer',
				'depth'             => 1,
				'menu_class'        => 'footer-nav'
			)); ?>
		</div>
	</footer>

	<?php wp_footer(); ?>
	</body>
</html>