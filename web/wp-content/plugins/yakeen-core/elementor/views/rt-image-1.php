<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use YakeenTheme_Helper;

$yakeen_socials = YakeenTheme_Helper::socials();

use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract( $data );

$attr = '';
if ( ! empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= ! empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= ! empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';

}
if ( $attr ) {
	$rt_logo = '<a ' . $attr . '>' . Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_logo' ) . '</a>';
} else {
	$rt_logo = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_logo' );
}

?>

<div class="rt-image-default rt-image-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="rt-image">
		<ul class="shape-wrap">
			<li class="top-shape wow fadeInDown animated" data-wow-duration="2.7s"><?php echo yakeen_author_shape_top(); ?></li>
			<li class="left-shape wow fadeInLeft animated" data-wow-duration="3s"><?php echo yakeen_author_shape_left(); ?></li>
			<li class="right-shape wow fadeInRight animated" data-wow-duration="3s"><?php echo yakeen_author_shape_right(); ?></li>
		</ul>
		<?php echo wp_kses_post( $rt_logo ); ?>
	</div>
	<h3 class="entry-title title-size-xl"><?php echo esc_html( $data['rt_title'] ); ?></h3>
	<p class="entry-content"><?php echo esc_html( $data['rt_text'] ); ?></p>
	<?php if ( $data['social_display'] == 'yes' ) { ?>
		<ul class="author-social">
			<?php foreach ( $yakeen_socials as $yakeen_social ) : ?>
				<li><a target="_blank" href="<?php echo esc_url( $yakeen_social['url'] ); ?>"><i class="fab <?php echo esc_attr( $yakeen_social['icon'] ); ?>"></i></a></li>
			<?php endforeach; ?>
		</ul>
	<?php } ?>
</div>		
