<?php

class FlavoursController {
	private static $scssList = array();

	public static function Dir($path = '') {
		return get_template_directory() . '/flavours' . $path;
	}

	public static function SassDir($path = '') {
		return self::Dir('/sass'.$path);
	}

	public static function FlavourPath($flavour) {
		return self::SassDir('/'.$flavour.'.scss');
	}

	public static function StaticImg($path = '') {
		return self::Dir('/static/img' . $path);
	}

	public static function FlavourStatic($flavour = '', $fileName = '') {
		if($flavour)
			$flavour = '/' . $flavour;
		if($fileName)
			$fileName = '/' . $fileName;
		return self::StaticImg('/flavours'.$flavour . $fileName);
	}

	public static function URL($path = '') {
		return get_template_directory_uri() . '/flavours' . $path;
	}

	public static function StaticImgURL($path = '') {
		return self::URL('/static/img' . $path);
	}

	public static function FlavourStaticURL($flavour = '', $fileName = '') {
		if($flavour)
			$flavour = '/' . $flavour;
		if($fileName)
			$fileName = '/' . $fileName;
		return self::StaticImgURL('/flavours'.$flavour.$fileName);
	}

	private static function SassList() {
		if(!count(self::$scssList)) {
			$scssList = array();

			$available = scandir(self::SassDir());
			foreach($available as $fileName) {
				if(strpos($fileName, '.scss') && !in_array($fileName, array('print.scss', 'styles.scss')))
					$scssList[] = str_replace('.scss', '', $fileName);
			}

			self::$scssList = $scssList;
		}

		return self::$scssList;
	}

	public static function FlavourInformation($flavour) {
		$flavourName = ucfirst($flavour);
		$metaInformation = get_file_data(self::FlavourPath($flavour), array('name' => 'Name', 'thumbnail' => 'Thumbnail', 'description' => 'Description', 'version' => 'Version', 'colors' => 'Colors'));
		if(!isset($metaInformation['name']) || !$metaInformation['name'])
			$metaInformation['name'] = $flavourName;

		if(!isset($metaInformation['thumbnail']) || !$metaInformation['thumbnail']) {
			if(file_exists(self::FlavourStatic($flavour, 'thumbnail.png')))
				$metaInformation['thumbnail'] = 'thumbnail.png';
			else
				$metaInformation['thumbnail'] = '../../iasd-placeholder/iasd-placeholder-460x245.png';
		}
		$metaInformation['thumbnail'] = self::FlavourStaticURL($flavour, $metaInformation['thumbnail']);

		return $metaInformation;
	}

	public static function FlavourList() {
		$sassy = self::SassList();
		$flavoursList = array();
		foreach($sassy as $scss) {
			$flavoursList[$scss] = self::FlavourInformation($scss);
		}

		return $flavoursList;
	}

	public static function RegisterMenu() {
		add_theme_page('Flavour Selection', 'Flavours', 'administrator', 'xtt-pa-flavour', array(__CLASS__, 'FlavoursPage'));
	}

	public static function FlavoursPage() {
		$flavoursList = FlavoursController::FlavourList();
		if(isset($_POST['flavourPicker']) && isset($flavoursList[$_POST['flavourPicker']]))
			update_option('iasd-theme_flavour', $_POST['flavourPicker']);

		$flavourName = self::GetFlavour();
		include get_template_directory() . '/views/flavours_selection.php';
	}

	public static function LoadFlavour() {
		$flavourName = self::GetFlavour();
		wp_enqueue_style( 'wordpress_style', get_template_directory_uri() .'/flavours/static/css/'.$flavourName.'.css', false, false, 'all' );
		wp_enqueue_style( 'print_style', get_template_directory_uri() .'/flavours/static/css/print.css', false, false, 'print' );
	}

	public static function GetFlavour() {
		return get_option('iasd-theme_flavour', 'default');
	}

	public static function ByeByeReset($value) {
		global $wp_registered_sidebars, $sidebars_widgets;
		$registered_sidebar_keys = array_keys( $wp_registered_sidebars );
		foreach ($registered_sidebar_keys as $registered_sidebar_key) {
			if(!isset($value['data'][$registered_sidebar_key]))
				$value['data'][$registered_sidebar_key] = null;
			if($value['data'][$registered_sidebar_key] == null) {
				if(isset($sidebars_widgets[$registered_sidebar_key])) {
					if($sidebars_widgets[$registered_sidebar_key]) {
						$value['data'][$registered_sidebar_key] = $sidebars_widgets[$registered_sidebar_key];
					}
				}
			}
		}
		return $value;
	}

	public static function HeaderClasses($classes = array()) {
		$flavour_name = FlavoursController::GetFlavour();
		if ( in_array( $flavour_name, array('iasd-dsa-home', 'dsa-sedes') ) ){
			$classes[] = 'institutional';
		}

		if ( $flavour_name == 'dsa-sedes' ){
			$classes[] = 'headquarters';
		}
		return $classes;
	}

	public static function is_headquarter(){
		$flavour_name = FlavoursController::GetFlavour();
		$hq_flavours = apply_filters( 'iasd-headquarter-flavours', array('iasd-dsa-home', 'dsa-sedes') );
		return in_array( $flavour_name, $hq_flavours );
	}
}

add_action( 'admin_menu', array( 'FlavoursController', 'RegisterMenu') );
add_action( 'wp_enqueue_scripts',  array( 'FlavoursController', 'LoadFlavour') );

add_filter( 'theme_mod_sidebars_widgets', array( 'FlavoursController', 'ByeByeReset'), 99, 1 );
add_filter( 'iasd-header', array( 'FlavoursController', 'HeaderClasses') );

