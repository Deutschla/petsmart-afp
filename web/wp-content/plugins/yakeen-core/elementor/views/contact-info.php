<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;
use YakeenTheme_Helper;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

// icon , image

$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );

$final_icon_class       = " fas fa-map-marker-alt";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="rt-contact-info">
	<div class="rt-item item-<?php echo esc_attr( $data['icontype'] );?>">
		<?php if ( !empty( $data['icontype']== 'image' ) ) { ?>		            
			<span class="rt-img"><?php echo wp_kses_post($getimg);?></span>  
		<?php }else{?> 	
		<?php if ( $final_icon_image_url ): ?>
			<span class="rt-icon"><img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon"></span>
		<?php else: ?>
			<span class="rt-icon"><i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i></span>
		<?php endif ?>
		<?php }  ?>	

		<div class="entry-content">
			<?php if ( !empty( $data['title'] ) ) { ?>
				<h3 class="entry-title"><?php echo wp_kses_post( $data['title'] );?></h3>
			<?php } ?>
			<?php if ( !empty( $data['entry_text'] ) ) { ?>
				<p class="entry-text"><?php echo wp_kses_post( $data['entry_text'] );?></p>
			<?php } ?>
			<?php if ( !empty( $data['address_info'] ) ) { ?>
				<p class="address-info"><?php echo wp_kses_post( $data['address_info'] );?></p>
			<?php } ?>
		</div>
	</div>
</div>