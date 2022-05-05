<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$yakeen_socials = YakeenTheme_Helper::socials();
// Logo
if( !empty( YakeenTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( YakeenTheme::$options['logo_light'], 'full' );
	$yakeen_light_logo = $logo_lights;
}else {
	$yakeen_light_logo = "<img width='120' height='80' src='" . YAKEEN_IMG_URL . 'logo-light.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

?>

<div class="additional-menu-area header-offcanvus">
	<div class="sidenav sidecanvas">
		<div class="canvas-content">
			<div id="closebtn" class="close-btn offcanvas-close close-hover">
				<span>Close</span>
				<span class="animation-shape-lines">
					<span class="animation-shape-line eltdf-line-1"></span>
					<span class="animation-shape-line eltdf-line-2"> </span>
				</span>
			</div>
			<div class="additional-logo">
				<a class="light-logo"
					href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $yakeen_light_logo, 'allow_link' ); ?></a>
			</div>
			<div class="sidenav-address">
				<?php if ( !empty ( YakeenTheme::$options['address_label'] ) ) { ?>
				<h2 class="address-box-title">
					<?php echo wp_kses( YakeenTheme::$options['address_label'] , 'alltext_allow' );?></h2>
				<?php } ?>
				<?php if ( YakeenTheme::$options['address'] ) { ?>
				<div class="address-item"><?php echo wp_kses( YakeenTheme::$options['address'] , 'alltext_allow' );?>
				</div>
				<?php } ?>
				<?php if ( YakeenTheme::$options['email'] ) { ?>
				<div class="address-item"><a
						href="mailto:<?php echo esc_attr( YakeenTheme::$options['email'] );?>"><?php echo esc_html( YakeenTheme::$options['email'] );?></a>
				</div>
				<?php } ?>
				<?php if ( YakeenTheme::$options['phone'] ) { ?>
				<div class="address-item"><a
						href="tel:<?php echo esc_attr( YakeenTheme::$options['phone'] );?>"><?php echo esc_html( YakeenTheme::$options['phone'] );?></a>
				</div>
				<?php } ?>
			</div>
			<?php if( is_active_sidebar('offcanvas') ) { ?>
			<div class="sidenav-social">
				<?php if( is_active_sidebar('offcanvas') ) { dynamic_sidebar('offcanvas'); } ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<button type="button" class="header-burger-menu side-menu-open side-menu-trigger">
		<svg width="50" height="50" viewBox="0 0 100 100">
			<path class="line line1"
				d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
			<path class="line line2" d="M 20,50 H 80" />
			<path class="line line3"
				d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
		</svg>
	</button>
</div>