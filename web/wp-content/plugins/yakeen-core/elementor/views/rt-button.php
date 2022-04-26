<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

?>
<div class="rt-button <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
	<?php if( !empty( $data['buttontext'] ) ) { ?>
		<a class="el-button-common el-button-<?php echo esc_attr( $data['style'] ); ?>" href="<?php echo esc_url( $data['buttonurl']['url'] );?>"><?php echo esc_html( $data['buttontext'] );?><?php echo yakeen_btn_arrow(); ?></a>
	<?php } ?>
</div>