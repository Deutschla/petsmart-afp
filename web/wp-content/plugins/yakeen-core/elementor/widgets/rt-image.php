<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Image extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Image', 'yakeen-core' );
		$this->rt_base = 'rt-image';
		parent::__construct( $data, $args );
	}
	private function rt_tween_load_scripts(){
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
				'id'      => 'style',
				'label'   => esc_html__( 'Image Style', 'yakeen-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1' , 'yakeen-core' ),
					'style2' => esc_html__( 'Style 2', 'yakeen-core' ),
				),
				'default' => 'style1',
			),
			/*image default*/
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_logo',
				'label'   => esc_html__( 'Author Image', 'yakeen-core' ),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'yakeen-core' ),
			),	
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'yakeen-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',		
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'rt_title',
				'label'   => esc_html__( 'Title', 'yakeen-core' ),
				'default' => esc_html__( 'The Most Powerful', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'rt_text',
				'label'   => esc_html__( 'Content', 'yakeen-core' ),
				'default' => esc_html__( 'News & Magazine WP Theme', 'yakeen-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'social_display',
				'label'       => esc_html__( 'Social', 'yakeen-core' ),
				'label_on'    => esc_html__( 'On', 'yakeen-core' ),
				'label_off'   => esc_html__( 'Off', 'yakeen-core' ),
				'default'     => 'yes',
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
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['style'] ) {
			case 'style2':
			$template = 'rt-image-2';
			break;
			default:
			$template = 'rt-image-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}