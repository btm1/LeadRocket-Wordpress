<?php
/**
 * Post List Template
 *
 * @package leadrocket
 */
?>

<div <?php post_class( 'post-list' ); ?> id="post-<?php the_ID(); ?>" >
	<div class="row">
		<?php if(has_post_thumbnail()) : ?>
			<div class="col-sm-4">
				<div class="thumbnail">
					<?php the_post_thumbnail('large'); ?>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="text">
					<header>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<?php the_excerpt(); ?>
				</div>
			</div>
		<?php else: ?>
			<div class="col-sm-12">
				<div class="text">
					<header>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<?php the_excerpt(); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>