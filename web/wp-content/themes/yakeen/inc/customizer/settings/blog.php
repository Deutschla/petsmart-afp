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
class YakeenTheme_Blog_Post_Settings extends YakeenTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_post_controls( $wp_customize ) {

        // Blog Post Style
        $wp_customize->add_setting( 'blog_style',
            array(
                'default' => $this->defaults['blog_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'blog_style',
            array(
                'label' => __( 'Blog/Archive Layout', 'yakeen' ),
                'description' => esc_html__( 'Blog Post layout variation you can selecr and use.', 'yakeen' ),
                'section' => 'blog_post_settings_section',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog3.png',
                        'name' => __( 'Layout 1', 'yakeen' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog3.png',
                        'name' => __( 'Layout 2', 'yakeen' )
                    ),
                    'style3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog3.png',
                        'name' => __( 'Layout 3', 'yakeen' )
                    ),
                    'style4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog3.png',
                        'name' => __( 'Layout 4', 'yakeen' )
                    ),
                    'style5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 5', 'yakeen' )
                    ),
                    'style6' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 6', 'yakeen' )
                    ),
                    'style7' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 7', 'yakeen' )
                    ),
                )
            )
        ) );

		$wp_customize->add_setting( 'post_content_limit',
            array(
                'default' => $this->defaults['post_content_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_content_limit',
            array(
                'label' => __( 'Blog Content Limit', 'yakeen' ),
                'section' => 'blog_post_settings_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'post_content_limit',
            array(
                'default' => $this->defaults['post_content_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_content_limit',
            array(
                'label' => __( 'Blog Content Limit', 'yakeen' ),
                'section' => 'blog_post_settings_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'blog_content',
            array(
                'default' => $this->defaults['blog_content'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_content',
            array(
                'label' => __( 'Show Content', 'yakeen' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_date',
            array(
                'default' => $this->defaults['blog_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_date',
            array(
                'label' => __( 'Show Date', 'yakeen' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_author_name',
            array(
                'default' => $this->defaults['blog_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_author_name',
            array(
                'label' => __( 'Show Author', 'yakeen' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_comment_num',
            array(
                'default' => $this->defaults['blog_comment_num'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_comment_num',
            array(
                'label' => __( 'Show Comment', 'yakeen' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_cats',
            array(
                'default' => $this->defaults['blog_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_cats',
            array(
                'label' => __( 'Show Category', 'yakeen' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_view',
            array(
                'default' => $this->defaults['blog_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_view',
            array(
                'label' => __( 'Show Views', 'yakeen' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_length',
            array(
                'default' => $this->defaults['blog_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_length',
            array(
                'label' => __( 'Show Reading Length', 'yakeen' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

        /*Author bg image*/
        $wp_customize->add_setting('author_bg_image',
            array(
              'default'           => $this->defaults['author_bg_image'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'author_bg_image',
            array(
                'label'         => esc_html__('Author Top Background', 'yakeen'),
                'description'   => esc_html__('This is the description for the Media Control', 'yakeen'),
                'section'       => 'blog_post_settings_section',
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
            )
        ));

        /*Animation*/
        $wp_customize->add_setting( 'blog_animation',
            array(
                'default' => $this->defaults['blog_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation',
            array(
                'label' => __( 'Animation On/Off', 'yakeen' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'yakeen' ),
                    'hide' => esc_html__( 'Animation Off', 'yakeen' ),
                ),
            )
        );

        $wp_customize->add_setting( 'blog_animation_effect',
            array(
                'default' => $this->defaults['blog_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'yakeen' ),
                'section' => 'blog_post_settings_section',
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

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new YakeenTheme_Blog_Post_Settings();
}
