<?php

// Logo
if( !empty( YakeenTheme::$options['footer_logo_light'] ) ) {
    $logo_lights = wp_get_attachment_image( YakeenTheme::$options['footer_logo_light'], 'full' );
    $yakeen_light_logo = $logo_lights;
}else {
    $yakeen_light_logo = "<img width='120' height='80' src='" . YAKEEN_IMG_URL . 'logo-dark.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

$yakeen_socials = YakeenTheme_Helper::socials();

if( !empty( YakeenTheme::$options['fbgimg3'] ) ) {
    $f1_bg = wp_get_attachment_image_src( YakeenTheme::$options['fbgimg3'], 'full', true );
    $footer_bg_img = $f1_bg[0];
}else {
    $footer_bg_img = YAKEEN_IMG_URL . 'footer4_bg.png';
}

if ( YakeenTheme::$options['footer_bgtype3'] == 'fbgcolor3' ) {
    $yakeen_bg = YakeenTheme::$options['fbgcolor3'];
} else {
    $yakeen_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( YakeenTheme::$options['footer_bgtype3'] == 'fbgimg2' ) {
    $bgc = 'footer-bg-opacity';
}

if( YakeenTheme::$options['footer3_social'] == '1' ) {
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
    <?php if ( YakeenTheme::$options['footer3_animate_shape'] == 1 ) { ?>
        <div class="footer-shape">
            <ul>
                <li class="left-top <?php echo esc_attr(YakeenTheme::$options['error_animation']);?> fadeInLeft" data-wow-delay="0.3s" data-wow-duration="1s"><img width="203" height="234" loading='lazy' src="<?php echo YAKEEN_ASSETS_URL . 'element/footer-shape-1.png'; ?>" alt="<?php echo esc_attr('RadiusTheme Bg Image', 'yakeen'); ?>">
                </li>
                <li class="right-top <?php echo esc_attr(YakeenTheme::$options['error_animation']);?> fadeInRight" data-wow-delay="0.3s" data-wow-duration="1s"><img width="199" height="198" loading='lazy' src="<?php echo YAKEEN_ASSETS_URL . 'element/footer-shape-2.png'; ?>" alt="<?php echo esc_attr('RadiusTheme Bg Image', 'yakeen'); ?>">
                </li>
                <li class="left-bottom <?php echo esc_attr(YakeenTheme::$options['error_animation']);?> fadeInLeft" data-wow-delay="0.3s" data-wow-duration="1s"><img width="148" height="158" loading='lazy' src="<?php echo YAKEEN_ASSETS_URL . 'element/footer-shape-3.png'; ?>" alt="<?php echo esc_attr('RadiusTheme Bg Image', 'yakeen'); ?>">
                </li>
                <li class="right-bottom <?php echo esc_attr(YakeenTheme::$options['error_animation']);?> fadeInRight" data-wow-delay="0.3s" data-wow-duration="1s"><img width="144" height="151" loading='lazy' src="<?php echo YAKEEN_ASSETS_URL . 'element/footer-shape-4.png'; ?>" alt="<?php echo esc_attr('RadiusTheme Bg Image', 'yakeen'); ?>">
                </li>
            </ul>
        </div>
    <?php } ?>
    <div class="container">
        <div class="footer-main-content">
            <?php if ( ( YakeenTheme::$options['footer3_logo'] ) && YakeenTheme::$footer_area == 1  ) { ?>
                <?php if ( YakeenTheme::$options['footer3_logo'] ) { ?>
                    <div class="footer-logo"><a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $yakeen_light_logo, 'allow_link' ); ?></a>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php dynamic_sidebar( 'footer-style-3' ); ?>
        </div>
        <div class="footer-bottom-content <?php echo esc_attr($preview_social); ?> <?php echo esc_attr($preview_copyright); ?>">
            <?php if ( YakeenTheme::$options['copyright_area'] == 1 ) { ?>
                <div class="copyright"><?php echo wp_kses(YakeenTheme::$options['copyright_text'], 'allow_link');?></div>
            <?php }  } ?>
            <?php if ( YakeenTheme::$options['footer3_social'] ) { ?>
            <?php if ( $yakeen_socials && ( YakeenTheme::$options['footer3_social'] ) ) { ?>
                <ul class="footer-social">
                    <?php foreach ( $yakeen_socials as $yakeen_social ): ?>
                        <li><a target="_blank" href="<?php echo esc_url( $yakeen_social['url'] );?>"><i class="fab <?php echo esc_attr( $yakeen_social['icon'] );?>"></i></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
