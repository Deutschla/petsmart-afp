<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Yakeen_Core;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

?>
<div class="rt-section-title <?php echo esc_attr( $data['content_align'] );?> <?php echo esc_attr( $data['style'] ); ?>">
	<?php if( !empty ( $data['title'] ) ) { ?>
		<div class="entry-title-wrap <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.2s" data-wow-duration="1s">
			<h2 class="entry-title title-size-xs"><?php echo wp_kses_post( $data['title'] ); ?></h2>
			<span class="title-icon"><?php echo yakeen_section_title_bottom_icon2(); ?></span>
		</div>
	<?php } ?>
</div>