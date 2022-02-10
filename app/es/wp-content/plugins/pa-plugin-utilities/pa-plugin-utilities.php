<?php
/**
Plugin Name: Utilitários - Portal Adventista
Description: Série de widgets e ferramentas usadas pelo Portal Adventista.
Author: Divisão Sul Americana da IASD
Version: 1.20.2
*/

if (WP_DEBUG_DISPLAY){
	error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE );
}

define( 'PAPU', dirname( __FILE__ ) );
define( 'PAPURL', plugins_url( 'pa-plugin-utilities' ) );

define( 'PAPU_CLSS', PAPU . DIRECTORY_SEPARATOR . 'classes' );
define( 'PAPU_CONT', PAPU_CLSS . DIRECTORY_SEPARATOR . 'controllers' );
define( 'PAPU_HELP', PAPU_CLSS . DIRECTORY_SEPARATOR . 'helpers' );
define( 'PAPU_WDGT', PAPU_CLSS . DIRECTORY_SEPARATOR . 'widgets' );
define( 'PAPU_PEAR', PAPU_CLSS . DIRECTORY_SEPARATOR . 'pear'  );

define( 'PAPU_VIEW', PAPU . DIRECTORY_SEPARATOR . 'views' );
define( 'PAPU_LANG', 'pa-plugin-utilities' . DIRECTORY_SEPARATOR . 'languages' );
define( 'PAPURL_LIBS', PAPURL . '/lib' );

define( 'PAPU_STTC', PAPU . DIRECTORY_SEPARATOR . 'static' );
define( 'PAPURL_STTC', PAPURL . '/static' );

//set include path for PEAR libs
$currentIncludePath = get_include_path();
ini_set( 'include_path', "{$currentIncludePath}:".PAPU_PEAR);

require( 'Log.php' );
global $logger;
// $logger = &Log::singleton( 'memory' );
$logger = Log::singleton( 'console' );


//Função auxiliar para imprimir no console o print_r.
function pconsole($var) {

	$s = json_encode($var);
	echo "<script>console.log(". $s . ");</script>";
	return;
}
// Função auxiliar para imprimir no console o echo.
function cconsole($var) {

	echo "<script>console.log('" . $var . "');</script>";
	return;
}

class IASD_Utilities {
	static function AfterSetupTheme() {
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_ImageGallery.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_VideoGallery.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_RevistaAdventistaController.class.php';
	}

/**
Controllers: Ferramentas de apoio que possuem output muito especifico
*/
	static function Controllers() {
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IasdNavEntreCampos.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'PAGoogleAnalytics.class.php';

		if (strstr(get_site_url(), "adventistas.org") !== false){
			require_once PAPU_CONT.DIRECTORY_SEPARATOR.'PAGoSquared.class.php';
			require_once PAPU_CONT.DIRECTORY_SEPARATOR.'PAHotjar.class.php';
			require_once PAPU_CONT.DIRECTORY_SEPARATOR.'PAFacebookPixel.class.php';
		}

		if(isset($_GET['widget_test']) && $_GET['widget_test'] == 'active') {
			require_once PAPU_CONT.DIRECTORY_SEPARATOR.'AllWidgetsTest.class.php';
		}

		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_Query.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_Sidebar.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_Footer.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_Menu.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_Header.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_GlobalNav.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_Disqus.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_Referer.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_AdminUser.class.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_BannerHeder.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_lgpd.php';
		require_once PAPU_CONT.DIRECTORY_SEPARATOR.'IASD_BannerF7.php';
	}

/**
Helpers: Itens que não possui um output próprio, mas servem de base para outras ferramentas
*/
	static function Helpers() {
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_Taxonomias.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_Languages.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_TextManipulation.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_Shortcodes.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_SEO.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_ViewFragments.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_Checklist_Walker.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_ListaDePosts_Views.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_PostTypeControl.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_DefaultMidia.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_Users.class.php';


		if(is_admin()) {
			require_once PAPU_HELP.DIRECTORY_SEPARATOR.'RemoveColumns.class.php';
			require_once PAPU_HELP.DIRECTORY_SEPARATOR.'RemoveCategoriesAndTags.class.php';
		}
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'TaxonomyImageController.class.php'; //Revisado em 08/10
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_DefaultImage.class.php'; //Revisado em 22/10
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'ImgCaptionShortcodeFix.class.php';
		require_once PAPU_HELP.DIRECTORY_SEPARATOR.'IASD_SearchPage.class.php';
	}


/**
Widgets
*/
	static function Widgets() {

		require_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_AdaptableWidget.class.php';

		include_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_ListaDePosts.class.php';
		include_once PAPU_CONT . DIRECTORY_SEPARATOR . 'IASD_ListaDePosts_Ajax.class.php';
		include_once PAPU_CONT . DIRECTORY_SEPARATOR . 'IASD_SeeMore.class.php';
		include_once PAPU_CONT . DIRECTORY_SEPARATOR . 'IASD_OutputFormat.class.php';
		require_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_SliderServicos.class.php';
		require_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_TwitterWidget.class.php';
		require_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_FindChurch.class.php';
		require_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_FacebookWidget.class.php';
		require_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'instagram/pa-instagram-utilities.php';
		require_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'feliz7play/pa-pub-feliz7play.php';
		include_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_CustomMenu.class.php';
		include_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_Text.class.php';
		// include_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_PorDoSol.class.php';
		include_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_ImageWidget.class.php';
		include_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_RevistaAdventistaWidget.class.php';

		//include_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'IASD_TagList.class.php';
		require_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'NT_Links.class.php';
		require_once PAPU_WDGT . DIRECTORY_SEPARATOR . 'CPB_InterestContact.class.php';
	}

/**
Traduções
*/
	static function Languages() {
		load_plugin_textdomain( 'iasd', false, PAPU_LANG);
	}

