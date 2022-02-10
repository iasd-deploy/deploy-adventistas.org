<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sidferreira
 * Date: 31/01/2013
 * Time: 11:03
 * To change this template use File | Settings | File Templates.
 */

class ProjetosController {

    public static function Init() {

        self::CreatePostType();

    }

	public static function AdminMenu() {
		register_setting('general', 'asf_projeto_permalink_single');
		register_setting('general', 'asf_projeto_permalink_archive');
		add_settings_section('ass_permalinks_projetos', __('Projetos', 'thema_depto'), array('ProjetosController', 'ASSPermalinks'), 'general');
		add_settings_field('asf_projeto_permalink_single', __('Single', 'thema_depto'), array('ProjetosController', 'ASFPermalinks'), 'general', 'ass_permalinks_projetos', 'single');
		add_settings_field('asf_projeto_permalink_archive', __('Archive', 'thema_depto'), array('ProjetosController', 'ASFPermalinks'), 'general', 'ass_permalinks_projetos', 'archive');
	}
	public static function ASSPermalinks() {
		echo '<p>' . __('Use os campos abaixo para configurar os permalinks relacionados aos projetos dos departamentos', 'thema_depto') . '</p>';
	}
	public static function ASFPermalinks($type) {
		switch ($type) {
			case 'single':
				echo '<input name="asf_projeto_permalink_single" id="asf_projeto_permalink_single" type="input" value="'. self::SingleSlug() .'" class="code"  />';
				break;
			case 'archive':
				echo '<input name="asf_projeto_permalink_archive" id="asf_projeto_permalink_archive" type="input" value="'. self::ArchiveSlug() .'" class="code"  />';
				break;
		}
	}
	public static function SingleSlug() {
		return get_option('asf_projeto_permalink_single', 'projeto');
	}
	public static function ArchiveSlug() {
		return get_option('asf_projeto_permalink_archive', 'projetos');
	}

    public static function CreatePostType() {
        $labels = array(
            'name' => __('Projetos', 'thema_deptos'),
            'singular_name' => __('Projetos', 'thema_deptos'),
            'add_new' => __('Adicionar novo', 'thema_deptos'),
            'add_new_item' => __('Adicionar novo projetos', 'thema_deptos'),
            'edit_item' => __('Editar projetos', 'thema_deptos'),
            'new_item' => __('Novo projetos', 'thema_deptos'),
            'view_item' => __('Visualizar projetos', 'thema_deptos'),
            'search_items' => __('Buscar projetos', 'thema_deptos')
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'rewrite' => array('slug' => self::SingleSlug()),
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array('title','editor','thumbnail'),
			'has_archive' => self::ArchiveSlug()
        );

        register_post_type( 'projetos' , $args );
    }

    public static function TaxonomiesContatos() {
        $base_list = get_categories(array('taxonomy' => 'grupos_contatos'));
        $list = array();

        foreach($base_list as $v)
            $list[$v->term_id] = $v;

        return $list;
    }

    public static function TaxonomiesGalerias() {
        $base_list = get_categories(array('taxonomy' => PAImageGallery::$taxonomy_name));
        $list = array();

        foreach($base_list as $v)
            $list[$v->term_id] = $v;

        return $list;
    }

    public static function TaxonomiesFAQs() {
        $base_list = get_categories(array('taxonomy' => 'faq_category'));
        $list = array();

        foreach($base_list as $v)
            $list[$v->term_id] = $v;

        return $list;
    }

	public static function TaxonomiesNews() {
		return get_option('asn_noticias_category_list', array());
	}

    //Social Meta Bozes

