<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sidferreira
 * Date: 31/01/2013
 * Time: 11:03
 * To change this template use File | Settings | File Templates.
 */

class ContatosController {

    public static function Init() {

        self::CreatePostType();

        self::RegisterTaxonomies();

    }

    public static function CreatePostType() {
        $labels = array(
            'name' => __('Contatos', 'thema_deptos'),
            'singular_name' => __('Contatos', 'thema_deptos'),
            'add_new' => __('Adicionar novo', 'thema_deptos'),
            'add_new_item' => __('Adicionar novo contato', 'thema_deptos'),
            'edit_item' => __('Editar contato', 'thema_deptos'),
            'new_item' => __('Novo contato', 'thema_deptos'),
            'view_item' => __('Visualizar contato', 'thema_deptos'),
            'search_items' => __('Buscar contato', 'thema_deptos')
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'rewrite' => array('slug' => 'contatos'),
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array('title','thumbnail'),
        );

        register_post_type( 'contatos' , $args );
    }

    public static function RegisterTaxonomies() {

        //Register categories for the custom type
        register_taxonomy( 'grupos_contatos', 'contatos', array(
                'hierarchical' => true,
                'label' => __( 'Grupos de Contatos', 'thema_deptos' ),
                'show_ui' => true
            )
        );

    }
    //Social Meta Bozes

    public static function MetaBoxInfo() {
        return array(
            'id' => 'info-contatos',
            'title' => __('Dados do Contato', 'thema_deptos'),
            'post_type' => 'contatos',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => __('Cargo', 'thema_deptos'),
                    'id' => 'info-contatos-cargo',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => __('E-mail', 'thema_deptos'),
                    'id' => 'info-contatos-email',
                    'type' => 'text',
                    'std' => ''
                ),
            )
        );
    }
    // Add meta box
    public static function InfoMetaBox() {
        $meta_box = self::MetaBoxInfo();

        add_meta_box($meta_box['id'], $meta_box['title'], array('ContatosController', 'InfoMetaBoxShow'), $meta_box['post_type'], $meta_box['context'], $meta_box['priority']);
    }

    // Callback function to show fields in meta box
    public static function InfoMetaBoxShow() {
        global $post;
        $meta_box = self::MetaBoxInfo();

        // Use nonce for verification
        echo '<input type="hidden" name="contatos_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

        echo '<table class="form-table">';

        foreach ($meta_box['fields'] as $field) {
            // get current post meta data
            $meta = get_post_meta($post->ID, $field['id'], true);

            echo '<tr>',
            '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
            '<td>';
            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />';
                    break;
            }
            echo     '<td>',
            '</tr>';
        }

        echo '</table>';
    }

    // Save data from meta box
    public static function InfoMetaBoxSave($post_id) {
        if ( wp_is_post_autosave($post_id) || wp_is_post_revision($post_id) || !isset($_POST['contatos_meta_box_nonce']))
            return false;

        $meta_box = self::MetaBoxInfo();
        // verify nonce
        $nounce = (isset($_POST['contatos_meta_box_nonce'])) ? $_POST['contatos_meta_box_nonce'] : '' ;
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
            var_dump($new);
            var_dump($field);

            update_post_meta($post_id, $field['id'], $new);
            var_dump(get_post_meta($post_id, $field['id']), true);
        }
    }
}

add_action('init', array('ContatosController', 'Init'));
add_action('admin_menu', array('ContatosController', 'InfoMetaBox') );
add_action('save_post', array('ContatosController', 'InfoMetaBoxSave') );