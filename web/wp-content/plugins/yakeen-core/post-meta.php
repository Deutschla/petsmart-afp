<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use YakeenTheme;
use YakeenTheme_Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

$prefix = YAKEEN_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'yakeen-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'yakeen-core' ) ) + YakeenTheme_Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'yakeen-core' ), array( 'page', 'post', 'yakeen_team', 'yakeen_service', 'yakeen_case', 'yakeen_testim' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'yakeen-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'yakeen-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'yakeen-core' ),
						'full-width'    => __( 'Full Width', 'yakeen-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'yakeen-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'yakeen-core' ),
					),
					'default'  => 'default',
				),		
				'yakeen_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'yakeen-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'yakeen-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'yakeen-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'on'      => __( 'Enabled', 'yakeen-core' ),
						'off'     => __( 'Disabled', 'yakeen-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'yakeen-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'yakeen-core' ),
						'1'       => __( 'Layout 1', 'yakeen-core' ),
						'2'       => __( 'Layout 2', 'yakeen-core' ),
						'3'       => __( 'Layout 3', 'yakeen-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'yakeen-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'on'      => __( 'Enabled', 'yakeen-core' ),
						'off'     => __( 'Disabled', 'yakeen-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'yakeen-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'1'       => __( 'Layout 1', 'yakeen-core' ),
						'2'       => __( 'Layout 2', 'yakeen-core' ),
						'3'       => __( 'Layout 3', 'yakeen-core' ),
						'4'       => __( 'Layout 4', 'yakeen-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'yakeen-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'1'       => __( 'Layout 1', 'yakeen-core' ),
						'2'       => __( 'Layout 2', 'yakeen-core' ),
						'3'       => __( 'Layout 3', 'yakeen-core' ),
						'4'       => __( 'Layout 4', 'yakeen-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'yakeen-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'on'      => __( 'Enabled', 'yakeen-core' ),
						'off'     => __( 'Disabled', 'yakeen-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'yakeen-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'on'      => __( 'Enabled', 'yakeen-core' ),
						'off'     => __( 'Disabled', 'yakeen-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'yakeen-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'0px'     => __( '0px', 'yakeen-core' ),
						'10px'    => __( '10px', 'yakeen-core' ),
						'20px'    => __( '20px', 'yakeen-core' ),
						'30px'    => __( '30px', 'yakeen-core' ),
						'40px'    => __( '40px', 'yakeen-core' ),
						'50px'    => __( '50px', 'yakeen-core' ),
						'60px'    => __( '60px', 'yakeen-core' ),
						'70px'    => __( '70px', 'yakeen-core' ),
						'80px'    => __( '80px', 'yakeen-core' ),
						'90px'    => __( '90px', 'yakeen-core' ),
						'100px'   => __( '100px', 'yakeen-core' ),
						'110px'   => __( '110px', 'yakeen-core' ),
						'120px'   => __( '120px', 'yakeen-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'yakeen-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'0px'     => __( '0px', 'yakeen-core' ),
						'10px'    => __( '10px', 'yakeen-core' ),
						'20px'    => __( '20px', 'yakeen-core' ),
						'30px'    => __( '30px', 'yakeen-core' ),
						'40px'    => __( '40px', 'yakeen-core' ),
						'50px'    => __( '50px', 'yakeen-core' ),
						'60px'    => __( '60px', 'yakeen-core' ),
						'70px'    => __( '70px', 'yakeen-core' ),
						'80px'    => __( '80px', 'yakeen-core' ),
						'90px'    => __( '90px', 'yakeen-core' ),
						'100px'   => __( '100px', 'yakeen-core' ),
						'110px'   => __( '110px', 'yakeen-core' ),
						'120px'   => __( '120px', 'yakeen-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'yakeen-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'on'	  => __( 'Enable', 'yakeen-core' ),
						'off'	  => __( 'Disable', 'yakeen-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'yakeen-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'on'      => __( 'Enable', 'yakeen-core' ),
						'off'	  => __( 'Disable', 'yakeen-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'yakeen-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'yakeen-core' ),
						'bgimg'   => __( 'Background Image', 'yakeen-core' ),
						'bgcolor' => __( 'Background Color', 'yakeen-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'yakeen-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'yakeen-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'yakeen-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'yakeen-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'yakeen-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'yakeen-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'yakeen-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'yakeen-core' ),
				),
			)
		)
	),
) );

/*-------------------------------------
#. Single Post Gallery
---------------------------------------*/

$Postmeta->add_meta_box( 'yakeen_post_info', __( 'Post Info', 'yakeen-core' ), array( 'post' ), '', '', 'high', array(
	'fields' => array(	
		"yakeen_post_layout" => array(
			'label'   => __( 'Post Template', 'yakeen-core' ),
			'type'    => 'select',
			'options' => array(
				'default'  => __( 'Default', 'yakeen-core' ),
				'post-detail-style1'  => __( 'Layout 1', 'yakeen-core' ),
				'post-detail-style2'  => __( 'Layout 2', 'yakeen-core' ),
				'post-detail-style3'  => __( 'Layout 3', 'yakeen-core' ),
			),
			'default'  => 'default',
		),
		"yakeen_youtube_link" => array(
			'label'   => __( 'Youtube Link', 'yakeen-core' ),
			'type'    => 'text',
			'default'  => '',
			'desc'  => __( 'Only work for the video post format', 'yakeen-core' ),
		),	
	),
) );

/*-------------------------------------
#. Team
---------------------------------------*/
$Postmeta->add_meta_box( 'yakeen_team_settings', __( 'Team Member Settings', 'yakeen-core' ), array( 'yakeen_team' ), '', '', 'high', array(
	'fields' => array(
		'yakeen_team_position' => array(
			'label' => __( 'Position', 'yakeen-core' ),
			'type'  => 'text',
		),
		'yakeen_team_website' => array(
			'label' => __( 'Website', 'yakeen-core' ),
			'type'  => 'text',
		),
		'yakeen_team_email' => array(
			'label' => __( 'Email', 'yakeen-core' ),
			'type'  => 'text',
		),
		'yakeen_team_phone' => array(
			'label' => __( 'Phone', 'yakeen-core' ),
			'type'  => 'text',
		),
		'yakeen_team_address' => array(
			'label' => __( 'Address', 'yakeen-core' ),
			'type'  => 'text',
		),
		'yakeen_team_socials_header' => array(
			'label' => __( 'Socials', 'yakeen-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'yakeen-core' ),
		),
		'yakeen_team_socials' => array(
			'type'  => 'group',
			'value'  => YakeenTheme_Helper::team_socials()
		),
	)
) );

$Postmeta->add_meta_box( 'yakeen_team_skills', __( 'Team Member Skills', 'yakeen-core' ), array( 'yakeen_team' ), '', '', 'high', array(
	'fields' => array(
		'yakeen_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'yakeen-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'yakeen-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Marketing', 'yakeen-core' ),
				),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'yakeen-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'yakeen-core' ),
				),
				'skill_color' => array(
					'label' => __( 'Skill Color', 'yakeen-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, primary color will be used', 'yakeen-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'yakeen_team_contact', __( 'Team Member Contact', 'yakeen-core' ), array( 'yakeen_team' ), '', '', 'high', array(
	'fields' => array(
		'yakeen_team_contact_form' => array(
			'label' => __( 'Contct Shortcode', 'yakeen-core' ),
			'type'  => 'text',
		),
	)
) );