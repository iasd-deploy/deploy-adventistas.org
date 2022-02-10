<?php 
/*
ACF Support
Description: Configurando o ACF para o tema.
Author: UCB - Rodrigo Palheiro
Version: 1.0
Text Domain: iasd
*/

add_filter('acf/settings/path', 'acf_settings_path');
function acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/libs/acf/';
    return $path;
}
 
add_filter('acf/settings/dir', 'acf_settings_dir');
function acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/libs/acf/';
    return $dir;
}
 
add_filter('acf/settings/show_admin', '__return_true');

include_once( get_stylesheet_directory() . '/libs/acf/acf.php' );
include_once( get_stylesheet_directory() . '/libs/acf-sidebar-selector-field/acf-sidebar_selector.php' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Opções do Site',
		'menu_title'	=> 'Opções do Site',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Opções de Gerais',
		'menu_title'	=> 'Opções de Gerais',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}