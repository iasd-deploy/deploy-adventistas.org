<?php


// Registra novos menus
register_nav_menus( array(
	'principal-menu' => __('IE - Menu Principal', 'impacto')
) );


// Adiciona os arquivos de tradução
add_action( 'after_setup_theme', 'my_child_theme_setup' );
function my_child_theme_setup() {
	load_child_theme_textdomain( 'impacto', get_stylesheet_directory() . '/languages' );
}

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
		'slider_home',
		'revista-adventista'
		);

	foreach ($post_types as $post_type) {
	    if ( isset( $wp_post_types[ $post_type ] ) ) {
			unset( $wp_post_types[ $post_type ] );
		}
	}
}

// Registra novas sidebars
//add_action( 'init', 'RegisterIESidebar');
function RegisterIESidebar(){
	do_action('iasd_register_sidebar', 
			array(
				'id' => 'viva-sidebar',
				'name' => __('Viva com Esperança - Sidebar', 'impacto'),
				'col_class' => 'col-md-4',
				'description' => __('Sidebar de colunagem 1/3', 'impacto')
				)
			);

	do_action('iasd_register_sidebar', 
			array(
				'id' => 'a-verdade-sidebar',
				'name' => __('DVD A Verdade - Sidebar', 'impacto'),
				'col_class' => 'col-md-4',
				'description' => __('Sidebar de colunagem 1/3', 'impacto')
				)
			);

	do_action('iasd_register_sidebar', 
			array(
				'id' => 'feira-sidebar',
				'name' => __('Feira de Saúde - Sidebar', 'impacto'),
				'col_class' => 'col-md-4',
				'description' => __('Sidebar de colunagem 1/3', 'impacto')
				)
			);

	do_action('iasd_register_sidebar', 
			array(
				'id' => 'mexase-sidebar',
				'name' => __('Mexa-se Pela Vida - Sidebar', 'impacto'),
				'col_class' => 'col-md-4',
				'description' => __('Sidebar de colunagem 1/3', 'impacto')
				)
			);	
}

add_action( 'widgets_init', 'registerSidebars' );
function registerSidebars() {

	register_sidebar( array(
		'name'          => __('Viva com Esperança - Sidebar', 'impacto'),
		'id'            => 'viva-sidebar',
		'col_class' 	=> 'col-md-4',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
		'Description'	=> __('Sidebar de colunagem 1/3', 'impacto')
	) );

	register_sidebar( array(
		'name'          => __('Passos que Salvam - Sidebar', 'impacto'),
		'id'            => 'passos-que-salvam-sidebar',
		'col_class' 	=> 'col-md-4',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
		'Description'	=> __('Sidebar de colunagem 1/3', 'impacto')
	) );

	register_sidebar( array(
		'name'          => __('Feira de Saúde - Sidebar', 'impacto'),
		'id'            => 'feira-sidebar',
		'col_class' 	=> 'col-md-4',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
		'Description'	=> __('Sidebar de colunagem 1/3', 'impacto')
	) );

	register_sidebar( array(
		'name'          => __('Mexa-se Pela Vida - Sidebar', 'impacto'),
		'id'            => 'mexase-sidebar',
		'col_class' 	=> 'col-md-4',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
		'Description'	=> __('Sidebar de colunagem 1/3', 'impacto')
	) );

	register_sidebar( array(
		'name'          => __('Home Sidebar - Sidebar', 'impacto'),
		'id'            => 'sidebar-sidebar',
		'col_class' 	=> 'col-md-12',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
		'Description'	=> __('Sidebar de colunagem 1/3', 'impacto')
	) );

	register_sidebar( array(
		'name'          => __('Oi todo dia - Sidebar', 'impacto'),
		'id'            => 'oi-todo-dia-sidebar',
		'col_class' 	=> 'col-md-12',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
		'Description'	=> __('Sidebar de colunagem Full', 'impacto')
	) );

	register_sidebar( array(
		'name'          => __('Single Vídeos - Sidebar', 'impacto'),
		'id'            => 'single_videos-sidebar',
		'col_class' 	=> 'col-md-4',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
		'Description'	=> __('Sidebar de colunagem 1/3', 'impacto')
	) );

	register_sidebar( array(
		'name'          => __('Single Histórias de Esperança - Sidebar', 'impacto'),
		'id'            => 'single_historias-sidebar',
		'col_class' 	=> 'col-md-4',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
		'Description'	=> __('Sidebar de colunagem 1/3', 'impacto')
	) );

}

