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

$cta = \radiustheme\Yakeen_Core\elementor\commom\renderCTA($data);

$main_image = Group_Control_Image_Size::get_attachment_image_html($data, 'icon_image_size', 'main_image');

?>
<!---->
<style>
	.rt-image img {
		transform: none !important;
	}
	.ps-card-2 {
		text-align: center;
	}
</style>

<div class="ps-card-2 col-12 wow fadeInUp animated" data-wow-delay="0.5s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInUp;">
	<a href="<?php echo esc_html( $data['button_url']['url'] ) ?>" target="_blank">
		<div class="rt-item rt-single-item">
			<div class="rt-image">
				<?php echo wp_kses_post( $main_image ); ?>
			</div>
			<div class="entry-content">
				<label class="ps-label"><?php echo esc_html( $data['ps_label'] ); ?></label>
				<h2 class="ps-headline-2"><?php echo esc_html( $data['ps_title'] ); ?></h2>
				<div class="post_excerpt">
					<p class="ps-body-copy-2"><?php echo esc_html( $data['ps_p_content'] ); ?></p>
				</div>
				<?php if ( ! empty( $data['button_url'] ) ) { ?>
					<div class="cta">
						<?php echo wp_kses_post( $cta ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
