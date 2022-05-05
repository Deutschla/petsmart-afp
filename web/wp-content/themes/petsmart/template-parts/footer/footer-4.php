<?php

// Logo
if( !empty( YakeenTheme::$options['footer4_logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( YakeenTheme::$options['footer4_logo_light'], 'full' );
	$yakeen_light_logo = $logo_lights;
}else {
	$yakeen_light_logo = "<img width='120' height='80' src='" . YAKEEN_IMG_URL . 'logo-light.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

$yakeen_socials = YakeenTheme_Helper::socials();

if( !empty( YakeenTheme::$options['fbgimg4'] ) ) {
	$f1_bg = wp_get_attachment_image_src( YakeenTheme::$options['fbgimg4'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = YAKEEN_IMG_URL . 'footer4_bg.png';
}

if ( YakeenTheme::$options['footer_bgtype4'] == 'fbgcolor4' ) {
	$yakeen_bg = YakeenTheme::$options['fbgcolor4'];
} else {
	$yakeen_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( YakeenTheme::$options['footer_bgtype4'] == 'fbgimg4' ) {
	$bgc = 'footer-bg-opacity';
}

if( YakeenTheme::$options['footer4_social'] == '1' ) {
	$preview_social = 'show-social';
}else {
	$preview_social = 'no-social';
}

if( YakeenTheme::$options['copyright_area'] == '1' ) {
	$preview_copyright = 'show-copyright';
}else {
	$preview_copyright = 'no-copyright';
}

?>

<?php if ( YakeenTheme::$footer_area == 1 || YakeenTheme::$copyright_area == 1 ) { ?>
	<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $yakeen_bg ); ?>">
		<div class="container">
			<div class="footer-main-content">
				<?php if ( YakeenTheme::$footer_area == 1  ) { ?>
					<?php if ( YakeenTheme::$options['footer4_logo'] ) { ?>
					<div class="footer-logo"><a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $yakeen_light_logo, 'allow_link' ); ?></a>
					</div>
					<?php } ?>
					<?php dynamic_sidebar( 'footer-style-4' ); ?>					
				<?php } ?>
			</div>
			<div class="footer-bottom-content <?php echo esc_attr($preview_social); ?> <?php echo esc_attr($preview_copyright); ?>">
				<?php if ( YakeenTheme::$options['copyright_area'] == 1 ) { ?>
					<div class="copyright"><?php echo wp_kses(YakeenTheme::$options['copyright_text'], 'allow_link');?></div>	
				<?php }  } ?>
				<?php if (YakeenTheme::$options['footer4_social']) { ?>
				<?php if ($yakeen_socials && (YakeenTheme::$options['footer4_social'])) { ?>
					<ul class="footer-social">
						<?php foreach ($yakeen_socials as $yakeen_social): ?>
							<li><a target="_blank" href="<?php echo esc_url($yakeen_social['url']);?>"><i class="fab <?php echo esc_attr($yakeen_social['icon']);?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
