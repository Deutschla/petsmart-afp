<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

?>
<div class="rt-title-text-button">
    <?php if ( !empty( $data['sub_title'] ) ) { ?>
    <div class="entry-subtitle <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>"
        data-wow-delay="1s" data-wow-duration="1s"><?php echo wp_kses_post( $data['sub_title'] );?>
    </div>
    <?php } ?>
    <?php if ( !empty( $data['title'] ) ) { ?>
    <h2 class="entry-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>"
        data-wow-delay="1.2s" data-wow-duration="1s"><?php echo wp_kses_post( $data['title'] );?>
        <?php if ( !empty( $data['title_icon'] ) ) { ?>
            <span class="title-icon"><?php echo yakeen_section_title_bottom_icon2(); ?></span>
        <?php } ?>
    </h2>
    <?php } ?>
    <div class="entry-content <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>"
        data-wow-delay="1.4s" data-wow-duration="1s"><?php echo wp_kses_post( $data['content'] );?>
    </div>
    <?php if ( $data['button_display']  == 'yes' ) { ?>
    <div class="rt-button <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>"
        data-wow-delay="1.6s" data-wow-duration="1s">
        <a class="button-style-1" href="<?php echo esc_url( $data['buttonurl']['url'] );?>"><?php echo esc_html( $data['buttontext'] );?><?php echo yakeen_btn_arrow(); ?></a>
    </div>
    <?php } ?>
</div>