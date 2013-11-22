<?php
/**
 * Page Template
 *
 * @package leadrocket
 */
?>

<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="page-header">
			<div class="container">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div id="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</div>
					<div class="col-sm-4" id="sidebar">
						<?php get_sidebar('page'); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>