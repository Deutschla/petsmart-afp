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

$attr = '';
$cta  = '';
if ( ! empty( $data['button_url']['url'] ) ) {
	$attr  = 'href="' . $data['button_url']['url'] . '"';
	$attr .= ! empty( $data['button_url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= ! empty( $data['button_url']['nofollow'] ) ? ' rel="nofollow"' : '';

	$cta = '<a class="button-style-2" ' . $attr . '>' . esc_html( $data['rt_cta_label'] ) . '</a>';

}

	$rt_logo = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_logo' );


?>
<!---->
<!--<style>-->
<!--	.rt-image img {-->
<!--		transform: none !important;-->
<!--	}-->
<!--   .rt-image__tout img {-->
<!--		width: 454px !important;-->
<!--		height: 454px !important;-->
<!--	}-->
<!--	.rt-image__tout {-->
<!--		text-align: center;-->
<!--	}-->
<!--</style>-->

<div class="hide wow fadeInUp animated" data-wow-delay="0.5s" data-wow-duration="1s">
	<div class="rt-item rt-single-item">
		<div class="rt-image rt-image__tout">
			<?php echo wp_kses_post( $rt_logo ); ?>
		</div>
		<div class="entry-content">
			<h1><?php echo esc_html( $data['rt_title'] ); ?></h1>
			<div class="post_excerpt"><p><?php echo esc_html( $data['rt_text'] ); ?></p></div>
			<?php if ( ! empty( $data['button_url'] ) ) { ?>
				<br/>
				<div class="cta">
					<?php echo wp_kses_post( $cta ); ?>
					<a href="" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="1" e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJzbGlkZXNob3ciOiI5ODRhNDk3In0%3D" data-elementor-lightbox-video="https://www.youtube.com/embed/20xuYm2VL6I?feature=oembed&amp;autoplay=1&amp;rel=0&amp;controls=0">		
							<div class="elementor-custom-embed-play">
							PLAY
								<span class="elementor-screen-only">Play</span>
							</div>
					</a>
					<a class="rt-play rt-video-popup" href="https://www.youtube.com/watch?v=20xuYm2VL6I">PPPLLLAAAYY2</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

