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
	.ps-hero {
		background-color: white !important;
	}
	.ps-hero .entry-content p {
		color: black;
		line-height: 1.5;
	}
</style>


<div class="ps-hero col-12 mx-auto rt-grid-item blog-layout-3" data-wow-duration="1.5s">
	<div class="blog-box show-image no-preview">
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
				<h1><?php echo esc_html( $data['rt_title'] ); ?></h1>
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


