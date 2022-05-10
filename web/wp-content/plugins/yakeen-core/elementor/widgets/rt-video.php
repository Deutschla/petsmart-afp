<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Video extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Video', 'yakeen-core' );
		$this->rt_base = 'rt-video';
		parent::__construct( $data, $args );
	}
	
	private function rt_load_scripts(){
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'tween-max' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bag_color',
				'label'   => esc_html__( 'Image Overlay Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-img:after' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'videourl',
				'label'   => esc_html__( 'Video URL', 'yakeen-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'video_image',
				'label'   => esc_html__( 'Image', 'yakeen-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'shape_image',
				'label'   => esc_html__( 'Element', 'yakeen-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 113 X 104', 'yakeen-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'yakeen-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),			
			array(
				'mode' => 'section_end',
			),
			/*title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'video_button_style',
	            'label'   => esc_html__( 'Video Button', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_icon_size',
				'label'   => esc_html__( 'Icon Size', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-icon .rt-play' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => esc_html__( 'Background Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-icon .rt-play' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_icon_color',
				'label'   => esc_html__( 'Icon Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-icon .rt-play' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_width',
				'label'   => esc_html__( 'Button Width', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-icon .rt-play' => 'width: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_height',
				'label'   => esc_html__( 'Button Height', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-icon .rt-play' => 'height: {{VALUE}}px',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'button_radius',
	            'label'   => __( 'Border Radius', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-video-layout .rt-video .rt-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'yakeen-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',		
			),
	        array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		$this->rt_load_scripts();

		$template = 'rt-video';

		return $this->rt_template( $template, $data );
	}
}