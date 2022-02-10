<?php

//Mock dependencies from pa-plugin-utilities
class PAImageGallery { public static $post_type_name = 'galeria_imagens'; }
class PATaxonomias { const TAXONOMY_PROJETOS = 'projetos'; }

class LideresControllerTest extends WP_UnitTestCase {

	function test_if_post_type_was_declared(){

		$pobj = get_post_type_object( 'lideres' );

		$this->assertTrue( is_post_type_hierarchical( 'lideres' ) );
		$this->assertEquals( array(), get_object_taxonomies( 'lideres' ) );
		$this->assertEquals( 'page', $pobj->capability_type );
		$this->assertEquals( 'lideres', $pobj->has_archive );
		$this->assertEquals( 'lider', $pobj->rewrite['slug'] );
		$this->markTestIncomplete( 'Garantir que page attribute está sendo adicionado' );

	}

	function test_if_contato_metaboxes_are_added_on_init() {
		global $wp_meta_boxes;
		do_action( 'admin_menu' );
		$metaboxes = $wp_meta_boxes['lideres']['side']['core'];

		$this->assertCount( 2, $metaboxes, 'Devem existir 2 metaboxes na sidebar de lideres' );

		$this->assertContains( $metaboxes['lider_contatos_metabox']['callback'], array( array( 'LideresController', 'contato_metabox_render' ) ) );
		$this->assertContains( $metaboxes['lider_cargo_metabox']['callback'], array( array( 'LideresController', 'cargo_metabox_render' ) ) );

	}

	function test_if_contato_metabox_is_rendered_properly() {
		global $post;
		$post = $this->factory->post->create_and_get( array( 'post_type' => 'lideres' ) );

		ob_start();
		LideresController::contato_metabox_render();
		$string = ob_get_contents();
		$doc = new DomDocument();
		$doc->loadHTML( $string );

		$this->assertSelectCount( 'input[name=contato_metabox_nonce]', TRUE, $doc );
		$this->assertSelectCount( 'table td #social-networks_twitter', TRUE, $doc );
		$this->assertSelectCount( 'table td #social-networks_facebook', TRUE, $doc );
		$this->assertSelectCount( 'table td #social-networks_email', TRUE, $doc );

		ob_clean();

		// if there are meta saved, should show it as value.

		update_post_meta( $post->ID, 'social-networks_twitter', 'twitter' );
		update_post_meta( $post->ID, 'social-networks_facebook', 'facebook' );
		update_post_meta( $post->ID, 'social-networks_email', 'email' );

		LideresController::contato_metabox_render();
		$string = ob_get_contents();
		$doc = new DomDocument();
		$doc->loadHTML( $string );
		
		$this->assertSelectCount( '#social-networks_twitter[value=twitter]', TRUE, $doc );
		$this->assertSelectCount( '#social-networks_facebook[value=facebook]', TRUE, $doc );
		$this->assertSelectCount( '#social-networks_email[value=email]', TRUE, $doc );

		ob_end_clean();
	}

	function test_if_contato_metabox_save_properly() {
		$this->markTestIncomplete();
	}

	function test_if_cargo_metabox_is_rendered_properly() {
		global $post;
		$post = $this->factory->post->create_and_get( array( 'post_type' => 'lideres' ) );

		ob_start();
		LideresController::cargo_metabox_render();
		$string = ob_get_contents();
		$doc = new DomDocument();
		$doc->loadHTML( $string );

		$this->assertSelectCount( 'input[name=cargo_tipo]', 6, $doc );
		$this->assertSelectCount( 'input[name=cargo_titulo]', TRUE, $doc );
		$this->assertSelectCount( 'script', TRUE, $doc );
		wp_script_is( 'admin_lideres' );

		ob_clean();

		update_post_meta( $post->ID, 'cargo_tipo', 'presidente' );
		update_post_meta( $post->ID, 'cargo_titulo', 'titulo' );

		LideresController::cargo_metabox_render();
		$string = ob_get_contents();
		$doc = new DomDocument();
		$doc->loadHTML( $string );

		$this->assertSelectCount( '#cargo_titulo[value=titulo]', TRUE, $doc );
		$this->assertSelectCount( '#cargo_presidente[checked=checked]', TRUE, $doc );
		ob_end_clean();
	}

	function test_if_cargo_metabox_save_properly() {
		$this->markTestIncomplete();
	}

}
