<?php
/**
 * Search Template
 *
 * @package leadrocket
 */
?>

<?php get_header(); ?>
	<div id="page-header">
		<div class="container">
			<h1><?php echo get_option( 'lr_blog_title', __('Blog', 'lr_framework') ); ?></h1>
		</div>
	</div>
	<div id="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<h2><?php printf( __( 'Search Results for: <em>%s</em>', 'lr_framework' ), get_search_query() ); ?></h2>
					<hr/>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('template_parts/post', 'list'); ?>
					<?php endwhile; endif; ?>

					<?php get_template_part('template_parts/pages_nav'); ?>
				</div>

				<div class="col-sm-3" id="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>