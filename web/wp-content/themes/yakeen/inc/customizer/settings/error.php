<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\yakeen\Customizer\Settings;

use radiustheme\yakeen\Customizer\YakeenTheme_Customizer;
use radiustheme\yakeen\Customizer\Controls\Customizer_Switch_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class YakeenTheme_Error_Settings extends YakeenTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_error_controls' ) );
	}

    public function register_error_controls( $wp_customize ) {
		
		$wp_customize->add_setting('error_bodybg_color', 
            array(
                'default' => $this->defaults['error_bodybg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_bodybg_color',
            array(
                'label' => esc_html__('Body Background Color', 'yakeen'),
                'section' => 'error_section', 
            )
        ));
		// Error image
        $wp_customize->add_setting( 'error_image',
            array(
                'default' => $this->defaults['error_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_image',
            array(
                'label' => __( 'Error Image', 'yakeen' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'yakeen' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'yakeen' ),
                    'change' => __( 'Change File', 'yakeen' ),
                    'default' => __( 'Default', 'yakeen' ),
                    'remove' => __( 'Remove', 'yakeen' ),
                    'placeholder' => __( 'No file selected', 'yakeen' ),
                    'frame_title' => __( 'Select File', 'yakeen' ),
                    'frame_button' => __( 'Choose File', 'yakeen' ),
                )
            )
        ) );
        // Error woman image
        $wp_customize->add_setting( 'error_woman_image',
            array(
                'default' => $this->defaults['error_woman_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_woman_image',
            array(
                'label' => __( 'Error Woman Image', 'yakeen' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'yakeen' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'yakeen' ),
                    'change' => __( 'Change File', 'yakeen' ),
                    'default' => __( 'Default', 'yakeen' ),
                    'remove' => __( 'Remove', 'yakeen' ),
                    'placeholder' => __( 'No file selected', 'yakeen' ),
                    'frame_title' => __( 'Select File', 'yakeen' ),
                    'frame_button' => __( 'Choose File', 'yakeen' ),
                )
            )
        ) );
		
        // Error Text
        $wp_customize->add_setting( 'error_text1',
            array(
                'default' => $this->defaults['error_text1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text1',
            array(
                'label' => __( 'Error Heading', 'yakeen' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'error_text2',
            array(
                'default' => $this->defaults['error_text2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text2',
            array(
                'label' => __( 'Error Text', 'yakeen' ),
                'section' => 'error_section',
                'type' => 'textarea',
            )
        );
        // Button Text
        $wp_customize->add_setting( 'error_buttontext',
            array(
                'default' => $this->defaults['error_buttontext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_buttontext',
            array(
                'label' => __( 'Button Text', 'yakeen' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting('error_text1_color', 
            array(
                'default' => $this->defaults['error_text1_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text1_color',
            array(
                'label' => esc_html__('Error Heading Color', 'yakeen'),
                'section' => 'error_section', 
            )
        ));
		
		$wp_customize->add_setting('error_text2_color', 
            array(
                'default' => $this->defaults['error_text2_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text2_color',
            array(
                'label' => esc_html__('Error Text Color', 'yakeen'),
                'section' => 'error_section', 
            )
        ));

        /*Animation*/
        $wp_customize->add_setting( 'error_animation',
            array(
                'default' => $this->defaults['error_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation',
            array(
                'label' => __( 'Animation On/Off', 'yakeen' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'yakeen' ),
                    'hide' => esc_html__( 'Animation Off', 'yakeen' ),
                ),
            )
        );

        $wp_customize->add_setting( 'error_animation_effect',
            array(
                'default' => $this->defaults['error_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'yakeen' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'none' => esc_html__( 'none', 'yakeen' ),
                    'bounce' => esc_html__( 'bounce', 'yakeen' ),
                    'flash' => esc_html__( 'flash', 'yakeen' ),
                    'pulse' => esc_html__( 'pulse', 'yakeen' ),
                    'rubberBand' => esc_html__( 'rubberBand', 'yakeen' ),
                    'shakeX' => esc_html__( 'shakeX', 'yakeen' ),
                    'shakeY' => esc_html__( 'shakeY', 'yakeen' ),
                    'headShake' => esc_html__( 'headShake', 'yakeen' ),
                    'swing' => esc_html__( 'swing', 'yakeen' ),                 
                    'fadeIn' => esc_html__( 'fadeIn', 'yakeen' ),
                    'fadeInDown' => esc_html__( 'fadeInDown', 'yakeen' ),
                    'fadeInLeft' => esc_html__( 'fadeInLeft', 'yakeen' ),
                    'fadeInRight' => esc_html__( 'fadeInRight', 'yakeen' ),
                    'fadeInUp' => esc_html__( 'fadeInUp', 'yakeen' ),                   
                    'bounceIn' => esc_html__( 'bounceIn', 'yakeen' ),
                    'bounceInDown' => esc_html__( 'bounceInDown', 'yakeen' ),
                    'bounceInLeft' => esc_html__( 'bounceInLeft', 'yakeen' ),
                    'bounceInRight' => esc_html__( 'bounceInRight', 'yakeen' ),
                    'bounceInUp' => esc_html__( 'bounceInUp', 'yakeen' ),           
                    'slideInDown' => esc_html__( 'slideInDown', 'yakeen' ),
                    'slideInLeft' => esc_html__( 'slideInLeft', 'yakeen' ),
                    'slideInRight' => esc_html__( 'slideInRight', 'yakeen' ),
                    'slideInUp' => esc_html__( 'slideInUp', 'yakeen' ), 
                ),
            )
        );

        $wp_customize->add_setting( 'animated_image',
            array(
                'default' => $this->defaults['animated_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'animated_image',
            array(
                'label' => __( 'Display Animate Images', 'yakeen' ),
                'section' => 'error_section',
            )
        ) );
        $wp_customize->add_setting( 'animated_bg_image',
            array(
                'default' => $this->defaults['animated_bg_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'animated_bg_image',
            array(
                'label' => __( 'Display Animate Bg Images', 'yakeen' ),
                'section' => 'error_section',
            )
        ) );
		
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new YakeenTheme_Error_Settings();
}
