<?php 

remove_action('wp_head', 'wp_generator');

// Registra CSS do thema
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
	wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/assets/css/style.css');
}

// Adiciona os arquivos de tradução
add_action( 'after_setup_theme', 'my_child_theme_setup' );
function my_child_theme_setup() {
	load_child_theme_textdomain( 'coad', get_stylesheet_directory() . '/languages' );
}

function remove_menus(){
	remove_menu_page( 'link-manager.php' );
}
add_action( 'admin_menu', 'remove_menus' );

// Desativa post_types desnecessários
add_action('init', 'unregister_post_type', PHP_INT_MAX);
function unregister_post_type() {
	global $wp_post_types;

	$post_types = array(
		'projetos', 
		'contatos', 
		'lideres', 
		'testemunhos', 
		'speaker_cpt', 
		'videos_cpt', 
		'pa-post-inst', 
		'revista-adventista'
		);

	foreach ($post_types as $post_type) {
	    if ( isset( $wp_post_types[ $post_type ] ) ) {
			unset( $wp_post_types[ $post_type ] );
		}
	}
}

add_filter('IASD_RevistaAdventista_enabled', '__return_false');
add_filter('IASD_VideoGallery_enabled', '__return_false');
add_filter('IASD_ImageGallery_enabled', '__return_false');



if ( ! function_exists('videos_cpt') ) {
	// Register Custom Post Type
	function videos_cpt() {
		
		$labels = array(
			'name'                => _x( 'Videos', 'Post Type General Name', 'coad' ),
			'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'coad' ),
			'menu_name'           => __( 'Videos', 'coad' ),
			'name_admin_bar'      => __( 'Videos', 'coad' ),
			'parent_item_colon'   => __( 'Parent Video:', 'coad' ),
			'all_items'           => __( 'All Videos', 'coad' ),
			'add_new_item'        => __( 'Add New Video', 'coad' ),
			'add_new'             => __( 'Add New', 'coad' ),
			'new_item'            => __( 'New Video', 'coad' ),
			'edit_item'           => __( 'Edit Video', 'coad' ),
			'update_item'         => __( 'Update Video', 'coad' ),
			'view_item'           => __( 'View Video', 'coad' ),
			'search_items'        => __( 'Search Video', 'coad' ),
			'not_found'           => __( 'Not found', 'coad' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'coad' ),
		);
		$rewrite = array(
			'slug'                => __( 'videos', 'coad' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => 'videos-cpt',
			'description'         => __( 'Vídeos', 'coad' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'page-attributes'),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 2,
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
		register_post_type( 'videos-cpt', $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'videos_cpt', 0 );
}

add_action( 'widgets_init', 'registerSidebars' );
function registerSidebars() {

	
}

register_sidebar( array(
		'name'          => __('Front Page - Sidebar', 'coad'),
		'id'            => 'front-page-sidebar',
		'col_class' 	=> 'col-md-12',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
		'Description'	=> __('Sidebar de colunagem inteira', 'coad')
	) );