<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\yakeen\Customizer\Settings;

use radiustheme\yakeen\Customizer\YakeenTheme_Customizer;
use radiustheme\yakeen\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\yakeen\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class YakeenTheme_Footer_Settings extends YakeenTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_footer_controls' ) );
	}

    public function register_footer_controls( $wp_customize ) {
		
		// Footer off & on
		$wp_customize->add_setting( 'footer_area',
            array(
                'default' => $this->defaults['footer_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_area',
            array(
                'label' => __( 'Footer Top', 'yakeen' ),
                'section' => 'footer_section',
            )
        ) );
        $wp_customize->add_setting( 'copyright_area',
            array(
                'default' => $this->defaults['copyright_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'copyright_area',
            array(
                'label' => __( 'Footer Copyright', 'yakeen' ),
                'section' => 'footer_section',
            )
        ) );
        $wp_customize->add_setting( 'footer_sticky',
            array(
                'default' => $this->defaults['footer_sticky'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_sticky',
            array(
                'label' => __( 'Footer Sticky', 'yakeen' ),
                'section' => 'footer_section',
            )
        ) );
		
        // Footer Style
        $wp_customize->add_setting( 'footer_style',
            array(
                'default' => $this->defaults['footer_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'footer_style',
            array(
                'label' => __( 'Footer Layout', 'yakeen' ),
                'description' => esc_html__( 'You can set default footer form here.', 'yakeen' ),
                'section' => 'footer_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-1.jpg',
                        'name' => __( 'Layout 1', 'yakeen' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-2.jpg',
                        'name' => __( 'Layout 2', 'yakeen' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-3.jpg',
                        'name' => __( 'Layout 3', 'yakeen' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-4.jpg',
                        'name' => __( 'Layout 4', 'yakeen' )
                    ),
                    'ps' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-4.jpg',
                        'name' => __( 'Layout ps', 'yakeen' )
                    ),
                )
            )
        ) );
		// Footer 1 column
		$wp_customize->add_setting( 'footer_column_1',
            array(
                'default' => $this->defaults['footer_column_1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );
        $wp_customize->add_control( 'footer_column_1',
            array(
                'label' => __( 'Number of Columns for Footer', 'yakeen' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'yakeen' ),
                    '2' => esc_html__( '2 Columns', 'yakeen' ),
                    '3' => esc_html__( '3 Columns', 'yakeen' ),
                    '4' => esc_html__( '4 Columns', 'yakeen' ),
                ),
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );
		
		// Footer 1 bgtype
		$wp_customize->add_setting( 'footer_bgtype',
            array(
                'default' => $this->defaults['footer_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype',
            array(
                'label' => __( 'Background Type', 'yakeen' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'yakeen' ),
                'type' => 'select',
                'choices' => array(
					'fbgcolor' => esc_html__( 'BG Color', 'yakeen' ),
                    'fbgimg' => esc_html__( 'BG Image', 'yakeen' ),
                ),
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );

        // Footer 1 background color
        $wp_customize->add_setting('fbgcolor', 
            array(
                'default' => $this->defaults['fbgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor',
            array(
                'label' => esc_html__('Background Color', 'yakeen'),
                'settings' => 'fbgcolor', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer1_bgcolor_type_condition',
            )
        ));
        // Footer 1 background image
        $wp_customize->add_setting( 'fbgimg',
            array(
                'default' => $this->defaults['fbgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg',
            array(
                'label' => __( 'Background Image', 'yakeen' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'yakeen' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'yakeen' ),
                    'change' => __( 'Change File', 'yakeen' ),
                    'default' => __( 'Default', 'yakeen' ),
                    'remove' => __( 'Remove', 'yakeen' ),
                    'placeholder' => __( 'No file selected', 'yakeen' ),
                    'frame_title' => __( 'Select File', 'yakeen' ),
                    'frame_button' => __( 'Choose File', 'yakeen' ),
                ),
                'active_callback' => 'rttheme_footer1_bgimg_type_condition',
            )
        ) );

        /*Footer 2 bgtype*/
        $wp_customize->add_setting( 'footer_bgtype2',
            array(
                'default' => $this->defaults['footer_bgtype2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype2',
            array(
                'label' => __( 'Background Type', 'yakeen' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'yakeen' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor2' => esc_html__( 'BG Color', 'yakeen' ),
                    'fbgimg2' => esc_html__( 'BG Image', 'yakeen' ),
                ),
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        );		
        /*Footer 2 background color*/
        $wp_customize->add_setting('fbgcolor2', 
            array(
                'default' => $this->defaults['fbgcolor2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor2',
            array(
                'label' => esc_html__('Background Color', 'yakeen'),
                'settings' => 'fbgcolor2', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer2_bgcolor_type_condition',
            )
        ));		

        /*Footer 2 background image*/
        $wp_customize->add_setting( 'fbgimg2',
            array(
                'default' => $this->defaults['fbgimg2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg2',
            array(
                'label' => __( 'Background Image', 'yakeen' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'yakeen' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'yakeen' ),
                    'change' => __( 'Change File', 'yakeen' ),
                    'default' => __( 'Default', 'yakeen' ),
                    'remove' => __( 'Remove', 'yakeen' ),
                    'placeholder' => __( 'No file selected', 'yakeen' ),
                    'frame_title' => __( 'Select File', 'yakeen' ),
                    'frame_button' => __( 'Choose File', 'yakeen' ),
                ),
                'active_callback' => 'rttheme_footer2_bgimg_type_condition',
            )
        ) );

        // Footer 3 bgtype
        $wp_customize->add_setting( 'footer_bgtype3',
            array(
                'default' => $this->defaults['footer_bgtype3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype3',
            array(
                'label' => __( 'Background Type', 'yakeen' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'yakeen' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor3' => esc_html__( 'BG Color', 'yakeen' ),
                    'fbgimg3' => esc_html__( 'BG Image', 'yakeen' ),
                ),
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        );      
        // Footer 3 background color
        $wp_customize->add_setting('fbgcolor3', 
            array(
                'default' => $this->defaults['fbgcolor3'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor3',
            array(
                'label' => esc_html__('Background Color', 'yakeen'),
                'settings' => 'fbgcolor3', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer3_bgcolor_type_condition',
            )
        ));     

        // Footer 3 background image
        $wp_customize->add_setting( 'fbgimg3',
            array(
                'default' => $this->defaults['fbgimg3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg3',
            array(
                'label' => __( 'Background Image', 'yakeen' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'yakeen' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'yakeen' ),
                    'change' => __( 'Change File', 'yakeen' ),
                    'default' => __( 'Default', 'yakeen' ),
                    'remove' => __( 'Remove', 'yakeen' ),
                    'placeholder' => __( 'No file selected', 'yakeen' ),
                    'frame_title' => __( 'Select File', 'yakeen' ),
                    'frame_button' => __( 'Choose File', 'yakeen' ),
                ),
                'active_callback' => 'rttheme_footer3_bgimg_type_condition',
            )
        ) );

        /*Footer 4 bgtype*/
        $wp_customize->add_setting( 'footer_bgtype4',
            array(
                'default' => $this->defaults['footer_bgtype4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype4',
            array(
                'label' => __( 'Background Type', 'yakeen' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'yakeen' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor4' => esc_html__( 'BG Color', 'yakeen' ),
                    'fbgimg4' => esc_html__( 'BG Image', 'yakeen' ),
                ),
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        );      
        /*Footer 4 background color*/
        $wp_customize->add_setting('fbgcolor4', 
            array(
                'default' => $this->defaults['fbgcolor4'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor4',
            array(
                'label' => esc_html__('Background Color', 'yakeen'),
                'settings' => 'fbgcolor4', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer4_bgcolor_type_condition',
            )
        ));     

        /*Footer 4 background image*/
        $wp_customize->add_setting( 'fbgimg4',
            array(
                'default' => $this->defaults['fbgimg4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg4',
            array(
                'label' => __( 'Background Image', 'yakeen' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'yakeen' ),
                'section' => 'footer_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'yakeen' ),
                    'change' => __( 'Change File', 'yakeen' ),
                    'default' => __( 'Default', 'yakeen' ),
                    'remove' => __( 'Remove', 'yakeen' ),
                    'placeholder' => __( 'No file selected', 'yakeen' ),
                    'frame_title' => __( 'Select File', 'yakeen' ),
                    'frame_button' => __( 'Choose File', 'yakeen' ),
                ),
                'active_callback' => 'rttheme_footer4_bgimg_type_condition',
            )
        ) );


        /*Footer 1 Color*/ 
		$wp_customize->add_setting('footer_title_color', 
            array(
                'default' => $this->defaults['footer_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        ));		
		$wp_customize->add_setting('footer_color', 
            array(
                'default' => $this->defaults['footer_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color',
            array(
                'label' => esc_html__('Footer Text Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        ));		
		$wp_customize->add_setting('footer_link_color', 
            array(
                'default' => $this->defaults['footer_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        ));		
		$wp_customize->add_setting('footer_link_hover_color', 
            array(
                'default' => $this->defaults['footer_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        ));
        // Footer 2 copyright color
        $wp_customize->add_setting('copyright_text_color', 
            array(
                'default' => $this->defaults['copyright_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text_color',
            array(
                'label' => esc_html__('Copyright Text Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        ));
        $wp_customize->add_setting('copyright_link_color', 
            array(
                'default' => $this->defaults['copyright_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_link_color',
            array(
                'label' => esc_html__('Copyright Link Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        )); 
        $wp_customize->add_setting('copyright_hover_color', 
            array(
                'default' => $this->defaults['copyright_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_hover_color',
            array(
                'label' => esc_html__('Copyright Hover Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        )); 

        /* Footer 2 color */
        $wp_customize->add_setting('footer2_title_color', 
            array(
                'default' => $this->defaults['footer2_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ));
        
        $wp_customize->add_setting('footer2_color', 
            array(
                'default' => $this->defaults['footer2_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_color',
            array(
                'label' => esc_html__('Footer Text Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ));

        $wp_customize->add_setting('footer2_link_color', 
            array(
                'default' => $this->defaults['footer2_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ));

        $wp_customize->add_setting('footer2_hover_color', 
            array(
                'default' => $this->defaults['footer2_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_hover_color',
            array(
                'label' => esc_html__('Footer Hover Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ));

        $wp_customize->add_setting( 'footer2_logo',
            array(
                'default' => $this->defaults['footer2_logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer2_logo',
            array(
                'label' => __( 'Footer Logo', 'yakeen' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ) );

        /* Footer 2 Social */
        $wp_customize->add_setting( 'footer2_social',
            array(
                'default' => $this->defaults['footer2_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer2_social',
            array(
                'label' => __( 'Footer Social', 'yakeen' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ) );

        /* Footer 2 Shape */
        $wp_customize->add_setting( 'footer2_animate_shape',
            array(
                'default' => $this->defaults['footer2_animate_shape'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer2_animate_shape',
            array(
                'label' => __( 'Footer Animate Shape', 'yakeen' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ) );
        
        /*footer 2 logo*/
        $wp_customize->add_setting('footer2_logo_light',
            array(
              'default'           => $this->defaults['footer2_logo_light'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer2_logo_light',
            array(
                'label'         => esc_html__('Footer Logo', 'yakeen'),
                'description'   => esc_html__('This is the description for the Media Control', 'yakeen'),
                'section'       => 'footer_section',
                'mime_type'     => 'image',
                'button_labels' => array(
                    'select'       => esc_html__('Select File', 'yakeen'),
                    'change'       => esc_html__('Change File', 'yakeen'),
                    'default'      => esc_html__('Default', 'yakeen'),
                    'remove'       => esc_html__('Remove', 'yakeen'),
                    'placeholder'  => esc_html__('No file selected', 'yakeen'),
                    'frame_title'  => esc_html__('Select File', 'yakeen'),
                    'frame_button' => esc_html__('Choose File', 'yakeen'),
                ),
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ));

        /* = Footer 3
        ======================================================*/       

        $wp_customize->add_setting('footer3_title_color', 
            array(
                'default' => $this->defaults['footer3_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));
        
        $wp_customize->add_setting('footer3_color', 
            array(
                'default' => $this->defaults['footer3_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_color',
            array(
                'label' => esc_html__('Footer Text Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));

        $wp_customize->add_setting('footer3_link_color', 
            array(
                'default' => $this->defaults['footer3_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));

        $wp_customize->add_setting('footer3_hover_color', 
            array(
                'default' => $this->defaults['footer3_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_hover_color',
            array(
                'label' => esc_html__('Footer Hover Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));
        /* Footer 3 logo */
        $wp_customize->add_setting( 'footer3_logo',
            array(
                'default' => $this->defaults['footer3_logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer3_logo',
            array(
                'label' => __( 'Footer Logo', 'yakeen' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ) );

        /* Footer 3 Social */
        $wp_customize->add_setting( 'footer3_social',
            array(
                'default' => $this->defaults['footer3_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer3_social',
            array(
                'label' => __( 'Footer Social', 'yakeen' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ) );

        /* Footer 3 Shape */
        $wp_customize->add_setting( 'footer3_animate_shape',
            array(
                'default' => $this->defaults['footer3_animate_shape'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer3_animate_shape',
            array(
                'label' => __( 'Footer Animate Shape', 'yakeen' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ) );
        
        /*footer 3 logo*/
        $wp_customize->add_setting('footer_logo_light',
            array(
              'default'           => $this->defaults['footer_logo_light'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo_light',
            array(
                'label'         => esc_html__('Footer Logo', 'yakeen'),
                'description'   => esc_html__('This is the description for the Media Control', 'yakeen'),
                'section'       => 'footer_section',
                'mime_type'     => 'image',
                'button_labels' => array(
                    'select'       => esc_html__('Select File', 'yakeen'),
                    'change'       => esc_html__('Change File', 'yakeen'),
                    'default'      => esc_html__('Default', 'yakeen'),
                    'remove'       => esc_html__('Remove', 'yakeen'),
                    'placeholder'  => esc_html__('No file selected', 'yakeen'),
                    'frame_title'  => esc_html__('Select File', 'yakeen'),
                    'frame_button' => esc_html__('Choose File', 'yakeen'),
                ),
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ));

        /* Footer 4 color */
        $wp_customize->add_setting('footer4_title_color', 
            array(
                'default' => $this->defaults['footer4_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        ));
        
        $wp_customize->add_setting('footer4_color', 
            array(
                'default' => $this->defaults['footer4_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_color',
            array(
                'label' => esc_html__('Footer Text Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        ));

        $wp_customize->add_setting('footer4_link_color', 
            array(
                'default' => $this->defaults['footer4_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        ));

        $wp_customize->add_setting('footer4_hover_color', 
            array(
                'default' => $this->defaults['footer4_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_hover_color',
            array(
                'label' => esc_html__('Footer Hover Color', 'yakeen'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        ));

        $wp_customize->add_setting( 'footer4_logo',
            array(
                'default' => $this->defaults['footer4_logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer4_logo',
            array(
                'label' => __( 'Footer Logo', 'yakeen' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        ) );

        /* Footer 4 Social */
        $wp_customize->add_setting( 'footer4_social',
            array(
                'default' => $this->defaults['footer4_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer4_social',
            array(
                'label' => __( 'Footer Social', 'yakeen' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        ) );
        
        /*footer 4 logo*/
        $wp_customize->add_setting('footer4_logo_light',
            array(
              'default'           => $this->defaults['footer4_logo_light'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer4_logo_light',
            array(
                'label'         => esc_html__('Footer Logo', 'yakeen'),
                'description'   => esc_html__('This is the description for the Media Control', 'yakeen'),
                'section'       => 'footer_section',
                'mime_type'     => 'image',
                'button_labels' => array(
                    'select'       => esc_html__('Select File', 'yakeen'),
                    'change'       => esc_html__('Change File', 'yakeen'),
                    'default'      => esc_html__('Default', 'yakeen'),
                    'remove'       => esc_html__('Remove', 'yakeen'),
                    'placeholder'  => esc_html__('No file selected', 'yakeen'),
                    'frame_title'  => esc_html__('Select File', 'yakeen'),
                    'frame_button' => esc_html__('Choose File', 'yakeen'),
                ),
                'active_callback' => 'rttheme_is_footer4_enabled',
            )
        ));
		
		// Copyright Text
        $wp_customize->add_setting( 'copyright_text',
            array(
                'default' => $this->defaults['copyright_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'copyright_text',
            array(
                'label' => __( 'Copyright Text', 'yakeen' ),
                'section' => 'footer_section',
                'type' => 'textarea',
            )
        ); 
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new YakeenTheme_Footer_Settings();
}
