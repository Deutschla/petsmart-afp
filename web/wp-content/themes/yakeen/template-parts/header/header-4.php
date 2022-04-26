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

/*Animate image*/
if( !empty( YakeenTheme::$options['header_animated_image'] ) ) {
	$header_animate = wp_get_attachment_image( YakeenTheme::$options['header_animated_image'], 'full' );
	$yakeen_animate = $header_animate;
}else {
	$yakeen_animate = "<img width='1920' height='150' src='" . YAKEEN_IMG_URL . 'header-shape.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

?>
<div id="sticky-placeholder"></div>
<div class="header-menu" >
	<?php if ( YakeenTheme::$options['header_animated_enabled'] ) { ?>
		<div class="header-animated-image-wrap">
	        <div class="header-animated-image <?php echo esc_attr(YakeenTheme::$options['header_animation']);?> fadeInDown" data-wow-delay="0.3s" data-wow-duration="1s"><?php echo wp_kses( $yakeen_animate, 'allow_link' ); ?>
	        </div>
        </div>
    <?php } ?>
	<div class="container">
		<div class="middlebar-wrap" id="header-middlebar">
			<?php if ( YakeenTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="header-icon-area">
				<?php if ( YakeenTheme::$options['vertical_menu_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
				<?php } ?>
				<?php if ( YakeenTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } ?>	
			</div>
			<?php } ?>
			<div class="logo-menu-wrap">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $yakeen_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $yakeen_light_logo, 'allow_link' ); ?></a>
				</div>				
			</div>
			<?php if ( YakeenTheme::$options['social_icon'] ) { ?>
			<div class="header-icon-area">
				<ul class="social-item">
					<?php foreach ( $yakeen_socials as $yakeen_social ): ?>
						<li><a target="_blank" href="<?php echo esc_url( $yakeen_social['url'] );?>"><i class="fab <?php echo esc_attr( $yakeen_social['icon'] );?>"></i></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php } ?>
		</div>
		<div class="menu-wrap text-center" id="header-menu">
			<div id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
	</div>
</div>