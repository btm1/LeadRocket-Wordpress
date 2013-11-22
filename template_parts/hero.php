<?php
/**
 * Slideshow Hero Template
 *
 * @package leadrocket
 */
?>

<?php
	$args = array( 'post_type' => 'lr_slide', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' );
	$slide_query = new WP_query( $args );
?>

<?php if ($slide_query->have_posts()) : ?>
	<div id="hero">
		<div class="container">
			<ul class="slideshow">
				<?php while ($slide_query->have_posts()) : $slide_query->the_post(); ?>
					<li class="slide">
						<?php the_content(); ?>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
<?php endif; wp_reset_query(); ?>