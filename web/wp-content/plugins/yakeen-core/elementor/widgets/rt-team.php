<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Team extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Team', 'yakeen-core' );
		$this->rt_base = 'rt-team';
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
		$terms = get_terms( array( 'taxonomy' => 'yakeen_team_category', 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'yakeen-core' ) );

		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}

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
					'style1' => esc_html__( 'Team Grid 1', 'yakeen-core' ),
					'style2' => esc_html__( 'Team Grid 2', 'yakeen-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Total number of items', 'yakeen-core' ),
				'default' => 6,
				'description' => esc_html__( 'Write -1 to show all', 'yakeen-core' ),
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
				'default' => 'gutters-default',
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'label'   => esc_html__( 'Categories', 'yakeen-core' ),
				'options' => $category_dropdown,
				'default' => '0',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Order By', 'yakeen-core' ),
				'options' => array(
					'date'        => esc_html__( 'Date (Recents comes first)', 'yakeen-core' ),
					'title'       => esc_html__( 'Title', 'yakeen-core' ),
					'menu_order'  => esc_html__( 'Custom Order (Available via Order field inside Page Attributes box)', 'yakeen-core' ),
				),
				'default' => 'date',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'contype',
				'label'   => esc_html__( 'Content Type', 'yakeen-core' ),
				'options' => array(
					'content' => esc_html__( 'Conents', 'yakeen-core' ),
					'excerpt' => esc_html__( 'Excerpts', 'yakeen-core' ),
				),
				'default'     => 'content',
				'description' => esc_html__( 'Display contents from Editor or Excerpt field', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'yakeen-core' ),
				'default' => 12,
				'description' => esc_html__( 'Maximum number of words', 'yakeen-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'yakeen-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'designation_display',
				'label'       => esc_html__( 'Designation Display', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Designation. Default: On', 'yakeen-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'social_display',
				'label'       => esc_html__( 'Social Media Display', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Social Medias. Default: On', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__( 'More Button', 'yakeen-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show Read More', 'yakeen-core' ),
					'hide'        => esc_html__( 'Show Pagination', 'yakeen-core' ),
				),
				'default' => 'show',
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__( 'Button Text', 'yakeen-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
				'default' => esc_html__( 'More Teams', 'yakeen-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__( 'Button Link', 'yakeen-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
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
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'yakeen-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} .team-item .team-thums img',		
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Grid Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 1199px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Desktops: > 991px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'yakeen-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_mobile',
				'label'   => esc_html__( 'Small Phones: < 480px', 'yakeen-core' ),
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
			case 'style2':
			$template = 'team-grid-2';
			break;
			default:
			$template = 'team-grid-1';
			break;
		}  

		return $this->rt_template( $template, $data );
	}
}