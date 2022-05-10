<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$yakeen_socials = YakeenTheme_Helper::socials();
$yakeen_addit_info  = ( !empty(YakeenTheme::$options['plain_text']) ) ? true : false;
?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
			<?php if ( YakeenTheme::$options['online_button'] == '1' ) { ?>
				<div class="header-button">
					<a target="_self" href="<?php echo esc_url( YakeenTheme::$options['online_button_link']  );?>"><?php echo esc_html( YakeenTheme::$options['online_button_text'] );?></a>
				</div>
			<?php } ?>
			<?php if ( $yakeen_addit_info ) { ?>
				<?php if ( YakeenTheme::$options['plain_text'] ) { ?>
					<div class="plain-text"><?php echo esc_html( YakeenTheme::$options['plain_text'] );?>
						<svg class="icon" width="10" height="10" viewBox="0 0 10 10" fill="none">
                          	<path d="M1 9L9 1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          	<path d="M3 1H9V7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
					</div>
				<?php } ?>	
			<?php } ?>			
			<?php if ( YakeenTheme::$options['search_icon'] ) { ?>
				<?php get_template_part( 'template-parts/header/icon', 'search' );?>
			<?php } ?>			
		</div>
	</div>
</div>