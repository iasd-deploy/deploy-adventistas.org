<?php
/**
Plugin Name: PA - Custom Post Type
Description: Cria o Post Types diversos no Portal Adventista.
Author: Divisão Sul Americana da IASD
Version: 2.0.0
*/


// Init do PA - Cards
if ( ! function_exists('pa_cards') ) {
	function pa_cards() {
		$labels = array(
			'name'                => __( 'Cards', 'pa-cpt' ),
			'singular_name'       => __( 'Card', 'pa-cpt' ),
			'menu_name'           => __( 'Cards', 'pa-cpt' ),
			'parent_item_colon'   => __( 'Parent card:', 'pa-cpt' ),
			'all_items'           => __( 'All cards', 'pa-cpt' ),
			'view_item'           => __( 'View Card', 'pa-cpt' ),
			'add_new_item'        => __( 'Add New Card', 'pa-cpt' ),
			'add_new'             => __( 'Add New', 'pa-cpt' ),
			'edit_item'           => __( 'Edit Card', 'pa-cpt' ),
			'update_item'         => __( 'Update Card', 'pa-cpt' ),
			'search_items'        => __( 'Search Card', 'pa-cpt' ),
			'not_found'           => __( 'Not found', 'pa-cpt' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'pa-cpt' ),
		);
		$rewrite = array(
			'slug'                => __( 'cards', 'pa-cpt' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Cards', 'pa-cpt' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'editor', 'comments' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
		);
		register_post_type( 'pa_cards', $args );
	}

	add_action( 'init', 'pa_cards', 0 );
}

// Register Custom Taxonomy para o PA-Cards
function pa_cards_tax() {

	$labels = array(
		'name'                       => __( 'Cards Categories', 'pa-cpt' ),
		'singular_name'              => __( 'Card Category', 'pa-cpt' ),
		'menu_name'                  => __( 'Card Category', 'pa-cpt' ),
		'all_items'                  => __( 'All Card Categories', 'pa-cpt' ),
		'parent_item'                => __( 'Parent Card Category', 'pa-cpt' ),
		'parent_item_colon'          => __( 'Parent Card Category:', 'pa-cpt' ),
		'new_item_name'              => __( 'New Card Category Name', 'pa-cpt' ),
		'add_new_item'               => __( 'Add New Card Category', 'pa-cpt' ),
		'edit_item'                  => __( 'Edit Card Category', 'pa-cpt' ),
		'update_item'                => __( 'Update Card Category', 'pa-cpt' ),
		'view_item'                  => __( 'View Card Category', 'pa-cpt' ),
		'separate_items_with_commas' => __( 'Separate Card Category with commas', 'pa-cpt' ),
		'add_or_remove_items'        => __( 'Add or remove Cards Categories', 'pa-cpt' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pa-cpt' ),
		'popular_items'              => __( 'Popular Cards Categories', 'pa-cpt' ),
		'search_items'               => __( 'Search Cards Categories', 'pa-cpt' ),
		'not_found'                  => __( 'Not Found', 'pa-cpt' ),
	);
	$rewrite = array(
			'slug'                => __( 'cards/cat', 'pa-cpt' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite' => $rewrite
	);
	register_taxonomy( 'pa-cpt-tax', array( 'pa_cards' ), $args );

}
// Hook into the 'init' action
add_action( 'init', 'pa_cards_tax', 0 );


if ( ! function_exists('pa_infographics') ) {
	// Register Custom Post Type
	function pa_infographics() {

		$labels = array(
			'name'                => __( 'Infographics', 'pa-cpt' ),
			'singular_name'       => __( 'Infographic', 'pa-cpt' ),
			'menu_name'           => __( 'Infographic', 'pa-cpt' ),
			'name_admin_bar'      => __( 'Infographic', 'pa-cpt' ),
			'parent_item_colon'   => __( 'Parent Infographic:', 'pa-cpt' ),
			'all_items'           => __( 'All Infographics', 'pa-cpt' ),
			'add_new_item'        => __( 'Add New Infographic', 'pa-cpt' ),
			'add_new'             => __( 'Add New', 'pa-cpt' ),
			'new_item'            => __( 'New Infographic', 'pa-cpt' ),
			'edit_item'           => __( 'Edit Infographic', 'pa-cpt' ),
			'update_item'         => __( 'Update Infographic', 'pa-cpt' ),
			'view_item'           => __( 'View Infographic', 'pa-cpt' ),
			'search_items'        => __( 'Search Infographic', 'pa-cpt' ),
			'not_found'           => __( 'Not found', 'pa-cpt' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'pa-cpt' ),
		);
		$rewrite = array(
			'slug'                => __( 'infographics', 'pa-cpt' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Infographics', 'pa-cpt' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-analytics',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'             => $rewrite
		);
		register_post_type( 'pa_infographics', $args );
	}

	// Hook into the 'init' action
	add_action( 'init', 'pa_infographics', 0 );
}

// Register Custom Taxonomy para o PA-Cpt
function pa_infographics_tax() {

	$labels = array(
		'name'                       => __( 'Infographics Categories', 'pa-cpt' ),
		'singular_name'              => __( 'Infographic Category', 'pa-cpt' ),
		'menu_name'                  => __( 'Infographic Category', 'pa-cpt' ),
		'all_items'                  => __( 'All Infographics Categories', 'pa-cpt' ),
		'parent_item'                => __( 'Parent Infographic Category', 'pa-cpt' ),
		'parent_item_colon'          => __( 'Parent Infographic Category:', 'pa-cpt' ),
		'new_item_name'              => __( 'New Infographic Category Name', 'pa-cpt' ),
		'add_new_item'               => __( 'Add New Infographic Category', 'pa-cpt' ),
		'edit_item'                  => __( 'Edit Infographic Category', 'pa-cpt' ),
		'update_item'                => __( 'Update Infographic Category', 'pa-cpt' ),
		'view_item'                  => __( 'View Infographic Category', 'pa-cpt' ),
		'separate_items_with_commas' => __( 'Separate Infographic Category with commas', 'pa-cpt' ),
		'add_or_remove_items'        => __( 'Add or remove Infographics Categories', 'pa-cpt' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pa-cpt' ),
		'popular_items'              => __( 'Popular Infographics Categories', 'pa-cpt' ),
		'search_items'               => __( 'Search Infographics Categories', 'pa-cpt' ),
		'not_found'                  => __( 'Not Found', 'pa-cpt' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite' => true
	);
	register_taxonomy( 'pa_infographics-tax', array( 'pa_infographics' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'pa_infographics_tax', 0 );

// Cria a meta_box Facebook URL
function pa_cards_metabox() {
	$screens = array( 'pa_cards' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'pa_cards_meta_box',
			'Facebook URL',
			'pa_cards_metabox_callback',
			$screen,
			'normal',
			'high'
		);	
	}
}
add_action( 'add_meta_boxes', 'pa_cards_metabox', 1 );

function pa_cards_metabox_callback( $post ) {
	wp_nonce_field( 'pa_cards_custom_metabox', 'pa_cards_custom_metabox_nonce' );
	$_pa_cards_fb_url = get_post_meta( $post->ID, '_pa_cards_fb_url', true );
	echo '<input type="url" name="_pa_cards_fb_url" value="' . esc_html( $_pa_cards_fb_url ) . '" class="widefat">';
}

function pa_cards_save_custom_metabox_data( $post_id ) {

	if ( ! isset( $_POST['pa_cards_custom_metabox_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['pa_cards_custom_metabox_nonce'], 'pa_cards_custom_metabox' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'contato' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	$_pa_cards_fb_url = isset( $_POST['_pa_cards_fb_url'] ) ? $_POST['_pa_cards_fb_url'] : null;
	update_post_meta( $post_id, '_pa_cards_fb_url', $_pa_cards_fb_url );
}
add_action( 'save_post', 'pa_cards_save_custom_metabox_data' );


// Insere o thumbnail na lista do admin
function pa_columns($columns){
	unset($columns['wpseo-score']);
	unset($columns['wpseo-title']);
	unset($columns['wpseo-metadesc']);
	unset($columns['wpseo-focuskw']);
	$columns['pa-cpt_thumbnail'] = __('Thumbnail', 'pa-cpt');
	return ($columns);
}

function pa_custom_column($column_name, $id){
	if ($column_name === 'pa-cpt_thumbnail'){
		if ( has_post_thumbnail() ) {
			echo the_post_thumbnail(array(80, 80));
		} else {
			echo '<img src="http://placehold.it/80x80"';
		}
	}	
}
add_filter('manage_pa_cards_posts_columns', 'pa_columns', 100);
add_action('manage_pa_cards_posts_custom_column', 'pa_custom_column', 5, 2);
add_filter('manage_pa_infographics_posts_columns', 'pa_columns', 100);
add_action('manage_pa_infographics_posts_custom_column', 'pa_custom_column', 5, 2);


// Inclui os arquivos de template
function include_template_files( $template ) {
	if( is_post_type_archive( 'pa_cards' ) ) { 
		$template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/theme_files/archive-cards.php';
	}

	if( is_post_type_archive( 'pa_infographics' ) ) { 
		$template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/theme_files/archive-infographic.php';
	}

	if( is_singular( 'pa_cards' ) ) {
		$template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/theme_files/single-card.php';
	}

	if( is_singular( 'pa_infographics' ) ) {
		$template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/theme_files/single-infographic.php';
	}

	if( is_singular( 'pa_cards' ) || is_post_type_archive( 'pa_cards' ) || is_singular( 'pa_infographics' ) || is_post_type_archive( 'pa_infographics' ) ) {
		wp_enqueue_style( 'cards-css', plugins_url('/static/css/style.css', __FILE__));
		wp_enqueue_script( 'masonry', 'http://masonry.desandro.com/masonry.pkgd.js', array(), '1.0.0', true );
		wp_enqueue_script( 'popup-js', plugins_url('/static/js/jquery.popupWindow.js', __FILE__), array(jquery), '1.0.0', true );
		wp_enqueue_script( 'cards-js', plugins_url('/static/js/script.js', __FILE__), array('jquery'), 1, true );
	}

	return $template;
}
add_filter( 'template_include', 'include_template_files' );


// Init sidebar
function custom_widgets_init() {

	register_sidebar( array (
		'name' => 'Cards - Single',
		'id' => 'pa_cards_single',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="">',
		'after_title' => '</h3>'
	));

	register_sidebar( array (
		'name' => 'Infographics - Single',
		'id' => 'pa_infographics_single',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="">',
		'after_title' => '</h3>'
	));
}
add_action( 'init', 'custom_widgets_init' );

function load_translation_files() {
	load_plugin_textdomain('pa-cpt', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
}
add_action('plugins_loaded', 'load_translation_files');

add_image_size( 'pa_cpt-archive', 325 );
add_image_size( 'pa_cpt-single', 650 );
add_image_size( 'pa_cpt-single-infographic', 1024 );



