<?php
/**
 * Plugin Name: Disable Elementor Local Google Fonts
 * Description: Força o Elementor a carregar Google Fonts do CDN do Google em vez de criar arquivos em wp-content/uploads/elementor/google-fonts/. Resolve erros de MIME/404/500 quando o filesystem do container não persiste os arquivos entre deploys (ex: ECS sem volume EFS).
 *
 * Contorna o bug conhecido elementor/elementor#34657 onde desativar "Load Google Fonts Locally"
 * via painel não é respeitado — os handles elementor-gf-local-* continuam sendo enfileirados.
 *
 * Version: 1.0.0
 * Author: DevOps
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'pre_option_elementor_experiment-e_local_google_fonts', function () {
    return 'inactive';
}, 99 );

add_filter( 'pre_option_elementor_local_google_fonts', function () {
    return '';
}, 99 );

add_filter( 'elementor/fonts/google/local_cache', '__return_false', 99 );
add_filter( 'elementor/frontend/print_google_fonts', '__return_true', 99 );

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
