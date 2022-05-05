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
	<div class="container-fluid">
		<div class="menu-full-wrap">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $yakeen_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $yakeen_light_logo, 'allow_link' ); ?></a>
			</div>			
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
				<?php if ( has_nav_menu( 'primary' ) ) { 
	             	wp_nav_menu( $nav_menu_args );
					} else {
						if ( is_user_logged_in() ) {
							echo '<ul id="menu" class="nav fallbackcd-menu-item"><li><a class="fallbackcd" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add a menu', 'yakeen' ) . '</a></li></ul>';
						}
					} ?>
				</div>
			</div>			
			<?php if ( YakeenTheme::$options['social_icon'] ) { ?>
				<div class="header-icon-area">
					<div class="social-label">
						<?php if ( !empty ( YakeenTheme::$options['social_label'] ) ) { ?>
							<?php echo wp_kses( YakeenTheme::$options['social_label'] , 'alltext_allow' );?> :
						<?php } ?>
					</div>
					<ul class="social-item">
						<?php foreach ( $yakeen_socials as $yakeen_social ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $yakeen_social['url'] );?>"><i class="fab <?php echo esc_attr( $yakeen_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php } ?>
		</div>
	</div>
</div>