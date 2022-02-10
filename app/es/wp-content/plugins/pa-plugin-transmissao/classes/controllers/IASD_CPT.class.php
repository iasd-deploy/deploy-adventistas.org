<?php

// Init dos Custom Post Types
class IASD_CPT {
	public static function speaker_cpt() {
		$labels = array(
			'name'                => _x( 'Speakers', 'iasd' ),
			'singular_name'       => _x( 'Speaker', 'iasd' ),
			'menu_name'           => __( 'Speaker', 'iasd' ),
			'name_admin_bar'      => __( 'Speaker', 'iasd' ),
			'parent_item_colon'   => __( 'Parent Spearker:', 'iasd' ),
			'all_items'           => __( 'All Speakers', 'iasd' ),
			'add_new_item'        => __( 'Add New Speakers', 'iasd' ),
			'add_new'             => __( 'New Speakers', 'iasd' ),
			'new_item'            => __( 'New Speaker', 'iasd' ),
			'edit_item'           => __( 'Edit Speaker', 'iasd' ),
			'update_item'         => __( 'Update Speaker', 'iasd' ),
			'view_item'           => __( 'View Speaker', 'iasd' ),
			'search_items'        => __( 'Search speakers', 'iasd' ),
			'not_found'           => __( 'No speaker found', 'iasd' ),
			'not_found_in_trash'  => __( 'No speaker found in Trash', 'iasd' ),
		);
		$rewrite = array(
			'slug'                => __( 'speakers', 'iasd' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => false,
		);
		$args = array(
			'label'               => __( 'Speaker', 'iasd' ),
			'description'         => __( 'Speakers', 'iasd' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-megaphone',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
		);
		register_post_type( 'speaker_cpt', $args );
	}


	public static function videos_cpt() {
		$labels = array(
			'name'                => _x( 'Videos', 'iasd' ),
			'singular_name'       => _x( 'Video', 'iasd' ),
			'menu_name'           => __( 'Videos', 'iasd' ),
			'name_admin_bar'      => __( 'Videos', 'iasd' ),
			'parent_item_colon'   => __( 'Parent Video:', 'iasd' ),
			'all_items'           => __( 'All Videos', 'iasd' ),
			'add_new_item'        => __( 'Add New Video', 'iasd' ),
			'add_new'             => __( 'Add New', 'iasd' ),
			'new_item'            => __( 'New Video', 'iasd' ),
			'edit_item'           => __( 'Edit Video', 'iasd' ),
			'update_item'         => __( 'Update Video', 'iasd' ),
			'view_item'           => __( 'View Video', 'iasd' ),
			'search_items'        => __( 'Search Video', 'iasd' ),
			'not_found'           => __( 'Not found', 'iasd' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'iasd' ),
		);
		$rewrite = array(
			'slug'                => __( 'videos', 'iasd' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => false,
		);
		$args = array(
			'label'               => __( 'Videos', 'iasd' ),
			'description'         => __( 'Post Type Description', 'iasd' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'comments'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-video-alt3',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
		);
		register_post_type( 'videos_cpt', $args );
	}


	public static function events_cpt() {
		$labels = array(
			'name'                => __( 'Events', 'iasd' ),
			'singular_name'       => __( 'Event', 'iasd' ),
			'menu_name'           => __( 'Events', 'iasd' ),
			'name_admin_bar'      => __( 'Events', 'iasd' ),
			'parent_item_colon'   => __( 'Event Item:', 'iasd' ),
			'all_items'           => __( 'All Events', 'iasd' ),
			'add_new_item'        => __( 'Add New Event', 'iasd' ),
			'add_new'             => __( 'Add New', 'iasd' ),
			'new_item'            => __( 'New Event', 'iasd' ),
			'edit_item'           => __( 'Edit Event', 'iasd' ),
			'update_item'         => __( 'Update Event', 'iasd' ),
			'view_item'           => __( 'View Event', 'iasd' ),
			'search_items'        => __( 'Search Event', 'iasd' ),
			'not_found'           => __( 'Not found', 'iasd' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'iasd' ),
		);
		$rewrite = array(
			'slug'                => __( 'events', 'iasd' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Events', 'iasd'),
			'description'         => __( 'Post Type Description', 'iasd' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'comments'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-calendar-alt',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
		);
		register_post_type( 'events_cpt', $args );
	}
}

add_action( 'after_setup_theme', array('IASD_CPT', 'videos_cpt'), 0 );
add_action( 'after_setup_theme', array('IASD_CPT', 'speaker_cpt'), 0 );
add_action( 'after_setup_theme', array('IASD_CPT', 'events_cpt'), 0 );