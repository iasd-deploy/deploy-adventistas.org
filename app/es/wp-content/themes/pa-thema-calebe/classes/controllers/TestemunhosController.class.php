<?php
/*
Plugin Name: Testemunhos do Portal Adventista - ASN
Description: Inclui o posttype testemulhos com link de share do video. Requer o plugin <b>Video Thumbnails</b> para gerar thumbnails e <b>Fluid Video Embed</b> para exibir corretamente.
Author: Nextt - Sidney Ferreira
Version: 0.1
Text Domain: testemunhos
*/


class TestemunhosController {

	static $text_domain     = 'testemunhos';
	static $post_type_name  = 'testemunhos';
	static $field_name      = 'testemunhos_video_share_url_field';
	static $error_meta      = 'testemunhos_error';

	public static function Init() {
		self::RegisterType();
		self::RegisterTaxonomies();
	}

	public static function RegisterTaxonomies() {

	}

	public static function TypeLabels() {
		$labels = array(
			'name'              => __('Testemunhos', 'iasd'),
			'singular_name'     => __('testemunho', 'iasd'),
			'add_new'           => __('Adicionar novo', 'iasd'),
			'add_new_item'      => __('Adicionar novo testemunho', 'iasd'),
			'edit_item'         => __('Editar testemunho', 'iasd'),
			'new_item'          => __('Novo testemunho', 'iasd'),
			'view_item'         => __('Visualizar testemunho', 'iasd'),
			'search_items'      => __('Buscar testemunhos', 'iasd')
		);
		return $labels;
	}

	public static function TypeIcon() {
		return '';
	}

	public static function TypeSlug() {
		return array('slug' => 'testemunho');
	}

	public static function TypeArguments() {
		$args = array(
			'labels' => self::TypeLabels(),
			'public' => true,
			'rewrite' => self::TypeSlug(),
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title','thumbnail', 'editor','excerpt','comments'),
			'has_archive' => 'testemunhos'
		);
		return $args;
	}

	public static function RegisterType() {
		register_post_type( self::$post_type_name , self::TypeArguments() );

	}
}

add_action( 'init', array('TestemunhosController', 'Init') );

