<?php

class LideresController {
	private static $contato_metabox_configs = null;
	private static $cargo_metabox_configs = null;

	private static function contato_metabox_configs(){ 
		if ( empty( self::$contato_metabox_configs ) ){

			self::$contato_metabox_configs = array(
				'id' => 'lider_contatos_metabox',
				'title' => __( 'Dados de Contato', 'iasd' ),
				'post_type' => 'lideres',
				'context' => 'side',
				'priority' => 'core',
				'fields' => array(
					array(
						'label' => __( 'E-mail', 'iasd' ),
						'placeholder' => 'usuario@email.com.br',
						'id' => 'social-networks_email',
						'name' => 'social-networks_email',
						'type' => 'text',
						'std' => '',
					),
					array(
						'label' => __( 'Twitter', 'iasd' ),
						'placeholder' => 'http://www.twitter.com/usuario',
						'helper-text' => __( 'URL Completa', 'iasd' ),
						'id' => 'social-networks_twitter',
						'name' => 'social-networks_twitter',
						'type' => 'text',
						'std' => '',
					),
					array(
						'label' => __( 'Facebook', 'iasd' ),
						'id' => 'social-networks_facebook',
						'placeholder' => 'http://www.facebook.com/usuario',
						'helper-text' => __( 'URL Completa', 'iasd' ),
						'name' => 'social-networks_facebook',
						'type' => 'text',
						'std' => '',
					),
				)
			);
		}

		return self::$contato_metabox_configs;
	}

	private static function cargo_metabox_configs(){
		if ( empty( self::$cargo_metabox_configs ) ){

			self::$cargo_metabox_configs = array(
				'id' => 'lider_cargo_metabox',
				'title' => __( 'Cargo / Posição', 'iasd' ),
				'post_type' => 'lideres',
				'context' => 'side',
				'priority' => 'core',
				'fields' => array(
					array(
						'label' => __( 'Líder geral', 'iasd' ),
						'id' => 'cargo_lidergeral',
						'name' => 'cargo_tipo',
						'type' => 'radio',
						'value' => 'lidergeral',
						'std' => '',
					),
					array(
						'label' => __( 'Presidente', 'iasd' ),
						'id' => 'cargo_presidente',
						'name' => 'cargo_tipo',
						'type' => 'radio',
						'value' => 'presidente',
						'std' => '',
					),
					array(
						'label' => __( 'Tesoureiro', 'iasd' ),
						'id' => 'cargo_tesoureiro',
						'name' => 'cargo_tipo',
						'type' => 'radio',
						'value' => 'tesoureiro',
						'std' => '',
					),
					array(
						'label' => __( 'Secretário', 'iasd' ),
						'id' => 'cargo_secretario',
						'name' => 'cargo_tipo',
						'type' => 'radio',
						'value' => 'secretario',
						'std' => '',
					),
		
					array(
						'label' => __( 'Departamental', 'iasd' ),
						'id' => 'cargo_departamental',
						'name' => 'cargo_tipo',
						'type' => 'radio',
						'value' => 'departamental',
						'std' => '',
					),
					array(
						'label' => __( 'Outro', 'iasd' ),
						'id' => 'cargo_outro',
						'name' => 'cargo_tipo',
						'type' => 'radio',
						'value' => 'outro',
						'std' => '',
					),
					array(
						'label' => __( 'Título', 'iasd' ),
						'helper-text' => __( 'Cargo / Departamento / Função', 'iasd' ),
						'id' => 'cargo_titulo',
						'name' => 'cargo_titulo',
						'type' => 'text',
						'std' => '',
					),
				)
			);
		}

		return self::$cargo_metabox_configs;
	}

	public static function init() {
		self::create_post_type();
	}

	private static function create_post_type() {
		$labels = array(
			'name' => __( 'Líderes', 'iasd' ),
			'singular_name' => __( 'Líder', 'iasd' ),
			'add_new' => __( 'Adicionar novo', 'iasd' ),
			'add_new_item' => __( 'Adicionar novo Líder', 'iasd' ),
			'edit_item' => __( 'Editar Líder', 'iasd' ),
			'new_item' => __( 'Novo Líder', 'iasd' ),
			'view_item' => __( 'Visualizar Líder', 'iasd' ),
			'search_items' => __( 'Buscar Líder', 'iasd' ),
		);

		$args = array(
			'map_meta_cap' => true,
			'labels' => $labels,
			'public' => true,
			'rewrite' => array('slug' => __('lider', 'iasd')),
			'capability_type' => array('page', 'posts'),
			'hierarchical' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'revisions' ),
			'has_archive' => __('lideres', 'iasd'),
		);

