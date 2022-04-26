<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Button extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Button', 'yakeen-core' );
		$this->rt_base = 'rt-button';
		parent::__construct( $data, $args );
	}
	
	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'CTA Style', 'yakeen-core' ),
				'options' => array(
					'style-1' => esc_html__( 'Style 1' , 'yakeen-core' ),
					'style-2' => esc_html__( 'Style 2', 'yakeen-core' ),
				),
				'default' => 'style-1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'	  => 'responsive',
				'label'   => esc_html__( 'Alignment', 'yakeen-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext',
				'label'   	  => esc_html__( 'Button Text', 'yakeen-core' ),
				'default' 	  => esc_html__( 'Contact Us', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'yakeen-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'mode' => 'section_end',
			),

			// Button style 1
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style1',
				'label'   => esc_html__( 'Button Style', 'yakeen-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo1',
				'label'   => esc_html__( 'Button Typo', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-button',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_color',
				'label'   => esc_html__( 'Button Text Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-1' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-button .button-style-1 path.rt-button-cap' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_hover_color',
				'label'   => esc_html__( 'Button Text Hover Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-style-1:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-button .button-style-1:hover path.rt-button-cap' => 'stroke: {{VALUE}}',
				),
			),	
			array(
				'mode' => 'section_end',
			),
			
			// Animation style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'yakeen-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'yakeen-core' ),
					'hide'        => esc_html__( 'Off', 'yakeen-core' ),
				),
				'default' => 'hide',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect',
				'label'   => esc_html__( 'Entrance Animation', 'yakeen-core' ),
				'options' => array(
                    'none' => esc_html__( 'none', 'yakeen-core' ),
					'bounce' => esc_html__( 'bounce', 'yakeen-core' ),
					'flash' => esc_html__( 'flash', 'yakeen-core' ),
					'pulse' => esc_html__( 'pulse', 'yakeen-core' ),
					'rubberBand' => esc_html__( 'rubberBand', 'yakeen-core' ),
					'shakeX' => esc_html__( 'shakeX', 'yakeen-core' ),
					'shakeY' => esc_html__( 'shakeY', 'yakeen-core' ),
					'headShake' => esc_html__( 'headShake', 'yakeen-core' ),
					'swing' => esc_html__( 'swing', 'yakeen-core' ),					
					'fadeIn' => esc_html__( 'fadeIn', 'yakeen-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'yakeen-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'yakeen-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'yakeen-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'yakeen-core' ),					
					'bounceIn' => esc_html__( 'bounceIn', 'yakeen-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'yakeen-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'yakeen-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'yakeen-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'yakeen-core' ),			
					'slideInDown' => esc_html__( 'slideInDown', 'yakeen-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'yakeen-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'yakeen-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'yakeen-core' ), 
                ),
				'default' => 'fadeInUp',
				'condition'   => array('animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Delay', 'digeco-core' ),
				'default' => '1',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'digeco-core' ),
				'default' => '1',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),	
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'rt-button';

		return $this->rt_template( $template, $data );
	}
}