<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\yakeen\Customizer\Settings;

use radiustheme\yakeen\Customizer\YakeenTheme_Customizer;
use radiustheme\yakeen\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\yakeen\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\yakeen\Customizer\Controls\Customizer_Image_Radio_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class YakeenTheme_Blog_Single_Post_Settings extends YakeenTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_single_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_single_post_controls( $wp_customize ) {
	
		// Post Style
        $wp_customize->add_setting( 'post_style',
            array(
                'default' => $this->defaults['post_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'post_style',
            array(
                'label' => __( 'Single Post Layout', 'yakeen' ),
                'description' => esc_html__( 'Post single layout variation you can selecr and use.', 'yakeen' ),
                'section' => 'single_post_secttings_section',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-1.png',
                        'name' => __( 'Layout 1', 'yakeen' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-3.png',
                        'name' => __( 'Layout 2', 'yakeen' )
                    ),
                    'style3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-3.png',
                        'name' => __( 'Layout 3', 'yakeen' )
                    ),
                )
            )
        ) );
		
		
        $wp_customize->add_setting( 'post_featured_image',
            array(
                'default' => $this->defaults['post_featured_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_featured_image',
            array(
                'label' => __( 'Show Featured Image', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_author_name',
            array(
                'default' => $this->defaults['post_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_author_name',
            array(
                'label' => __( 'Show Author Name', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_date',
            array(
                'default' => $this->defaults['post_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_date',
            array(
                'label' => __( 'Show Post Date', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_comment_num',
            array(
                'default' => $this->defaults['post_comment_num'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_comment_num',
            array(
                'label' => __( 'Show Comment Number', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_cats',
            array(
                'default' => $this->defaults['post_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_cats',
            array(
                'label' => __( 'Show Category', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_tags',
            array(
                'default' => $this->defaults['post_tags'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_tags',
            array(
                'label' => __( 'Show Tags', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_share',
            array(
                'default' => $this->defaults['post_share'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share',
            array(
                'label' => __( 'Show Share', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_links',
            array(
                'default' => $this->defaults['post_links'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_links',
            array(
                'label' => __( 'Show Next / Previous post', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_author_bio',
            array(
                'default' => $this->defaults['post_author_bio'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_author_bio',
            array(
                'label' => __( 'Show Author Bio', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_view',
            array(
                'default' => $this->defaults['post_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_view',
            array(
                'label' => __( 'Show Views', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_length',
            array(
                'default' => $this->defaults['post_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_length',
            array(
                'label' => __( 'Post Reading Length', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));

        $wp_customize->add_setting( 'post_published',
            array(
                'default' => $this->defaults['post_published'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_published',
            array(
                'label' => esc_html__( 'Post Published', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));

        $wp_customize->add_setting( 'post_time_format',
            array(
                'default' => $this->defaults['post_time_format'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'post_time_format',
            array(
                'label' => esc_html__( 'Time Tormat', 'yakeen' ),
                'section' => 'single_post_secttings_section',
                'type' => 'select',
                'choices' => array(
                    'modern' => esc_html__( 'Modern', 'yakeen' ),
                    'none' => esc_html__( 'None', 'yakeen' ),
                ),
            )
        );
		
		// Related Post
		$wp_customize->add_setting('post_related', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'post_related', array(
            'label' => esc_html__( 'Related Post Settings', 'yakeen' ),
            'section' => 'single_post_secttings_section',
        )));
		
		$wp_customize->add_setting( 'show_related_post',
            array(
                'default' => $this->defaults['show_related_post'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_post',
            array(
                'label' => esc_html__( 'Show Related Post', 'yakeen' ),
                'section' => 'single_post_secttings_section',
            )
        ));

		$wp_customize->add_setting( 'related_sub_title',
            array(
                'default' => $this->defaults['related_sub_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'related_sub_title',
            array(
                'label' => esc_html__( 'Related Sub Title', 'yakeen' ),
                'section' => 'single_post_secttings_section',
                'type' => 'textarea',
                'active_callback'   => 'rttheme_is_related_post_enabled',
            )
        );
        $wp_customize->add_setting( 'related_title',
            array(
                'default' => $this->defaults['related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'related_title',
            array(
                'label' => esc_html__( 'Related Title', 'yakeen' ),
                'section' => 'single_post_secttings_section',
                'type' => 'textarea',
                'active_callback'   => 'rttheme_is_related_post_enabled',
            )
        );

		$wp_customize->add_setting( 'show_related_post_number',
            array(
                'default' => $this->defaults['show_related_post_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'show_related_post_number',
            array(
                'label' => __( 'Show Related Post Number', 'yakeen' ),
                'section' => 'single_post_secttings_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_post_enabled',
            )
        );

		$wp_customize->add_setting( 'show_related_post_title_limit',
            array(
                'default' => $this->defaults['show_related_post_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'show_related_post_title_limit',
            array(
                'label' => __( 'Show Related Post Title Length', 'yakeen' ),
                'section' => 'single_post_secttings_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_post_enabled',
            )
        );
		
		// Post Query 
        $wp_customize->add_setting( 'related_post_query',
            array(
                'default' => $this->defaults['related_post_query'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'related_post_query',
            array(
                'label' => __( 'Query Type', 'yakeen' ),
                'section' => 'single_post_secttings_section',
                'description' => esc_html__( 'Post Query', 'yakeen' ),
                'type' => 'select',
                'choices' => array(
                    'cat' => esc_html__( 'Posts in the same Categories', 'yakeen' ),
                    'tag' => esc_html__( 'Posts in the same Tags', 'yakeen' ),
                    'author' => esc_html__( 'Posts by the same Author', 'yakeen' ),
                ),
                'active_callback'   => 'rttheme_is_related_post_enabled',
            )
        );
		
		// Display post Order
        $wp_customize->add_setting( 'related_post_sort',
            array(
                'default' => $this->defaults['related_post_sort'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'related_post_sort',
            array(
                'label' => __( 'Sort Order', 'yakeen' ),
                'section' => 'single_post_secttings_section',
                'description' => esc_html__( 'Display post Order', 'yakeen' ),
                'type' => 'select',
                'choices' => array(
                    'recent' => esc_html__( 'Recent Posts', 'yakeen' ),
                    'rand' => esc_html__( 'Random Posts', 'yakeen' ),
                    'modified' => esc_html__( 'Last Modified Posts', 'yakeen' ),
                    'popular' => esc_html__( 'Most Commented posts', 'yakeen' ),
                    'views' => esc_html__( 'Most Viewed posts', 'yakeen' ),
                ),
                'active_callback'   => 'rttheme_is_related_post_enabled',
            )
        );
    }
}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new YakeenTheme_Blog_Single_Post_Settings();
}
