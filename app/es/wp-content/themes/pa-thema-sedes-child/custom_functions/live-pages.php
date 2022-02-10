<?php
/*
 * Live Pages
 *
 * Modelo de página usado em Campal, Campori e demais eventos que usam transmissão ao vivo.
 * @rodrigopalheiro
 */

// Configurando ACF 
// require_once (dirname(__FILE__) . '/custom_acf/campal-live-fields.php');


// Registrando sidebars
function live_pages_init(){

	do_action('iasd_register_sidebar',
		array(	'id' => 'campal-live',
				'name' => __('Campal Live', 'iasd'),
				'col_class' => 'col-md-4', 
				'description' => __('Sidebar de colunagem completa', 'iasd')
		)
	);
	do_action('iasd_register_sidebar',
		array(	'id' => 'campal-live',
				'name' => __('Campori Live', 'iasd'),
				'col_class' => 'col-md-4', 
				'description' => __('Sidebar de colunagem completa', 'iasd')
		)	
	);
}
add_action( 'init', 'live_pages_init' );


// Adicionando scripts da página
function live_pages_scripts(){

	if( is_page_template( 'page-campori-live.php' ) ) {

		// JS
		// $src = get_template_directory_uri() . '/custom_static/real-time/js/real-time.js';
		// wp_enqueue_script( 'real-time-js', $src, array( 'jquery' ), '1.0.0', true );

		// CSS
		$src = get_stylesheet_directory_uri() . '/custom_static/campori-live/css/campori-live.css';
		wp_enqueue_style( 'live-pages-styles', $src, array( 'child-style', 'wordpress_style' ), '1.0.5', 'all' );
		
		// Inline
		$custom_style = 'body{ ';

			if( has_post_thumbnail( $post->ID ) ): 
				$custom_style .= 'background-image: url('. wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) .');';
			endif;
			if(get_field('bg_color')): 
				$custom_style .= 'background-color: url('.get_field('bg_color').');';
			endif;
			if(get_field('text_color')):
				$custom_style .= 'color: '.get_field('text_color').';';
			endif;

		$custom_style .= '}';
		$custom_style .= 'body > footer {';
			if(get_field('bg_image_footer')): 
				$custom_style .= 'background-image: url('.get_field('bg_image_footer').');';
			endif;
		$custom_style .= '}';

		wp_add_inline_style( 'live-pages-styles', $custom_style );

	}
}
add_action( 'wp_enqueue_scripts', 'live_pages_scripts' );


// Adicionando classes CSS na tag body
function live_pages_bodyclass($classes) {

	if( has_post_thumbnail( $post->ID ) && 
		is_page_template( 'page-campori-live.php' )){

		$classes[] = 'custom_bg';
	}
	return $classes;
}
add_filter( 'body_class', 'live_pages_bodyclass' );
