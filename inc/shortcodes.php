<?php
/**
 * Shortcodes
 *
 * @package leadrocket
 */

/**
 * Pricing Table Shortcode
 */

function lr_get_pricing_table( $atts ) {
    extract( shortcode_atts( array(
        'id' => null,
    ), $atts ) );

    if ( $id ) {
    	$pricing_table = get_post($id);
    	echo $pricing_table->post_content;
    }
}

add_shortcode( "pricing_table", "lr_get_pricing_table" );

/**
 * Button Shortcode
 */

function lr_button( $atts ) {

}

add_shortcode( "button", "lr_button" );

?>