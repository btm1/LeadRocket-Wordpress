<?php
/**
 * Comments Template
 *
 * @package leadrocket
 */
?>

<?php if ( post_password_required() ) { return; } ?>

<?php if ( have_comments() ) : ?>
	<ol class="comment-list">
		<?php wp_list_comments(); ?>
	</ol>
<?php endif; ?>

<?php comment_form(); ?>