// Registra CSS do thema
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'ie-css', get_stylesheet_directory_uri() . '/static/css/css.css');
    wp_enqueue_style( 'gallery-css', get_stylesheet_directory_uri() . '/static/css/bootstrap-image-gallery.min.css');
}

if ( ! function_exists('a_verdade_cpt') ) {
	// Register Custom Post Type
	function a_verdade_cpt() {
		
		$labels = array(
			'name'                => _x( 'Videos', 'Post Type General Name', 'impacto' ),
			'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'impacto' ),
			'menu_name'           => __( 'DVD - A Verdade', 'impacto' ),
			'name_admin_bar'      => __( 'Videos', 'impacto' ),
			'parent_item_colon'   => __( 'Parent Video:', 'impacto' ),
			'all_items'           => __( 'All Videos', 'impacto' ),
			'add_new_item'        => __( 'Add New Video', 'impacto' ),
			'add_new'             => __( 'Add New', 'impacto' ),
			'new_item'            => __( 'New Video', 'impacto' ),
			'edit_item'           => __( 'Edit Video', 'impacto' ),
			'update_item'         => __( 'Update Video', 'impacto' ),
			'view_item'           => __( 'View Video', 'impacto' ),
			'search_items'        => __( 'Search Video', 'impacto' ),
			'not_found'           => __( 'Not found', 'impacto' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'impacto' ),
		);
		$rewrite = array(
			'slug'                => __( 'dvd-a-verdade/videos', 'impacto' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => 'a_verdade-cpt',
			'description'         => __( 'A Verdade', 'impacto' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'comments'),
			'hierarchical'        => false,
			'public'              => true,
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
		register_post_type( 'a_verdade-cpt', $args );

	}
	// Hook into the 'init' action
	//add_action( 'init', 'a_verdade_cpt', 0 );
}

if ( ! function_exists('videos_feira_cpt') ) {
	// Register Custom Post Type
	function videos_feira_cpt() {
		
		$labels = array(
			'name'                => _x( 'Videos', 'Post Type General Name', 'impacto' ),
			'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'impacto' ),
			'menu_name'           => __( 'Videos - Feira de Saúde', 'impacto' ),
			'name_admin_bar'      => __( 'Videos', 'impacto' ),
			'parent_item_colon'   => __( 'Parent Video:', 'impacto' ),
			'all_items'           => __( 'All Videos', 'impacto' ),
			'add_new_item'        => __( 'Add New Video', 'impacto' ),
			'add_new'             => __( 'Add New', 'impacto' ),
			'new_item'            => __( 'New Video', 'impacto' ),
			'edit_item'           => __( 'Edit Video', 'impacto' ),
			'update_item'         => __( 'Update Video', 'impacto' ),
			'view_item'           => __( 'View Video', 'impacto' ),
			'search_items'        => __( 'Search Video', 'impacto' ),
			'not_found'           => __( 'Not found', 'impacto' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'impacto' ),
		);
		$rewrite = array(
			'slug'                => __( 'feira-de-saude/videos', 'impacto' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => 'feira_videos-cpt',
			'description'         => __( 'Feira de Saúde - Vídeos', 'impacto' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'comments'),
			'hierarchical'        => false,
			'public'              => true,
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
		register_post_type( 'feira_videos-cpt', $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'videos_feira_cpt', 0 );
}

if ( ! function_exists('books_cpt') ) {
	// Register Custom Post Type
	function books_cpt() {

		$labels = array(
			'name'                => _x( 'Books', 'Post Type General Name', 'impacto' ),
			'singular_name'       => _x( 'Book', 'Post Type Singular Name', 'impacto' ),
			'menu_name'           => __( 'Books', 'impacto' ),
			'name_admin_bar'      => __( 'Books', 'impacto' ),
			'parent_item_colon'   => __( 'Parent Book:', 'impacto' ),
			'all_items'           => __( 'All Boooks', 'impacto' ),
			'add_new_item'        => __( 'Add New Book', 'impacto' ),
			'add_new'             => __( 'Add New', 'impacto' ),
			'new_item'            => __( 'New Book', 'impacto' ),
			'edit_item'           => __( 'Edit Book', 'impacto' ),
			'update_item'         => __( 'Update Book', 'impacto' ),
			'view_item'           => __( 'View Book', 'impacto' ),
			'search_items'        => __( 'Search Book', 'impacto' ),
			'not_found'           => __( 'Not found', 'impacto' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'impacto' ),
		);
		$rewrite = array(
			'slug'                => __( 'livros', 'impacto' ),
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => 'books_cpt',
			'description'         => __( 'Post Type Description', 'impacto' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'revisions', 'page-attributes' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-book-alt',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
		);
		register_post_type( 'books_cpt', $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'books_cpt', 0 );
}

if ( ! function_exists('photos_cpt') ) {
	function photos_cpt() {

		$labels = array(
			'name'                => _x( 'Photos', 'Post Type General Name', 'impacto' ),
			'singular_name'       => _x( 'Photo', 'Post Type Singular Name', 'impacto' ),
			'menu_name'           => __( 'Photos', 'impacto' ),
			'name_admin_bar'      => __( 'Photos', 'impacto' ),
			'parent_item_colon'   => __( 'Parent Photo:', 'impacto' ),
			'all_items'           => __( 'All Photos', 'impacto' ),
			'add_new_item'        => __( 'Add New Photo', 'impacto' ),
			'add_new'             => __( 'Add New', 'impacto' ),
			'new_item'            => __( 'New Photo', 'impacto' ),
			'edit_item'           => __( 'Edit Photo', 'impacto' ),
			'update_item'         => __( 'Update Photo', 'impacto' ),
			'view_item'           => __( 'View Photo', 'impacto' ),
			'search_items'        => __( 'Search Photo', 'impacto' ),
			'not_found'           => __( 'Not found', 'impacto' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'impacto' ),
		);
		$args = array(
			'label'               => 'photo_cpt',
			'description'         => __( 'Post Type Description', 'impacto' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => false,
			'capability_type'     => 'page',
		);
		register_post_type( 'photo_cpt', $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'photos_cpt', 0 );
}

if ( ! function_exists('project_cpt') ) {

// Register Custom Post Type
function project_cpt() {

	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'impacto' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'impacto' ),
		'menu_name'           => __( 'Projects', 'impacto' ),
		'name_admin_bar'      => __( 'Projects', 'impacto' ),
		'parent_item_colon'   => __( 'Parent Project:', 'impacto' ),
		'all_items'           => __( 'All Projects', 'impacto' ),
		'add_new_item'        => __( 'Add New Project', 'impacto' ),
		'add_new'             => __( 'Add New', 'impacto' ),
		'new_item'            => __( 'New Project', 'impacto' ),
		'edit_item'           => __( 'Edit Project', 'impacto' ),
		'update_item'         => __( 'Update Project', 'impacto' ),
		'view_item'           => __( 'View Project', 'impacto' ),
		'search_items'        => __( 'Search Project', 'impacto' ),
		'not_found'           => __( 'Not found', 'impacto' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'impacto' ),
	);
	$args = array(
		'label'               => 'project_cpt',
		'description'         => __( 'Post Type Description', 'impacto' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-schedule',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'project_cpt', $args );

}

// Hook into the 'init' action
add_action( 'init', 'project_cpt', 0 );

}

// Insere o thumbnail na lista do admin
function photos_cptColumns($columns){
	$columns['photo_cpt_thumbnail'] = __('Foto', 'impacto');
	return ($columns);
}

function photos_cptCustomColumn($column_name, $id){
	if ($column_name === 'photo_cpt_thumbnail') {
		if ( has_post_thumbnail() ) {
			echo the_post_thumbnail(array(80, 80));
		} else {
			echo '<img src="http://placehold.it/80x80"';
		}
	}	
}
add_filter('manage_photo_cpt_posts_columns', 'photos_cptColumns', 5);
add_action('manage_photo_cpt_posts_custom_column', 'photos_cptCustomColumn', 5, 2);

add_action( 'after_setup_theme', 'custom_thumbs' );
function custom_thumbs() {
	add_image_size( 'thumb_100x150', 100, 150, true ); // (cropped)
	add_image_size( 'thumb_300x450', 300, 450, true ); // (cropped)
}

function remove_menus(){
	remove_menu_page( 'link-manager.php' );
}
add_action( 'admin_menu', 'remove_menus' );

add_filter('IASD_RevistaAdventista_enabled', '__return_false');
add_filter('IASD_VideoGallery_enabled', '__return_false');
add_filter('IASD_ImageGallery_enabled', '__return_false');
