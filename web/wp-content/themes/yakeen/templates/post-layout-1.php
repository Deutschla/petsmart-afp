<?php
/**
 * Template Name: Post Layout 1
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
?>
<?php get_header(); ?>

<div id="primary" class="content-area <?php echo esc_attr($blend); ?>">
	<div id="contentHolder">
		<div class="container">
			<div class="row">
				<?php if ( YakeenTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
					<div class="<?php echo esc_attr( $yakeen_layout_class );?>">
						<main id="main" class="site-main">
							<div class="rt-sidebar-space">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single', get_post_format() );?>						
							<?php endwhile; ?>
							</div>
						</main>
					</div>
				<?php if ( YakeenTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
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