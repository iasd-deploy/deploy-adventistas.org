<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zico
 * Date: 19/08/2013
 * Time: 16:57
 * To change this template use File | Settings | File Templates.
 */

class InstituicoesController {
	const Taxonomy = 'pa-tax-inst';
	const PostType = 'pa-post-inst';


	public static function Init() {
		self::CreateTaxonomy();
		self::CreatePostType();
	}

	public static function PostTypeLabels() {
		$labels = array(
			'name' => __('Instituições', 'iasd'),
			'singular_name' => __('Instituição', 'iasd'),
			'add_new' => __('Adicionar nova', 'iasd'),
			'add_new_item' => __('Adicionar nova Instituição', 'iasd'),
			'edit_item' => __('Editar Instituição', 'iasd'),
			'new_item' => __('Nova Instituição', 'iasd'),
			'view_item' => __('Visualizar Instituição', 'iasd'),
			'search_items' => __('Buscar Instituição', 'iasd')
		);

		return $labels;
	}

	public static function CreatePostType() {
		//$rewrite_slug = apply_filters('InstituicoesController::PostType::Slug', 'instituicao');

		$args = array(
			'map_meta_cap' => true,
			'labels' => self::PostTypeLabels(),
			'public' => true,
			'rewrite' => array('slug' => __('instituicao', 'iasd')),
			'capability_type' => array('post', 'posts'),
			'hierarchical' => false,
			'supports' => array('title','thumbnail','revisions'),
			'has_archive' => __('instituicoes', 'iasd'),
			'taxonomies' => array(self::Taxonomy),
			'thumbnail_size' => array('620','210')
		);

		register_post_type( self::PostType, $args );
	}

	public static function TaxonomyLabels() {
		$labels = array(
			'name' => __('Tipo de Instituição', 'iasd'),
			'singular_name' => __('Instituição', 'iasd'),
			'add_new' => __('Adicionar novo', 'iasd'),
			'add_new_item' => __('Adicionar novo tipo de Instituição', 'iasd'),
			'edit_item' => __('Editar tipo de Instituição', 'iasd'),
			'new_item' => __('Novo tipo de Instituição', 'iasd'),
			'view_item' => __('Visualizar tipo de Instituição', 'iasd'),
			'search_items' => __('Buscar tipos de Instituição', 'iasd')
		);

		return $labels;
	}

