<?php
/**
 * Custom Post Types
 *
 * @package leadrocket
 */

/**
 * Help Center
 */

/**
 * Resources
 */

/**
 * Features
 */

function lr_create_feature_post_type() {
	register_post_type( 'lr_feature',
		array(
			'labels' => array(
				'name' => __( 'Features', 'lr_framework' ),
				'singular_name' => __( 'Feature', 'lr_framework' ),
				'add_new_item' => __( 'Add New Feature', 'lr_framework' )
			),
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'show_in_nav_menus' => false,
			'supports' => array('title', 'thumbnail', 'editor', 'revisions', 'page-attributes'),
		)
	);
}

add_action( 'init', 'lr_create_feature_post_type' );

/**
 * Benefits
 */

function lr_create_benefit_post_type() {
	register_post_type( 'lr_benefit',
		array(
			'labels' => array(
				'name' => __( 'Benefits', 'lr_framework' ),
				'singular_name' => __( 'Benefit', 'lr_framework' ),
				'add_new_item' => __( 'Add New Benefit', 'lr_framework' )
			),
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'show_in_nav_menus' => false,
			'supports' => array('title', 'thumbnail', 'editor', 'revisions', 'page-attributes'),
		)
	);
}

add_action( 'init', 'lr_create_benefit_post_type' );

/**
 * Pricing Tables
 *
 * For now this will just be an HTML box, but we'll grab the content
 * with a shortcode to place it on the page. We'll need to display
 * these posts with the ID as a column so that creating the shortcode
 * is as easy as possible.
 *
 * At some point making this more user friendly would be nice.
 */

function lr_create_pricing_table_post_type() {
	register_post_type( 'lr_pricing_table',
		array(
			'labels' => array(
				'name' => __( 'Pricing Tables', 'lr_framework' ),
				'singular_name' => __( 'Pricing Table', 'lr_framework' ),
				'add_new_item' => __( 'Add New Pricing Table', 'lr_framework' )
			),
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'show_in_nav_menus' => false,
			'supports' => array('title', 'editor', 'revisions', 'page-attributes'),
		)
	);
}

// Update Sorting Table
function lr_edit_pricing_table_columns( $columns ) {
	$new_columns = array( 'ID' => __( 'ID', 'lr_framework' ) );
	return array_merge($columns, $new_columns);
}

function lr_manage_pricing_tables_columns( $column, $post_id ) {
	if ( $column === 'ID' && !empty($post_id)) {
		echo $post_id;
	}
}

// Add Filters
add_filter( 'manage_edit-lr_pricing_table_columns', 'lr_edit_pricing_table_columns' );

// Add Actions
add_action( 'manage_lr_pricing_table_posts_custom_column', 'lr_manage_pricing_tables_columns', 10, 2 );
add_action( 'init', 'lr_create_pricing_table_post_type' );

/**
 * Slides
 */

function lr_create_slide_post_type() {
	register_post_type( 'lr_slide',
		array(
			'labels' => array(
				'name' => __( 'Slides', 'lr_framework' ),
				'singular_name' => __( 'Slide', 'lr_framework' ),
				'add_new_item' => __( 'Add New Slide', 'lr_framework' )
			),
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'show_in_nav_menus' => false,
			'supports' => array('title', 'editor', 'revisions', 'page-attributes'),
		)
	);
}

// Add Metaboxes
function lr_add_slide_metaboxes() {
	add_meta_box( 'lr_slide_html', __('Slide HTML', 'lr_framework'), 'lr_slide_metabox', 'lr_slide', 'normal', 'core' );
}

// Draw Metaboxes
function lr_slide_metabox() {
	wp_nonce_field( 'lr_slide_metabox', 'lr_slide_metabox_nonce' );
	echo lr_create_textarea('lr_slide_html');
}

// Save Metaboxes
function lr_save_slide_metabox( $post_id ) {
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { return $post_id; };
	if ( !isset( $_POST['lr_slide_metabox_nonce'] ) ) { return $post_id; };
	if ( !wp_verify_nonce( $_POST['lr_slide_metabox_nonce'], 'lr_slide_metabox' ) ) { return $post_id; };
	if ( !current_user_can( 'edit_post', $post_id ) ) { return $post_id; };

	// Save data
	if ( isset(	$_POST['lr_slide_html'] ) )
		update_post_meta($post_id, 'lr_slide_html', esc_attr($_POST['lr_slide_html']) );

	return $post_id;
}

// Add Actions
// add_action( 'save_post', 'lr_save_slide_metabox' );
add_action( 'init', 'lr_create_slide_post_type' );

/**
 * FAQs
 */

/**
 * Team Members
 */

function lr_create_team_member_post_type() {
	register_post_type( 'lr_team_member',
		array(
			'labels' => array(
				'name' => __( 'Team Members', 'lr_framework' ),
				'singular_name' => __( 'Team Member', 'lr_framework' ),
				'add_new_item' => __( 'Add New Team Member', 'lr_framework' )
			),
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'show_in_nav_menus' => false,
			'supports' => array('title', 'thumbnail', 'editor', 'revisions', 'page-attributes'),
		)
	);
}

add_action( 'init', 'lr_create_team_member_post_type' );

?>