	static function Init() {
	}
}

IASD_Utilities::Languages();

IASD_Utilities::Controllers();

IASD_Utilities::Helpers();

IASD_Utilities::Widgets();



// Habilita capabilitie do editor para salvar widget 
add_action( 'admin_init', 'add_capability', 10, 0);
function add_capability() {
	$role = get_role( 'editor' );
	$role->add_cap( 'edit_theme_options' ); 
}

//Remove menu themes para role editor
add_action( 'admin_menu', 'remove_menu_appearance', 11, 0);
function remove_menu_appearance() {

	$user = wp_get_current_user();
	if( in_array( "editor", (array) $user->roles ) ){
		remove_menu_page( 'themes.php' );
	}
}

//Automaticamente seta sede proprietaria em um novo post
add_action( 'wp_insert_post', 'set_tax_owner', 10, 0 );

function set_tax_owner() {
	$sedes_owner_id = get_user_meta( get_current_user_id(), 'owner' );

	if ( isset( $sedes_owner_id ) ) {
		wp_enqueue_script( 'before_new_post', PAPURL_STTC . '/js/new_post_events.js', array('jquery') );
		wp_localize_script( 'before_new_post', 'args', array('sedes_owner_id' => $sedes_owner_id ) );
	}
}

//Esconde a taxonomia sedes proprietarias na edição de posts
//add_action( 'load-post.php', 'hide_tax_owner', 10, 0  );
function hide_tax_owner() {
	$sedes_owner_id = get_user_meta( get_current_user_id(), 'owner' );
	if ( ! current_user_can( 'administrator' ) ) {
		wp_enqueue_script( 'before_new_post', PAPURL_STTC . '/js/edit_post_events.js', array('jquery') );
		wp_localize_script( 'before_new_post', 'args', array('hide_owner' => 'hide' ) );
		
	}
}


add_action('after_setup_theme', array('IASD_Utilities', 'AfterSetupTheme'));
add_action('init', array('IASD_Utilities', 'Init'));

if(!function_exists('iasdDecodeToArray')) {
	function iasdDecodeToArray($items) {
		if(is_string($items)) {
			$decoded_items = json_decode($items);
			if($decoded_items)
				$items = $decoded_items;
		}
		if(is_object($items))
			$items = (array) $items;

		if(is_array($items)) {
			$fixed_items = array();
			foreach($items as $k => $v) {
				$fixed_items[$k] = iasdDecodeToArray($v);
			}
			$items = $fixed_items;
		}
		return $items;
	}
}


add_filter( 'wp_kses_allowed_html', 'enable_iframe',1,1 );
function enable_iframe( $allowedposttags ) {

	if ( !current_user_can( 'publish_posts' ) )
	return $allowedposttags;

	$allowedposttags['iframe']=array(
		'align' => true,
		'width' => true,
		'height' => true,
		'frameborder' => true,
		'name' => true,
		'src' => true,
		'id' => true,
		'class' => true,
		'style' => true,
		'scrolling' => true,
		'marginwidth' => true,
		'marginheight' => true,
	);

	return $allowedposttags;
}



function replace_content($content)
{
	$content = str_replace('deptos.adventistas.org.s3.amazonaws.com', 'deptos.adventistas.org',$content);
	return $content;
}

add_filter('the_content','replace_content');