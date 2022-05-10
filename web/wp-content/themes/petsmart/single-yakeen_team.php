<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
// Layout class
if ( YakeenTheme::$layout == 'full-width' ) {
	$yakeen_layout_class = 'col-sm-12 col-12';
}
else{
	$yakeen_layout_class = YakeenTheme_Helper::has_active_widget();
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( YakeenTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
				<div class="<?php echo esc_attr( $yakeen_layout_class );?>">
					<main id="main" class="site-main">
						<?php							
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', 'team' );
							endwhile;						
						?>
					</main>
				</div>
			<?php if ( YakeenTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
	<?php if( YakeenTheme::$options['show_related_team'] == '1' && is_single() && !empty ( yakeen_related_team() ) ) { ?>
		<div class="related-post">
			<?php echo yakeen_related_team(); ?>
		</div>
	<?php } ?>
</div>
<?php get_footer(); ?>