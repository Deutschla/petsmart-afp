<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

wp_head();

if( !empty( YakeenTheme::$options['error_image'] ) ) {
	$error_bg = wp_get_attachment_image( YakeenTheme::$options['error_image'], 'full', true );
	$yakeen_error_img = $error_bg;
}else {
	$yakeen_error_img = "<img width='783' height='330' src='" . YAKEEN_IMG_URL . '404.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

if( !empty( YakeenTheme::$options['error_woman_image'] ) ) {
	$error_woman = wp_get_attachment_image( YakeenTheme::$options['error_woman_image'], 'full', true );
	$yakeen_error_woman = $error_woman;
}else {
	$yakeen_error_woman = "<img width='374' height='309' src='" . YAKEEN_IMG_URL . '404Man.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}


?>
<div id="primary" class="error-page-area">
    <div class="container">
        <div class="error-page-content">
            <?php if ( YakeenTheme::$options['animated_bg_image'] == 1 ) { ?>
            <div class="error-bg">
                <ul>
                    <li class="left-bg <?php echo esc_attr(YakeenTheme::$options['error_animation']);?> fadeInLeft" data-wow-delay="0.3s" data-wow-duration="1s"><img width="339" height="326" loading='lazy' src="<?php echo YAKEEN_ASSETS_URL . 'element/error-left-bg.png'; ?>" alt="<?php echo esc_attr('RadiusTheme Bg Image', 'yakeen'); ?>">
                    </li>
                    <li class="center-bg">
                        <img width="805" height="500" loading='lazy' src="<?php echo YAKEEN_ASSETS_URL . 'element/error-main-bg.png'; ?>"
                            alt="<?php echo esc_attr('RadiusTheme Bg Image', 'yakeen'); ?>">
                    </li>
                    <li class="right-bg <?php echo esc_attr(YakeenTheme::$options['error_animation']);?> fadeInRight" data-wow-delay="0.3s" data-wow-duration="1s"><img width="270" height="283" loading='lazy' src="<?php echo YAKEEN_ASSETS_URL . 'element/error-right-bg.png'; ?>" alt="<?php echo esc_attr('RadiusTheme Bg Image', 'yakeen'); ?>">
                    </li>
                </ul>
            </div>
            <?php } ?>
            <div class="item-img">
                <?php if ( YakeenTheme::$options['animated_image'] == 1 ) { ?>
                <div class="error-leaf">
                    <ul>
                        <li>
                            <img width="36" height="20" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf1.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="76" height="66" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf2.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="55" height="23" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf3.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="29" height="28" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf4.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="34" height="14" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf5.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="23" height="32" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf6.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="68" height="73" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf7.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="29" height="28" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf4.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="34" height="14" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf5.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="23" height="32" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf6.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                        <li>
                            <img width="68" height="73" loading='lazy'
                                src="<?php echo YAKEEN_ASSETS_URL . 'element/leaf7.svg'; ?>"
                                alt="<?php echo esc_attr('RadiusTheme Leaf Shape', 'yakeen'); ?>">
                        </li>
                    </ul>
                </div>
                <?php } ?>
                <span class="error-main-img"><?php echo wp_kses( $yakeen_error_img, 'allow_link' ); ?></span>
                <figure class="error-figure">
                    <span class="error-img <?php echo esc_attr( YakeenTheme::$options['error_animation'] );?> zoomIn"
                        data-wow-delay="1.5s" data-wow-duration="1s"><?php echo wp_kses( $yakeen_error_woman, 'allow_link' ); ?></span>
                    <img class="error-text <?php echo esc_attr( YakeenTheme::$options['error_animation'] );?> zoomInDown"
                        data-wow-delay="2s" data-wow-duration="1s" width="96" height="93" loading='lazy' src="<?php echo YAKEEN_ASSETS_URL . 'element/text-talk-shape.png'; ?>" alt="<?php echo esc_attr('text-talk-shape', 'yakeen'); ?>">
                </figure>
            </div>
            <?php if ( !empty( YakeenTheme::$options['error_text1']) ) { ?>
            <h2 class="error-title <?php echo esc_attr( YakeenTheme::$options['error_animation'] );?> <?php echo esc_attr( YakeenTheme::$options['error_animation_effect'] );?>"
                data-wow-delay=".7s" data-wow-duration="1s">
                <?php echo wp_kses( YakeenTheme::$options['error_text1'] , 'alltext_allow' );?></h2>
            <?php } ?>
            <?php if ( !empty(YakeenTheme::$options['error_text2'])) { ?>
            <p class="<?php echo esc_attr( YakeenTheme::$options['error_animation'] );?> <?php echo esc_attr( YakeenTheme::$options['error_animation_effect'] );?>"
                data-wow-delay=".9s" data-wow-duration="1s">
                <?php echo wp_kses( YakeenTheme::$options['error_text2'] , 'alltext_allow' );?></p>
            <?php } ?>
            <div class="go-home <?php echo esc_attr( YakeenTheme::$options['error_animation'] );?> <?php echo esc_attr( YakeenTheme::$options['error_animation_effect'] );?>"
                data-wow-delay="1.1s" data-wow-duration="1s">
                <a class="button-style-1" href="<?php echo esc_url( home_url( '/' ) );?>">
                    <?php echo esc_html( YakeenTheme::$options['error_buttontext'] );?>
                </a>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>