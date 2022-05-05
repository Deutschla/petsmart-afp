<?php
/**
 * Template Name: Post Layout 2
 * Template Post Type: post
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( YakeenTheme::$layout == 'full-width' ) {
	$yakeen_layout_class = 'col-12';
}
else{
	$yakeen_layout_class = YakeenTheme_Helper::has_active_widget();
}

if( YakeenTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}

$yakeen_has_entry_meta  = ( YakeenTheme::$options['post_date'] || YakeenTheme::$options['post_author_name'] || YakeenTheme::$options['post_comment_num'] || ( YakeenTheme::$options['post_length'] && function_exists( 'yakeen_reading_time' ) ) || YakeenTheme::$options['post_published'] && function_exists( 'yakeen_get_time' ) || ( YakeenTheme::$options['post_view'] && function_exists( 'yakeen_views' ) ) ) ? true : false;

$yakeen_comments_number = number_format_i18n( get_comments_number() );
$yakeen_comments_html = $yakeen_comments_number == 1 ? esc_html__( 'Comment' , 'yakeen' ) : esc_html__( 'Comments' , 'yakeen' );
$yakeen_comments_html = '<span class="comment-number">'. $yakeen_comments_number .'</span> ' . $yakeen_comments_html;

$thumbnail = false;

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
}

if( YakeenTheme::$options['display_no_preview_image'] == '1' ) {
	$preview = 'show-preview';
}else {
	$preview = 'no-preview';
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area <?php echo esc_attr($blend); ?>">
	<div class="post-detail-style2">
		<div id="contentHolder">
			<div class="entry-thumbnail-area <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( has_post_thumbnail() || YakeenTheme::$options['display_no_preview_image'] == '1'  ) { ?>
					<?php if ( YakeenTheme::$options['post_featured_image'] == true ) { ?>						
						<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail( 'full' , ['class' => 'img-responsive'] ); ?>
						<?php } elseif ( empty( YakeenTheme::$options['no_preview_image']['id'] ) ) {
						$thumbnail = '<img class="wp-post-image" src="'.YAKEEN_IMG_URL.'noimage_1110X650.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
					}
					echo wp_kses( $thumbnail , 'alltext_allow' );?>
					<?php } ?>
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="rt-video"><a class="rt-play play-btn-lg btn-position-center rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>
				<?php } ?>
				<div class="meta-fixed container">	
					<div class="entry-header-bg">	
						<div class="entry-header">
							<?php if ( YakeenTheme::$options['post_cats'] ) { ?><span class="entry-categories style-1"><?php echo yakeen_single_category_prepare(); ?></span><?php } ?>
							<h1 class="entry-title"><?php the_title();?></h1>
							<?php if ( $yakeen_has_entry_meta ) { ?>
							<ul class="entry-meta">				
								<?php if ( YakeenTheme::$options['post_author_name'] ) { ?>
								<li class="item-author"><?php echo yakeen_meta_icon_admin(); ?><?php esc_html_e( 'by ', 'yakeen' );?><?php the_author_posts_link(); ?>
								</li>
								<?php } if ( YakeenTheme::$options['post_date'] ) { ?>	
								<li><?php echo yakeen_meta_icon_calendar(); ?><?php echo get_the_date(); ?></li>	
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
					</div>
				</div>
			</div>

			<div class="container content-top-space">
				<div class="row">				
					<?php if ( YakeenTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
						<div class="<?php echo esc_attr( $yakeen_layout_class );?>">
							<main id="main" class="site-main"> 
								<div class="rt-sidebar-space">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'template-parts/content-single-2', get_post_format() );?>
								<?php endwhile; ?> 
								</div> 
							</main>
						</div>
					<?php if ( YakeenTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
				</div>
			</div>
		</div>	
		<?php if( YakeenTheme::$options['show_related_post'] == '1' && is_single() && !empty ( yakeen_related_post() ) ) { ?>
			<div class="related-post">
				<?php yakeen_related_post(); ?>
			</div>
		<?php } ?>		
	</div>
</div>
<?php get_footer(); ?>