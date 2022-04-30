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



<div class="col-12 mx-auto rt-grid-item blog-layout-3 fadeInUp has-post-thumbnail" data-wow-duration="1.5s">
	<div class="blog-box show-image no-preview">
		<div class="blog-img-holder">
			<div class="blog-img normal">
				<?php echo wp_kses_post( $rt_logo ); ?>
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
				<?php echo $data['rt_p_content']; ?>
			<?php } ?>
			<?php if ( ! empty( $data['button_url'] ) ) { ?>
				<div class="cta">
					<?php echo wp_kses_post( $cta ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>


