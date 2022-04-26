<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;
use YakeenTheme_Helper;
use Elementor\Utils;

extract($data);


if (!empty ($data['title_bg']['id']) ) {
    $title_bg = wp_get_attachment_image( $data['title_bg']['id'], 'full' );
}else{
    $title_bg = "<img width='137' height='89' src='". esc_url( YakeenTheme_Helper::get_img( 'heading-bg.png' ) ) ."' alt='". esc_attr( get_bloginfo( 'name' ) ). "'>";
}

?>
<div class="rt-section-title <?php echo esc_attr( $data['style'] ); ?>">	
	<?php if( !empty ( $data['title'] ) ) { ?>
        <span class="title-bg"><?php echo wp_kses_post($title_bg);?></span>
        <h2 class="entry-title title-size-md"><?php echo wp_kses_post( $data['title'] ); ?></h2>   
	<?php } ?>
	<?php if( !empty( $data['buttontext'] ) ) { ?>
    <div class="rt-button">
        <a href="<?php echo esc_url( $data['buttonurl']['url'] );?>"><?php echo esc_html( $data['buttontext'] );?><?php echo yakeen_btn_arrow(); ?></a>
        <?php } ?>
    </div>
</div>
