<?php
/**
Plugin Name: PA - Transmissão
Description: Plugin que habilita a opção de trasmissão dentro do Portal Adventista.
Author: Divisão Sul Americana da IASD
Version: 0.1.0
*/

require_once 'classes/controllers/IASD_ACF.class.php';
require_once 'classes/controllers/IASD_CPT.class.php';
require_once 'classes/controllers/IASD_Menus.class.php';
require_once 'classes/controllers/IASD_RegisterFields.class.php';
require_once 'classes/controllers/IASD_Sidebars.class.php';
require_once 'classes/controllers/IASD_ThemeFiles.class.php';

load_plugin_textdomain( 'iasd', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 


/**
 * Proper way to enqueue scripts and styles
 */
function theme_name_scripts() {
	wp_enqueue_style( 'events_cpt-css', plugins_url('/pa-plugin-transmissao/theme_files/assets/css/style.css'));
}

//add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );