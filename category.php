<?php
/**
 * Archive Template
 *
 * @package leadrocket
 */
?>

<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<div id="page-header">
			<div class="container">
				<h1><?php printf( __( '%s Archives', 'lr_framework' ), single_cat_title( '', false ) ); ?></h1>
			</div>
		</div>
		<div id="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part('template_parts/post', 'list'); ?>
						<?php endwhile; ?>
						<?php get_template_part('template_parts/pages_nav'); ?>
					</div>
					<div class="col-sm-4" id="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>