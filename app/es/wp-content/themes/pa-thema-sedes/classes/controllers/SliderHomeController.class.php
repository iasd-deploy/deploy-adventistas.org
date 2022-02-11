<?php

class SliderHomeController {
	public static function CriaPostSliderHome() {
		$labels = array(
			'name' => __('Slider Home', 'pa-thema-capa'),
			'singular_name' => __('Slider Home', 'pa-thema-capa'),
			'add_new' => __('Adicionar novo', 'pa-thema-capa'),
			'add_new_item' => __('Adicionar novo Slider', 'pa-thema-capa'),
			'edit_item' => __('Editar Slider', 'pa-thema-capa'),
			'new_item' => __('Novo Slider', 'pa-thema-capa'),
			'view_item' => __('Visualizar Slider', 'pa-thema-capa'),
			'search_items' => __('Buscar Slider', 'pa-thema-capa')
		);

		$args = array(
			'label'               => 'slider_home',
			'labels'              => $labels,
			'supports'            => array( 'title','thumbnail', 'excerpt', 'revisions'),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'rewrite'             => false,
			'capability_type' => array('post', 'posts'),
			'map_meta_cap' => true,
		);

		register_post_type( 'slider_home' , $args );
	}

	public static function SavePostSliderHome($post_id) {
		$post = get_post($post_id);
		if($post->post_type == 'slider_home' ) {
			if(isset($_POST['link_veja_mais'])) {
				update_post_meta($post->ID, 'link_veja_mais', $_POST['link_veja_mais']);
			}
		}
		if($post->post_type == 'slider_home' ) {
			if(isset($_POST['slider_home_link_target'])) {
				update_post_meta($post->ID, 'slider_home_link_target', $_POST['slider_home_link_target'] );
			}
		}
		if($post->post_type == 'slider_home' ) {
			if(isset($_POST['texto_botao_veja_mais'])) {
				update_post_meta($post->ID, 'texto_botao_veja_mais', $_POST['texto_botao_veja_mais']);
			}
		}
	}

	//META BOX
	public static function AddMetaBoxSliderHome() {

		add_meta_box( 'slider_home_link_box',
			__('Link do Veja Mais', 'pa-thema-capa'),
			array(__CLASS__, 'MetaBoxSliderHomeLink'),
			'slider_home',
			'normal',
			'high'
		);

		add_meta_box( 'slider_home_link_target_box',
			__('Abrir link em', 'pa-thema-capa'),
			array(__CLASS__, 'MetaBoxSliderHomeLinkTarget'),
			'slider_home',
			'normal',
			'high'
		);


		add_meta_box( 'slider_home_title_box',
			__('Texto do Botão Veja Mais', 'pa-thema-capa'),
			array(__CLASS__, 'MetaBoxSliderHomeButtonText'),
			'slider_home',
			'normal',
			'high'
		);
	}

	public static function MetaBoxSliderHomeLink( $post ) {
		$url = get_post_meta($post->ID, 'link_veja_mais', true);
		echo '<textarea class="attachmentlinks" id="link_veja_mais" name="link_veja_mais">'.$url.'</textarea>';
	}

	public static function MetaBoxSliderHomeLinkTarget($post) {
	?>
		<select name="slider_home_link_target" id="slider_home_link_target" class="attachmentlinks">
			<option value="_self" <?php selected( get_post_meta($post->ID, "slider_home_link_target",true), "_self"); ?>><?php _e("Mesma aba", "pa-thema-capa"); ?></option>
			<option value="_blank" <?php selected( get_post_meta($post->ID, "slider_home_link_target",true), "_blank"); ?>><?php _e("Nova aba", "pa-thema-capa"); ?></option>
		</select>
			
	<?php
	}

	public static function MetaBoxSliderHomeButtonText( $post ) {
		$button_text = get_post_meta($post->ID, 'texto_botao_veja_mais', true);
		echo '<textarea class="attachmentlinks" id="texto_botao_veja_mais" name="texto_botao_veja_mais">'.$button_text.'</textarea>';
	}

}

add_action( 'init', array('SliderHomeController', 'CriaPostSliderHome') );
add_action( 'save_post', array('SliderHomeController', 'SavePostSliderHome') );
add_action( 'admin_init', array('SliderHomeController', 'AddMetaBoxSliderHome') );