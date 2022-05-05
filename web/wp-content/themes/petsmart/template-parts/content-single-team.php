<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;

$yakeen_team_position 		= get_post_meta( $post->ID, 'yakeen_team_position', true );
$yakeen_team_website       	= get_post_meta( $post->ID, 'yakeen_team_website', true );
$yakeen_team_email    		= get_post_meta( $post->ID, 'yakeen_team_email', true );
$yakeen_team_phone    		= get_post_meta( $post->ID, 'yakeen_team_phone', true );
$yakeen_team_address    		= get_post_meta( $post->ID, 'yakeen_team_address', true );
$yakeen_team_skill       	= get_post_meta( $post->ID, 'yakeen_team_skill', true );
$yakeen_team_counter      	= get_post_meta( $post->ID, 'yakeen_team_count', true );
$socials        			= get_post_meta( $post->ID, 'yakeen_team_socials', true );
$socials        			= array_filter( $socials );
$socials_fields 			= YakeenTheme_Helper::team_socials();

$yakeen_team_contact_form 	= get_post_meta( $post->ID, 'yakeen_team_contact_form', true );

$thumb_size = 'yakeen-size8';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="team-single-content">
		<div class="row">	
		<div class="col-lg-4 col-12">
				<div class="team-thumb">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size );
						} else {
							if ( !empty( YakeenTheme::$options['no_preview_image']['id'] ) ) {
								echo wp_get_attachment_image( YakeenTheme::$options['no_preview_image']['id'], $thumb_size );
							} else {
								echo '<img class="wp-post-image" src="' . YakeenTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
							}
						}
					?>	
				</div>
				<!-- Team info -->
				<?php if ( YakeenTheme::$options['team_info'] ) { ?>
				<?php if ( !empty( $yakeen_team_website ) ||  !empty( $yakeen_team_phone ) || !empty( $yakeen_team_email ) || !empty( $yakeen_team_address )) { ?>
				<div class="team-info">
					<h4><?php esc_html_e( 'Info', 'yakeen' );?></h4>
					<ul>
						<?php if ( !empty( $yakeen_team_website ) ) { ?>	
							<li><span class="team-label"><?php esc_html_e( 'Website', 'yakeen' );?> : </span><?php echo esc_html( $yakeen_team_website );?></li>
						<?php } if ( !empty( $yakeen_team_phone ) ) { ?>	
							<li><span class="team-label"><?php esc_html_e( 'Phone', 'yakeen' );?> : </span><a href="tel:<?php echo esc_html( $yakeen_team_phone );?>"><?php echo esc_html( $yakeen_team_phone );?></a></li>
						<?php } if ( !empty( $yakeen_team_email ) ) { ?>	
							<li><span class="team-label"><?php esc_html_e( 'Email', 'yakeen' );?> : </span><a href="mailto:<?php echo esc_html( $yakeen_team_email );?>"><?php echo esc_html( $yakeen_team_email );?></a></li>
						<?php } if ( !empty( $yakeen_team_address ) ) { ?>	
							<li><span class="team-label"><?php esc_html_e( 'Address', 'yakeen' );?> : </span><?php echo esc_html( $yakeen_team_address );?></li>	
						<?php } ?>
					</ul>
				</div>
				<?php } } ?>
			</div>		
			<div class="col-lg-8 col-12">
				<div class="team-content">
					<div class="team-heading">
						<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php if ( $yakeen_team_position ) { ?>
						<span class="designation"><?php echo esc_html( $yakeen_team_position );?></span>
						<?php } ?>
					</div>
					<?php the_content();?>
					<?php if ( YakeenTheme::$options['team_social'] ) { ?>
						<?php if ( !empty( $socials ) ) { ?>
						<ul class="team-social">
							<?php foreach ( $socials as $key => $value ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fab <?php echo esc_attr( $socials_fields[$key]['icon'] );?>"></i></a></li>
							<?php endforeach; ?>
						</ul>						
						<?php } ?>
					<?php } ?>
				</div>
				<!-- Team Skills -->
				<?php if ( YakeenTheme::$options['team_skill'] ) { ?>
					<?php if ( !empty( $yakeen_team_skill ) ) { ?>
					<div class="rt-skill-wrap">
						<div class="rt-skills">
							<h4><?php esc_html_e( 'Skill', 'yakeen' );?></h4>
							<?php foreach ( $yakeen_team_skill as $skill ): ?>
								<?php
								if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
									continue;
								}
								$skill_value = (int) $skill['skill_value'];
								$skill_style = "width:{$skill_value}%;";

								if ( !empty( $skill['skill_color'] ) ) {
									$skill_style .= "background-color:{$skill['skill_color']};";
								}
								?>
								<div class="rt-skill-each">
									<div class="rt-name"><?php echo esc_html( $skill['skill_name'] );?></div>
									<div class="progress">
										<div class="progress-bar progress-bar-striped wow fadeInLeft animated" data-progress="<?php echo esc_attr( $skill_value );?>%" style="<?php echo esc_attr( $skill_style );?>"> <span><?php echo esc_html( $skill_value );?>%</span></div>
									</div>								
								</div>
							<?php endforeach;?> 
						</div>
					</div>
					<?php } ?>
				<?php } ?>
			</div>					
		</div>
	</div>
</div>