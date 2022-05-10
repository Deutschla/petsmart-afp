<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = YakeenTheme_Helper::nav_menu_args();

if( !empty( YakeenTheme::$options['logo'] ) ) {
    $logo_dark = wp_get_attachment_image( YakeenTheme::$options['logo'], 'full' );
    $panpie_dark_logo = $logo_dark;
}else {
    $panpie_dark_logo = "<img width='120' height='80' src='" . YAKEEN_IMG_URL . 'logo-dark.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "' loading='lazy'>"; 
}

?>

<div class="rt-header-menu mean-container" id="meanmenu"> 
    <?php if ( YakeenTheme::$options['mobile_topbar'] ) { ?>
        <?php get_template_part('template-parts/header/mobile', 'topbar');?>
    <?php } ?>
    <div class="mobile-mene-bar">
        <div class="mean-bar">
            <span class="sidebarBtn ">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </span>
            <a href="<?php echo esc_url(home_url('/'));?>"><?php echo wp_kses( $panpie_dark_logo, 'alltext_allow' ); ?></a>
            <?php if ( YakeenTheme::$options['mobile_search'] ) { ?>
                <div class="info"><?php get_template_part( 'template-parts/header/icon', 'search' );?></div>
            <?php } ?>
        </div>    
        <div class="rt-slide-nav">
            <div class="offscreen-navigation">
                <?php wp_nav_menu( $nav_menu_args );?>
            </div>
        </div>
    </div>
</div>
