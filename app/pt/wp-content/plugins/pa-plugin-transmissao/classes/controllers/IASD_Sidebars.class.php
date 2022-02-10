<?php

// Init dos Sidebars Dinamicos
class IASD_Sidebars {
	public static function registerSidebar() {
		
		global $post;
		
		$query = new WP_Query( array( 'post_type' => 'events_cpt' ) ); 
		while ( $query->have_posts() ) : $query->the_post(); 
		$slug = $post->post_name;
		$title = $post->post_title;

			register_sidebar( 
				array(
					'id'            => $slug .'-sidebar',
					'name'          => $title .' - Sidebar',
					'description'   => __( 'Sidebar de coluna completa', 'iasd' ),
					'class'         => $slug .'-sidebar',
					'before_title'  => '<h1 class="iasd-main-title">',
					'after_title'   => '</h1>',
					'before_widget' => '<div class="'. $slug .'-sidebar">',
					'after_widget'  => '</div>',
					'col_class' => 'col-md-12',
				)
			);
		endwhile; 
		wp_reset_query(); 
	}
}

add_action( 'after_setup_theme', array('IASD_Sidebars', 'registerSidebar'), 0 );
