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

$cta = \radiustheme\Yakeen_Core\elementor\commom\renderCTA($data, 'rt_cta_label');

$main_image = Group_Control_Image_Size::get_attachment_image_html($data, 'icon_image_size', 'main_image');

?>

<style>
	.hero-img-entry-content-container {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.ps-hero-img-container {
		width: 100%;
	}
	.ps-hero .entry-content {
		width: 100%;
		max-width: 1116px;
	}

	.ps-hero .ps-label {
		margin-bottom: 18px;
	}
	.ps-hero .ps-headline-1 {
		margin-bottom: 20px;
	}
    .ps-hero img {
        width: 100%;
    }
	
	@media (max-width: 767px) {
		.ps-hero .entry-content {
			padding: 30px 10px 30px !important;
		}
		.ps-hero .ps-body-copy-1 {
			margin: 0;
		}
	}
</style>


<div class="ps-hero col-12 mx-auto rt-grid-item blog-layout-3" data-wow-duration="1.5s">
	<div class="hero-img-entry-content-container blog-box show-image no-preview">
		<div class="ps-hero-img-container blog-img-holder">
			<div class="blog-img normal">
				<?php echo wp_kses_post( $main_image ); ?>
			</div>
		</div>
		<div class="entry-content">
			<?php if ( ! empty( $data['rt_label'] ) ) { ?>
				<label class="ps-label"><?php echo esc_html( $data['rt_label'] ); ?></label>
			<?php } ?>
			<?php if ( ! empty( $data['rt_title'] ) ) { ?>
				<h1 class="ps-headline-1"><?php echo esc_html( $data['rt_title'] ); ?></h1>
			<?php } ?>
			<?php if ( ! empty( $data['rt_p_content'] ) ) { ?>   
				<p class="ps-body-copy-1"><?php echo $data['rt_p_content']; ?></p>
			<?php } ?>
			<?php if ( ! empty( $data['button_url'] ) ) { ?>
				<div class="cta">
					<?php echo wp_kses_post( $cta ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>