    public static function MetaboxInfo() {
        return array(
            'id' => 'project-options',
            'title' => __('Opções de Exibição', 'thema_deptos'),
            'post_type' => 'projetos',
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(
                array(
                    'name' => __('Contatos', 'thema_deptos'),
                    'id' => 'project-options-contatos',
                    'type' => 'select',
                    'std' => '',
                    'method' => array('ProjetosController', 'TaxonomiesContatos')
                ),
                array(
                    'name' => __('Galerias', 'thema_deptos'),
                    'id' => 'project-options-galerias',
                    'type' => 'select',
                    'std' => '',
                    'method' => array('ProjetosController', 'TaxonomiesGalerias')
                ),
                array(
                    'name' => __('FAQs', 'thema_deptos'),
                    'id' => 'project-options-faq',
                    'type' => 'select',
                    'std' => '',
                    'method' => array('ProjetosController', 'TaxonomiesFAQs')
                ),
				array(
					'name' => __('Notícias', 'thema_deptos'),
					'id' => 'project-options-news',
					'type' => 'select',
					'std' => '',
					'method' => array('ProjetosController', 'TaxonomiesNews')
				),
				array(
					'name' => __('RSS', 'thema_deptos'),
					'id' => 'project-options-rss',
					'type' => 'text',
					'std' => '',
				),
				array(
					'name' => __('Twitter', 'thema_deptos'),
					'id' => 'project-options-twitter',
					'type' => 'text',
					'std' => '',
				),
				array(
					'name' => __('Facebook', 'thema_deptos'),
					'id' => 'project-options-facebook',
					'type' => 'text',
					'std' => '',
				),
				array(
					'name' => __('Endereço', 'thema_deptos'),
					'id' => 'project-options-url',
					'type' => 'text',
					'std' => '',
				),
				array(
					'name' => __('Hotsite', 'thema_deptos'),
					'id' => 'project-options-hotsite',
					'type' => 'text',
					'std' => '',
				),
            )
        );
    }
    // Add meta box
    public static function OptionsMetaBox() {
        $meta_box = self::MetaboxInfo();

        add_meta_box($meta_box['id'], $meta_box['title'], array('ProjetosController', 'OptionsMetaBoxShow'), $meta_box['post_type'], $meta_box['context'], $meta_box['priority']);
    }

    // Callback function to show fields in meta box
    public static function OptionsMetaBoxShow() {
        global $post;
        $meta_box = self::MetaboxInfo();

        // Use nonce for verification
        echo '<input type="hidden" name="options_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

        echo '<table class="form-table">';

		echo '<tr>';

        foreach ($meta_box['fields'] as $field) {
            // get current post meta data
            $meta = get_post_meta($post->ID, $field['id'], true);

            echo '<th style="width:20%">';
			echo '<label for="', $field['id'], '">', $field['name'], '</label>';
    		echo '</th><td>';

			if($field['type'] == 'select') {
				$method = $field['method'];
				if(is_array($method))
					$method = implode('::', $method);

				$options = call_user_func($method);

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="width:97%" >';
				echo '<option value="" ', (!$meta) ? 'selected="selected"' : '', '> --- </option>';
				foreach($options as $id => $option)
					echo '<option value="', $id, '" ', ($meta == $id) ? 'selected="selected"' : '', '>', (is_object($option) ? $option->name : $option), '</option>';
				echo '</select>';
			} else if($field['type'] == 'text') {

				echo '<input name="', $field['id'], '" id="', $field['id'], '" value="', get_post_meta($post->ID, $field['id'], 1), '" class="large-text" />';

			}

			echo '<br /><td></tr>';
        }


        echo '</table>';
    }

    // Save data from meta box
    public static function OptionsMetaBoxSave($post_id) {
        if ( wp_is_post_autosave($post_id) || wp_is_post_revision($post_id) || !isset($_POST['options_meta_box_nonce']))
            return false;

        $meta_box = self::MetaBoxInfo();

        // verify nonce
        $nounce = (isset($_POST['options_meta_box_nonce'])) ? $_POST['options_meta_box_nonce'] : '' ;
        if (!wp_verify_nonce($nounce, basename(__FILE__))) {
            return $post_id;
        }

        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        foreach ($meta_box['fields'] as $field) {
            $new = (isset($_POST[$field['id']])) ? $_POST[$field['id']] : false;
            update_post_meta($post_id, $field['id'], $new);
        }
    }
}

add_action('init', array('ProjetosController', 'Init'));

add_action('admin_menu', array('ProjetosController', 'OptionsMetaBox') );
add_action('admin_menu', array('ProjetosController', 'AdminMenu') );

add_action('save_post', array('ProjetosController', 'OptionsMetaBoxSave') );







