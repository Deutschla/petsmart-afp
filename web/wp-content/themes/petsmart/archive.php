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
	$yakeen_layout_class = YakeenTheme_Helper::has_active_widget();
}
$yakeen_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

if ( is_post_type_archive( "yakeen_team" ) || is_tax( "yakeen_team_category" ) ) {
		get_template_part( 'template-parts/archive', 'team' );
	return;
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( YakeenTheme::$layout == 'left-sidebar' ) { get_sidebar(); }
			?>
			<div class="<?php echo esc_attr( $yakeen_layout_class );?>">
				<main id="main" class="site-main">
					<div class="rt-sidebar-space">
					<?php
					if ( have_posts() ) { ?>
						<?php
							if ( $yakeen_is_post_archive && YakeenTheme::$options['blog_style'] == 'style1' ) {
								echo '<div class="row g-4">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							} else if ( $yakeen_is_post_archive && YakeenTheme::$options['blog_style'] == 'style2' ) {
								echo '<div class="row g-4">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-2', get_post_format() );
								endwhile;
								echo '</div>';
							} else if ( $yakeen_is_post_archive && YakeenTheme::$options['blog_style'] == 'style3' ) {
								echo '<div class="row g-4 rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-3', get_post_format() );
								endwhile;
								echo '</div>';
							} else if ( $yakeen_is_post_archive && YakeenTheme::$options['blog_style'] == 'style4' ) {
								echo '<div class="row g-4">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-4', get_post_format() );
								endwhile;
								echo '</div>';
							} else if ( $yakeen_is_post_archive && YakeenTheme::$options['blog_style'] == 'style5' ) {
								echo '<div class="row g-4">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-5', get_post_format() );
								endwhile;
								echo '</div>';
							} else if ( $yakeen_is_post_archive && YakeenTheme::$options['blog_style'] == 'style6' ) {
								echo '<div class="row g-4">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-6', get_post_format() );
								endwhile;
								echo '</div>';
							} else if ( $yakeen_is_post_archive && YakeenTheme::$options['blog_style'] == 'style7' ) {
								echo '<div class="row g-4">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-7', get_post_format() );
								endwhile;
								echo '</div>';
							} else if ( class_exists( 'Yakeen_Core' ) ) {
								if ( is_tax( 'yakeen_portfolio_category' ) ) {
									echo '<div class="row rt-masonry-grid">';
									while ( have_posts() ) : the_post();
										get_template_part( 'template-parts/content-1', get_post_format() );
									endwhile;
									echo '</div>';
								}							
							}
							else {
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
							}
						?>
						<?php } else {?>
							<?php get_template_part( 'template-parts/content', 'none' );?>
						<?php } ?>
						<?php YakeenTheme_Helper::pagination(); ?>
					</div>
				</main>
			</div>
			<?php
				if( YakeenTheme::$layout == 'right-sidebar' ){	get_sidebar(); }
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
