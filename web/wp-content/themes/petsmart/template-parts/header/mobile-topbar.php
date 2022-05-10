<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$yakeen_socials = YakeenTheme_Helper::socials();

$yakeen_mobile_meta  = ( YakeenTheme::$options['mobile_phone'] || YakeenTheme::$options['mobile_email'] || YakeenTheme::$options['mobile_address'] || YakeenTheme::$options['mobile_social'] && $yakeen_socials ) ? true : false;

?>
<?php if ( $yakeen_mobile_meta ) { ?>
<div class="mobile-top-bar" id="mobile-top-fix">
	<div class="header-top">

		<?php if ( YakeenTheme::$options['mobile_phone'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="fas fa-phone-alt"></i>
			</div>
			<div class="info"><span class="info-text"><a href="tel:<?php echo esc_attr( YakeenTheme::$options['phone'] );?>"><?php echo wp_kses( YakeenTheme::$options['phone'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>			
		<?php if ( YakeenTheme::$options['mobile_email'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="far fa-envelope"></i>
			</div>
			<div class="info"><span class="info-text"><a href="mailto:<?php echo esc_attr( YakeenTheme::$options['email'] );?>"><?php echo wp_kses( YakeenTheme::$options['email'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>
		<?php if ( YakeenTheme::$options['mobile_address'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="fas fa-map-marker-alt"></i>
			</div>
			<div class="info"><span class="info-text"><?php echo wp_kses( YakeenTheme::$options['address'] , 'alltext_allow' );?></span></div>
		</div>
		<?php } ?>
	</div>
	<?php if ( YakeenTheme::$options['mobile_social'] && $yakeen_socials ) { ?>
		<ul class="header-social">
			<?php foreach ( $yakeen_socials as $yakeen_social ): ?>
				<li><a target="_blank" href="<?php echo esc_url( $yakeen_social['url'] );?>"><i class="fab <?php echo esc_attr( $yakeen_social['icon'] );?>"></i></a></li>
			<?php endforeach; ?>
		</ul>
	<?php } ?>
</div>
<?php } ?>