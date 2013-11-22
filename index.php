<?php
/**
 * Index Template
 *
 * @package leadrocket
 */
?>

<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<?php get_template_part('template_parts/post'); ?>
						<?php get_template_part('template_parts/pages_nav'); ?>
					</div>
					<div class="col-sm-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>