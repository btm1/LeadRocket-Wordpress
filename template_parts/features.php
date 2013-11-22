<?php
/**
 * Features Section Template
 *
 * @package leadrocket
 */
?>

<?php
	$args = array( 'post_type' => 'lr_feature', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' );
	$features_query = new WP_query( $args );
?>

<?php if ($features_query->have_posts()) : ?>
	<div id="features" class="marketing-row">
		<div class="container">
			<h2 class="marketing-title"><?php echo get_option( 'lr_features_title', __('Features', 'lr_framework') ); ?></h2>
			<?php $i = 1; ?>
			<?php while ($features_query->have_posts()) : $features_query->the_post(); ?>
				<?php if ( $i % 3 === 1 ) { echo '<div class="row">'; } ?>
					<div class="col-sm-4 feature widget">
						<?php if(has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('marketing', array('class' => 'features-thumbnail')); ?>
						<?php endif; ?>
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
					</div>
				<?php if ( $i % 3 === 0 || $i === $features_query->found_posts ) { echo '</div>'; } ?>
				<?php $i++; ?>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; wp_reset_query(); ?>