<?php
/**
 * Utility Functions
 *
 * @package leadrocket
 */

function lr_create_input(array $args) {
	$id = $args['label_for'];
	$value = get_option( $id, '' );
	return sprintf('<input name="%1$s" type="text" id="%1$s" value="%2$s" class="regular-text">', $id, $value);
}

function lr_input(array $args) {
	echo lr_create_input($args);
}

function lr_create_textarea($id, $value) {
	return '<textarea></textarea>';
}

function lr_textarea($id, $value) {
	echo lr_create_textarea($id, $value);
}

?>