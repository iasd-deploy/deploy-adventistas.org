<?php

class ThemeController {

	public static function Init() {

		ThemeController::RegisterMenus();

		ThemeController::AddExcerptToPages();

	}

	public static function EnqueueStatics() {

	}

	public static function RegisterMenus() {

		register_nav_menus(
			array(
				'top-menu' => 'Menu Principal',
				'sub-menu' => 'Submenu (transparente)',
				'bot-menu' => 'Menu Inferior',
				'footer-menu' => 'Menu Inferior (Conteúdo)'
			)
		);

	}

	public static function SetSecaoTaxonomy( $post_ID ) {
		wp_set_object_terms( $post_ID, 'Institucional', 'xtt-pa-secao' );
	}

	public static function returnSite($classes) {
		$site = 'institucional';
		array_push($classes, $site);
		return $classes;
	}

	public static function AddExcerptToPages(){

		add_post_type_support( 'page', 'excerpt' );
	}

	public static function RemoveCssJsVer( $src ) {
		if( strpos( $src, '?ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}

	public static function HeaderClasses($classes = array()) {
		$theme =  get_option('stylesheet');
		if($theme == 'pa-thema-institucional'){
			$classes[] = 'institutional';
		}
		return $classes;
	}

}

add_action( 'init', array('ThemeController', 'Init') );
add_action('wp_enqueue_scripts',  array('ThemeController','EnqueueStatics'));

add_action( 'save_post', array('ThemeController', 'SetSecaoTaxonomy'));
add_filter( 'body_class', array('ThemeController', 'returnSite'));

add_filter( 'style_loader_src', array('ThemeController', 'RemoveCssJsVer'), 10, 2 );
add_filter( 'script_loader_src', array('ThemeController', 'RemoveCssJsVer'), 10, 2 );

add_filter( 'iasd-header', array('ThemeController', 'HeaderClasses'));

load_theme_textdomain('thema_institucional', get_template_directory() . '/languages/');
load_theme_textdomain('iasd', get_template_directory() . '/languages/');

remove_filter ('the_content', 'wpautop');

function html5_insert_image($html, $id, $caption, $title, $align, $url) {
  $html5 = "<figure>";
  $html5 .= "<img src='$url' alt='$title' />";
  $html5 .= "</figure>";
  return $html5;
}
add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );