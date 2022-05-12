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
		padding-top: 20px;
		background-color: #ffffff;
	}
	.ps-breadcrumb .primary {
		color: red;
	}

    .ps-breadcrumb .dvdr {
        padding: 0 10px;
    }
</style>

<div class="ps-breadcrumb">
	<?php if ( ! empty( $data['rt_page_title'] ) ) { ?>
		<h1 class="primary"><?php echo esc_html( $data['rt_page_title'] ); ?></h1>
	<?php } ?>

	<?php if ( ! empty( $data['rt_site_title'] ) ) { ?>
		<span><?php echo esc_html( $data['rt_site_title'] ); ?></span>
	<?php } ?>

	<?php if ( ! empty( $data['rt_category'] ) ) { ?>
		<span class="dvdr"><i class="fas fa-caret-right"></i></span>
		<span class="primary"><?php echo esc_html( $data['rt_category'] ); ?></span>
	<?php } ?>
</div>
