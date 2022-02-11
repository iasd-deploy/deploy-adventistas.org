<?php

add_theme_support( 'post-thumbnails' );

require_once (dirname(__FILE__) . '/classes/MasterThemeController.class.php');

add_filter('enable_listadeposts', '__return_true');

add_filter('embed_defaults', 'mycustom_embed_defaults');
function theme_custom_widgets_init() {
	register_sidebar( array (
		'name' => 'Página Inicial - Mapa',
		'id' => 'pagina_inicial_mapa',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));

	register_sidebar( array (
		'name' => 'Página Inicial - Apps',
		'id' => 'pagina_inicial_apps',
		'before_widget' => '<div class="widget col-md-12">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="">',
		'after_title' => '</h3>'
	));

	register_sidebar( array (
		'name' => 'Página Inicial - Icons',
		'id' => 'pagina_inicial_icons',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));

	register_sidebar( array (
		'name' => 'Página Inicial - Social',
		'id' => 'pagina_inicial_social',
		'before_widget' => '<div class="widget col-md-4">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="">',
		'after_title' => '</h3>'
	));

	register_sidebar( array (
		'name' => 'Blog - Archive',
		'id' => 'blog-archive',
		'before_widget' => '<div class="iasd-widget widget col-md-4">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="">',
		'after_title' => '</h1>'
	));

	register_sidebar( array (
		'name' => 'Blog - Single',
		'id' => 'blog-single',
		'before_widget' => '<div class="iasd-widget widget col-md-4">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="">',
		'after_title' => '</h1>'
	));
/*
	register_sidebar( array (
		'name' => 'Testemunhos - Archive',
		'id' => 'testemunhos-archive',
		'before_widget' => '<div class="iasd-widget widget col-md-4">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="">',
		'after_title' => '</h1>'
	));

	register_sidebar( array (
		'name' => 'Testemunhos - Single',
		'id' => 'testemunhos-single',
		'before_widget' => '<div class="iasd-widget widget col-md-4">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="">',
		'after_title' => '</h1>'
	));
*/
	register_sidebar( array (
		'name' => 'Pages',
		'id' => 'pages',
		'before_widget' => '<div class="iasd-widget widget col-md-4">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="">',
		'after_title' => '</h1>'
	));

	register_sidebar( array (
		'name' => 'Pages - Imprensa Lateral',
		'id' => 'pages_imprensa_lateral',
		'before_widget' => '<div class="iasd-widget widget col-md-4">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="">',
		'after_title' => '</h1>'
	));

	register_sidebar( array (
		'name' => 'Pages - Widget',
		'id' => 'pages_widget',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));

	register_sidebar( array (
		'name' => 'Pages - Widget Sidebar',
		'id' => 'pages_widget_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
} 
	
add_action( 'init', 'theme_custom_widgets_init' );


//Customize oembed size
function Oembed_youtube_no_title($html,$url,$args){
	$url_string = parse_url($url, PHP_URL_QUERY);
	parse_str($url_string, $id);
	if (isset($id['v'])) {
		return '<iframe class="oembed" src="http://www.youtube.com/embed/'.$id['v'].'?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>';
	}
	return $html;
}
add_filter('oembed_result','Oembed_youtube_no_title',10,3);


if ( ! function_exists( 'tdc_faq_cpt' ) ) {
 
// register custom post type
	function tdc_faq_cpt() {
 
		// these are the labels in the admin interface, edit them as you like
		$labels = array(
			'name'                => _x( 'FAQs', 'Post Type General Name', 'tdc_faq' ),
			'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'tdc_faq' ),
			'menu_name'           => __( 'FAQ', 'tdc_faq' ),
			'parent_item_colon'   => __( 'Parent Item:', 'tdc_faq' ),
			'all_items'           => __( 'All Items', 'tdc_faq' ),
			'view_item'           => __( 'View Item', 'tdc_faq' ),
			'add_new_item'        => __( 'Add New FAQ Item', 'tdc_faq' ),
			'add_new'             => __( 'Add New', 'tdc_faq' ),
			'edit_item'           => __( 'Edit Item', 'tdc_faq' ),
			'update_item'         => __( 'Update Item', 'tdc_faq' ),
			'search_items'        => __( 'Search Item', 'tdc_faq' ),
			'not_found'           => __( 'Not found', 'tdc_faq' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'tdc_faq' ),
		);
		$args = array(
			// use the labels above
			'labels'              => $labels,
			// we'll only need the title, the Visual editor and the excerpt fields for our post type
			'supports'            => array( 'title', 'editor'),
			// we're going to create this taxonomy in the next section, but we need to link our post type to it now
			'taxonomies'          => array( 'tdc_faq_tax' ),
			// make it public so we can see it in the admin panel and show it in the front-end
			'public'              => true,
			// show the menu item under the Pages item
			'menu_position'       => 20,
			// show archives, if you don't need the shortcode
			'has_archive'         => false,
		);
		register_post_type( 'tdc_faq', $args );
 
	}
 
	// hook into the 'init' action
	add_action( 'init', 'tdc_faq_cpt', 0 );
 
}

if ( ! function_exists( 'tdc_faq_tax' ) ) {
 
	// register custom taxonomy
	function tdc_faq_tax() {
 
		// again, labels for the admin panel
		$labels = array(
			'name'                       => _x( 'FAQ Categories', 'Taxonomy General Name', 'tdc_faq' ),
			'singular_name'              => _x( 'FAQ Category', 'Taxonomy Singular Name', 'tdc_faq' ),
			'menu_name'                  => __( 'FAQ Categories', 'tdc_faq' ),
			'all_items'                  => __( 'All FAQ Cats', 'tdc_faq' ),
			'parent_item'                => __( 'Parent FAQ Cat', 'tdc_faq' ),
			'parent_item_colon'          => __( 'Parent FAQ Cat:', 'tdc_faq' ),
			'new_item_name'              => __( 'New FAQ Cat', 'tdc_faq' ),
			'add_new_item'               => __( 'Add New FAQ Cat', 'tdc_faq' ),
			'edit_item'                  => __( 'Edit FAQ Cat', 'tdc_faq' ),
			'update_item'                => __( 'Update FAQ Cat', 'tdc_faq' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'tdc_faq' ),
			'search_items'               => __( 'Search Items', 'tdc_faq' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'tdc_faq' ),
			'choose_from_most_used'      => __( 'Choose from the most used items', 'tdc_faq' ),
			'not_found'                  => __( 'Not Found', 'tdc_faq' ),
		);
		$args = array(
			// use the labels above
			'labels'                     => $labels,
			// taxonomy should be hierarchial so we can display it like a category section
			'hierarchical'               => true,
			// again, make the taxonomy public (like the post type)
			'public'                     => true,
		);
		// the contents of the array below specifies which post types should the taxonomy be linked to
		register_taxonomy( 'tdc_faq_tax', array( 'tdc_faq' ), $args );
 
	}
 
	// hook into the 'init' action
	add_action( 'init', 'tdc_faq_tax', 0 );
 
}
 
if ( ! function_exists( 'tdc_faq_shortcode' ) ) {
 
	function tdc_faq_shortcode( $atts ) {
		extract( shortcode_atts(
				array(
					// category slug attribute - defaults to blank
					'cat' => '',
					// full content or excerpt attribute - defaults to full content
					'excerpt' => 'false',
				), $atts )
		);
		 
		$output = '';
		 
		// set the query arguments
		$query_args = array(
			// show all posts matching this query
			'posts_per_page'    =>   -1,
			// show the 'tdc_faq' custom post type
			'post_type'         =>   'tdc_faq',
			// show the posts matching the slug of the FAQ category specified with the shortcode's attribute
			'tax_query'         =>   array(
				array(
					'taxonomy'  =>   'tdc_faq_tax',
					'field'     =>   'slug',
					'terms'     =>   $cat,
				)
			),
			// tell WordPress that it doesn't need to count total rows - this little trick reduces load on the database if you don't need pagination
			'no_found_rows'     =>   true,
		);
		
		// get the posts with our query arguments
		$faq_posts = get_posts( $query_args );
		$output .= '<div class="tdc_faq panel-group" id="accordion">';
		 
		// handle our custom loop
		foreach ( $faq_posts as $post ) {
			setup_postdata( $post );
			$faq_item_title = get_the_title( $post->ID );
			$faq_item_permalink = get_permalink( $post->ID );
			$faq_item_content = apply_filters( 'the_content', get_the_content() );
			$cont ++;


			$output .= 
			'<div class="panel panel-default">
				<div class="panel-heading">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse'. $cont .'" class="collapsed">
						<h4 class="panel-title">' . $faq_item_title . '</h4>
					</a>
				</div>
				<div id="collapse'. $cont .'" class="panel-collapse collapse">
					<div class="panel-body">' . $faq_item_content . '</div>
				</div>
			</div>';
		}
		 
		wp_reset_postdata();
		 
		$output .= '</div>';
		 
		return $output;
	}
 
	add_shortcode( 'faq', 'tdc_faq_shortcode' );
 
}
 
function tdc_faq_activate() {
	tdc_faq_cpt();
	flush_rewrite_rules();
}
 
register_activation_hook( __FILE__, 'tdc_faq_activate' );
 
function tdc_faq_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'tdc_faq_deactivate' );

