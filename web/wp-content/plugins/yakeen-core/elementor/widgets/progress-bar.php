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

class Progress_Bar extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Progress Bar', 'yakeen-core' );
		$this->rt_base = 'rt-progress-bar';
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
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'yakeen-core' ),
				'default' => esc_html__( 'Total Posts', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'number',
				'label'   => esc_html__( 'Percentage', 'yakeen-core' ),
				'default' => array( 'size' => 77 ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number_height',
				'label'   => esc_html__( 'Percentage Height', 'yakeen-core' ),
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'progress_height',
				'label'   => esc_html__( 'Progress Height', 'yakeen-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .rt-progress-bar .progress' => 'height: {{VALUE}}px' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor_color',
				'label'   => esc_html__( 'Bgcolor', 'yakeen-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .progress' => 'background-color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'per_color',
				'label'   => esc_html__( 'Percent Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .rt-progress-bar .progress .progress-bar > span' => 'color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shap_color',
				'label'   => esc_html__( 'Shap Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .rt-progress-bar .progress .progress-bar > span:before' => 'border-top-color: {{VALUE}}' ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'yakeen-core' ),
				'selector' => '{{WRAPPER}} .rt-progress-bar .entry-name',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'yakeen-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .rt-progress-bar .entry-name' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'progress-bar';

		return $this->rt_template( $template, $data );
	}
}