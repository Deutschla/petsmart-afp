<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'yakeen-size1';

$yakeen_has_entry_meta  = ( YakeenTheme::$options['blog_date'] || YakeenTheme::$options['blog_author_name'] || YakeenTheme::$options['blog_comment_num'] || YakeenTheme::$options['blog_length'] && function_exists( 'yakeen_reading_time' ) || YakeenTheme::$options['blog_view'] && function_exists( 'yakeen_views' ) ) ? true : false;

$yakeen_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$yakeen_time_html       = apply_filters( 'yakeen_single_time', $yakeen_time_html );

$yakeen_comments_number = number_format_i18n( get_comments_number() );
$yakeen_comments_html = $yakeen_comments_number == 1 ? esc_html__( 'Comment: ' , 'yakeen' ) : esc_html__( 'Comments: ' , 'yakeen' );
$yakeen_comments_html = $yakeen_comments_html . '<span class="comment-number">'. $yakeen_comments_number .'</span> ';

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), YakeenTheme::$options['search_excerpt_length'], '' );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no_image';
}else {
	$img_class ='show_image';
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-2' ); ?>>
	<div class="blog-box <?php echo esc_attr($img_class); ?>">		
		<div class="entry-content">
			<?php if ( YakeenTheme::$options['blog_cats'] ) { ?>
				<span class="entry-categories style-1"><?php echo yakeen_category_prepare(); ?></span>
			<?php } ?>
			<h2 class="entry-title title-animation-underline size-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<ul class="entry-meta">
				<?php if ( YakeenTheme::$options['blog_author_name'] ) { ?>
				<li class="post-author"><?php esc_html_e( 'by ', 'yakeen' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( YakeenTheme::$options['blog_date'] ) { ?>	
				<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
				<?php } if ( YakeenTheme::$options['blog_comment_num'] ) { ?>
				<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $yakeen_comments_html , 'alltext_allow' );?></a></li>
				<?php } if ( YakeenTheme::$options['blog_length'] && function_exists( 'yakeen_reading_time' ) ) { ?>
				<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo yakeen_reading_time(); ?></li>
				<?php } if ( YakeenTheme::$options['blog_view'] && function_exists( 'yakeen_views' ) ) { ?>
				<li><span class="post-views"><i class="fas fa-signal"></i><?php echo yakeen_views(); ?></span></li>
				<?php } ?>
			</ul>
			<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
		</div>
	</div>
</div>