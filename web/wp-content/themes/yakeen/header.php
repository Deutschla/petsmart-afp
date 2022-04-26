<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
		// Preloader	
		if ( YakeenTheme::$options['preloader'] ) {	
			if( !empty( YakeenTheme::$options['preloader_image'] ) ) {
				$pre_bg = wp_get_attachment_image_src( YakeenTheme::$options['preloader_image'], 'full', true );
				$preloader_img = $pre_bg[0];
				echo '<div id="preloader" style="background-image:url(' . esc_url($preloader_img) . ');"></div>';
			}else { ?>				
				<div id="preloader" class="loader">
			      	<div class="cssload-loader">
				        <div class="cssload-inner cssload-one"></div>
				        <div class="cssload-inner cssload-two"></div>
				        <div class="cssload-inner cssload-three"></div>
			      	</div>
			    </div>
			<?php }	            
		}
	?>
	<?php if ( YakeenTheme::$options['color_mode'] ) { ?>
	<div class="header__switch header__switch--wrapper">
        <span class="header__switch__settings"><i class="fas fa-cog"></i></span>
        <label class="header__switch__label" for="headerSwitchCheckbox">
          	<input class="header__switch__input" type="checkbox" name="headerSwitchCheckbox" id="headerSwitchCheckbox">
          	<span class="header__switch__main round"></span>
        </label>
        <span class="header__switch__dark"><i class="fas fa-moon"></i></span>
    </div>
	<?php } ?>

	<?php if ( is_singular() && ( YakeenTheme::$options['scroll_indicator_enable'] == '1' ) && ( YakeenTheme::$options['scroll_indicator_position'] == 'top' ) ){ ?>
	<div class="yakeen-progress-container">
		<div class="yakeen-progress-bar" id="yakeenBar"></div>
	</div>
	<?php } ?>
	
	<div id="page" class="site">		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yakeen' ); ?></a>		
		<header id="masthead" class="site-header">
			<div id="header-<?php echo esc_attr( YakeenTheme::$header_style ); ?>" class="header-area">
				<?php if ( YakeenTheme::$top_bar == 1 || YakeenTheme::$top_bar === "on" ){ ?>			
				<?php get_template_part( 'template-parts/header/header-top', YakeenTheme::$top_bar_style ); ?>
				<?php } ?>
				<?php if ( YakeenTheme::$header_opt == 1 || YakeenTheme::$header_opt === "on" ){ ?>
				<?php get_template_part( 'template-parts/header/header', YakeenTheme::$header_style ); ?>
				<?php } ?>				
			</div>
		</header>		
		<?php get_template_part('template-parts/header/mobile', 'menu');?>	
		<div id="header-search" class="header-search">
            <button type="button" class="close">×</button>
            <form class="header-search-form">
                <input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_html_e( 'Type your search........', 'yakeen' ); ?>">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>	
		<div id="content" class="site-content">			
			<?php
				if ( YakeenTheme::$has_banner === 1 || YakeenTheme::$has_banner === "on" ) { 
					get_template_part('template-parts/content', 'banner');
				}
			?>
			