<?php if ( $data['display_pagination'] == 'yes' ) { ?>
    <div class="swiper-pagination <?php echo esc_attr( $data['pagination_style'] );?>"></div>
<?php } ?>
<?php if ( $data['display_navigation'] == 'yes' ) { ?>
    <?php if (( $data['nav_style'] == 'rt-swiper-nav-1' ) || ( $data['nav_style'] == 'rt-swiper-nav-2' )) { ?>
    <div class="swiper-navigation <?php echo esc_attr($data['nav_style']);?>">
        <div class="swiper-button-prev"><?php echo yakeen_chevron_left(); ?></div>
        <div class="swiper-button-next"><?php echo yakeen_chevron_right(); ?></div>
    </div>
    <?php } elseif (( $data['nav_style'] == 'rt-swiper-nav-3' ) || ( $data['nav_style'] == 'rt-swiper-nav-4' )) { ?>
    <div class="swiper-navigation <?php echo esc_attr($data['nav_style']);?>">
        <div class="swiper-button-prev"><?php echo yakeen_chevron_left_big(); ?></div>
        <div class="swiper-button-next"><?php echo yakeen_chevron_right_big(); ?></div>
    </div>
    <?php } elseif (( $data['nav_style'] == 'rt-swiper-nav-5' ) || ( $data['nav_style'] == 'rt-swiper-nav-6' ) || ( $data['nav_style'] == 'rt-swiper-nav-7' ) || ( $data['nav_style'] == 'rt-swiper-nav-8' )) { ?>
    <div class="swiper-navigation <?php echo esc_attr( $data['nav_style'] );?>">
        <div class="swiper-button-prev"><?php echo yakeen_arrow_left(); ?></div>
        <div class="swiper-button-next"><?php echo yakeen_arrow_right(); ?></div>
    </div>
    <?php } ?>
<?php } ?>