<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;
use Elementor\Utils;
extract($data);

?>
<div class="rt-section-title <?php echo esc_attr( $data['style'] ); ?>">	
	<?php if( !empty ( $data['sub_title'] ) ) { ?>
	<div class="sub-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1s" data-wow-duration="1s"><?php echo wp_kses_post( $data['sub_title'] ); ?></div>
	<?php } ?>
	<?php if( !empty ( $data['title'] ) ) { ?>
		<div class="entry-title-wrap <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.2s" data-wow-duration="1s">
			<span class="title-icon"><?php echo yakeen_section_title_left_icon(); ?></span>
				<h2 class="entry-title title-size-md"><?php echo wp_kses_post( $data['title'] ); ?></h2>
			<span class="title-icon"><?php echo yakeen_section_title_right_icon(); ?></span>
		</div>
	<?php } ?>
	<?php if ( !empty( $data['content'] ) ) { ?>
		<div class="entry-text <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.4s" data-wow-duration="1s"><?php echo wp_kses_post( $data['content'] );?></div>
	<?php } ?>
</div>
