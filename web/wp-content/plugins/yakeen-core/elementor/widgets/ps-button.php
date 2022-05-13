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

class PS_Button extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'PS Button', 'yakeen-core' );
		$this->rt_base = 'ps-button';
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
                'id'      => 'cta_style',
                'label'   => esc_html__( 'CTA Style', 'yakeen-core' ),
                'options' => array(
                    'ps-cta-1' => esc_html__( 'CTA 1', 'yakeen-core' ),
                    'ps-cta-2' => esc_html__( 'CTA 2', 'yakeen-core' ),
                ),
                'default' => 'ps-cta-1',
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'ps_cta_label',
                'label'   => esc_html__( 'CTA Label', 'yakeen-core' ),
                'default' => esc_html__( 'Learn more', 'yakeen-core' ),
            ),
            array(
                'type'        => Controls_Manager::URL,
                'id'          => 'button_url',
                'label'       => esc_html__( 'CTA URL', 'yakeen-core' ),
                'placeholder' => 'https://your-link.com',
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
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
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

		$template = 'ps-button';

		return $this->rt_template( $template, $data );
	}
}
