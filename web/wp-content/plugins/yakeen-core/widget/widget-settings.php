<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'yakeen_widgets_init' );
function yakeen_widgets_init() {
	// Register Custom Widgets
	register_widget( 'YakeenTheme_About_Widget' );
	register_widget( 'YakeenTheme_Address_Widget' );
	register_widget( 'YakeenTheme_Social_Widget' );
	register_widget( 'YakeenTheme_Post_Box' );
	register_widget( 'YakeenTheme_Post_Tab' );
	register_widget( 'YakeenTheme_Feature_Post' );
	register_widget( 'YakeenTheme_Category_Widget' );
	
}