		register_post_type( 'lideres' , $args );
	}


	private static function metabox_save( $post_id, $nounce, $fields ){
		if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) || ! isset( $_POST[$nounce] ) ){
			return false;
		}
			
		// verify nonce
		$nounce = ( isset( $_POST[$nounce] ) ) ? $_POST[$nounce] : '' ;
		if ( ! wp_verify_nonce( $nounce, basename( __FILE__ ) ) ) {
			return $post_id;
		}

		// check autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// check permissions
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		foreach ( $fields as $field ) {
			$new = ( isset( $_POST[$field['name']] ) ) ? $_POST[$field['name']] : false;

			update_post_meta( $post_id, $field['name'], $new );
		}		
	}

	private static function metabox_render( $nounce, $fields ) {
		global $post;

		//should be moved to a css file...
		echo '<style>.howto { display: inline-block; font-size:11px; vertical-align: middle; margin-left: 10px; }</style>';

		echo '<input type="hidden" name="'.$nounce.'" value="', wp_create_nonce( basename( __FILE__ ) ), '" />';
		echo '<table class="form-table">';

		foreach ( $fields as $field ) {
			
			// get current post meta data
			$meta = get_post_meta( $post->ID, $field['name'], true );
			
			if ($field['name'] == 'cargo_tipo') {
				$cargo_cb = get_post_meta( $post->ID, 'cargo_tipo', true );
			}


			//compatibilidade com legado v1.0.0
			if ( empty( $meta ) && $field['name'] == 'cargo_titulo' ){
				$meta = get_post_meta( $post->ID, 'iasd_cargo', true );
			}

			echo '<tr>';

			switch ( $field['type'] ) {
				case 'text':
					echo '<td><label for="', $field['id'], '">', $field['label'], '</label>';
					if ( ! empty( $field['helper-text'] ) ) echo '<span class="howto">('.$field['helper-text'].')</span>';
					$placeholder = ( ! empty( $field['placeholder'] ) ) ? 'placeholder="'. $field['placeholder'] . '"' : '';
					echo '<br/><input type="text" name="', $field['name'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '"', $placeholder,' style="width:97%" /></td>';
				break;
				
				case 'radio':
					echo '<td style="padding: 0"><label for="', $field['id'], '"><input type="radio" name="', $field['name'], '" id="', $field['id'], '" ', ( ($field['id'] == 'cargo_departamental' && !$cargo_cb) || $cargo_cb == $field['value']) ? 'checked="checked"' : '', ' value="', $field['value'] ,'" />', $field['label'], '</label></td>';
				break;
			}
			
			echo '</tr>';
		}

		echo '</table>';
	}	

	/*******************/
	/* METABOX CONTATO */
	/*******************/

	// Add meta box
	public static function contato_metabox() {
		$configs = self::contato_metabox_configs();

		add_meta_box(
			$configs['id'], 
			$configs['title'], 
			array( 'LideresController', 'contato_metabox_render' ), 
			$configs['post_type'],
			$configs['context'],
			$configs['priority']
		);
	}

	public static function contato_metabox_render(){
		$configs = self::contato_metabox_configs();
		self::metabox_render( 'contato_metabox_nonce', $configs['fields'] );
	}

	public static function contato_metabox_save( $post_id ) {
		$configs = self::contato_metabox_configs();			
		return self::metabox_save( $post_id, 'contato_metabox_nonce', $configs['fields'] );
	}


	/*****************/
	/* METABOX CARGO */
	/*****************/

	public static function cargo_metabox(){
		$configs = self::cargo_metabox_configs();

		add_meta_box(
			$configs['id'], 
			$configs['title'], 
			array( 'LideresController', 'cargo_metabox_render' ), 
			$configs['post_type'],
			$configs['context'],
			$configs['priority']
		);
	}

	public static function cargo_metabox_render(){
		$tipoSite = FlavoursController::is_headquarter() ? 'Sede Regional' : 'Departamento';
		echo '<div>Tipo de site: '.$tipoSite.'</div>'; 
		echo '<script type="text/javascript">window.is_headquarter='.(FlavoursController::is_headquarter() ? 'true' : 'false') .';</script>';

		$configs = self::cargo_metabox_configs();
		self::metabox_render( 'cargo_metabox_nonce', $configs['fields'] );

		wp_enqueue_script( 'admin_lideres', get_template_directory_uri() . '/static/js/admin_lideres.js', array('jquery'), '1.0.0', true );

	}

	public static function cargo_metabox_save( $post_id ) {
		$configs = self::cargo_metabox_configs();			
		return self::metabox_save( $post_id, 'cargo_metabox_nonce', $configs['fields'] );
	}

	public static function get_cargo( $post_id ){
		$tipo = get_post_meta( $post_id, 'cargo_tipo', true );
		switch ( $tipo ) {
			case 'presidente':
				$cargo = __( 'Presidente', 'iasd' );
				break;
			case 'secretario':
				$cargo = __( 'Secretário', 'iasd' );
				break;
			case 'tesoureiro':
				$cargo = __( 'Tesoureiro', 'iasd' );
				break;
			default:

				$cargo = get_post_meta( $post_id, 'cargo_titulo', true );

				// manutenção de compatibilidade com lideres v1.0.0
				if ( empty( $cargo ) ){
					$cargo = get_post_meta( $post_id, 'iasd_cargo', true );
				}
				break;
		}

		return $cargo;
	}

}

add_action( 'init', array( 'LideresController', 'init' ) );
add_action( 'admin_menu', array( 'LideresController', 'cargo_metabox' ) );
add_action( 'admin_menu', array( 'LideresController', 'contato_metabox' ) );
add_action( 'save_post', array( 'LideresController', 'cargo_metabox_save' ) );
add_action( 'save_post', array( 'LideresController', 'contato_metabox_save' ) );
