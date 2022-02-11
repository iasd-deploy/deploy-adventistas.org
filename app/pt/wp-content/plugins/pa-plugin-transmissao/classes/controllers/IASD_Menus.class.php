<?php

// Init dos Sidebars Dinamicos
class IASD_Menus {
	public static function registerMenus() {
		global $post;
		$query = new WP_Query( array( 'post_type' => 'events_cpt' ) ); 
		while ( $query->have_posts() ) : $query->the_post(); 
			$slug = $post->post_name;
			$title = $post->post_title;
			register_nav_menu( $slug .'-menu', __('Event Menu', 'iasd').' - '. $title );
		endwhile; 
		wp_reset_query(); 
	}
}

add_action( 'after_setup_theme', array('IASD_Menus', 'registerMenus'), 0 );
