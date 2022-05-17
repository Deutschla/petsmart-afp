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

$cta = \radiustheme\Yakeen_Core\elementor\commom\renderCTA($data, 'rt_cta_label', 'button-style-2');

$rt_logo = Group_Control_Image_Size::get_attachment_image_html($data, 'icon_image_size', 'rt_logo');

?>

<style>
	.ps-breadcrumb {
		text-align: center;
		margin: 27px 0px;
		background-color: #ffffff;
	}
	.ps-breadcrumb .ps-headline-2 {
		color: #DD2834;
		margin-bottom: 18px;
	}
	.ps-breadcrumb .origin-site-title {
		color: black;
		font-size: 17px;
	}
    .ps-breadcrumb .dvdr {
        padding: 0 10px;
		color: black;
    }
	.ps-breadcrumb .current-page-pathname {
		color: #DD2834;
		font-size: 17px;
	}

	@media (max-width: 767px) {
		.ps-breadcrumb {
			margin: 23px 0;
		}
		.ps-breadcrumb .ps-headline-2 {
			margin-bottom: 8px;
			font-size: 24px;
			line-height: 30px !important;
		}
	}
</style>

<div class="ps-breadcrumb">
	<?php if ( ! empty( $data['rt_page_title'] ) ) { ?>
		<h2 class="ps-headline-2"><?php echo esc_html( $data['rt_page_title'] ); ?></h2>
	<?php } ?>

	<?php if ( ! empty( $data['rt_site_title'] ) ) { ?>
		<a href="<?php echo esc_html( $data['button_url']['url'] ) ?>">
			<span class="origin-site-title"><?php echo esc_html( $data['rt_site_title'] ); ?></span>
		</a>
	<?php } ?>

	<?php if ( ! empty( $data['rt_category'] ) ) { ?>
		<span class="dvdr"><i class="fas fa-caret-right"></i></span>
		<span class="current-page-pathname"><?php echo esc_html( $data['rt_category'] ); ?></span>
	<?php } ?>
</div>
