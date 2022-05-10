<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$primary_color     = YakeenTheme::$options['primary_color']; // #f07654
$primary_rgb       = YakeenTheme_Helper::hex2rgb( $primary_color ); // 240, 118, 84
$secondary_color   = YakeenTheme::$options['secondary_color']; // #ffefec
$secondary_rgb     = YakeenTheme_Helper::hex2rgb( $secondary_color ); // 255, 239, 236

/*---------------------------------    
INDEX
===================================
#. EL: Section Title
#. EL: Slider
#. EL: Text/image With Button
#. EL: Post addon
#. EL: Team Layout 
#. EL: Fluent form
----------------------------------*/

/*-----------------------
#. EL: Section Title
------------------------*/
?>
.rt-section-title .entry-title-wrap .title-icon path.main-shape {
	fill: <?php echo esc_html($primary_color); ?>;
}
.rt-section-title .sub-title span {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-title-text-button .title-icon svg path.main-shape {
	fill: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. EL: Slider
------------------------*/
?>
.rt-swiper-nav-3.swiper-navigation>div:hover,
.rt-swiper-nav-1.swiper-navigation>div:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Text/image With Button
-------------------------------*/
?>
.rt-image-default.rt-image-style1 {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Post addon
--------------------------------*/
?>
.rt-category-style4 .rt-item .rt-content .rt-cat-name .rt-cat-link,
.rt-text-light.rt-item ul.entry-meta li a:hover,
.rt-text-light.rt-item .entry-content .entry-title a:hover,
.rt-item .entry-content .entry-title a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-category-style5 .rt-item .rt-cat-img .rt-cat-icon path,
ul.entry-meta li svg path {
	stroke: <?php echo esc_html($primary_color); ?>;
}
.title-animation-underline a {
	background-image: linear-gradient(to bottom, <?php echo esc_html($primary_color); ?> 0%, <?php echo esc_html($primary_color); ?> 98%);
}
.rt-category-style5 .rt-item .rt-content .rt-cat-name .rt-cat-link:before,
.rt-category-style4 .rt-item .rt-content .rt-cat-name:hover .rt-cat-link,
.rt-category-style4 .rt-item .rt-content .rt-cat-count {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Team Layout
--------------------------------*/
?>
.rt-skills .rt-skill-each .progress .progress-bar {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-skills .rt-skill-each .progress .progress-bar>span::after {
	box-shadow: 0 9px 10px 0 rgba(<?php echo esc_html( $primary_rgb );?>, 0.4);
	background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.9);
}
<?php
/*------------------------------
#. EL: Fluent form
--------------------------------*/
?>
.fluentform .contact-form .ff_btn_style:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	border-color: <?php echo esc_html( $primary_color ); ?>;
}