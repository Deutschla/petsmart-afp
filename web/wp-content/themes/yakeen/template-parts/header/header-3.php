<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = YakeenTheme_Helper::nav_menu_args();
$yakeen_socials = YakeenTheme_Helper::socials();
// Logo

if( !empty( YakeenTheme::$options['logo'] ) ) {
	$logo_dark = wp_get_attachment_image( YakeenTheme::$options['logo'], 'full' );
	$yakeen_dark_logo = $logo_dark;
}else {
	$yakeen_dark_logo = "<img width='120' height='80' src='" . YAKEEN_IMG_URL . 'logo-dark.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "' loading='lazy'>"; 
}

if( !empty( YakeenTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( YakeenTheme::$options['logo_light'], 'full' );
	$yakeen_light_logo = $logo_lights;
}else {
	$yakeen_light_logo = "<img width='120' height='80' src='" . YAKEEN_IMG_URL . 'logo-light.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

?>
<div id="sticky-placeholder"></div>
<div class="header-menu" id="header-menu">
	<div class="menu-full-wrap">
		<div class="site-branding">
			<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $yakeen_dark_logo, 'allow_link' ); ?></a>
			<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $yakeen_light_logo, 'allow_link' ); ?></a>
		</div>
		<div class="menu-wrap">
			<div id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
		<?php if ( YakeenTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="header-icon-area">
				<?php if ( YakeenTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } ?>
				<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
			</div>
		<?php } ?>
	</div>
</div>