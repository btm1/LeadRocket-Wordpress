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
				<h1><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'lr_framework' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'lr_framework' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'lr_framework' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'lr_framework' ), get_the_date( _x( 'Y', 'yearly archives date format', 'lr_framework' ) ) );
					else :
						_e( 'Archives', 'lr_framework' );
					endif;
				?></h1>
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