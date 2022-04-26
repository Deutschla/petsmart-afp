<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use YakeenTheme;
use YakeenTheme_Helper;
use \WP_Query;

$prefix      = YAKEEN_CORE_THEME_PREFIX;
$thumb_size  = 'yakeen-size4';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'yakeen_team',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
	'paged' => $paged
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'yakeen_team_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

$query = new WP_Query( $args );
$temp = YakeenTheme_Helper::wp_set_temp_query( $query );
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>
<div class="team-default team-multi-layout-2 team-grid-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_space'] );?>">
		<?php $i = $data['delay']; $j = $data['duration'];
			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$id            = get_the_id();
				$position   	= get_post_meta( $id, 'yakeen_team_position', true );
				$socials       = get_post_meta( $id, 'yakeen_team_socials', true );
				$social_fields = YakeenTheme_Helper::team_socials();
				if ( $data['contype'] == 'content' ) {
					$content = apply_filters( 'the_content', get_the_content() );
				}
				else {
					$content = apply_filters( 'the_excerpt', get_the_excerpt() );;
				}
				$content = wp_trim_words( $content, $data['count'], '' );
				$content = "$content";
				?>
				<div class="<?php echo esc_attr( $col_class );?>">
					<div class="team-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
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
								<?php if ( !empty( $socials ) && $data['social_display']  == 'yes' ) { ?>
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
									<?php if ( $data['designation_display']  == 'yes' ) { ?><span><?php echo esc_html( $position );?></span><?php } ?>
									<?php if ( $data['content_display']  == 'yes' ) { ?>
										<div class="post-excerpt">
											<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php $i = $i + 0.2; $j = $j + 0.1; } ?>
		<?php } ?>
	</div>
	<?php if ( $data['more_button'] == 'show' ) { ?>
		<div class="text-center mt-5">
			<a class="button-style-1" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><?php echo yakeen_btn_arrow(); ?></a>
		</div>
	<?php } else { ?>
		<?php YakeenTheme_Helper::pagination(); ?>
	<?php } ?>
	<?php YakeenTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>