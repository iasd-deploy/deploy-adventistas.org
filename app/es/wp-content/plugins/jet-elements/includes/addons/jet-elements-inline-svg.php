<?php
/**
 * Class: Jet_Elements_Inline_Svg
 * Name: Inline SVG
 * Slug: jet-inline-svg
 */

namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Jet_Elements_Inline_Svg extends Jet_Elements_Base {

	public function get_name() {
		return 'jet-inline-svg';
	}

	public function get_title() {
		return esc_html__( 'Inline SVG', 'jet-elements' );
	}

	public function get_icon() {
		return 'jet-elements-icon-inline-svg';
	}

	public function get_jet_help_url() {
		return 'https://crocoblock.com/knowledge-base/articles/how-to-display-svg-image-files-on-elementor-built-pages-with-jetelements-inline-svg-widget/';
	}

	public function get_categories() {
		return array( 'cherry' );
	}

	protected function is_dynamic_content(): bool {
		return false;
	}

	public function get_style_depends() { 
		return array( 'jet-inline-svg' ); 
	}
	
	protected function register_controls() {
		$css_scheme = apply_filters(
			'jet-elements/jet-inline-svg/css-scheme',
			array(
				'svg-wrapper' => '.jet-inline-svg__wrapper',
				'svg-link'    => '.jet-inline-svg',
				'svg'         => '.jet-inline-svg svg',
			)
		);

		$this->start_controls_section(
			'section_svg_content',
			array(
				'label'      => esc_html__( 'SVG', 'jet-elements' ),
				'tab'        => Controls_Manager::TAB_CONTENT,
				'show_label' => false,
			)
		);

		$this->add_control(
			'svg_url',
			array(
				'label'   => esc_html__( 'SVG', 'jet-elements' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => '',
				),
				'dynamic' => array( 'active' => true ),
			)
		);

		$this->add_control(
			'svg_link',
			array(
				'label'   => esc_html__( 'URL', 'jet-elements' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '',
				),
				'dynamic' => array( 'active' => true ),
			)
		);

		$this->end_controls_section();

		$this->_start_controls_section(
			'section_svg_style',
			array(
				'label'      => esc_html__( 'SVG', 'jet-elements' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);

		$this->_add_control(
			'svg_custom_width',
			array(
				'label'        => esc_html__( 'Use Custom Width', 'jet-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'jet-elements' ),
				'label_off'    => esc_html__( 'No', 'jet-elements' ),
				'return_value' => 'yes',
				'default'      => '',
				'description'  => esc_html__( 'Makes SVG responsive and allows to change its width.', 'jet-elements' )
			),
			25
		);

		$this->_add_control(
			'svg_aspect_ratio',
			array(
				'label'        => esc_html__( 'Use Aspect Ratio', 'jet-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'jet-elements' ),
				'label_off'    => esc_html__( 'No', 'jet-elements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'This option allows your SVG item to be scaled up exactly as your bitmap image, at the same time saving its width compared to the height. ', 'jet-elements' ),
				'condition'    => array(
					'svg_custom_width' => 'yes'
				)
			),
			25
		);

		$this->_add_responsive_control(
			'svg_width',
			array(
				'label'      => esc_html__( 'Width', 'jet-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'custom'
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 1000,
					),
				),
				'default'    => array(
					'size' => 150,
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . $css_scheme['svg-link'] => 'max-width: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'svg_custom_width' => 'yes'
				)
			),
			25
		);

		$this->_add_responsive_control(
			'svg_height',
			array(
				'label'      => esc_html__( 'Height', 'jet-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array(
					'px', 'custom'
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 1000,
					),
				),
				'default'    => array(
					'size' => 150,
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} ' . $css_scheme['svg'] => 'height: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'svg_aspect_ratio!' => 'yes',
					'svg_custom_width'  => 'yes'

				)
			),
			25
		);

		$this->_add_control(
			'svg_custom_color',
			array(
				'label'        => esc_html__( 'Use Custom Color', 'jet-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'jet-elements' ),
				'label_off'    => esc_html__( 'No', 'jet-elements' ),
				'return_value' => 'yes',
				'default'      => '',
				'description'  => esc_html__( 'Specifies color of all SVG elements that have a fill or stroke color set.', 'jet-elements' )
			),
			25
		);

		$this->_add_control(
			'svg_color',
			array(
				'label'     => esc_html__( 'Color', 'jet-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . $css_scheme['svg-link'] => 'color: {{VALUE}};',
				),
				'condition' => array(
					'svg_custom_color' => 'yes'
				)
			),
			25
		);

		$this->_add_control(
			'svg_hover_color',
			array(
				'label'     => esc_html__( 'Hover Color', 'jet-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ' . $css_scheme['svg-link'] . ':hover' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'svg_custom_color' => 'yes'
				)
			),
			25
		);

		$this->_add_control(
			'svg_remove_inline_css',
			array(
				'label'        => esc_html__( 'Remove Inline CSS', 'jet-elements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'jet-elements' ),
				'label_off'    => esc_html__( 'No', 'jet-elements' ),
				'return_value' => 'yes',
				'default'      => '',
				'description'  => esc_html__( 'Use this option to delete the inline styles in the loaded SVG.', 'jet-elements' )
			),
			25
		);

		$this->_add_responsive_control(
			'svg_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'jet-elements' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => 'center',
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'jet-elements' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'jet-elements' ),
						'icon'  => 'fa fa-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'jet-elements' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'selectors' => array(
					'{{WRAPPER}} ' . $css_scheme['svg-wrapper'] => 'text-align: {{VALUE}};',
				),
				'classes' => 'jet-elements-text-align-control',
			),
			25
		);

		$this->_end_controls_section();
	}

	public function prepare_svg( $svg, $settings ) {
		if ( isset( $settings['svg_aspect_ratio'] ) && 'yes' !== $settings['svg_aspect_ratio'] ) {
			$svg = preg_replace( '[preserveAspectRatio\s*?=\s*?"\s*?.*?\s*?"]', '', $svg );
			$svg = preg_replace( '[<svg]', '<svg preserveAspectRatio="none"', $svg );
		}

		if ( isset( $settings['svg_remove_inline_css'] ) && 'yes' === $settings['svg_remove_inline_css'] ) {
			$svg = preg_replace( '[style\s*?=\s*?"\s*?.*?\s*?"]', '', $svg );
		}

		if ( isset( $settings['svg_custom_color'] ) && 'yes' === $settings['svg_custom_color'] ) {
			$svg = preg_replace( '[fill\s*?=\s*?("(?!(?:\s*?none\s*?)")[^"]*")]', 'fill="currentColor"', $svg );
			$svg = preg_replace( '[stroke\s*?=\s*?("(?!(?:\s*?none\s*?)")[^"]*")]', 'stroke="currentColor"', $svg );
		}

		return $svg;
	}

	protected function render() {
		$this->_context = 'render';
		$settings        = $this->get_settings_for_display();
		$tag             = 'div';
		$svg             = jet_elements_tools()->get_image_by_url( $settings['svg_url']['url'], array( 'class' => 'jet-inline-svg__inner' ) );

		$url = esc_url( $settings['svg_url']['url'] );

		if ( empty( $url ) ) {
			return;
		}

		$ext  = pathinfo( $url, PATHINFO_EXTENSION );

		if ( 'svg' !== $ext ) {
			return printf( '<h5 class="jet-inline-svg__error">%s</h5>', esc_html__( 'Please choose a SVG file format.', 'jet-elements' ) );
		}

		$svg = $this->prepare_svg( $svg, $settings );

		$this->add_render_attribute( 'svg_wrap', 'class', 'jet-inline-svg' );

		if ( ! empty( $settings['svg_link']['url'] ) ) {
			$tag = 'a';

			if ( method_exists( $this, 'add_link_attributes' ) ) {
				$this->add_link_attributes( 'svg_wrap', $settings['svg_link'] );
				$this->add_render_attribute( 'svg_wrap', 'aria-label', 'SVG link' );
			} else {
				$this->add_render_attribute( 'svg_wrap', 'href', $settings['svg_link']['url'] );
				$this->add_render_attribute( 'svg_wrap', 'aria-label', 'SVG link' );

				if ( 'on' === $settings['svg_link']['is_external'] ) {
					$this->add_render_attribute( 'svg_wrap', 'target', '_blank' );
				}

				if ( 'on' === $settings['svg_link']['nofollow'] ) {
					$this->add_render_attribute( 'svg_wrap', 'rel', 'nofollow' );
				}
			}
		}

		if ( isset( $settings['svg_custom_width'] ) && 'yes' === $settings['svg_custom_width'] ) {
			$this->add_render_attribute( 'svg_wrap', 'class', 'jet-inline-svg--custom-width' );
		}

		if ( isset( $settings['svg_custom_color'] ) && 'yes' === $settings['svg_custom_color'] ) {
			$this->add_render_attribute( 'svg_wrap', 'class', 'jet-inline-svg--custom-color' );
		}

		$this->_open_wrap();
		echo '<div class="jet-inline-svg__wrapper"><' . $tag . ' ' . $this->get_render_attribute_string( 'svg_wrap' ) . '>';
		echo $svg;
		echo '</' . $tag . '></div>';
		$this->_close_wrap();
	}

}