	public static function CreateTaxonomy() {
		$rewrite_slug = apply_filters('InstituicoesController::Taxonomy::Slug', 'tipo-instituicao');

		$args = array(
			'labels' => self::TaxonomyLabels(),
			'public' => true,
			'rewrite' => array('slug' => $rewrite_slug),
			'hierarchical' => true,
			'show_admin_column' => true
		);

		register_taxonomy( self::Taxonomy, self::PostType, $args );
	}
	//Social Meta Bozes
	public static function MetaBoxInfo() {
		return array(
			'id' => self::PostType . '-metadata',
			'title' => __('Informações Adicioniais', 'iasd'),
			'post_type' => self::PostType,
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => __('Sigla da instituição', 'iasd'),
					'id' => 'instituicao_sigla',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => __('Endereço', 'iasd'),
					'id' => 'instituicao_endereco',
					'type' => 'text',
					'std' => '',
					'onchange' => 'geocode();'
				),
				array(
					'name' => __('Complemento', 'iasd'),
					'id' => 'instituicao_complemento',
					'type' => 'text',
					'std' => '',
					'onchange' => 'geocode();'
				),
				array(
					'name' => __('Cidade', 'iasd'),
					'id' => 'instituicao_cidade',
					'type' => 'text',
					'std' => '',
					'onchange' => 'geocode();'
				),
				array(
					'name' => __('Estado', 'iasd'),
					'id' => 'instituicao_estado',
					'type' => 'text',
					'std' => '',
					'onchange' => 'geocode();'
				),
				array(
					'name' => __('CEP', 'iasd'),
					'id' => 'instituicao_cep',
					'type' => 'text',
					'std' => '',
					'onchange' => 'geocode();'
				),
				array(
					'name' => __('Mapa', 'iasd'),
					'id' => 'instituicao_map',
					'type' => 'map',
					'std' => ''
				),
				array(
					'name' => __('Caixa Postal', 'iasd'),
					'id' => 'instituicao_postal',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => __('Telefone', 'iasd'),
					'id' => 'instituicao_tel',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => __('Fax', 'iasd'),
					'id' => 'instituicao_fax',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => __('E-mail', 'iasd'),
					'id' => 'instituicao_email',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => __('Video', 'iasd'),
					'id' => 'instituicao_video',
					'type' => 'text',
					'width' => 'auto',
					'std' => '',
					'prefix' => 'https://www.youtube.com/watch?v=',
					'help' => '<br/>Preencha apenas com o ID do vídeo do youtube'
				),
				array(
					'name' => __('Twitter', 'iasd'),
					'id' => 'instituicao_twitter',
					'type' => 'text',
					'width' => 'auto',
					'std' => '',
					'prefix' => 'http://twitter.com/',
					'help' => '<br/>Preencha apenas o nome do perfil, sem incluir o @ ou outro sinal'
				),
				array(
					'name' => __('Facebook', 'iasd'),
					'id' => 'instituicao_facebook',
					'type' => 'text',
					'width' => 'auto',
					'std' => '',
					'prefix' => 'http://facebook.com/',
					'help' => '<br/>Preencha apenas o nome do perfil, sem incluir o / ou outro sinal'
				),
				array(
					'name' => __('Website', 'iasd'),
					'id' => 'instituicao_website',
					'type' => 'text',
					'width' => '50%',
					'std' => 'http://',
					'help' => '<br/>Lembre de colocar o http:// no inicio do endereço'
				)
			)
		);
	}
	// Add meta box
	public static function SocialMetaBox() {
		$meta_box = self::MetaBoxInfo();

		add_meta_box($meta_box['id'], $meta_box['title'], array('InstituicoesController', 'SocialMetaBoxShow'), $meta_box['post_type'], $meta_box['context'], $meta_box['priority']);
	}

	public static function Nonce() {
		return wp_create_nonce(basename(__FILE__));
	}

	// Callback function to show fields in meta box
	public static function SocialMetaBoxShow($echo = true) {
		global $post;
		$meta_box = self::MetaBoxInfo();
		
		// Use nonce for verification
		$html = '';
		$html .= '<input type="hidden" name="social_meta_box_nonce" value="' . self::Nonce() . '" />';

		$html .= '<table class="form-table">';

		foreach ($meta_box['fields'] as $field) {
			// get current post meta data
			$meta = get_post_meta($post->ID, $field['id'], true);
			$onchange = (isset($field['onchange'])) ? $field['onchange'] : '';
			$width = (isset($field['width'])) ? $field['width'] : '97%';
			$meta = $meta ? $meta : $field['std'];
			$help = (isset($field['help'])) ? '<span class="description">'.$field['help'].'</span>' : '';
			$prefix = (isset($field['prefix'])) ? '<span class="description">'.$field['prefix'].'</span>' : '';

			$html .= '<tr>';
			$html .= '<th style="width:20%"><label for="' . $field['id'] . '">' . $field['name'] . '</label></th>';
			$html .= '<td>';

			switch ($field['type']) {
				case 'text':
					$html .= $prefix . '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" onchange="'.$onchange.'" size="30" style="width:'.$width.'" />'.$help.'<br />';
					break;
				case 'map':

					$html .= '<input type="hidden" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . ($meta ? $meta : $field['std']) . '" size="30" /><br />';
					ob_start();

					include get_template_directory() . '/classes/libs/location_map.php';

					$html .= ob_get_contents();
					ob_end_clean();

					break;
				case 'checkbox':
					$html .= '<input type="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" ' . ($meta ? 'checked="checked"' : '') . '/><br />';
					break;
			}
			$html .= '<td>';
			$html .= '</tr>';
		}

		$html .= '</table>';

		if($echo)
			echo $html;

		return $html;
	}

	// Save data from meta box
	public static function SocialMetaBoxSave($post_id) {
		if ( wp_is_post_autosave($post_id) || wp_is_post_revision($post_id) || !isset($_POST['social_meta_box_nonce']))
			return false;

		$meta_box = self::MetaBoxInfo();

		// verify nonce
		$nounce = (isset($_POST['social_meta_box_nonce'])) ? $_POST['social_meta_box_nonce'] : '' ;
		if (!wp_verify_nonce($nounce, basename(__FILE__))) {
			return false;
		}

		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return false;
		}

		// check permissions
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return false;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return false;
		}


		foreach ($meta_box['fields'] as $field) {
			$newValue = (isset($_POST[$field['id']])) ? $_POST[$field['id']] : false;
			if ($field['std'] == $newValue){
				$newValue = '';
			}
			update_post_meta($post_id, $field['id'], $newValue);
		}

		$endereco = get_post_meta($post_id, 'instituicao_endereco', true );

		if($complemento = get_post_meta($post_id, 'instituicao_complemento', true ))
			$endereco .= ( ($endereco) ? ', ' : '' ) . $complemento;

		if($cidade = get_post_meta($post_id, 'instituicao_cidade', true ))
			$endereco .= ( ($endereco) ? ', ' : '' ) . $cidade;

		if($estado = get_post_meta($post_id, 'instituicao_estado', true ))
			$endereco .= ( ($endereco) ? ' - ' : '' ) . $estado;

		$poboxzip = '';
		if($cep = get_post_meta($post_id, 'instituicao_cep', true ))
			$poboxzip .= __('CEP', 'iasd') . ' ' . $cep;

		if($caixapostal = get_post_meta($post_id, 'instituicao_postal', true ))
			$poboxzip .= ( ($endereco) ? ' | ' : '' ) . __('Caixa Postal', 'iasd') . ' ' . $caixapostal;

		update_post_meta($post_id, 'poboxzip', $poboxzip);

		remove_action('save_post', array('InstituicoesController', 'SocialMetaBoxSave') );
		wp_update_post(array('ID' => $post_id, 'post_excerpt' => $endereco));
		add_action('save_post', array('InstituicoesController', 'SocialMetaBoxSave') );

		return true;
	}
}

add_action('init', array('InstituicoesController', 'Init'));
add_action('admin_menu', array('InstituicoesController', 'SocialMetaBox') );
add_action('save_post', array('InstituicoesController', 'SocialMetaBoxSave') );
