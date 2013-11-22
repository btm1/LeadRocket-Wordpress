<?php
/**
 * Features Section Template
 *
 * @package leadrocket
 */
?>

<?php
	$args = array( 'post_type' => 'lr_benefit', 'posts_per_page' => -1, 'orderby' => 'menu_order' );
	$benefits_query = new WP_query( $args );
?>

<?php if ($benefits_query->have_posts()) : ?>
	<div id="benefits" class="marketing-row">
		<div class="container">
			<h2 class="marketing-title"><?php echo get_option( 'lr_benefits_title', __('Benefits', 'lr_framework') ); ?></h2>
			<?php $i = 1; ?>
			<?php while ($benefits_query->have_posts()) : $benefits_query->the_post(); ?>
				<?php if ( $i % 3 === 1 ) { echo '<div class="row">'; } ?>
					<div class="col-sm-4 benefit widget">
						<?php if(has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('marketing', array('class' => 'benefits-thumbnail')); ?>
						<?php endif; ?>
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
					</div>
				<?php if ( $i % 3 === 0 || $i === $benefits_query->found_posts ) { echo '</div>'; } ?>
				<?php $i++; ?>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; wp_reset_query(); ?>