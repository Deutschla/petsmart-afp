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

$yakeen_has_entry_meta  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'yakeen_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'yakeen_views' ) ) ? true : false;

$thumb_size = 'yakeen-size9';

$args = array(
	'posts_per_page' 	=> $data['itemlimit']['size'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
	'post_type'			=> 'post'
);
if(!empty($data['catid'])){
	if( $data['query_type'] == 'category'){
	    $args['tax_query'] = [
	        [
	            'taxonomy' => 'category',
	            'field' => 'term_id',
	            'terms' => $data['catid'],                    
	        ],
	    ];
	}
}
if(!empty($data['postid'])){
	if( $data['query_type'] == 'posts'){
	    $args['post__in'] = $data['postid'];
	}
}

$query = new WP_Query( $args );
$temp = YakeenTheme_Helper::wp_set_temp_query( $query );
$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";

?>
<div class="rt-post-grid-default rt-post-grid-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_gutter'] );?>">
	<?php $i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) :?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<?php

			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			
			$yakeen_comments_number = number_format_i18n( get_comments_number() );
			$yakeen_comments_html = $yakeen_comments_number == 1 ? esc_html__( 'Comment' , 'yakeen-core' ) : esc_html__( 'Comments' , 'yakeen-core' );
			$yakeen_comments_html = '<span class="comment-number">'. $yakeen_comments_number . '</span> ' . $yakeen_comments_html;
		
			$yakeen_time_html = sprintf( '<span class="date">%s</span><span class="month">%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'yakeen_youtube_link', true );

			?>
			<div class="<?php echo esc_attr( $col_class );?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<div class="rt-item rt-single-item">
					<div class="rt-image">
						<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<a class="rt-play play-btn-lg btn-position-center rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a>
						<?php } ?>
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size );
								}
								else {
									if ( !empty( YakeenTheme::$options['no_preview_image']['id'] ) ) {
										echo wp_get_attachment_image( YakeenTheme::$options['no_preview_image']['id'], $thumb_size );
									}
									else {
										echo '<img class="wp-post-image" src="' . YakeenTheme_Helper::get_img( 'noimage_552X552.jpg' ) . '" alt="'.get_the_title().'">';
									}
								}
							?>
						</a>					
					</div>
					<div class="entry-content">
						<h3 class="entry-title title-size-xs title-animation-underline size-2"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>						
						<?php if ( $yakeen_has_entry_meta ) { ?>
							<ul class="entry-meta">
								<?php if ( $data['post_author'] == 'yes' ) { ?>
								<li class="post-author"><?php echo yakeen_meta_icon_admin(); ?><?php esc_html_e( 'by ', 'yakeen' );?><?php the_author_posts_link(); ?></li>
								<?php } if ( $data['post_date'] == 'yes' ) { ?>	
								<li class="post-date"><?php echo yakeen_meta_icon_calendar(); ?><?php echo get_the_date(); ?></li>				
								<?php } if ( $data['post_comment'] == 'yes' ) { ?>
								<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $yakeen_comments_html , 'alltext_allow' );?></a></li>
								<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'yakeen_reading_time' ) ) { ?>
								<li class="post-reading-time meta-item"><?php echo yakeen_meta_icon_clock(); ?><?php echo yakeen_reading_time(); ?></li>
								<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'yakeen_views' ) ) { ?>
								<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo yakeen_views(); ?></span></li>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
	</div>
	<?php endif;?>
	<?php YakeenTheme_Helper::wp_reset_temp_query( $temp );?>
</div>