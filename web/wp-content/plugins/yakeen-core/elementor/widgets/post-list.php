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

class Post_List extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post List', 'yakeen-core' );
		$this->rt_base = 'rt-post-list';
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
				'label'   => esc_html__( 'Style', 'yakeen-core' ),
				'options' => array(
					'style1' => esc_html__( 'List Layout 1', 'yakeen-core' ),
					'style2' => esc_html__( 'List Layout 2', 'yakeen-core' ),
					'style3' => esc_html__( 'List Layout 3', 'yakeen-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Alignment', 'yakeen-core' ),
				'options' => array(
					'margin-right: auto; text-align: left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'margin-left: auto; margin-right: auto; text-align: center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'margin-left: auto; text-align: right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .entry-content .entry-categories' => 'width: 100%; {{VALUE}};',
					'{{WRAPPER}} .entry-content .entry-title' => '{{VALUE}};',
					'{{WRAPPER}} .entry-content .entry-meta' => '{{VALUE}};',
					'{{WRAPPER}} .entry-content .post_excerpt' => '{{VALUE}};',
					'{{WRAPPER}} .entry-content .post-read-more' => '{{VALUE}};',
				),
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
	                    'max' => 12,
	               	),
		       	),
	            'default' => array(
	                'size' => 3,
	            ),
				'description' => esc_html__( 'Maximum number of Item', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'item_margin',
				'label'   => esc_html__( 'Item Margin', 'yakeen-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-post-list-default .rt-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'title_width',
				'label'   		=> esc_html__( 'Title Width', 'yakeen-core' ),						
				'size_units' => array( 'px', '%', 'em' ),
				'default' => array(
				'unit' => '%',
				'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .entry-content .entry-title' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'yakeen-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of title', 'yakeen-core' ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'yakeen-core' ),
				'label_on'    => esc_html__( 'Show', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Hide', 'yakeen-core' ),
				'default'     => 'yes',
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
					'{{WRAPPER}} .entry-content .post_excerpt' => 'width: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'content_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Content Word Count', 'yakeen-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'yakeen-core' ),
				'condition'   => array( 'content_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'imagespace',
				'label'   => esc_html__( 'Image Spacing', 'yakeen-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-post-list-style1 .rt-item .rt-image' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-post-list-style3 .rt-item .rt-image' => 'margin-right: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'item_gutter',
				'label'   => esc_html__( 'Item Gutter', 'yakeen-core' ),
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
			array(
				'mode' => 'section_end',
			),
			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Meta Option', 'yakeen-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			// Tab For Normal view.
			array(
				'mode' => 'tabs_start',
				'id'   => 'meta_tabs_start',
			),			
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_single_post',
				'label' => esc_html__( 'Single Post', 'yakeen-core' ),
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
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style1', 'style3', 'style2' ) ),
			),
			array(
				'mode' => 'tab_end',
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
				'selector' => '{{WRAPPER}} .rt-post-list-default .rt-item .entry-title',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_small_typo',
				'label'   => esc_html__( 'Title Small Style', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-post-list-default .rt-item.bottom-post-item .entry-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-list-default .rt-item .entry-title a' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-list-default .rt-item .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
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
				'selector' => '{{WRAPPER}} .rt-post-list-default ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-list-default ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-list-default ul.entry-meta li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_icon_color',
				'label'   => esc_html__( 'Meta Icon Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-list-default ul.entry-meta li i' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'meta_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-list-default ul.entry-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
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
				'selector' => '{{WRAPPER}} .rt-post-list-default .rt-item .entry-categories .category-style',
				'selector' => '{{WRAPPER}} .rt-post-list-default .rt-item .entry-categories .post-categories li a',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => esc_html__( 'Category Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-list-default .rt-item .entry-categories a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-list-default .rt-item .entry-categories ul li:before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_hover_color',
				'label'   => esc_html__( 'Category Hover Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-post-list-default .rt-item .entry-categories a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-post-list-default .rt-item .entry-categories ul li a:hover' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'cat_margin',
	            'label'   => __( 'Margin', 'yakeen-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-post-list-default .rt-item .entry-categories' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
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
	            'mode'          => 'responsive',
	            'id'      => 'image_box_width',
	            'label'   => __( 'Box Width', 'yakeen-core' ),
	            'size_units' => [ 'px', '%', 'em' ],
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
	                '{{WRAPPER}} .rt-post-list-default .rt-item .rt-image' => 'max-width: {{SIZE}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
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
					'{{WRAPPER}} .rt-post-list-default .rt-item .rt-image img' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .rt-post-list-default .rt-single-item .rt-image img' => 'min-height: {{SIZE}}{{UNIT}};',
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
			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'yakeen-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style5', 'style6', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
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

		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		switch ( $data['style'] ) {	
			case 'style3':
			$template = 'post-list-3';
			break;
			case 'style2':
			$template = 'post-list-2';
			break;
			default:
			$template = 'post-list-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}
}