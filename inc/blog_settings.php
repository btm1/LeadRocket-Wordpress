<?php
/**
 * Blog Settings
 *
 * @package leadrocket
 */

function lr_register_general_settings() {
	$settings = array(
		'lr_blog_title' => 'Blog Title',
		'lr_features_title' => 'Features Section Title',
		'lr_benefits_title' => 'Benefits Section Title',
		'lr_facebook' => 'Facebook URL',
		'lr_twitter' => 'Twitter URL'
	);

	foreach($settings as $setting => $title) {
		register_setting( 'general', $setting, 'esc_attr' );
		$args = array( 'label_for' => $setting );
		add_settings_field($setting, $title, 'lr_input', 'general', 'default', $args );
	}
}

add_filter( 'admin_init', 'lr_register_general_settings' );

?>