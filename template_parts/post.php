<?php
/**
 * Post Template
 *
 * @package leadrocket
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php if(has_post_thumbnail()) { ?>
		<div class="post-thumbnail clearfix">
			<?php the_post_thumbnail('large'); ?>
		</div>
	<?php } ?>

	<div class="text">
		<header>
			<h2><?php the_title(); ?></h2>
		</header>
		<?php the_content(); ?>
	</div>
</article>