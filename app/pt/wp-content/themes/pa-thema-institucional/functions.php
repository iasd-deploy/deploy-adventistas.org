<?php

define('TEMPLATEURI', get_stylesheet_directory_uri());

define('IS_INSTITUTIONAL', true);

//add_filter('user_can_richedit' , create_function('' , 'return false;') , 50);
//add_filter( ‘user_can_richedit’ , ‘__return_false’, 50 );

require_once ('classes/ThemeController.class.php');
require_once ('classes/MenuDescription.class.php');

add_theme_support( 'post-thumbnails' );

remove_action('wp_head', 'wp_generator'); 

/** HOOKS **/

add_filter('IasdHelperShowNew', '__return_true');

add_filter('iasd-header-inner-menu', '__return_false', 9999);


//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');
//add sanitization for WordPress posts
add_filter( 'pre_user_description', 'wp_filter_post_kses');

if ( ! isset( $content_width ) )
    $content_width = 940;
