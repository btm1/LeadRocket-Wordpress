<?php
/**
 * Search Form Template
 *
 * @package leadrocket
 */
?>

<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<div>
		<label class="sr-only"><?php _e( 'Search', 'pn_framework' ); ?></label>
		<input type="search" autocomplete="on" name="s" class="form-control" placeholder="<?php _e( 'Search&hellip;', 'pn_framework' ); ?>" />
	</div>
</form>