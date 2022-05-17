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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PS_Breadcrumb extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'PS Breadcrumb', 'yakeen-core' );
		$this->rt_base = 'ps-breadcrumb';
		parent::__construct( $data, $args );
	}
	private function rt_tween_load_scripts() {
		wp_enqueue_script( 'tween-max' );
	}

	public function rt_fields() {
		$fields = array(
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_general',
				'label' => esc_html__( 'General', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'rt_page_title',
				'label'   => esc_html__( 'Page Title', 'yakeen-core' ),
				'default' => esc_html__( 'Lorem ipsum dolor', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'rt_site_title',
				'label'   => esc_html__( 'Site Title', 'yakeen-core' ),
				'default' => esc_html__( 'Lorem ipsum', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'rt_category',
				'label'   => esc_html__( 'Category', 'yakeen-core' ),
				'default' => esc_html__( 'Lorem', 'yakeen-core' ),
			),
			array(
                'type'        => Controls_Manager::URL,
                'id'          => 'button_url',
                'label'       => esc_html__( 'Title URL', 'yakeen-core' ),
                'placeholder' => 'https://your-link.com',
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
				$template = 'ps-breadcrumb-1';
				break;
		}

		return $this->rt_template( $template, $data );
	}
}
