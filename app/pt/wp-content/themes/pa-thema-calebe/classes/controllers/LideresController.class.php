<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sidferreira
 * Date: 31/01/2013
 * Time: 11:03
 * To change this template use File | Settings | File Templates.
 */

class LideresController {

    public static function Init() {

        self::CreatePostType();

        self::RegisterTaxonomies();

	}

    public static function CreatePostType() {
        $labels = array(
            'name' => __('Líderes', 'iasd'),
            'singular_name' => __('Líder', 'iasd'),
            'add_new' => __('Adicionar novo', 'iasd'),
            'add_new_item' => __('Adicionar novo Liderança', 'iasd'),
            'edit_item' => __('Editar Líder', 'iasd'),
            'new_item' => __('Novo Líder', 'iasd'),
            'view_item' => __('Visualizar Líder', 'iasd'),
            'search_items' => __('Buscar Líder', 'iasd')
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'rewrite' => array('slug' => 'lider'),
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array('title','editor','thumbnail','excerpt'),
			'has_archive' => 'lideres'
        );

        register_post_type( 'lideres' , $args );
	}

	public static function TaxonomiaSedesRegionais($args) {
		$args[] = 'lideres';
		return $args;
    }

    public static function RegisterTaxonomies() {

        //Register categories for the custom type
        register_taxonomy( 'lideres_levels', 'lideres', array(
                'hierarchical' => true,
                'label' => __('Níveis de Lideres', 'iasd'),
                'show_ui' => true
            )
        );
		add_filter('wp_terms_checklist_args', array('LideresController', 'ChecklistArgs'));
    }

	public static function ChecklistArgs($args) {
		if($args['taxonomy'] == 'conference')
			$args['walker'] = new Walker_Category_Radiolist();

		return $args;
	}

    //Social Meta Bozes

    public static function MetaBoxInfo() {
        return array(
            'id' => 'social-networks',
            'title' => __('Informações Adicioniais', 'iasd'),
            'post_type' => 'lideres',
            'context' => 'normal',
            'priority' => 'core',
            'fields' => array(
                array(
                    'name' => __('E-mail', 'iasd'),
                    'id' => 'social-networks_email',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => __('Twitter', 'iasd'),
                    'id' => 'social-networks_twitter',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => __('Facebook', 'iasd'),
                    'id' => 'social-networks_facebook',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => __('Título', 'iasd'),
                    'id' => 'iasd_titulo',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => __('Líder Geral', 'iasd'),
                    'id' => 'iasd_cargo_00',
                    'type' => 'checkbox',
                    'std' => '',
                    'custom' => true,
                    'group'  => 'Administrativo'
                ),
                array(
                    'name' => __('Presidente', 'iasd'),
                    'id' => 'iasd_cargo_10',
                    'type' => 'checkbox',
                    'std' => '',
                    'custom' => true,
                    'group'  => 'Administrativo'
                ),
                array(
                    'name' => __('Tesoureiro', 'iasd'),
                    'id' => 'iasd_cargo_20',
                    'type' => 'checkbox',
                    'std' => '',
                    'custom' => true,
                    'group'  => 'Administrativo'
                ),
                array(
                    'name' => __('Secretário', 'iasd'),
                    'id' => 'iasd_cargo_30',
                    'type' => 'checkbox',
                    'std' => '',
                    'custom' => true,
                    'group'  => 'Administrativo'
                ),
                array(
                    'name' => __('Líder', 'iasd'),
                    'id' => 'iasd_cargo_40',
                    'type' => 'checkbox',
                    'std' => '',
                    'custom' => true,
                    'group'  => 'Departamental'
                )
            )
        );
    }
    // Add meta box
    public static function SocialMetaBox() {
        $meta_box = self::MetaBoxInfo();

        add_meta_box($meta_box['id'], $meta_box['title'], array('LideresController', 'SocialMetaBoxShow'), $meta_box['post_type']);//, $meta_box['context'], $meta_box['priority']);
    }

    // Callback function to show fields in meta box
    public static function SocialMetaBoxShow() {
        global $post;
        $meta_box = self::MetaBoxInfo();

        // Use nonce for verification
        echo '<input type="hidden" name="social_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

        echo '<table class="form-table">';

        $customFields = array('Administrativo' => array(), 'Departamental' => array());
        foreach ($meta_box['fields'] as $field) {
            if(isset($field['custom']) && $field['custom']) {
                $customFields[$field['group']][] = $field;
                continue;
            }
            // get current post meta data
            $meta = get_post_meta($post->ID, $field['id'], true);

            echo '
    <tr>
        <th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>
        <td>';
            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />';
                    break;
                case 'checkbox':
                    echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? 'checked="checked"' : '', '/><br />';
                    break;
            }
            echo     '
        <td>
    </tr>';
        }
        foreach($customFields as $group => $fields) {
            echo '
    <tr>
        <th style="width:20%">' . __($group, 'iasd') . '</th>
        <td>';
            foreach ($fields as $field) {
                $meta = get_post_meta($post->ID, $field['id'], true);
                echo '<p><input type="checkbox" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? 'checked="checked"' : '', '/>'.$field['name'].'</p>';
            }
            echo '
        <td>
    </tr>';
        }

        echo '</table>';
    }

    // Save data from meta box
    public static function SocialMetaBoxSave($post_id) {
        if ( wp_is_post_autosave($post_id) || wp_is_post_revision($post_id) || !isset($_POST['social_meta_box_nonce']))
            return false;

        $meta_box = self::MetaBoxInfo();

        // verify nonce
        $nounce = (isset($_POST['social_meta_box_nonce'])) ? $_POST['social_meta_box_nonce'] : '' ;
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

add_action('init', array('LideresController', 'Init'));

add_action('admin_menu', array('LideresController', 'SocialMetaBox') );

add_action('save_post', array('LideresController', 'SocialMetaBoxSave') );
