<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'yakeen_template_vars' );
if( !function_exists( 'yakeen_template_vars' ) ) {
    function yakeen_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                default:
                $prefix = 'single_post';
                break;
                case 'yakeen_team':
                $prefix = 'team';
                break;  
            }
			
			$layout_settings    = get_post_meta( $post_id, 'yakeen_layout_settings', true );
            
            YakeenTheme::$layout = ( empty( $layout_settings['yakeen_layout'] ) || $layout_settings['yakeen_layout']  == 'default' ) ? YakeenTheme::$options[$prefix . '_layout'] : $layout_settings['yakeen_layout'];
			
            YakeenTheme::$top_bar = ( empty( $layout_settings['yakeen_top_bar'] ) || $layout_settings['yakeen_top_bar'] == 'default' ) ? YakeenTheme::$options['top_bar'] : $layout_settings['yakeen_top_bar'];
            
            YakeenTheme::$top_bar_style = ( empty( $layout_settings['yakeen_top_bar_style'] ) || $layout_settings['yakeen_top_bar_style'] == 'default' ) ? YakeenTheme::$options['top_bar_style'] : $layout_settings['yakeen_top_bar_style'];
			
			YakeenTheme::$header_opt = ( empty( $layout_settings['yakeen_header_opt'] ) || $layout_settings['yakeen_header_opt'] == 'default' ) ? YakeenTheme::$options['header_opt'] : $layout_settings['yakeen_header_opt'];
            
            YakeenTheme::$header_style = ( empty( $layout_settings['yakeen_header'] ) || $layout_settings['yakeen_header'] == 'default' ) ? YakeenTheme::$options['header_style'] : $layout_settings['yakeen_header'];
			
            YakeenTheme::$footer_style = ( empty( $layout_settings['yakeen_footer'] ) || $layout_settings['yakeen_footer'] == 'default' ) ? YakeenTheme::$options['footer_style'] : $layout_settings['yakeen_footer'];
			
			YakeenTheme::$footer_area = ( empty( $layout_settings['yakeen_footer_area'] ) || $layout_settings['yakeen_footer_area'] == 'default' ) ? YakeenTheme::$options['footer_area'] : $layout_settings['yakeen_footer_area'];

            YakeenTheme::$copyright_area = ( empty( $layout_settings['yakeen_copyright_area'] ) || $layout_settings['yakeen_copyright_area'] == 'default' ) ? YakeenTheme::$options['copyright_area'] : $layout_settings['yakeen_copyright_area'];
			
            $padding_top = ( empty( $layout_settings['yakeen_top_padding'] ) || $layout_settings['yakeen_top_padding'] == 'default' ) ? YakeenTheme::$options[$prefix . '_padding_top'] : $layout_settings['yakeen_top_padding'];
			
            YakeenTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['yakeen_bottom_padding'] ) || $layout_settings['yakeen_bottom_padding'] == 'default' ) ? YakeenTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['yakeen_bottom_padding'];
			
            YakeenTheme::$padding_bottom = (int) $padding_bottom;
			
            YakeenTheme::$has_banner = ( empty( $layout_settings['yakeen_banner'] ) || $layout_settings['yakeen_banner'] == 'default' ) ? YakeenTheme::$options[$prefix . '_banner'] : $layout_settings['yakeen_banner'];
            
            YakeenTheme::$has_breadcrumb = ( empty( $layout_settings['yakeen_breadcrumb'] ) || $layout_settings['yakeen_breadcrumb'] == 'default' ) ? YakeenTheme::$options[ $prefix . '_breadcrumb'] : $layout_settings['yakeen_breadcrumb'];
            
            YakeenTheme::$bgtype = ( empty( $layout_settings['yakeen_banner_type'] ) || $layout_settings['yakeen_banner_type'] == 'default' ) ? YakeenTheme::$options[$prefix . '_bgtype'] : $layout_settings['yakeen_banner_type'];
            
            YakeenTheme::$bgcolor = empty( $layout_settings['yakeen_banner_bgcolor'] ) ? YakeenTheme::$options[$prefix . '_bgcolor'] : $layout_settings['yakeen_banner_bgcolor'];
			
			if( !empty( $layout_settings['yakeen_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['yakeen_banner_bgimg'], 'full', true );
                YakeenTheme::$bgimg = $attch_url[0];
            } elseif( !empty( YakeenTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( YakeenTheme::$options[$prefix . '_bgimg'], 'full', true );
                YakeenTheme::$bgimg = $attch_url[0];
            } else {
                YakeenTheme::$bgimg = YAKEEN_IMG_URL . 'banner.jpg';
            }
			
            YakeenTheme::$pagebgcolor = empty( $layout_settings['yakeen_page_bgcolor'] ) ? YakeenTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['yakeen_page_bgcolor'];			
            
            if( !empty( $layout_settings['yakeen_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['yakeen_page_bgimg'], 'full', true );
                YakeenTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( YakeenTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( YakeenTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                YakeenTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                YakeenTheme::$options[$prefix . '_layout'] = 'full-width';
            } elseif( is_post_type_archive( "yakeen_team" ) || is_tax( "yakeen_team_category" ) ) {
                $prefix = 'team_archive'; 
            }else {
                $prefix = 'blog';
            }
            
            YakeenTheme::$layout         		= YakeenTheme::$options[$prefix . '_layout'];
            YakeenTheme::$top_bar        		= YakeenTheme::$options['top_bar'];
            YakeenTheme::$header_opt      		= YakeenTheme::$options['header_opt'];
            YakeenTheme::$footer_area     		= YakeenTheme::$options['footer_area'];
            YakeenTheme::$copyright_area         = YakeenTheme::$options['copyright_area'];
            YakeenTheme::$top_bar_style  		= YakeenTheme::$options['top_bar_style'];
            YakeenTheme::$header_style   		= YakeenTheme::$options['header_style'];
            YakeenTheme::$footer_style   		= YakeenTheme::$options['footer_style'];
            YakeenTheme::$padding_top    		= YakeenTheme::$options[$prefix . '_padding_top'];
            YakeenTheme::$padding_bottom 		= YakeenTheme::$options[$prefix . '_padding_bottom'];
            YakeenTheme::$has_banner     		= YakeenTheme::$options[$prefix . '_banner'];
            YakeenTheme::$has_breadcrumb 		= YakeenTheme::$options[$prefix . '_breadcrumb'];
            YakeenTheme::$bgtype         		= YakeenTheme::$options[$prefix . '_bgtype'];
            YakeenTheme::$bgcolor        		= YakeenTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( YakeenTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( YakeenTheme::$options[$prefix . '_bgimg'], 'full', true );
                YakeenTheme::$bgimg = $attch_url[0];
            } else {
                YakeenTheme::$bgimg = YAKEEN_IMG_URL . 'banner.jpg';
            }
			
            YakeenTheme::$pagebgcolor = YakeenTheme::$options[$prefix . '_page_bgcolor'];
            if( !empty( YakeenTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( YakeenTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                YakeenTheme::$pagebgimg = $attch_url[0];
            }
			
			
        }
    }
}

// Add body class
add_filter( 'body_class', 'yakeen_body_classes' );
if( !function_exists( 'yakeen_body_classes' ) ) {
    function yakeen_body_classes( $classes ) {
		
		// Header
    	if ( YakeenTheme::$options['sticky_menu'] == 1 ) {
			$classes[] = 'sticky-header';
		}
		
        $classes[] = 'header-style-'. YakeenTheme::$header_style;		
        $classes[] = 'footer-style-'. YakeenTheme::$footer_style;

        if ( YakeenTheme::$top_bar == 1 || YakeenTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. YakeenTheme::$top_bar_style;
        }
        
        $classes[] = ( YakeenTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( YakeenTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . YakeenTheme::$options['post_style'];
        }
        return $classes;
    }
}