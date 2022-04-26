<?php
/**
 * Template Name: Archive style 2
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

$args = array(
	'post_type' => "post",
);

if ( get_query_var('paged') ) {
	$args['paged'] = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$args['paged'] = get_query_var('page');
}
else {
	$args['paged'] = 1;
}

$query = new WP_Query( $args );

global $wp_query;
$wp_query = NULL;
$wp_query = $query;
 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( YakeenTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<div class="<?php echo esc_attr( $yakeen_layout_class );?>">
				<main id="main" class="site-main">
					<div class="rt-sidebar-space">
					<?php if ( have_posts() ) :?>
						<?php
							echo '<div class="row">';
							while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						?>
						<?php YakeenTheme_Helper::pagination();?>
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
					</div>
				</main>
			</div>
			<?php if ( YakeenTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
</div>
<?php get_footer(); ?>