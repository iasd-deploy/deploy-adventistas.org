<?php

//Inclui o ACF no plugin para os campos personalizados
class IASD_ACF {

	public static function init(){
		if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
			add_filter('acf/settings/path', array('IASD_ACF', 'acf_settings_path') );
			add_filter('acf/settings/dir', array('IASD_ACF', 'acf_settings_dir') );
		}
	}

	public static function acf_settings_path( $path ) {
		$path = WP_PLUGIN_DIR . '/pa-plugin-transmissao/advanced-custom-fields-pro/';
		return $path; 
	}

	public static function acf_settings_dir( $dir ) {
 		$dir = plugin_dir_url( __FILE__ ) . '../../advanced-custom-fields-pro/';
		return $dir;
	}
}

//add_filter('acf/settings/show_admin', '__return_false');

include_once( WP_PLUGIN_DIR . '/pa-plugin-transmissao/advanced-custom-fields-pro/acf.php' );

add_action( 'admin_init', array('IASD_ACF', 'init') );
