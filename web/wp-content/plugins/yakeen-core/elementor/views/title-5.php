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
	<?php if( !empty ( $data['title'] ) ) { ?>
		<div class="entry-title-wrap <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.2s" data-wow-duration="1s">
			<h2 class="entry-title title-size-md"><?php echo wp_kses_post( $data['title'] ); ?></h2>
		</div>
	<?php } ?>
</div>
