<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Shape extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Shape', 'yakeen-core' );
		$this->rt_base = 'rt-shape';
		parent::__construct( $data, $args );
	}
	
	private function rt_load_scripts(){
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => esc_html__( 'Style', 'yakeen-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Layout 1', 'yakeen-core' ),
					'layout2' => esc_html__( 'Layout 2', 'yakeen-core' ),
				),
				'default' => 'layout1',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'shape_one',
				'label'   => esc_html__( 'Element', 'yakeen-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 113 X 104', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'shape_two',
				'label'   => esc_html__( 'Element 2', 'yakeen-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 113 X 104', 'yakeen-core' ),
				'condition'   => array( 'layout' => array( 'layout2' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'yakeen-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'motion_effects',
				'label'   => esc_html__( 'Effects', 'yakeen-core' ),				
				'options' => array(
					'motion-effects1' 		=> esc_html__( 'Effects 1', 'yakeen-core' ),
					'motion-effects2' 		=> esc_html__( 'Effects 2', 'yakeen-core' ),
					'motion-effects3' 		=> esc_html__( 'Effects 3', 'yakeen-core' ),
					'motion-effects4' 		=> esc_html__( 'Effects 4', 'yakeen-core' ),
					'motion-effects5' 		=> esc_html__( 'Effects 5', 'yakeen-core' ),
				),
				'default' => 'motion-effects1',
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			/*sub title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_image_position',
	            'label'   => esc_html__( 'Image Option', 'yakeen-core' ),
	            'condition'   => array( 'layout' => array( 'layout2' ) ),
	        ),
			// Tab For Normal view.
			array(
				'mode' => 'tabs_start',
				'id'   => 'meta_tabs_start',
			),			
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_one_option',
				'label' => esc_html__( 'Shape One', 'yakeen-core' ),
			),
	        array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'shape_left_right',
				'label'   		=> esc_html__( 'Shape Left / Right', 'yakeen-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => '%',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-shape-layout2 .shape1' => 'left: {{SIZE}}{{UNIT}};',
				)
			),
			array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'shape_top_bottom',
				'label'   		=> esc_html__( 'Shape Top / Bottom', 'yakeen-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'range' => array(
	                'px' => array(
	                    'min' => 0,
	                    'max' => 1000,
	               	),
	               	'%' => array(
	                    'min' => 0,
	                    'max' => 100,
	               	),
		       	),
				'selectors' => array(
					'{{WRAPPER}} .rt-shape-layout2 .shape1' => 'top: {{SIZE}}{{UNIT}};',
				)
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation1',
				'label'   => esc_html__( 'Animation', 'yakeen-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'yakeen-core' ),
					'hide'        => esc_html__( 'Off', 'yakeen-core' ),
				),
				'default' => 'wow',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect1',
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
				'default' => 'fadeInDown',
				'condition'   => array('animation1' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay1',
				'label'   => esc_html__( 'Delay', 'yakeen-core' ),
				'default' => '0.5',
				'condition'   => array( 'animation1' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration1',
				'label'   => esc_html__( 'Duration', 'yakeen-core' ),
				'default' => '1',
				'condition'   => array( 'animation1' => array( 'wow' ) ),
			),			
			array(
				'mode' => 'tab_end',
			),

			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_two_option',
				'label' => esc_html__( 'Shape Two', 'yakeen-core' ),
			),	
			array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'shape_right_left',
				'label'   		=> esc_html__( 'Shape Left / Right', 'yakeen-core' ),						
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => '%',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-shape-layout2 .shape2' => 'right: {{SIZE}}{{UNIT}};',
				)
			),
			array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'shape_bottom_top',
				'label'   		=> esc_html__( 'Shape Top / Bottom', 'yakeen-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'range' => array(
	                'px' => array(
	                    'min' => 0,
	                    'max' => 1000,
	               	),
		       	),
				'selectors' => array(
					'{{WRAPPER}} .rt-shape-layout2 .shape2' => 'top: {{SIZE}}{{UNIT}};',
				)
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation2',
				'label'   => esc_html__( 'Animation', 'yakeen-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'yakeen-core' ),
					'hide'        => esc_html__( 'Off', 'yakeen-core' ),
				),
				'default' => 'wow',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect2',
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
				'default' => 'fadeInRight',
				'condition'   => array('animation2' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay2',
				'label'   => esc_html__( 'Delay', 'yakeen-core' ),
				'default' => '0.5',
				'condition'   => array( 'animation2' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration2',
				'label'   => esc_html__( 'Duration', 'yakeen-core' ),
				'default' => '1',
				'condition'   => array( 'animation2' => array( 'wow' ) ),
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
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

		$template = 'rt-shape';

		return $this->rt_template( $template, $data );
	}
}