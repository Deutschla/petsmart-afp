<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;

if ( ! defined( 'ABSPATH' ) ) exit;

class Post_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post Slider', 'yakeen-core' );
		$this->rt_base = 'rt-post-slider';
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
				'label'   => esc_html__( 'Style', 'yakeen-core' ),
				'options' => array(
					'style1' => esc_html__( 'Slider Layout 1', 'yakeen-core' ),
					'style2' => esc_html__( 'Slider Layout 2', 'yakeen-core' ),
					'style3' => esc_html__( 'Slider Layout 3', 'yakeen-core' ),
					'style4' => esc_html__( 'Slider Layout 4', 'yakeen-core' ),
					'style5' => esc_html__( 'Slider Layout 5', 'yakeen-core' ),
				),
				'default' => 'style1',
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'yakeen-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'yakeen-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'yakeen-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_orderby',
				'label'   => esc_html__( 'Post Sorting', 'yakeen-core' ),				
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'yakeen-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'yakeen-core' ),
					'menu_order' 	=> esc_html__( 'Custom Order', 'yakeen-core' ),
					'title' 		=> esc_html__( 'By Name', 'yakeen-core' ),
				),
				'default' => 'recent',
			),
			/*Start category*/
			array(
				'id'      => 'query_type',
				'label' => esc_html__( 'Query type', 'yakeen-core' ),
            	'type' => Controls_Manager::SELECT,
            	'default' => 'category',
            	'options' => array(
					'category'  => esc_html__( 'Category', 'yakeen-core' ),
                	'posts' => esc_html__( 'Posts', 'yakeen-core' ),
				),
			),
			array(
				'id'      => 'postid',
				'label' => esc_html__( 'Selects posts', 'yakeen-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_all_posts('post'),
	            'label_block' => true,
	            'multiple' => true,
            	'condition' => array(
					'query_type' => 'posts',
				),
			),
			array(
				'id'      => 'catid',
				'label' => esc_html__( 'Categories', 'yakeen-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_taxonomy_drops('category'),
	            'label_block' => true,
	            'multiple' => true,
            	'condition' => array(
					'query_type' => 'category',
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat_layout',
				'label'   => esc_html__( 'Category Layout', 'yakeen-core' ),				
				'options' => array(
					'cat_layout1' 		=> esc_html__( 'Cat Layout 1', 'yakeen-core' ),
					'cat_layout2' 		=> esc_html__( 'Cat Layout 2', 'yakeen-core' ),
				),
				'default' => 'cat_layout1',
			),
			/*end category*/
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'yakeen-core' ),
				'range' => array(
	                'px' => array(
	                    'min' => 1,
	                    'max' => 27,
	               	),
		       	),
	            'default' => array(
	                'size' => 3,
	            ),
				'description' => esc_html__( 'Maximum number of Item 27', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'slideper_view',
				'label'   => esc_html__( 'Slider Per View', 'yakeen-core' ),
				'range' => array(
	                'px' => array(
	                    'min' => 1,
	                    'max' => 12,
	               	),
		       	),
	            'default' => array(
	                'size' => 3,
	            ),
				'description' => esc_html__( 'Maximum number of Item 12', 'yakeen-core' ),
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Option', 'yakeen-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_author',
				'label'       => esc_html__( 'Show Author', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_date',
				'label'       => esc_html__( 'Show Date', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_category',
				'label'       => esc_html__( 'Show Categories', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_comment',
				'label'       => esc_html__( 'Show Comment', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_length',
				'label'       => esc_html__( 'Show Lenght', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_view',
				'label'       => esc_html__( 'Show View', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_video',
				'label'       => esc_html__( 'Show Video', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_read',
				'label'       => esc_html__( 'Show Read More', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'no',
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
			// Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title Typo', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-item .entry-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-item .entry-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'yakeen-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of title', 'yakeen-core' ),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-item .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Content style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_content_style',
	            'label'   => esc_html__( 'Content Style', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'yakeen-core' ),
				'default' => 20,
				'condition' => array( 'content_display' => array( 'yes' ) ),
				'description' => esc_html__( 'Maximum number of words', 'yakeen-core' ),
			),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content_typo', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-post-slider-default .rt-item .post_excerpt p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-slider-default .rt-item .post_excerpt p' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-slider-default .rt-item .post_excerpt p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),			
			// Meta style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_meta_style',
	            'label'   => esc_html__( 'Meta Style', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'meta_typo',
				'label'   => esc_html__( 'Meta Typo', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-post-slider-default ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-slider-default ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-slider-default ul.entry-meta li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-slider-default .rt-item .rt-cat a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_author_color',
				'label'   => esc_html__( 'Meta Author Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-slider-default .rt-item .post-author a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_icon_color',
				'label'   => esc_html__( 'Meta Icon Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-slider-default ul.entry-meta li i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-slider-default ul.entry-meta li svg path' => 'stroke: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'meta_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-slider-default ul.entry-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'mode' => 'section_end',
			),
			// Category style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_category_style',
	            'label'   => esc_html__( 'Category Style', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_typo',
				'label'   => esc_html__( 'Category Typo', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-post-slider-default .rt-item .entry-categories .category-style',
				'selector' => '{{WRAPPER}} .rt-post-slider-default .rt-item .entry-categories .post-categories li a',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => esc_html__( 'Category Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-slider-default .rt-item .entry-categories a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-slider-default .rt-item .entry-categories ul li:before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_hover_color',
				'label'   => esc_html__( 'Category Hover Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-slider-default .rt-item .entry-categories a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-slider-default .rt-item .entry-categories ul li a:hover' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'cat_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-slider-default .rt-item .entry-categories' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'mode' => 'section_end',
			),
			// Image style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_image_style',
	            'label'   => esc_html__( 'Image', 'yakeen-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_width',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Width', 'yakeen-core' ),
				'size_units' => array( '%', 'px', 'vw' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
					'vw' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-post-slider-default .rt-item .rt-image img' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_height',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Height', 'yakeen-core' ),
				'size_units' => array( '%', 'px', 'vw' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
					'vw' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-post-slider-default .rt-single-item .rt-image img' => 'min-height: {{SIZE}}{{UNIT}};',
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
				'label'   => esc_html__( 'Delay', 'yakeen-core' ),
				'default' => '0.5',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'yakeen-core' ),
				'default' => '1',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Slider Columns
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider_pervice',
				'label'       => esc_html__( 'Per View Options', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'desktop',
				'label'   => esc_html__( 'Desktops: > 1600px', 'yakeen-core' ),
				'default' => '4',
				'options' => array(
					'1' => esc_html__( '1', 'yakeen-core' ),
					'2' => esc_html__( '2', 'yakeen-core' ),
					'3' => esc_html__( '3',  'yakeen-core' ),
					'4' => esc_html__( '4',  'yakeen-core' ),
					'5' => esc_html__( '5',  'yakeen-core' ),
					'6' => esc_html__( '6',  'yakeen-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'md_desktop',
				'label'   => esc_html__( 'Desktops: > 1200px', 'yakeen-core' ),
				'default' => '3',
				'options' => array(
					'1' => esc_html__( '1', 'yakeen-core' ),
					'2' => esc_html__( '2', 'yakeen-core' ),
					'3' => esc_html__( '3',  'yakeen-core' ),
					'4' => esc_html__( '4',  'yakeen-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'sm_desktop',
				'label'   => esc_html__( 'Desktops: > 992px', 'yakeen-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'yakeen-core' ),
					'2' => esc_html__( '2', 'yakeen-core' ),
					'3' => esc_html__( '3',  'yakeen-core' ),
					'4' => esc_html__( '4',  'yakeen-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'tablet',
				'label'   => esc_html__( 'Tablets: > 768px', 'yakeen-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'yakeen-core' ),
					'2' => esc_html__( '2', 'yakeen-core' ),
					'3' => esc_html__( '3',  'yakeen-core' ),
					'4' => esc_html__( '4',  'yakeen-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'mobile',
				'label'   => esc_html__( 'Phones: > 576px', 'yakeen-core' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( '1', 'yakeen-core' ),
					'2' => esc_html__( '2', 'yakeen-core' ),
					'3' => esc_html__( '3',  'yakeen-core' ),
					'4' => esc_html__( '4',  'yakeen-core' ),
				),
			),
			array(
				'mode' => 'section_end',
			),

			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'yakeen-core' ),
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
				'id'          => 'display_navigation',
				'label'       => esc_html__( 'Navigation', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation. Default: On', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'nav_style',
				'label'   => esc_html__( 'Nav Style', 'yakeen-core' ),				
				'options' => array(
					'rt-swiper-nav-1' 		=> esc_html__( 'Nav Style 1', 'yakeen-core' ),
					'rt-swiper-nav-2' 		=> esc_html__( 'Nav Style 2', 'yakeen-core' ),
					'rt-swiper-nav-3' 		=> esc_html__( 'Nav Style 3', 'yakeen-core' ),
					'rt-swiper-nav-4' 		=> esc_html__( 'Nav Style 4', 'yakeen-core' ),
					'rt-swiper-nav-5' 		=> esc_html__( 'Nav Style 5', 'yakeen-core' ),
					'rt-swiper-nav-6' 		=> esc_html__( 'Nav Style 6', 'yakeen-core' ),
					'rt-swiper-nav-7' 		=> esc_html__( 'Nav Style 7', 'yakeen-core' ),
					'rt-swiper-nav-8' 		=> esc_html__( 'Nav Style 8', 'yakeen-core' ),
				),
				'default' => 'rt-swiper-nav-1',
				'condition'   => array( 'display_navigation' => array( 'yes' ) ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_pagination',
				'label'       => esc_html__( 'Pagination', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Pagination. Default: Off', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'pagination_style',
				'label'   => esc_html__( 'Pagination Style', 'yakeen-core' ),				
				'options' => array(
					'rt-swiper-pagination-1' 		=> esc_html__( 'Pagination Style 1', 'yakeen-core' ),
					'rt-swiper-pagination-2' 		=> esc_html__( 'Pagination Style 2', 'yakeen-core' ),
				),
				'default' => 'rt-swiper-pagination-1',
				'condition'   => array( 'display_pagination' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_per_group',
				'label'   => esc_html__( 'slides Per Group', 'yakeen-core' ),
				'default' => array(
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
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_space',
				'label'   => esc_html__( 'Slides Space', 'yakeen-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => 24,
				),
				'description' => esc_html__( 'Slides Space. Default: 24', 'yakeen-core' ),
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
			'loop'				=>$data['slider_loop']=='yes' ? true:false,
			'spaceBetween'		=>$data['slides_space']['size'],
			'slidesPerGroup'	=>$data['slides_per_group']['size'],
			'centeredSlides'	=>$data['centered_slides']=='yes' ? true:false ,
			'slideToClickedSlide' =>true,
			'autoplay'				=>array(
				'delay'  => $data['slider_autoplay_delay'],
			),
			'speed'      =>$data['slider_autoplay_speed'],
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>$data['mobile']),
				'768'    =>array('slidesPerView' =>$data['tablet']),
				'992'    =>array('slidesPerView' =>$data['sm_desktop']),
				'1200'    =>array('slidesPerView' =>$data['md_desktop']),				
				'1600'    =>array('slidesPerView' =>$data['desktop'])
			),
			'auto'   =>$data['slider_autoplay']
		);
		
		switch ( $data['style'] ) {
			case 'style5':
			$template = 'post-slider-5';
			break;
			case 'style4':
			$template = 'post-slider-4';
			break;
			case 'style3':
			$template = 'post-slider-3';
			break;
			case 'style2':
			$template = 'post-slider-2';
			break;
			default:
			$template = 'post-slider-1';
			break;
		}

		$data['swiper_data'] = json_encode( $swiper_data );   
		
		return $this->rt_template( $template, $data );
	}
}