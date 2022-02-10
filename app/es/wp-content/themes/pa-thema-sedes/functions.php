<?php

add_theme_support( 'post-thumbnails' );

require_once (dirname(__FILE__) . '/classes/MasterThemeController.class.php');
require_once (dirname(__FILE__) . '/classes/widgets/IASDPhotoGalleryWidget.class.php');

add_filter('enable_listadeposts', '__return_true');

function register_custom_menu() {
	register_nav_menu('100-ewg-menu',__( '100 Anos EGW' ));
	register_nav_menu('ss2015-menu',__( 'Semana Santa 2015' ));
	register_nav_menu('transmissao-menu',__( 'Transmissao' ));
	register_nav_menu('historia-educacao-menu',__( 'História da Educação' ));
}
add_action( 'init', 'register_custom_menu' );

//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');

//add sanitization for WordPress posts
add_filter( 'pre_user_description', 'wp_filter_post_kses');

add_action('init', 'add_excerpt_pages');
function add_excerpt_pages() {
	add_post_type_support( 'page', 'excerpt' );
}


if( function_exists('acf_add_options_page') ) {  
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Special Bar',
		'menu_title'	=> 'Special Bar',
		'parent_slug'	=> 'pa-adventistas',
	));
}