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

class PS_Hero extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = esc_html__( 'PS Hero', 'yakeen-core' );
		$this->rt_base = 'ps-hero';
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
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'hero_style',
                'label'   => esc_html__( 'Hero Style', 'yakeen-core' ),
                'options' => array(
                    'ps-hero-1' => esc_html__( 'Hero 1', 'yakeen-core' ),
                    'ps-hero-2' => esc_html__( 'Hero 2', 'yakeen-core' ),
                ),
                'default' => 'ps-hero-1',
            ),
			/*image default*/
			array(
				'type'        => Controls_Manager::MEDIA,
				'id'          => 'main_image',
				'label'       => esc_html__( 'Image', 'yakeen-core' ),
				'default'     => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'description' => esc_html__( 'Recommended full image', 'yakeen-core' ),
			),
			array(
				'type'      => Group_Control_Image_Size::get_type(),
				'mode'      => 'group',
				'label'     => esc_html__( 'image size', 'yakeen-core' ),
				'name'      => 'icon_image_size',
				'separator' => 'none',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'rt_label',
				'label'   => esc_html__( 'Label', 'yakeen-core' ),
				'default' => esc_html__( 'Drop Date: Monday, Dec. 2, 2021', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'rt_title',
				'label'   => esc_html__( 'Title', 'yakeen-core' ),
				'default' => esc_html__( 'Pawliday Sweaters made pet parents smile last holiday season', 'yakeen-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'rt_p_content',
				'label'   => esc_html__( 'Paragraph Content', 'yakeen-core' ),
				'default' => esc_html__( 'The limited-edition drop helped pet parents get even closer to their besties during the holidays. That’s what Anything for Pets is all about.', 'yakeen-core' ),
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
				'id'      => 'rt_cta_label',
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
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['hero_style'] ) {
			case 'ps-hero-2':
				$template = 'ps-hero-2';
				break;
			default:
				$template = 'ps-hero-1';
				break;
		}

		return $this->rt_template( $template, $data );
	}
}
