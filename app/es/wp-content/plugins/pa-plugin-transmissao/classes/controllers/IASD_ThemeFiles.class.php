<?php

// Inclui os arquivos do template no tema 
class IASD_ThemeFiles {
	public static function include_template_files( $template ) {
		if( is_singular( 'events_cpt' ) ) {
			$template = WP_PLUGIN_DIR .'/pa-plugin-transmissao/theme_files/single-events.php';
		}

		if( is_singular( 'events_cpt' ) || is_post_type_archive( 'events_cpt' ) ) {
			wp_enqueue_style( 'events_cpt-css', plugins_url('/pa-plugin-transmissao/theme_files/assets/css/style.css'));
			wp_enqueue_script( 'cards-js', plugins_url('/pa-plugin-transmissao/theme_files/assets/js/script.js'), array('jquery'), 1, true );
		}

		if( is_post_type_archive( 'speaker_cpt' ) ) { 
			$template = WP_PLUGIN_DIR .'/pa-plugin-transmissao/theme_files/archive-speakers.php';
		}

		if( is_singular( 'speaker_cpt' ) ) {
			$template = WP_PLUGIN_DIR .'/pa-plugin-transmissao/theme_files/single-speakers.php';
		}

		if( is_post_type_archive( 'videos_cpt' ) ) { 
			$template = WP_PLUGIN_DIR .'/pa-plugin-transmissao/theme_files/archive-videos.php';
			wp_enqueue_style( 'events_cpt-css', plugins_url('/pa-plugin-transmissao/theme_files/assets/css/style.css'));
		}

		return $template;
	}	
}

add_filter( 'template_include', array('IASD_ThemeFiles', 'include_template_files') );


