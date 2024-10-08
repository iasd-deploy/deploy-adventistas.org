<?php
/**
 * Autoload lib for default template for post type manager.
 *
 * @note we require our autoload files everytime and everywhere after plugin load.
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Return true value for filter 'wpb_vc_js_status_filter'.
 * It allows to start backend editor on load.
 *
 * @return string
 * @since 4.12
 */
function vc_set_default_content_for_post_type_wpb_vc_js_status_filter() {
	return 'true';
}

/**
 * Set default content by post type in editor.
 *
 * Data for post type templates stored in settings.
 *
 * @param string|null $post_content
 * @param WP_Post $post
 * @throws \Exception
 * @since 4.12
 *
 * @return string|null
 */
function vc_set_default_content_for_post_type( $post_content, $post ) {
	if ( ! empty( $post_content ) || ! vc_backend_editor()->isValidPostType( $post->post_type ) ) {
		return $post_content;
	}
	$template_settings = new Vc_Setting_Post_Type_Default_Template_Field( 'general', 'default_template_post_type' );
	$new_post_content = $template_settings->getTemplateByPostType( $post->post_type );
	if ( null !== $new_post_content ) {
		add_filter( 'wpb_vc_js_status_filter', 'vc_set_default_content_for_post_type_wpb_vc_js_status_filter' );

		return $new_post_content;
	}

	return $post_content;
}

/**
 * Default template for post types manager
 *
 * Class Vc_Setting_Post_Type_Default_Template_Field
 *
 * @since 4.12
 */
class Vc_Setting_Post_Type_Default_Template_Field {
	/**
	 * Tab name
	 *
	 * @var string
	 */
	protected $tab;

	/**
	 * Field key
	 *
	 * @var string
	 */
	protected $key;

	/**
	 * Post types
	 *
	 * @var bool|array
	 */
	protected $post_types = false;

	/**
	 * Vc_Setting_Post_Type_Default_Template_Field constructor.
	 *
	 * @param string $tab
	 * @param string $key
	 */
	public function __construct( $tab, $key ) {
		$this->tab = $tab;
		$this->key = $key;
		add_action( 'vc_settings_tab-general', array(
			$this,
			'addField',
		) );
	}

	/**
	 * Get field name
	 *
	 * @return string
	 */
	protected function getFieldName() {
		return esc_html__( 'Default template for post types', 'js_composer' );
	}

	/**
	 * Get field key
	 *
	 * @return string
	 */
	protected function getFieldKey() {
		require_once vc_path_dir( 'SETTINGS_DIR', 'class-vc-settings.php' );

		return Vc_Settings::getFieldPrefix() . $this->key;
	}

	/**
	 * Check if post type is valid
	 *
	 * @param string $type
	 * @return bool
	 */
	protected function isValidPostType( $type ) {
		return post_type_exists( $type );
	}

	/**
	 * Get post types.
	 *
	 * @return array|bool
	 */
	protected function getPostTypes() {
		if ( false === $this->post_types ) {
			require_once vc_path_dir( 'SETTINGS_DIR', 'class-vc-roles.php' );
			$vc_roles = new Vc_Roles();
			$this->post_types = $vc_roles->getPostTypes();
		}

		return $this->post_types;
	}

	/**
	 * Get templates.
	 *
	 * @return array
	 */
	protected function getTemplates() {
		return $this->getTemplatesEditor()->getAllTemplates();
	}

	/**
	 * Get templates editor.
	 *
	 * @return bool|\Vc_Templates_Panel_Editor
	 */
	protected function getTemplatesEditor() {
		return wpbakery()->templatesPanelEditor();
	}

	/**
	 * Get settings data for default templates
	 *
	 * @return array|mixed
	 */
	protected function get() {
		require_once vc_path_dir( 'SETTINGS_DIR', 'class-vc-settings.php' );

		$value = Vc_Settings::get( $this->key );

		return $value ? $value : array();
	}

	/**
	 * Get template's shortcodes string
	 *
	 * @param array $template_data
	 * @return string|null
	 */
	protected function getTemplate( $template_data ) {
		$template = null;
		$template_settings = preg_split( '/\:\:/', $template_data );

		$template_id = $template_settings[1];
		$template_type = $template_settings[0];

		if ( ! isset( $template_id, $template_type ) || '' === $template_id || '' === $template_type ) {
			return $template;
		}
		WPBMap::addAllMappedShortcodes();
		if ( 'my_templates' === $template_type ) {
			$saved_templates = get_option( $this->getTemplatesEditor()->getOptionName() );
			if ( ! isset( $saved_templates[ $template_id ] ) ) {
				return $template;
			}
			$content = trim( $saved_templates[ $template_id ]['template'] );
			$content = str_replace( '\"', '"', $content );
			$pattern = get_shortcode_regex();
			$template = preg_replace_callback( "/{$pattern}/s", 'vc_convert_shortcode', $content );
		} else {
			if ( 'default_templates' === $template_type ) {
				$template_data = $this->getTemplatesEditor()->getDefaultTemplate( (int) $template_id );
				if ( isset( $template_data['content'] ) ) {
					$template = $template_data['content'];
				}
			} else {
				$template_preview = apply_filters( 'vc_templates_render_backend_template_preview', $template_id, $template_type );
				if ( (string) $template_preview !== (string) $template_id ) {
					$template = $template_preview;
				}
			}
		}

		return $template;
	}

	/**
	 * Get template by post type.
	 *
	 * @param string $type
	 * @return string|null
	 */
	public function getTemplateByPostType( $type ) {
		$value = $this->get();

		return isset( $value[ $type ] ) ? $this->getTemplate( $value[ $type ] ) : null;
	}

	/**
	 * Sanitize settings.
	 *
	 * @param array $settings
	 * @return mixed
	 */
	public function sanitize( $settings ) {
		foreach ( $settings as $type => $template ) {
			if ( empty( $template ) ) {
				unset( $settings[ $type ] );
			} elseif ( ! $this->isValidPostType( $type ) || ! $this->getTemplate( $template ) ) {
				add_settings_error( $this->getFieldKey(), 1, esc_html__( 'Invalid template or post type.', 'js_composer' ), 'error' );

				return $settings;
			}
		}

		return $settings;
	}

	/**
	 * Include template for default post type.
	 */
	public function render() {
		vc_include_template( 'pages/vc-settings/default-template-post-type.tpl.php', array(
			'post_types' => $this->getPostTypes(),
			'templates' => $this->getTemplates(),
			'title' => $this->getFieldName(),
			'value' => $this->get(),
			'field_key' => $this->getFieldKey(),
		) );
	}

	/**
	 * Add field settings page
	 *
	 * Method called by vc hook vc_settings_tab-general.
	 */
	public function addField() {
		vc_settings()->addField( $this->tab, $this->getFieldName(), $this->key, array(
			$this,
			'sanitize',
		), array(
			$this,
			'render',
		) );
	}
}

/**
 * Start only for admin part with hooks
 */
if ( is_admin() ) {
	/**
	 * Initialize Vc_Setting_Post_Type_Default_Template_Field
	 * Called by admin_init hook
	 */
	function vc_settings_post_type_default_template_field_init() {
		new Vc_Setting_Post_Type_Default_Template_Field( 'general', 'default_template_post_type' );
	}

	add_filter( 'default_content', 'vc_set_default_content_for_post_type', 100, 2 );
	add_action( 'admin_init', 'vc_settings_post_type_default_template_field_init', 8 );
}
