<?php
/**
 * Plugin Name: Disable Elementor Local Google Fonts
 * Description: Força o Elementor a carregar Google Fonts do CDN do Google em vez de criar arquivos em wp-content/uploads/elementor/google-fonts/. Resolve erros de MIME/404/500 quando o filesystem do container não persiste os arquivos entre deploys (ex: ECS sem volume EFS).
 *
 * Baseado no fluxo do Elementor 4.0.1 em
 * plugins/elementor/core/files/fonts/google-font.php::enqueue():
 *
 *   if ( static::enqueue_style( $font_name ) ) return true;   // usa local se já tem dados
 *   $is_local_gf_enabled = (bool) get_option( 'elementor_local_google_fonts', '0' );
 *   if ( ! $is_local_gf_enabled ) $force_enqueue_from_cdn = true;
 *   if ( $force_enqueue_from_cdn || ! fetch_font_data(...) ) enqueue_from_cdn(...);
 *
 * O branch `enqueue_style` lê a option `_elementor_local_google_fonts` (com underscore
 * prefix — é onde ficam os DADOS das fontes já baixadas). Se já tem dados, Elementor
 * nunca chega na flag — por isso filtramos AMBAS as options.
 *
 * Version: 1.1.0
 * Author: DevOps
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'pre_option__elementor_local_google_fonts', function () {
    return [];
}, 99 );

add_filter( 'pre_option_elementor_local_google_fonts', function () {
    return '0';
}, 99 );

add_filter( 'pre_option_elementor_experiment-e_local_google_fonts', function () {
    return 'inactive';
}, 99 );

add_action( 'wp_enqueue_scripts', function () {
    global $wp_styles;
    if ( ! isset( $wp_styles ) || ! is_object( $wp_styles ) ) {
        return;
    }
    foreach ( (array) $wp_styles->registered as $handle => $style ) {
        if ( strpos( $handle, 'elementor-gf-local-' ) === 0 ) {
            wp_dequeue_style( $handle );
            wp_deregister_style( $handle );
        }
    }
}, PHP_INT_MAX );

add_filter( 'style_loader_src', function ( $src, $handle ) {
    if ( false === $src || empty( $src ) ) {
        return $src;
    }
    if ( strpos( $src, '/wp-content/uploads/' ) !== false
        && strpos( $src, '/elementor/google-fonts/' ) !== false ) {
        return false;
    }
    return $src;
}, PHP_INT_MAX, 2 );
