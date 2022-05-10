<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\yakeen\Customizer\Settings;

use radiustheme\yakeen\Customizer\YakeenTheme_Customizer;
use radiustheme\yakeen\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\yakeen\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\yakeen\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class YakeenTheme_Header_Settings extends YakeenTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_header_controls' ) );
	}

    public function register_header_controls( $wp_customize ) {
		
		// Top Bar Style
		$wp_customize->add_setting( 'top_bar',
            array(
                'default' => $this->defaults['top_bar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_bar',
            array(
                'label' => __( 'Top Bar On/Off', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );
		
        $wp_customize->add_setting( 'top_bar_style',
            array(
                'default' => $this->defaults['top_bar_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',

            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'top_bar_style',
            array(
                'label' => __( 'Top Bar Layout', 'yakeen' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'yakeen' ),
                'section' => 'header_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/topbar-1.jpg',
                        'name' => __( 'Layout 1', 'yakeen' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/topbar-2.jpg',
                        'name' => __( 'Layout 2', 'yakeen' )
                    ),
                ),
                'active_callback'   => 'rttheme_is_topbar_enabled',
            )
        ) );        

		// Topbar one option
        $wp_customize->add_setting( 'online_button',
            array(
                'default' => $this->defaults['online_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'online_button',
            array(
                'label' => __( 'Newsletter Button', 'yakeen' ),
                'section' => 'header_section',
                'active_callback'   => 'rttheme_is_topbar1_enabled',
            )
        ) );
		
		$wp_customize->add_setting( 'online_button_text',
            array(
                'default' => $this->defaults['online_button_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
				
            )
        );
        $wp_customize->add_control( 'online_button_text',
            array(
                'label' => __( 'Button Text', 'yakeen' ),
                'section' => 'header_section',
                'type' => 'text',
				'active_callback'   => 'rttheme_is_topbar1_enabled',
            )
        );
		
		$wp_customize->add_setting( 'online_button_link',
            array(
                'default' => $this->defaults['online_button_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
				
            )
        );
        $wp_customize->add_control( 'online_button_link',
            array(
                'label' => __( 'Button Link', 'yakeen' ),
                'section' => 'header_section',
                'type' => 'url',
				'active_callback'   => 'rttheme_is_topbar1_enabled',
            )
        );
		$wp_customize->add_setting('top_bar_bgcolor', 
            array(
                'default' => $this->defaults['top_bar_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor',
            array(
                'label' => esc_html__('Top Bar Background Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_bar_color', 
            array(
                'default' => $this->defaults['top_bar_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color',
            array(
                'label' => esc_html__('Top Bar Text Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));

        $wp_customize->add_setting('top_bar_link_color', 
            array(
                'default' => $this->defaults['top_bar_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_link_color',
            array(
                'label' => esc_html__('Top Bar Link Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));

        $wp_customize->add_setting('top_bar_link_hover_color', 
            array(
                'default' => $this->defaults['top_bar_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_link_hover_color',
            array(
                'label' => esc_html__('Top Bar Link Hover Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		// Topbar two option
		$wp_customize->add_setting('top_bar_bgcolor_2', 
            array(
                'default' => $this->defaults['top_bar_bgcolor_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor_2',
            array(
                'label' => esc_html__('Top Bar Background Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_bar_color_2', 
            array(
                'default' => $this->defaults['top_bar_color_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color_2',
            array(
                'label' => esc_html__('Top Bar Text Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_baricon_color_2', 
            array(
                'default' => $this->defaults['top_baricon_color_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color_2',
            array(
                'label' => esc_html__('Top Bar Icon Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));	
		$wp_customize->add_setting('top_bar_link_hover_color_2', 
            array(
                'default' => $this->defaults['top_bar_link_hover_color_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_link_hover_color_2',
            array(
                'label' => esc_html__('Top Bar Link Hover Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));	

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_variation_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_variation_heading', array(
            'label' => __( 'Header Variation', 'yakeen' ),
            'section' => 'header_section',
        )));
		
		$wp_customize->add_setting( 'sticky_menu',
            array(
                'default' => $this->defaults['sticky_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'sticky_menu',
            array(
                'label' => __( 'Sticky Header', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'header_opt',
            array(
                'default' => $this->defaults['header_opt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_opt',
            array(
                'label' => __( 'Header On/Off', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );
		

        // Header Style
        $wp_customize->add_setting( 'header_style',
            array(
                'default' => $this->defaults['header_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'header_style',
            array(
                'label' => __( 'Header Layout', 'yakeen' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'yakeen' ),
                'section' => 'header_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-1.jpg',
                        'name' => __( 'Layout 1', 'yakeen' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-2.jpg',
                        'name' => __( 'Layout 2', 'yakeen' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-3.jpg',
                        'name' => __( 'Layout 3', 'yakeen' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-4.jpg',
                        'name' => __( 'Layout 4', 'yakeen' )
                    ),
                )
            )
        ) );

        // Header Animated image
        $wp_customize->add_setting( 'header_animated_enabled',
            array(
                'default' => $this->defaults['header_animated_enabled'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_animated_enabled',
            array(
                'label' => __( 'Header Animate Image On/Off', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'header_animated_image',
            array(
                'default' => $this->defaults['header_animated_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'header_animated_image',
            array(
                'label' => __( 'Header Animated Image', 'yakeen' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'yakeen' ),
                'section' => 'header_section',
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
                'active_callback'   => 'rttheme_is_header_image_enabled',
            )
        ) );

        /*Animation*/
        $wp_customize->add_setting( 'header_animation',
            array(
                'default' => $this->defaults['header_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'header_animation',
            array(
                'label' => __( 'Animation On/Off', 'yakeen' ),
                'section' => 'header_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'yakeen' ),
                    'hide' => esc_html__( 'Animation Off', 'yakeen' ),
                ),
                'active_callback'   => 'rttheme_is_header_image_enabled',
            )
        );

        //Header Action
		$wp_customize->add_setting( 'search_icon',
            array(
                'default' => $this->defaults['search_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'search_icon',
            array(
                'label' => __( 'Search Icon', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );
        $wp_customize->add_setting('search_icon_color', 
            array(
                'default' => $this->defaults['search_icon_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_searchbox_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'search_icon_color',
            array(
                'label' => esc_html__('Search Icon Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_searchbox_enabled', 	
            )
        ));
        $wp_customize->add_setting('search_icon_hover_color', 
            array(
                'default' => $this->defaults['search_icon_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_searchbox_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'search_icon_hover_color',
            array(
                'label' => esc_html__('Search Icon Hover Color', 'yakeen'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_searchbox_enabled', 	
            )
        ));		
		$wp_customize->add_setting( 'vertical_menu_icon',
            array(
                'default' => $this->defaults['vertical_menu_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'vertical_menu_icon',
            array(
                'label' => __( 'Vertical Menu Icon', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'social_icon',
            array(
                'default' => $this->defaults['social_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'social_icon',
            array(
                'label' => __( 'Social Icon', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_mobile_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_mobile_heading', array(
            'label' => __( 'Mobile Header Option', 'yakeen' ),
            'section' => 'header_section',
        )));

        $wp_customize->add_setting( 'mobile_topbar',
            array(
                'default' => $this->defaults['mobile_topbar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_topbar',
            array(
                'label' => __( 'Mobile Topbar', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_phone',
            array(
                'default' => $this->defaults['mobile_phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_phone',
            array(
                'label' => __( 'Mobile Phone No', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_email',
            array(
                'default' => $this->defaults['mobile_email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_email',
            array(
                'label' => __( 'Mobile Email', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_address',
            array(
                'default' => $this->defaults['mobile_address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_address',
            array(
                'label' => __( 'Mobile Address', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_social',
            array(
                'default' => $this->defaults['mobile_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_social',
            array(
                'label' => __( 'Mobile Social', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_search',
            array(
                'default' => $this->defaults['mobile_search'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_search',
            array(
                'label' => __( 'Mobile Search', 'yakeen' ),
                'section' => 'header_section',
            )
        ) );
    }
}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new YakeenTheme_Header_Settings();
}
