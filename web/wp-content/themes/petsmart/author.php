<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( YakeenTheme::$layout == 'full-width' ) {
	$yakeen_layout_class = 'col-12';
}
else{
	$yakeen_layout_class = 'col-xl-9 col-lg-8';
}
$yakeen_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

$yakeen_author_bio      = get_the_author_meta( 'description' );
$subtitle = get_post_meta( get_the_ID(), 'yakeen_subtitle', true );
$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'yakeen_facebook', true );
$news_author_tw = get_user_meta( $author, 'yakeen_twitter', true );
$news_author_ld = get_user_meta( $author, 'yakeen_linkedin', true );
$news_author_pr = get_user_meta( $author, 'yakeen_pinterest', true );
$yakeen_author_designation = get_user_meta( $author, 'yakeen_author_designation', true );

if( !empty( YakeenTheme::$options['author_bg_image'] ) ) {
	$author_bg = wp_get_attachment_image_src( YakeenTheme::$options['author_bg_image'], 'full', true );
	$author_bg_img = $author_bg[0];
}else {
	$author_bg_img = YAKEEN_IMG_URL . 'author_bg.jpg';
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<!-- author bio -->
	<?php if ( YakeenTheme::$options['post_author_bio'] == '1' ) { ?>
	<div class="author-banner" style="background-image:url(<?php echo esc_html( $author_bg_img ); ?>)">
		<div class="container">			
			<?php if ( !empty ( $yakeen_author_bio ) ) { ?>
			<div class="admin-author">
				<div class="author-img">
					<?php echo get_avatar( $author, 150 ); ?>
				</div>
				<div class="author-content">
					<div class="about-author-info">
						<h3 class="author-title"><?php the_author_posts_link();?></h3>
						<div class="author-designation"><?php if ( !empty ( $yakeen_author_designation ) ) {	echo esc_html( $yakeen_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
					</div>
					<?php if ( $yakeen_author_bio ) { ?>
					<div class="author-bio"><?php echo esc_html( $yakeen_author_bio );?></div>
					<?php } ?>					
				</div>			
				<ul class="author-box-social">
					<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_url( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_url( $news_author_tw ); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_url( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_url( $news_author_pr ); ?>"><i class="fab fa-pinterest"></i></a></li><?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>	
	</div>		
	<?php } ?>

	<div class="container">
		<div class="row">
			<?php if ( YakeenTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<div class="<?php echo esc_attr( $yakeen_layout_class );?>">
				<main id="main" class="site-main">
					<div class="rt-sidebar-space">				
						<?php if ( have_posts() ) : ?>
							<?php
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-author', get_post_format() );
								endwhile;
							?>
							<?php YakeenTheme_Helper::pagination();?>
						<?php else: ?>
							<?php get_template_part( 'template-parts/content', 'none' );?>
						<?php endif;?>
					</div>	
				</main>					
			</div>
			<?php
			if ( YakeenTheme::$layout == 'right-sidebar' ) { get_sidebar(); }
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>