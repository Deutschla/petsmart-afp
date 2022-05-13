<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

$cta = \radiustheme\Yakeen_Core\elementor\commom\renderCTA($data);


?>

<div class="ps-button">
    <?php if ( ! empty( $data['button_url'] ) ) { ?>
        <div class="cta">
            <?php echo wp_kses_post( $cta ); ?>
        </div>
    <?php } ?>
</div>
