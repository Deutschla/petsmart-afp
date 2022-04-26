<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'yakeen-size8';
$id = get_the_ID();

$position   	= get_post_meta( $id, 'yakeen_team_position', true );
$socials       	= get_post_meta( $id, 'yakeen_team_socials', true );
$social_fields 	= YakeenTheme_Helper::team_socials();

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), YakeenTheme::$options['team_arexcerpt_limit'], '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="team-item">
		<div class="team-content-wrap">		
			<div class="team-thums">
				<a href="<?php the_permalink();?>">
					<?php
					if ( has_post_thumbnail() ){
						the_post_thumbnail( $thumb_size );
					}
					else {
						if ( !empty( YakeenTheme::$options['no_preview_image']['id'] ) ) {
							echo wp_get_attachment_image( YakeenTheme::$options['no_preview_image']['id'], $thumb_size );
						}
						else {
							echo '<img class="wp-post-image" src="' . YakeenTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
						}
					}
					?>
				</a>
				<?php if ( YakeenTheme::$options['team_ar_social'] ) { ?>
					<ul class="team-social">
						<?php foreach ( $socials as $key => $social ): ?>
							<?php if ( !empty( $social ) ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
			<div class="mask-wrap">
				<div class="team-content">
					<h3 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( YakeenTheme::$options['team_ar_position'] ) { ?><span><?php echo esc_html( $position );?></span><?php } ?>
					<?php if ( YakeenTheme::$options['team_ar_excerpt'] ) { ?>
					<div class="post-excerpt">
						<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>