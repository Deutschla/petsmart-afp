<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$yakeen_has_entry_meta  = ( YakeenTheme::$options['post_date'] || YakeenTheme::$options['post_author_name'] || YakeenTheme::$options['post_comment_num'] || ( YakeenTheme::$options['post_length'] && function_exists( 'yakeen_reading_time' ) ) || YakeenTheme::$options['post_published'] && function_exists( 'yakeen_get_time' ) || ( YakeenTheme::$options['post_view'] && function_exists( 'yakeen_views' ) ) ) ? true : false;

$yakeen_comments_number = number_format_i18n( get_comments_number() );
$yakeen_comments_html = $yakeen_comments_number == 1 ? esc_html__( 'Comment' , 'yakeen' ) : esc_html__( 'Comments' , 'yakeen' );
$yakeen_comments_html = '<span class="comment-number">'. $yakeen_comments_number .'</span> '. $yakeen_comments_html;
$yakeen_author_bio = get_the_author_meta( 'description' );

$yakeen_time_html       = sprintf( '<span class="date">%s</span><span class="month">%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$yakeen_time_html       = apply_filters( 'yakeen_single_time', $yakeen_time_html );

$author = $post->post_author;

$thumbnail = false;

$news_author_fb = get_user_meta( $author, 'yakeen_facebook', true );
$news_author_tw = get_user_meta( $author, 'yakeen_twitter', true );
$news_author_ld = get_user_meta( $author, 'yakeen_linkedin', true );
$news_author_pr = get_user_meta( $author, 'yakeen_pinterest', true );
$yakeen_author_designation = get_user_meta( $author, 'yakeen_author_designation', true );

$post_layout_ops = get_post_meta( get_the_ID() ,'yakeen_post_layout', true );

$youtube_link = get_post_meta( get_the_ID(), 'yakeen_youtube_link', true );

if( YakeenTheme::$options['display_no_preview_image'] == '1' ) {
	$preview = 'show-preview';
}else {
	$preview = 'no-preview';
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class($post_layout_ops); ?>>
	<div class="main-wrap">
		<?php if ( YakeenTheme::$options['post_featured_image'] == true ) { ?>
			<?php if ( has_post_thumbnail() || YakeenTheme::$options['display_no_preview_image'] == '1'  ) { ?>
				<div class="entry-thumbnail-area <?php echo esc_attr($preview); ?>">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( 'full' , ['class' => 'img-responsive'] ); ?>
					<?php } elseif ( empty( YakeenTheme::$options['no_preview_image']['id'] ) ) {
						$thumbnail = '<img class="wp-post-image" src="'.YAKEEN_IMG_URL.'noimage_1110X650.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
					}
					echo wp_kses( $thumbnail , 'alltext_allow' );?>
					<?php if ( YakeenTheme::$options['blog_date'] == 1 && has_post_thumbnail() ) { ?>	
						<div class="post-date style-1"><?php echo wp_kses($yakeen_time_html, 'alltext_allow'); ?></div>			
					<?php } ?>
				</div>
			<?php } ?>
		<?php } ?>
		<div class="post-content-box-layout">
			<div class="entry-header">	
				<?php if ( YakeenTheme::$options['post_cats'] ) { ?><span class="entry-categories style-1"><?php echo yakeen_single_category_prepare(); ?></span><?php } ?>
				<h1 class="entry-title"><?php the_title();?></h1>
				<?php if ( $yakeen_has_entry_meta ) { ?>
					<ul class="entry-meta">				
						<?php if ( YakeenTheme::$options['post_author_name'] ) { ?>
						<li class="item-author"><?php echo yakeen_meta_icon_admin(); ?><?php esc_html_e( 'by ', 'yakeen' );?><?php the_author_posts_link(); ?>
						</li>
						<?php } if ( YakeenTheme::$options['blog_date'] == 1 && !has_post_thumbnail() ) { ?>
						<li class="post-date"><?php echo yakeen_meta_icon_calendar(); ?><?php echo get_the_date(); ?></li>
						<?php } if ( YakeenTheme::$options['post_comment_num'] ) { ?>
						<li><i class="far fa-comments"></i><?php echo wp_kses( $yakeen_comments_html , 'alltext_allow' ); ?></li>
						<?php } if ( YakeenTheme::$options['post_length'] && function_exists( 'yakeen_reading_time' ) ) { ?>
						<li class="meta-reading-time meta-item"><?php echo yakeen_meta_icon_clock(); ?><?php echo yakeen_reading_time(); ?></li>
						<?php } if ( YakeenTheme::$options['post_view'] && function_exists( 'yakeen_views' ) ) { ?>
						<li><i class="fas fa-signal"></i><span class="meta-views meta-item "><?php echo yakeen_views(); ?></span></li>
						<?php } if ( YakeenTheme::$options['post_published'] && function_exists( 'yakeen_get_time' ) ) { ?>	
						<li><i class="fas fa-clock"></i><?php echo yakeen_get_time(); ?></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>

			<div class="entry-content"><?php the_content();?>
				<?php wp_link_pages( array(
					'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'yakeen' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) ); ?>
			</div>

			<?php if ( !empty($youtube_id) ) { ?>
				<?php if ( ( function_exists( 'get_post_format' ) && 'video' == get_post_format( $id ) )  ) { ?>
					<div class="entry-content entry-thumbnail-area embed-responsive-16by9">
						<div class="embed-responsive">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo esc_attr( $youtube_id ); ?>" allowfullscreen></iframe>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
			<?php if ( ( YakeenTheme::$options['post_tags'] && has_tag() ) || ( YakeenTheme::$options['post_share']  && ( function_exists( 'yakeen_post_share' ) ) ) ) { ?>
			<div class="entry-footer">
				<?php if ( YakeenTheme::$options['post_tags'] && has_tag() ) { ?>
				<div class="meta-tags">
					<h4 class="meta-title"><?php esc_html_e( 'Popular Tags:', 'yakeen' );?></h4><?php echo get_the_term_list( $post->ID, 'post_tag', '' ); ?>
				</div>	
				<?php } if ( ( YakeenTheme::$options['post_share'] ) && ( function_exists( 'yakeen_post_share' ) ) ) { ?>
				<div class="post-share"><h4 class="meta-title"><?php esc_html_e( 'Follow Me:', 'yakeen' );?></h4><?php yakeen_post_share(); ?></div>
				<?php } ?>
			</div>
			<?php } ?>
			<!-- author bio -->
			<?php if ( YakeenTheme::$options['post_author_bio'] == '1' ) { ?>
				<?php if ( !empty ( $yakeen_author_bio ) ) { ?>
				<div class="media about-author">
					<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
						<?php echo get_avatar( $author, 150 ); ?>
					</div>
					<div class="media-body">
						<div class="about-author-info">
							<h3 class="author-title"><?php the_author_posts_link();?></h3>
							<div class="author-designation"><?php if ( !empty ( $yakeen_author_designation ) ) {	echo esc_html( $yakeen_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
						</div>
						<?php if ( $yakeen_author_bio ) { ?>
						<div class="author-bio"><?php echo esc_html( $yakeen_author_bio );?></div>
						<?php } ?>
						<ul class="author-box-social">
							<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
							<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
							<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
							<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fab fa-pinterest"></i></a></li><?php } ?>
						</ul>
					</div>
				</div>
				<?php } ?>
			<?php } ?>
			<!-- next/prev post -->
			<?php if ( YakeenTheme::$options['post_links'] ) { yakeen_post_links_next_prev(); } ?>
			<?php
			if ( comments_open() || get_comments_number() ){
				comments_template();
			}
			?>
			
		</div>
	</div>
</div>