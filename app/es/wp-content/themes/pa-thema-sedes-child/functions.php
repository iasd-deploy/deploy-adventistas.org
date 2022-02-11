<?php
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style')  );
}

add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;
function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>';
    return $return;
}


// Advanced Custom Field Support
// require_once (dirname(__FILE__) . '/libs/acf/init.php');

// Live Pages
require_once (dirname(__FILE__) . '/custom_functions/live-pages.php');





// Tempo Real 
require_once (dirname(__FILE__) . '/custom_acf/tempo-real-fields.php');
do_action('iasd_register_sidebar', 
	array(	'id' => 'minuto-a-minuto',
			'name' => __('Tempo Real', 'iasd'),
			'col_class' => 'col-md-12',
			'description' => __('Sidebar de colunagem 1/3', 'iasd')
	)
);

// Jetpack Galleries
if ( ! isset( $content_width ) ) {
    $content_width = 960;
}


// Special Pages
require_once (dirname(__FILE__) . '/custom_acf/special-pages-fields.php');
