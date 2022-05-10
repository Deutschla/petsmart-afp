<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\yakeen\Customizer\Settings;

use radiustheme\yakeen\Customizer\YakeenTheme_Customizer;
use radiustheme\yakeen\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\yakeen\Customizer\Controls\Customizer_Switch_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class YakeenTheme_Color_Settings extends YakeenTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_color_controls' ) );
	}

    public function register_color_controls( $wp_customize ) {	
	
		// Main Color
		$wp_customize->add_setting('primary_color', 
            array(
                'default' => $this->defaults['primary_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color',
            array(
                'label' => esc_html__('Primary Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('secondary_color', 
            array(
                'default' => $this->defaults['secondary_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color',
            array(
                'label' => esc_html__('Secondary Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));		
				
		$wp_customize->add_setting('body_color', 
            array(
                'default' => $this->defaults['body_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_color',
            array(
                'label' => esc_html__('Body Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));
		
		// Separator
        $wp_customize->add_setting('separator_color', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_color', 
			array(
				'settings' => 'separator_color',
				'section'  => 'color_section',
			)
		));
		
		// Menu Color
		$wp_customize->add_setting('menu_color', 
            array(
                'default' => $this->defaults['menu_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_color',
            array(
                'label' => esc_html__('Menu Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('menu_hover_color', 
            array(
                'default' => $this->defaults['menu_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_color',
            array(
                'label' => esc_html__('Menu Hover Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('menu_color_tr', 
            array(
                'default' => $this->defaults['menu_color_tr'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_color_tr',
            array(
                'label' => esc_html__('Transparent Menu Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));
		
		// Separator
        $wp_customize->add_setting('separator_sub_color', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_sub_color', 
			array(
				'settings' => 'separator_sub_color',
				'section'  => 'color_section',
			)
		));
		
		// Sub menu color		
		$wp_customize->add_setting('submenu_color', 
            array(
                'default' => $this->defaults['submenu_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_color',
            array(
                'label' => esc_html__('Submenu Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('submenu_hover_color', 
            array(
                'default' => $this->defaults['submenu_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover_color',
            array(
                'label' => esc_html__('Submenu Hover Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));

        // Dark Mode Separator
        $wp_customize->add_setting('separator_color_mode', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_color_mode', 
            array(
                'settings' => 'separator_color_mode',
                'section'  => 'color_section',
            )
        ));

        $wp_customize->add_setting( 'color_mode',
            array(
                'default' => $this->defaults['color_mode'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'color_mode',
            array(
                'label' => __( 'Color Mode', 'yakeen' ),
                'section' => 'color_section',
            )
        ) );

        $wp_customize->add_setting( 'code_mode_type',
            array(
                'default' => $this->defaults['code_mode_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( 'code_mode_type',
            array(
                'label' => esc_html__( 'Select Color Mode', 'yakeen' ),
                'section' => 'color_section',
                'description' => esc_html__( 'This is work if you disable "Color Mode Switch"', 'yakeen' ),
                'type' => 'select',
                'choices' => array(
                    'light-mode' => esc_html__( 'Light Mode', 'yakeen' ),
                    'dark-mode' => esc_html__( 'Dark Mode', 'yakeen' ),
                ),
            )
        );

        $wp_customize->add_setting('dark_mode_bgcolor', 
            array(
                'default' => $this->defaults['dark_mode_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_mode_bgcolor',
            array(
                'label' => esc_html__('Dark Mode Background Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));
        $wp_customize->add_setting('dark_mode_light_bgcolor', 
            array(
                'default' => $this->defaults['dark_mode_light_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_mode_light_bgcolor',
            array(
                'label' => esc_html__('Dark Mode Light Background Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));
        $wp_customize->add_setting('dark_mode_color', 
            array(
                'default' => $this->defaults['dark_mode_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_mode_color',
            array(
                'label' => esc_html__('Dark Mode Text Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));
        $wp_customize->add_setting('dark_mode_border_color', 
            array(
                'default' => $this->defaults['dark_mode_border_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_mode_border_color',
            array(
                'label' => esc_html__('Dark Mode Border Color', 'yakeen'),
                'section' => 'color_section', 
            )
        ));

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new YakeenTheme_Color_Settings();
}
