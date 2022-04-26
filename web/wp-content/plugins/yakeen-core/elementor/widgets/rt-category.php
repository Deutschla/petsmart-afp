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

class RT_Category extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Category', 'yakeen-core' );
		$this->rt_base = 'rt-category';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'yakeen-core' ),
				'6'  => esc_html__( '2 Col', 'yakeen-core' ),
				'4'  => esc_html__( '3 Col', 'yakeen-core' ),
				'3'  => esc_html__( '4 Col', 'yakeen-core' ),
				'2'  => esc_html__( '6 Col', 'yakeen-core' ),
			),
		);
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
				'label'   => esc_html__( 'Category Style', 'yakeen-core' ),
				'options' => array(
					'style1' => esc_html__( 'Category Style 1' , 'yakeen-core' ),
					'style2' => esc_html__( 'Category Style 2' , 'yakeen-core' ),
					'style3' => esc_html__( 'Category Style 3', 'yakeen-core' ),
					'style4' => esc_html__( 'Category Style 4', 'yakeen-core' ),
					'style5' => esc_html__( 'Category Style 5', 'yakeen-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'item_space',
				'label'   => esc_html__( 'Item Space', 'yakeen-core' ),
				'options' => array(
					'g-0' => esc_html__( 'Gutters 0', 'yakeen-core' ),
					'g-1' => esc_html__( 'Gutters 1', 'yakeen-core' ),
					'g-2' => esc_html__( 'Gutters 2', 'yakeen-core' ),
					'g-3' => esc_html__( 'Gutters 3', 'yakeen-core' ),
					'g-4' => esc_html__( 'Gutters 4', 'yakeen-core' ),
					'g-5' => esc_html__( 'Gutters 5', 'yakeen-core' ),
				),
				'default' => 'g-4',
			),
			/*Start category*/
			array(
				'id'      => 'catid',
				'label' => esc_html__( 'Categories', 'yakeen-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_taxonomy_drops('category'),
	            'label_block' => true,
	            'multiple' => true,
			),
			/*end category*/
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'yakeen-core' ),
				'default' => esc_html__( 'Today Best Trending Topics', 'yakeen-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .section-title .related-title',
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .section-title .related-title' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			/*Animation section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_cat_style',
	            'label'   => esc_html__( 'Category', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_typo',
				'label'   => esc_html__( 'Category Typo', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-category .rt-item .rt-cat-name',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_title_color',
				'label'   => esc_html__( 'Category Title Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-category .rt-item a.rt-cat-link' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_title_hov_color',
				'label'   => esc_html__( 'Category Title Hover Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-category .rt-item a.rt-cat-link:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_title_hover_bg_color',
				'label'   => esc_html__( 'Category Title Hover Bg Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-category .rt-item .rt-cat-link:hover' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_title_icon_color',
				'label'   => esc_html__( 'Category Title Icon Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-category .rt-item .rt-cat-icon path.main-shape' => 'fill: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_icon_color',
				'label'   => esc_html__( 'Category Icon Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-category .rt-item .rt-cat-icon path' => 'stroke: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_title_underline_color',
				'label'   => esc_html__( 'Category Title Underline Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-category .rt-item .rt-cat-name .rt-cat-link:before' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cat_count',
				'label'       => esc_html__( 'Count Display', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Count. Default: true', 'yakeen-core' ),
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_count_bg_color',
				'label'   => esc_html__( 'Category Count Bg Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-category .rt-item .rt-cat-count' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'item_bottom',
				'label'   => esc_html__( 'Item Padding', 'yakeen-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-category-style3 .rt-content' => 'bottom: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
	        array(
				'mode' => 'section_end',
			),

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'yakeen-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '3',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 991px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Tablets: > 767px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Phones: > 576px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col',
				'label'   => esc_html__( 'Phones: < 576px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
			// Animation
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'style' => array( 'style2' ) ),
	        ),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'yakeen-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'yakeen-core' ),
					'hide'        => esc_html__( 'Off', 'yakeen-core' ),
				),
				'default' => 'wow',
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
				'default' => '0.5',
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
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'yakeen-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'yakeen-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_arrow',
				'label'       => esc_html__( 'Navigation Arrow', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_per_group',
				'label'   => esc_html__( 'slides Per Group', 'yakeen-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => 1,
				),
				'description' => esc_html__( 'slides Per Group. Default: 1', 'yakeen-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'centered_slides',
				'label'       => esc_html__( 'Centered Slides', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Centered Slides. Default: Off', 'yakeen-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style5' ) ),
			),
			array(
				'type'        => Controls_Manager::NUMBER,
				'id'          => 'slides_space',
				'label'       => esc_html__( 'Slides Space', 'consalty-core' ),
				'default'     => 10,
				'description' => esc_html__( 'Slides Space. Default: 10', 'consalty-core' ),
			),		
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_delay',
				'label'   => esc_html__( 'Autoplay Slide Delay', 'yakeen-core' ),
				'default' => 5000,
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'yakeen-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'yakeen-core' ),
				'default' => 1000,
				'description' => esc_html__( 'Set any value for example .8 seconds to play it in every 2 seconds. Default: .8 Seconds', 'yakeen-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'yakeen-core' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Slider Columns
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider_pervice',
				'label'       => esc_html__( 'PerView Options', 'consalty-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'desktop',
				'label'   => esc_html__( 'Desktops: > 1600px', 'consalty-core' ),
				'default' => '4',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
					'4' => esc_html__( '4',  'consalty-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'md_desktop',
				'label'   => esc_html__( 'Desktops: > 1200px', 'consalty-core' ),
				'default' => '3',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
					'4' => esc_html__( '4',  'consalty-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'sm_desktop',
				'label'   => esc_html__( 'Desktops: > 992px', 'consalty-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
					'4' => esc_html__( '4',  'consalty-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'tablet',
				'label'   => esc_html__( 'Tablets: > 768px', 'consalty-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'mobile',
				'label'   => esc_html__( 'Phones: > 576px', 'consalty-core' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
					'4' => esc_html__( '4',  'consalty-core' ),
				),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		if($data['slider_autoplay']=='yes'){
			$data['slider_autoplay']=true;
		}
		else{
			$data['slider_autoplay']=false;
		}

		$swiper_data = array(
			'slidesPerView' 	=>2,
			'centeredSlides'	=>$data['centered_slides']=='yes' ? true:false ,
			'loop'				=>$data['slider_loop']=='yes' ? true:false,
			'spaceBetween'		=>$data['slides_space'],
			'slidesPerGroup'	=>$data['slides_per_group']['size'],
			'centeredSlides'	=>$data['centered_slides']=='yes' ? true:false ,
			'slideToClickedSlide' =>true,
			'autoplay'				=>array(
				'delay'  => $data['slider_autoplay_delay'],
			),
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>$data['mobile']),
				'768'    =>array('slidesPerView' =>$data['tablet']),
				'992'    =>array('slidesPerView' =>$data['sm_desktop']),
				'1200'    =>array('slidesPerView' =>$data['md_desktop']),				
				'1600'    =>array('slidesPerView' =>$data['desktop'])
			),
			'speed'      =>$data['slider_autoplay_speed'],
			'auto'   =>$data['slider_autoplay']
		);

		switch ( $data['style'] ) {
			case 'style5':
			$template = 'rt-category-5';
			break;
			case 'style4':
			$template = 'rt-category-4';
			break;
			case 'style3':
			$data['swiper_data'] = json_encode( $swiper_data );
			$template = 'rt-category-3';
			break;
			case 'style2':
			$template = 'rt-category-2';
			break;
			default:			
			$template = 'rt-category-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}
}