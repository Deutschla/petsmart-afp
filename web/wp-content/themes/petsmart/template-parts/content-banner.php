<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( is_404() ) {
	$yakeen_title = "Error Page";
} elseif ( is_search() ) {
	$yakeen_title = esc_html__( 'Search Results for : ', 'yakeen' ) . get_search_query();
} elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$yakeen_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$yakeen_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'yakeen' ) );
	}
} elseif ( is_archive() ) {
	$yakeen_title = get_the_archive_title();
} elseif ( is_page() ) {
	$yakeen_title = get_the_title();
} else {
	$yakeen_title = get_the_title();	                   
}

?>

<?php if ( YakeenTheme::$has_banner == 1 || YakeenTheme::$has_banner == 'on' ) { ?>
	<div class="entry-banner">
		<div class="container">
			<div class="entry-banner-content">
				<?php if ( !is_single() ) { ?>
					<?php if (is_page()) { ?>
						<h1 class="entry-title"><?php echo wp_kses($yakeen_title, 'alltext_allow');?></h1>
					<?php } else { ?>
						<h1 class="entry-title"><?php echo wp_kses($yakeen_title, 'alltext_allow');?></h1>
					<?php } ?>
				<?php } ?>
				<?php if ( YakeenTheme::$has_breadcrumb == 1 ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>