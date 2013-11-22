<?php
/**
 * 404 Template
 *
 * @package leadrocket
 */
?>

<?php
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: " . get_bloginfo('url') );
	exit();
?>

<?php get_header(); ?>

<div id="content">
	<div class="container">
		<h1><?php _e('404: We Screwed Up', 'lr_framework'); ?></h1>
	</div>
</div>

<?php get_footer(); ?>