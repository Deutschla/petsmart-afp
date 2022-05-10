<?php
// Customizer Default Data
if ( ! function_exists( 'rttheme_generate_defaults' ) ) {
    function rttheme_generate_defaults() {
        $customizer_defaults = array(

            // General  
            'logo'               	=> '',
            'logo_light'          	=> '',
            'logo_width'		    => '',
            'mobile_logo_width'		=> '',
			'image_blend'			=> 'normal',			
			'container_width'		=> '1134',
            'preloader'          	=> 0,
            'preloader_image'    	=> '',
			'preloader_bg_color' 	=> '#ffffff',
            'back_to_top'     		=> 1,
            'display_no_preview_image'    => 0,
            'header_animated_enabled' => 1,

            // Contact Socials
            'phone'   			=> '',
            'email'   			=> '',
            'address_label'   	=> '',
            'address'   		=> '',
            'plain_text'   	    => '',
            'date_and_time'   	=> '',
            'social_label'   	=> '',			
            'social_facebook'  	=> '',
            'social_twitter'   	=> '',
            'social_linkedin'   => '',
            'social_behance' 	=> '',
            'social_dribbble'  	=> '',
            'social_youtube'    => '',
            'social_pinterest'  => '',
            'social_instagram'  => '',
            'social_skype'      => '',
            'social_rss'       	=> '',
            'social_snapchat'   => '',
			
			// Color
			'primary_color' 			=> '#f07654',
			'secondary_color' 			=> '#ffefec',
			'body_color' 				=> '#686868',			
			'menu_color' 				=> '#686868',
			'menu_hover_color' 			=> '#f07654',
			'menu_color_tr' 			=> '#ffffff',			
			'submenu_color' 			=> '#1f1f1f',
			'submenu_hover_color' 		=> '#f07654',

            //dark color mode
            'color_mode'                => 0,
            'code_mode_type'            => 'light-mode',
            'dark_mode_bgcolor'         => '#101213',
            'dark_mode_light_bgcolor'   => '#171818',
            'dark_mode_color'           => '#d7d7d7',
            'dark_mode_border_color'    => '#222121',

			// reading progress bar
			'scroll_indicator_enable' 	=> 0,
			'scroll_indicator_bgcolor' 	=> '#f07654',
			'scroll_indicator_height' 	=> 4,
			'scroll_indicator_position' => 'top',

            // header
			'top_bar'  					=> 0,
			'top_bar_style'  			=> 1,
			'top_bar_bgcolor'			=> '#ffefec',
			'top_bar_color'				=> '#1f1f1f',
			'top_bar_link_color'		=> '#1f1f1f',
			'top_bar_link_hover_color'	=> '#f07654',
            'top_baricon_color'         => '#ffffff',
			'top_bar_bgcolor_2'			=> '#f07654',
			'top_bar_color_2'			=> '#ffffff',
			'top_baricon_color_2'		=> '#ffffff',
			'top_bar_link_hover_color_2'=> '#ffefec',

			'mobile_topbar'  			=> 0,
			'mobile_phone'  			=> 1,
			'mobile_email'  			=> 0,
			'mobile_address'  			=> 1,
			'mobile_social'  			=> 0,
			'mobile_search'  			=> 0,
			
			'sticky_menu'       		=> 1,
			'header_opt'       			=> 1,
            'header_style'      		=> 2,
            'header_animated_image'     => 0,
            'header_animation'          => 'hide',
            'search_icon'      			=> 0,
            'search_icon_color'         => '#1f1f1f',
            'search_icon_hover_color'         => '#f07654',
            'vertical_menu_icon' 		=> 0,
            'social_icon'               => 0,

            'online_button'				=>'1',
            'online_button_text' 		=> 'Get Our Newsletter',
            'online_button_link' 		=> '#',

		
			// Footer
            'footer_style'        		=> 1,
            'copyright_text'      		=> '&copy; ' . date('Y') . ' yakeen. All Rights Reserved by <a target="_blank" rel="nofollow" href="' . YAKEEN_AUTHOR_URI . '">RadiusTheme</a>',
			'footer_column_1'			=> 4,
			'footer_area'				=> 1,
            'copyright_area'            => 1,
            'footer_sticky'             => 0,
			'footer_bgtype' 			=> 'fbgcolor',
            'footer_bgtype2'            => 'fbgcolor2',
            'footer_bgtype3'            => 'fbgcolor3',
            'footer_bgtype4'            => 'fbgcolor4',
			'fbgcolor' 					=> '#0f1012',
            'fbgcolor2'                 => '#ffffff',
            'fbgcolor3'                 => '#ffefec',
            'fbgcolor4'                 => '#1f1f1f',
			'fbgimg'					=> '',
            'fbgimg2'                   => '',
            'fbgimg3'                   => '',
            'fbgimg4'                   => '',
			'footer_title_color' 		=> '#ffffff',
			'footer_color' 				=> '#d0d0d0',
			'footer_link_color' 		=> '#d0d0d0',
			'footer_link_hover_color' 	=> '#f07654',
            'footer_logo_light'         => '',
            'copyright_text_color'      => '#d0d0d0',
            'copyright_link_color'      => '#d0d0d0',
            'copyright_hover_color'     => '#ffffff',
            
            'footer2_logo_light'        => '',
            'footer2_logo'              => 1,
            'footer2_social'            => 1,
            'footer2_animate_shape'     => 1,
            'footer2_title_color'       => '#1f1f1f',
            'footer2_color'             => '#1f1f1f',
            'footer2_link_color'        => '#1f1f1f',
            'footer2_hover_color'       => '#f07654',

            'footer3_logo'              => 1,
            'footer3_social'            => 1,
            'footer3_animate_shape'     => 1,
            'footer3_title_color'     	=> '#1f1f1f',
            'footer3_color'     		=> '#1f1f1f',
            'footer3_link_color'     	=> '#1f1f1f',
            'footer3_hover_color'     	=> '#f07654',

            'footer4_logo_light'        => '',
            'footer4_logo'              => 1,
            'footer4_social'            => 1,
            'footer4_title_color'       => '#ffffff',
            'footer4_color'             => '#ffffff',
            'footer4_link_color'        => '#ffffff',
            'footer4_hover_color'       => '#f07654',
			
			// Banner 
			'breadcrumb_link_color' 	=> '#646464',
			'breadcrumb_link_hover_color' => '#f07654',
			'breadcrumb_active_color' 	=> '#f07654',
			'breadcrumb_seperator_color'=> '#646464',
			'banner_bg_opacity' 		=> 0,
			'banner_top_padding'    	=> 80,
            'banner_bottom_padding' 	=> 80,
            'breadcrumb_active' 		=> 0,
			
			// Post Type Slug
			'team_slug' 				=> 'team',
			'team_cat_slug' 			=> 'team-category',		
			
            // Page Layout Setting 
            'page_layout'        => 'full-width',
			'page_padding_top'    => 120,
            'page_padding_bottom' => 120,
            'page_banner'         => 1,
            'page_breadcrumb' => 0,
            'page_bgtype' => 'bgcolor',
            'page_bgcolor' => '#ffefec',
            'page_bgimg' => '',
            'page_page_bgimg' => '',
            'page_page_bgcolor' => '#ffffff',
			
			//Blog Layout Setting 
            'blog_layout' => 'right-sidebar',
			'blog_padding_top'    => 120,
            'blog_padding_bottom' => 120,
            'blog_banner' => 1,
            'blog_breadcrumb' => 0,			
			'blog_bgtype' => 'bgcolor',
            'blog_bgcolor' => '#ffefec',
            'blog_bgimg' => '',
            'blog_page_bgimg' => '',
            'blog_page_bgcolor' => '#ffffff',
			
			//Single Post Layout Setting 
			'single_post_layout' => 'right-sidebar',
			'single_post_padding_top'    => 120,
            'single_post_padding_bottom' => 120,
            'single_post_banner' => 1,
            'single_post_breadcrumb' => 0,			
			'single_post_bgtype' => 'bgcolor',
            'single_post_bgcolor' => '#ffefec',
            'single_post_bgimg' => '',
            'single_post_page_bgimg' => '',
            'single_post_page_bgcolor' => '#ffffff',

            //Team Layout Setting 
			'team_archive_layout' => 'full-width',
			'team_archive_padding_top'    => 120,
            'team_archive_padding_bottom' => 120,
            'team_archive_banner' => 1,
            'team_archive_breadcrumb' => 0,			
			'team_archive_bgtype' => 'bgcolor',
            'team_archive_bgcolor' => '#ffefec',
            'team_archive_bgimg' => '',
            'team_archive_page_bgimg' => '',
            'team_archive_page_bgcolor' => '#ffffff',
			
			//Team Single Layout Setting 
			'team_layout' => 'full-width',
			'team_padding_top'    => 120,
            'team_padding_bottom' => 120,
            'team_banner' => 1,
            'team_breadcrumb' => 0,			
			'team_bgtype' => 'bgcolor',
            'team_bgcolor' => '#ffefec',
            'team_bgimg' => '',
            'team_page_bgimg' => '',
            'team_page_bgcolor' => '#ffffff',
			
			//Search Layout Setting 
			'search_layout' => 'right-sidebar',
			'search_padding_top'    => 120,
            'search_padding_bottom' => 120,
            'search_banner' => 1,
            'search_breadcrumb' => 0,			
			'search_bgtype' => 'bgcolor',
            'search_bgcolor' => '#ffefec',
            'search_bgimg' => '',
            'search_page_bgimg' => '',
            'search_page_bgcolor' => '#ffffff',
            'search_excerpt_length' => 40,

            //Team Single Layout Setting 
			'error_padding_top'    => 120,
            'error_padding_bottom' => 120,
            'error_banner' => 1,
            'error_breadcrumb' => 0,			
			'error_bgtype' => 'bgcolor',
            'error_bgcolor' => '#ffefec',
            'error_bgimg' => '',
            'error_page_bgimg' => '',
            'error_page_bgcolor' => '#ffffff',

            // Blog Archive
			'blog_style'				=> 'style2',
			'post_banner_title'  		=> '',
			'post_content_limit'  		=> '20',
			'blog_content'  			=> 1,
			'blog_date'  				=> 1,
			'blog_author_name'  		=> 1,
			'blog_comment_num'  		=> 0,
			'blog_cats'  				=> 1,
			'blog_view'  				=> 0,
			'blog_length'  				=> 0,
			'author_bg_image'  			=> '',
			'blog_animation'  			=> 'hide',
			'blog_animation_effect'  	=> 'fadeInUp',
			
			// Post
            'post_style'                => 'style1',
			'post_featured_image'		=> 1,
			'post_author_name'			=> 1,
			'post_date'					=> 1,
			'post_comment_num'			=> 1,
			'post_cats'					=> 1,
			'post_tags'					=> 1,
			'post_share'				=> 1,
			'post_links'				=> 0,
			'post_author_bio'			=> 0,
			'post_view'					=> 1,
			'post_length'				=> 0,
			'post_published'			=> 0,
			'show_related_post'			=> 0,
			'show_related_post_number'	=> 5,
			'related_title'				=> 'Related Post',
            'related_sub_title'         => 'Yakeen Is a Lifestyle Blog',
			'show_related_post_title_limit'	=> 8,
			'related_post_query'		=> 'cat',
			'related_post_sort'			=> 'recent',
			'post_time_format'			=> 'modern',
			
			// Post Share
			'post_share_facebook' 		=> 1,
			'post_share_twitter' 		=> 1,
			'post_share_youtube' 		=> 1,
			'post_share_linkedin' 		=> 1,
			'post_share_pinterest' 		=> 0,
			'post_share_whatsapp' 		=> 1,
			'post_share_cloud' 			=> 1,
			'post_share_dribbble' 		=> 0,
			'post_share_tumblr' 		=> 0,
			'post_share_reddit' 		=> 0,
			'post_share_email' 			=> 0,
			'post_share_print' 			=> 0,

			// Team
			'team_archive_style' 		=> 'style1',
			'team_arexcerpt_limit' 		=> 12,
			'team_ar_excerpt' 			=> 0,
			'team_ar_position' 			=> 1,
			'team_ar_social' 			=> 1,
			'team_info' 				=> 1,
			'team_skill' 				=> 1,
			'team_social' 				=> 1,
			'show_related_team' 		=> 1,
			'team_related_title' 		=> 'Related Post',
            'team_related_sub_title'    => 'Yakeen Is a Lifestyle Team',
			'related_team_social' 		=> 1,
			'related_team_position' 	=> 1,
			'related_team_excerpt' 	    => 0,
            'related_team_arexcerpt_limit' => 10,
			'related_team_number' 		=> 5,
			'related_team_title_limit' 	=> 5,
			
            // Error
            'error_bodybg_color' 		=> '#ffffff',
            'error_text1_color' 		=> '#000000',
            'error_text2_color' 		=> '#6c6f72',
			'error_image' 				=> '',
            'error_woman_image'         => '',
            'error_text1' 				=> 'Opps! The page you are looking for does not exist!',
            'error_text2' 				=> 'The page which you are looking for does not exist galley of type and scrambled it to make a type specimen book. Please return to the homepage.',
            'error_buttontext' 			=> 'Back to Home',
            'error_animation' 			=> 'hide',
            'error_animation_effect' 	=> 'fadeInUp',
            'animated_image' 	        => 1,
            'animated_bg_image' 	    => 1,
            
            // Typography
            'typo_body' => json_encode(
                array(
                    'font' => 'Jost',
                    'regularweight' => 'normal',
                )
            ),
            'typo_body_size' => '16px',
            'typo_body_height'=> '28px',

            //Menu Typography
            'typo_menu' => json_encode(
                array(
                    'font' => 'Source Serif Pro',
                    'regularweight' => '400',
                )
            ),
            'typo_menu_size' => '17px',
            'typo_menu_height'=> '22px',

            //Sub Menu Typography
            'typo_sub_menu' => json_encode(
                array(
                    'font' => 'Source Serif Pro',
                    'regularweight' => '400',
                )
            ),
            'typo_submenu_size' => '15px',
            'typo_submenu_height'=> '22px',


            // Heading Typography
            'typo_heading' => json_encode(
                array(
                    'font' => 'Source Serif Pro',
                    'regularweight' => '600',
                )
            ),
            //H1
            'typo_h1' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h1_size' => '36px',
            'typo_h1_height' => '40px',

            //H2
            'typo_h2' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h2_size' => '28.44px',
            'typo_h2_height'=> '1.3',

            //H3
            'typo_h3' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h3_size' => '22.63px',
            'typo_h3_height'=> '1.45',

            //H4
            'typo_h4' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h4_size' => '20.25px',
            'typo_h4_height'=> '30px',

            //H5
            'typo_h5' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h5_size' => '18px',
            'typo_h5_height'=> '28px',

            //H6
            'typo_h6' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h6_size' => '16px',
            'typo_h6_height'=> '26px',

            
        );

        return apply_filters( 'rttheme_customizer_defaults', $customizer_defaults );
    }
}