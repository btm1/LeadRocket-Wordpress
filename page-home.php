<?php
/**
 * Home Page Template
 *
 * Template Name: Home Page
 *
 * @package leadrocket
 */
?>

<?php get_header(); ?>

		<?php get_template_part('template_parts/hero'); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php if ( get_the_content() ) : ?>
				<div id="content">
					<div class="container">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endif; ?>
		<?php endwhile; endif; ?>

		<?php get_template_part('template_parts/features'); ?>
		<?php get_template_part('template_parts/benefits'); ?>

<?php get_footer(); ?>