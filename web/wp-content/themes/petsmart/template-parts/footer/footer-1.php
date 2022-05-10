<?php
$yakeen_footer_column = YakeenTheme::$options['footer_column_1'];
switch ( $yakeen_footer_column ) {
	case '1':
	$yakeen_footer_class = 'col-12';
	break;
	case '2':
	$yakeen_footer_class = 'col-md-6 col-12';
	break;
	case '3':
	$yakeen_footer_class = 'col-lg-4 col-12';
	break;		
	default:
	$yakeen_footer_class = 'col-xl-3 col-md-6 col-12';
	break;
}
$yakeen_socials = YakeenTheme_Helper::socials();

if( !empty( YakeenTheme::$options['fbgimg'] ) ) {
	$f1_bg = wp_get_attachment_image_src( YakeenTheme::$options['fbgimg'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = YAKEEN_IMG_URL . 'footer_bg.png';
}

if ( YakeenTheme::$options['footer_bgtype'] == 'fbgcolor' ) {
	$yakeen_bg = YakeenTheme::$options['fbgcolor'];
} else {
	$yakeen_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( YakeenTheme::$options['footer_bgtype'] == 'fbgimg' ) {
	$bgc = 'footer-bg-opacity';
}
?>


<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $yakeen_bg ); ?>">
	<?php if ( is_active_sidebar( 'footer-style-1-1' ) && YakeenTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">			
			<div class="row">
				<?php
				for ( $i = 1; $i <= $yakeen_footer_column; $i++ ) {
					echo '<div class="' . $yakeen_footer_class . '">';
					dynamic_sidebar( 'footer-style-1-'. $i );
					echo '</div>';
				}
				?>
			</div>			
		</div>
	</div>
	<?php } ?>
	<?php if ( YakeenTheme::$copyright_area == 1 ) { ?>
	<div class="footer-copyright-area">
		<div class="container">
			<div class="copyright"><?php echo wp_kses( YakeenTheme::$options['copyright_text'] , 'allow_link' );?></div>
		</div>
	</div>
	<?php } ?>
</div>

