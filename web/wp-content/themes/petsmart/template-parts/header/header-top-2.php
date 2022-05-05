<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$yakeen_socials = YakeenTheme_Helper::socials();
?>

<div id="tophead" class="header-top-bar align-items-center"> 
	<div class="container">
		<div class="top-bar-wrap">
			<?php if ( YakeenTheme::$options['address'] ) { ?>
			<div class="tophead-left">
				<?php if ( YakeenTheme::$options['address'] ) { ?>
				<div class="address">
					<i class="fas fa-map-marker-alt"></i><?php echo wp_kses( YakeenTheme::$options['address'] , 'alltext_allow' );?>
				</div>
				<?php } ?>				
			</div>
			<?php } ?>
			<?php if ( YakeenTheme::$options['email'] || YakeenTheme::$options['phone'] ) { ?>
			<div class="tophead-right">				
				<?php if ( YakeenTheme::$options['email'] ) { ?>
					<div class="email">
						<i class="fas fa-envelope"></i><a href="mailto:<?php echo esc_attr( YakeenTheme::$options['email'] );?>"><?php echo wp_kses( YakeenTheme::$options['email'] , 'alltext_allow' );?></a>
					</div>
				<?php } ?>
				<?php if ( YakeenTheme::$options['phone'] ) { ?>
					<div class="address-item"><i class="fas fa-phone-alt"></i><a href="tel:<?php echo esc_attr( YakeenTheme::$options['phone'] );?>"><?php echo esc_html( YakeenTheme::$options['phone'] );?></a></div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

