<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Title extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Section Title', 'yakeen-core' );
		$this->rt_base = 'rt-title';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'Section Title', 'yakeen-core' ),
			),
			/*box title*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Title Style', 'yakeen-core' ),
				'options' => array(
					'style1' => esc_html__( 'Title Style 1' , 'yakeen-core' ),
					'style2' => esc_html__( 'Title Style 2', 'yakeen-core' ),
					'style3' => esc_html__( 'Title Style 3', 'yakeen-core' ),
					'style4' => esc_html__( 'Title Style 4', 'yakeen-core' ),
					'style5' => esc_html__( 'Title Style 5', 'yakeen-core' ),
					'style6' => esc_html__( 'Title Style 6', 'yakeen-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
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
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'yakeen-core' ),
				'default' => 'Wellcome To Yakeen',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'yakeen-core' ),
				'default' => '<span>Yakeen</span> Is a Lifestyle Blog',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),			
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'yakeen-core' ),
				'default' => esc_html__( 'Grursus mal suada faci lisis Lorem ipsum dolarorit more ametion consectetur elit. Vesti at bulum nec odio aea the dumm rsus consectetur elit.', 'yakeen-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'title_bg',
				'label'   => esc_html__( 'Title Bg Image', 'yakeen-core' ),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'yakeen-core' ),
				'condition'   => array( 'style' => array( 'style6' ) ),
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext',
				'label'   	  => esc_html__( 'Button Text', 'yakeen-core' ),
				'default' 	  => esc_html__( 'View More', 'yakeen-core' ),
				'label_block' => true,
				'condition'   => array( 'style' => array( 'style6' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'buttontext_color',
				'label'   => esc_html__( 'Button Text Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-section-title .style6 .rt-button a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-section-title .style6 .rt-button a svg path' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'yakeen-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style6' ) ),
			),				
			array(
				'mode' => 'section_end',
			),

			/*title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-section-title .entry-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-section-title .entry-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_shape_color',
				'label'   => esc_html__( 'Title Shape Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-section-title .title-icon path.main-shape' => 'fill: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-section-title .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'title_width',
				'label'   		=> esc_html__( 'Content Width', 'yakeen-core' ),						
				'size_units' => array( 'px', '%', 'em' ),
				'default' => array(
				'unit' => '%',
				'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-section-title .entry-title' => 'width: {{SIZE}}{{UNIT}};',
				)
			),

	        array(
				'mode' => 'section_end',
			),

			/*sub title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_subtitle_style',
	            'label'   => esc_html__( 'Sub Title', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
	        ),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Style', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-section-title .sub-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-section-title .sub-title' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'sub_title_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-section-title .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'mode' => 'section_end',
			),

	        /*Content section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_content_style',
	            'label'   => esc_html__( 'Content', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Style', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-section-title .entry-text',
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-section-title .entry-text' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-section-title .entry-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'content_width',
				'label'   		=> esc_html__( 'Content Width', 'yakeen-core' ),						
				'size_units' => array( 'px', '%', 'em' ),
				'default' => array(
				'unit' => '%',
				'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-section-title .entry-text' => 'width: {{SIZE}}{{UNIT}};',
				)
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
				'mode' => 'section_end',
			),

		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['style'] ) {
			case 'style6':
			$template = 'title-6';
			break;
			case 'style5':
			$template = 'title-5';
			break;
			case 'style4':
			$template = 'title-4';
			break;
			case 'style3':
			$template = 'title-3';
			break;
			case 'style2':
			$template = 'title-2';
			break;
			default:
			$template = 'title-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}