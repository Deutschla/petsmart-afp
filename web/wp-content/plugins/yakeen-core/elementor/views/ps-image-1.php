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
extract( $data );


if ( ! empty( $data['button_url']['url'] ) ) {
	$attr        = '';
	$cta         = '';
	$video_class = '';
	$is_video    = strpos( $data['button_url']['url'], 'youtube' );

	if ( false !== $is_video ) {
		$video_class = ' rt-play rt-video-popup';
	}

	$attr  = 'href="' . $data['button_url']['url'] . '"';
	$attr .= ! empty( $data['cta_style'] ) ? ' class="' . $data['cta_style'] . $video_class . '"' : '';
	$attr .= ! empty( $data['button_url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= ! empty( $data['button_url']['nofollow'] ) ? ' rel="nofollow"' : '';

	$cta = '<a ' . $attr . '>' . esc_html( $data['rt_cta_label'] ) . '</a>';
}

	$main_image = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'main_image' );
?>

<style>
	.ps-featured-content {
		background-color: white;
	}
	.ps-featured-content .featured-content-header h2 {
		color: #DD2834;
		margin: 25px auto;
	}
	.ps-featured-content h4 {
		margin-bottom: 16px;
	}
	.ps-featured-content .entry-content p {
		color: black;
		line-height: 1.5;
		font-size: 17px;
	}
	.ps-featured-content .cta {
		margin-bottom: 20px;
	}

	@media (max-width: 767px) {
		.ps-featured-content .blog-img {

		}
		.ps-featured-content .blog-img > img {
			height: 100%
		}
		.ps-featured-content .entry-content {
			padding: 30px 10px 30px !important;
		}
		.ps-featured-content .entry-content h2 {
			line-height: 1.2;
		}
		.ps-featured-content .entry-content p {
			margin: 0;
		}
		.ps-featured-content .cta {
			margin-bottom: 16px;
		}
	}
</style>

<div class="ps-featured-content col-12 mx-auto rt-grid-item blog-layout-3" data-wow-duration="1.5s">
	<div class="blog-box show-image no-preview">
		<div class="featured-content-header">
			<?php if ( ! empty( $data['rt_header'] ) ) { ?>
				<h2><?php echo esc_html( $data['rt_header'] ); ?></h2>
			<?php } ?>
		</div>
		<div class="blog-img-holder">
			<div class="blog-img normal">
				<?php echo wp_kses_post( $main_image ); ?>
			</div>
		</div>
		<div class="entry-content">
			<?php if ( ! empty( $data['rt_label'] ) ) { ?>
				<h4><?php echo esc_html( $data['rt_label'] ); ?></h4>
			<?php } ?>
			<?php if ( ! empty( $data['rt_title'] ) ) { ?>
				<h2><?php echo esc_html( $data['rt_title'] ); ?></h2>
			<?php } ?>
			<?php if ( ! empty( $data['rt_p_content'] ) ) { ?>   
				<p><?php echo $data['rt_p_content']; ?></p>
			<?php } ?>
			<?php if ( ! empty( $data['button_url'] ) ) { ?>
				<div class="cta">
					<?php echo wp_kses_post( $cta ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>


