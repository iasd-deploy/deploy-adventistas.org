<?php

require_once 'controllers/LideresController.class.php';
require_once 'controllers/ContatosController.class.php';
require_once 'controllers/ProjetosController.class.php';
require_once 'controllers/TestemunhosController.class.php';
require_once 'controllers/FlavoursController.class.php';
require_once 'controllers/SliderHomeController.class.php';
require_once 'controllers/InstituicoesController.class.php';
require_once 'controllers/PrayerRequestController.class.php';

add_filter('IASD_VideoGallery_enabled', '__return_false');

class MasterThemeController {

	public static function SetSecaoTaxonomy( $post_ID ) {
		wp_set_object_terms( $post_ID, 'Institucional', 'xtt-pa-secao' );
	}

	public static function returnSite($classes) {
		$site = 'iasd-institucional';
		array_push($classes, $site);
		return $classes;
	}

	public static function custom_menu_order($menu_ord) {
		if (!$menu_ord) return true;

		return array(
			'index.php',
			'separator1',
			'edit.php',
			'edit.php?post_type=projetos',
			'edit.php?post_type=contatos',
			'edit.php?post_type=qa_faqs',
			'edit.php?post_type=pa_image_gallery',
			'edit.php?post_type=lideres',
			'edit.php?post_type=colunas',
			'edit.php?post_type=testemunhos',
			'edit.php?post_type=page',
			'link-manager.php',
		);
	}

	public static function PostTypeLink( $post_link, $post = null, $leavename = null, $sample = null )
	{
		if(is_null($post)) {
			$object = get_queried_object();
			if(get_class($object) == 'WP_Post')
				$post = $object;
		}
		if($post) {
			if ( $post->post_type == PAImageGallery::$post_type_name ) {
				$terms = wp_get_object_terms($post->ID, PATaxonomias::TAXONOMY_PROJETOS);
				if(!$terms)
					$terms = array();
				$term = reset($terms);
				if($term) {
					$args = array('tax_query' => array(), 'post_type' => 'projetos');
					$args['tax_query'][] = array('taxonomy' => PATaxonomias::TAXONOMY_PROJETOS, 'field' => 'id', 'terms' => $term->term_id);
					$projetos = new WP_Query($args);
					if(count($projetos->posts)) {
						$projeto = reset($projetos->posts);
						$post_link = str_replace( '%projeto%', $projeto->post_name, $post_link );
					}
				}
			} else if( $post->post_type == 'projetos' ) {
				$post_link = str_replace( '%projeto%', $post->post_name, $post_link );
			}
		}
		if(strpos($post_link, ProjetosController::SingleSlug() . '/%projeto%/'))
			$post_link = str_replace( ProjetosController::SingleSlug() . '/%projeto%/', '', $post_link );


		return $post_link;
	}

	public static function DefaultSidebar($name, $id, $description) {
			register_sidebar(array(
				'name' => $name,
				'id' => $id,
				'description' => $description,
				'before_widget' => '
<div class="iasd-widget row-fluid sidebar-'.$id.'">
	<div class="span12">
',
				'after_widget' => '
		</div>
	</div>
',
				'before_title' => '<h1>',
				'after_title' => '</h1>',
			));
	}

	public static function MasterRegisterSidebar(){
		// do_action('iasd_register_sidebar', array('id' => 'galeria-de-imagens-topo',		'name' => __('Galeria de imagens - Topo', 'iasd'), 		    'col_class' => 'col-md-8',  'description' => __('Sidebar de colunagem 2/3', 'iasd')));
		do_action('iasd_register_sidebar', array('id' => 'galeria-de-imagens-lateral',  'name' => __('Galeria de imagens', 'iasd'),       			'col_class' => 'col-md-4',  'description' => __('Sidebar de colunagem 1/3', 'iasd')));
		do_action('iasd_register_sidebar', array('id' => 'front-page',           		'name' => __('Página Inicial', 'iasd'),        				'col_class' => 'col-md-12', 'description' => __('Sidebar de colunagem completa', 'iasd')));
		do_action('iasd_register_sidebar', array('id' => 'single-testemunhos',   		'name' => __('Testemunho', 'iasd'),            				'col_class' => 'col-md-4'));
		do_action('iasd_register_sidebar', array('id' => 'page',                 		'name' => __('Páginas Estáticas', 'iasd'),     				'col_class' => 'col-md-4'));
		do_action('iasd_register_sidebar', array('id' => 'blog',                 		'name' => __('Blog', 'iasd'),                  				'col_class' => 'col-md-4'));
		do_action('iasd_register_sidebar', array('id' => 'blog-100-diasd-de-oracao',	'name' => __('Blog - 100 dias de oração', 'iasd'),			'col_class' => 'col-md-4'));
		do_action('iasd_register_sidebar', array('id' => 'prayer-requests',      		'name' => __('Pedidos de Oração', 'iasd'),                  'col_class' => 'col-md-4'));
		do_action('iasd_register_sidebar', array('id' => 'archive-instituicao',  		'name' => __('Lista de Instituições', 'iasd'), 				'col_class' => 'col-md-12'));
		do_action('iasd_register_sidebar', array('id' => 'sidebar-full',  				'name' => __('Página - Sidebar full', 'iasd'), 				'col_class' => 'col-md-12', 'description' => __('Sidebar de colunagem completa p/ página', 'iasd')));
		
		$projetos = query_posts( array('post_type' => 'projetos') );
			foreach($projetos as $projeto) {
				$slug = $projeto->post_name;
				do_action('iasd_register_sidebar', array(
					'id' => 'projeto-'.$slug,
					'name' => __('Projeto '.$projeto->post_title.'', 'iasd'),
					'col_class' => 'col-md-12')
				);
			}
			wp_reset_query();
	}

	public static function LateInit() {
		global $wp_post_types;
		$wp_post_types['post']->label = __('Blog', 'iasd');
	}

	public static function RegisterMenus() {
		register_nav_menus(
			array(
				'menu-principal' => __( 'Menu Principal', 'iasd' ),
			)
		);
	}

	public static function RemoveCssJsVer( $src ) {
		if( strpos( $src, '?ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}

	public static function limit_posts_per_page( $posts_per_page ) {
		global $wp_query;
		if(isset($wp_query->query_vars['post_type'])) {
			if($wp_query->query_vars['post_type'] == 'projetos') {
				return -1;
			} elseif($wp_query->query_vars['post_type'] == 'lideres') {
				return -1;
			}
		}
		return $posts_per_page;
	}

}

load_theme_textdomain('iasd', get_template_directory() . '/languages/');

add_filter('custom_menu_order', array('MasterThemeController', 'custom_menu_order'));
add_filter('menu_order', array('MasterThemeController', 'custom_menu_order'));

add_action( 'save_post', array('MasterThemeController', 'SetSecaoTaxonomy'));
add_filter( 'body_class', array('MasterThemeController', 'returnSite'));

add_filter('post_type_link', array('MasterThemeController', 'PostTypeLink'), 100, 4 );
add_filter('post_type_archive_link', array('MasterThemeController', 'PostTypeLink'), 100);

add_action( 'init', array('MasterThemeController', 'RegisterMenus') );
add_action( 'init', array('MasterThemeController', 'LateInit'), 100);
add_action( 'init', array('MasterThemeController', 'MasterRegisterSidebar'));

add_filter( 'style_loader_src', array('MasterThemeController', 'RemoveCssJsVer'), 10, 2 );
add_filter( 'script_loader_src', array('MasterThemeController', 'RemoveCssJsVer'), 10, 2 );

add_filter('pre_option_posts_per_page', array('MasterThemeController', 'limit_posts_per_page'));


