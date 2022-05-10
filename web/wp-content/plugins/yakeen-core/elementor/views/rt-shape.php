<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;
use YakeenTheme_Helper;
use Elementor\Group_Control_Image_Size;

// image
$shape1 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'shape_one' );
$shape2 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'shape_two' );
?>

<div class="rt-shape-layout motion-effects rt-shape-<?php echo esc_attr( $data['layout'] );?>">	
	<div class="rt-shape-item">
        <?php if( ( $data['layout'] ) == 'layout1' ) { ?>
		<div class="shape <?php echo esc_attr( $data['motion_effects'] );?>"><?php echo wp_kses_post($shape1);?></div>
        <?php } if( ( $data['layout'] ) == 'layout2' ) { ?>
            <ul class="shape-list">
                <li class="shape shape1 <?php echo esc_attr( $data['animation1'] );?> <?php echo esc_attr( $data['animation_effect1'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay1'] );?>" data-wow-duration="<?php echo esc_attr( $data['duration1'] );?>"><?php echo wp_kses_post($shape1);?></li>
                <li class="shape shape2 <?php echo esc_attr( $data['animation2'] );?> <?php echo esc_attr( $data['animation_effect2'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay2'] );?>" data-wow-duration="<?php echo esc_attr( $data['duration2'] );?>"><?php echo wp_kses_post($shape2);?></li>
            </ul>
        <?php } ?>
	</div>
</div>