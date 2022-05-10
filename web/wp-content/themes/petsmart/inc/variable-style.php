<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/*-------------------------------------
INDEX
=======================================
#. Container
#. Typography
#. Top Bar
#. Header
#. Sidenav
#. Banner
#. Footer
#. Widgets
#. Error 404
#. comment
#. Buttons
#. Single Content
#. Archive Contents
#. Miscellaneous
#. woocommerce
#. Dark mode
-------------------------------------*/

$primary_color         = YakeenTheme::$options['primary_color'];
$primary_rgb           = YakeenTheme_Helper::hex2rgb( $primary_color );
$secondary_color       = YakeenTheme::$options['secondary_color'];
$secondary_rgb         = YakeenTheme_Helper::hex2rgb( $secondary_color ); 

$container_width	   = YakeenTheme::$options['container_width'];
$logo_width	   		   = YakeenTheme::$options['logo_width']; 
$mobile_logo_width	   = YakeenTheme::$options['mobile_logo_width'];

$menu_color            = YakeenTheme::$options['menu_color'];
$menu_color_tr         = YakeenTheme::$options['menu_color_tr'];
$menu_hover_color      = YakeenTheme::$options['menu_hover_color'];
$submenu_color         = YakeenTheme::$options['submenu_color'];
$submenu_hover_color   = YakeenTheme::$options['submenu_hover_color'];

$yakeen_typo_body     = YakeenTheme::$options['typo_body'];
$yakeen_typo_h1       = YakeenTheme::$options['typo_h1'];
$yakeen_typo_h2       = YakeenTheme::$options['typo_h2'];
$yakeen_typo_h3       = YakeenTheme::$options['typo_h3'];
$yakeen_typo_h4       = YakeenTheme::$options['typo_h4'];
$yakeen_typo_h5       = YakeenTheme::$options['typo_h5'];
$yakeen_typo_h6       = YakeenTheme::$options['typo_h6'];


/* = Body Typo Area
=======================================================*/
$typo_body = json_decode( YakeenTheme::$options['typo_body'], true );
if ($typo_body['font'] == 'Inherit') {
	$typo_body['font'] = 'Jost';
} else {
	$typo_body['font'] = $typo_body['font'];
}

/* = Menu Typo Area
=======================================================*/
$typo_menu = json_decode( YakeenTheme::$options['typo_menu'], true );
if ($typo_menu['font'] == 'Inherit') {
	$typo_menu['font'] = 'Source Serif Pro';
} else {
	$typo_menu['font'] = $typo_menu['font'];
}

$typo_sub_menu = json_decode( YakeenTheme::$options['typo_sub_menu'], true );
if ($typo_sub_menu['font'] == 'Inherit') {
	$typo_sub_menu['font'] = 'Source Serif Pro';
} else {
	$typo_sub_menu['font'] = $typo_sub_menu['font'];
}

/* = Heading Typo Area
=======================================================*/
$typo_heading = json_decode( YakeenTheme::$options['typo_heading'], true );
if ($typo_heading['font'] == 'Inherit') {
	$typo_heading['font'] = 'Source Serif Pro';
} else {
	$typo_heading['font'] = $typo_heading['font'];
}
$typo_h1 = json_decode( YakeenTheme::$options['typo_h1'], true );
if ($typo_h1['font'] == 'Inherit') {
	$typo_h1['font'] = 'Source Serif Pro';
} else {
	$typo_h1['font'] = $typo_h1['font'];
}
$typo_h2 = json_decode( YakeenTheme::$options['typo_h2'], true );
if ($typo_h2['font'] == 'Inherit') {
	$typo_h2['font'] = 'Source Serif Pro';
} else {
	$typo_h2['font'] = $typo_h2['font'];
}
$typo_h3 = json_decode( YakeenTheme::$options['typo_h3'], true );
if ($typo_h3['font'] == 'Inherit') {
	$typo_h3['font'] = 'Source Serif Pro';
} else {
	$typo_h3['font'] = $typo_h3['font'];
}
$typo_h4 = json_decode( YakeenTheme::$options['typo_h4'], true );
if ($typo_h4['font'] == 'Inherit') {
	$typo_h4['font'] = 'Source Serif Pro';
} else {
	$typo_h4['font'] = $typo_h4['font'];
}
$typo_h5 = json_decode( YakeenTheme::$options['typo_h5'], true );
if ($typo_h5['font'] == 'Inherit') {
	$typo_h5['font'] = 'Source Serif Pro';
} else {
	$typo_h5['font'] = $typo_h5['font'];
}
$typo_h6 = json_decode( YakeenTheme::$options['typo_h6'], true );
if ($typo_h6['font'] == 'Inherit') {
	$typo_h6['font'] = 'Source Serif Pro';
} else {
	$typo_h6['font'] = $typo_h6['font'];
}

?>
<?php
/*-------------------------------------
#. Container
---------------------------------------*/
?>
@media ( min-width:1200px ) {
	.container {
		max-width: <?php echo esc_html( $container_width ); ?>px;
	}
}

<?php if( $logo_width ) { ?>
.site-header .site-branding a img  {
	max-width: <?php echo esc_html( $logo_width ); ?>px;
}
<?php } ?>
<?php if( $mobile_logo_width ) { ?>
.mean-container .mean-bar img  {
	max-width: <?php echo esc_html( $mobile_logo_width ); ?>px;
}
<?php } ?>


a {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.primary-color {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.secondary-color {
	color: <?php echo esc_html( $secondary_color ); ?>;
}
#preloader {
	background-color: <?php echo esc_html( YakeenTheme::$options['preloader_bg_color'] ); ?>;
}
.loader .cssload-inner.cssload-one,
.loader .cssload-inner.cssload-two,
.loader .cssload-inner.cssload-three {
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.scroll-wrap:after {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.scroll-wrap svg.scroll-circle path {
    stroke: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Typography
---------------------------------------*/
?>
body {
	color: <?php echo esc_html( YakeenTheme::$options['body_color'] ); ?>;
	font-family: '<?php echo esc_html( $typo_body['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_body_size'] ) ?>;
	line-height: <?php echo esc_html( YakeenTheme::$options['typo_body_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_body['regularweight'] ) ?>;
	font-style: normal;
}
h1,h2,h3,h4,h5,h6 {
	font-family: '<?php echo esc_html( $typo_heading['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_heading['regularweight'] ); ?>;
}

<?php if (!empty($typo_h1['font'])){ ?>
h1 {
	font-family: '<?php echo esc_html( $typo_h1['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h1['regularweight'] ); ?>;
}
<?php } ?>
h1 {
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_h1_size'] ); ?>;
	line-height: <?php echo esc_html(  YakeenTheme::$options['typo_h1_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h2['font'])) { ?>
h2 {
	font-family: '<?php echo esc_html( $typo_h2['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h2['regularweight'] ); ?>;
}
<?php } ?>
h2 {
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_h2_size'] ); ?>;
	line-height: <?php echo esc_html( YakeenTheme::$options['typo_h2_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h3['font'])) { ?>
h3 {
	font-family: '<?php echo esc_html( $typo_h3['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h3['regularweight'] ); ?>;
}
<?php } ?>
h3 {
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_h3_size'] ); ?>;
	line-height: <?php echo esc_html(  YakeenTheme::$options['typo_h3_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h4['font'])) { ?>
h4 {
	font-family: '<?php echo esc_html( $typo_h4['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h4['regularweight'] ); ?>;
}
<?php } ?>
h4 {
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_h4_size'] ); ?>;
	line-height: <?php echo esc_html(  YakeenTheme::$options['typo_h4_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h5['font'])) { ?>
h5 {
	font-family: '<?php echo esc_html( $typo_h5['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h5['regularweight'] ); ?>;
}
<?php } ?>
h5 {
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_h5_size'] ); ?>;
	line-height: <?php echo esc_html(  YakeenTheme::$options['typo_h5_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h6['font'])) { ?>
h6 {
	font-family: '<?php echo esc_html( $typo_h6['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h6['regularweight'] ); ?>;
}
<?php } ?>
h6 {
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_h6_size'] ); ?>;
	line-height: <?php echo esc_html(  YakeenTheme::$options['typo_h6_height'] ); ?>;
	font-style: normal;
}

<?php
/*-------------------------------------
#. Top Bar
---------------------------------------*/
?>
.topbar-style-1 .header-top-bar a {
	color: <?php echo esc_html( YakeenTheme::$options['top_bar_link_color'] ); ?>;
}
.topbar-style-1 .header-top-bar a:hover {
	color: <?php echo esc_html( YakeenTheme::$options['top_bar_link_hover_color'] ); ?>;
}
.topbar-style-1 .header-top-bar .plain-text svg path {
	stroke: <?php echo esc_html( YakeenTheme::$options['top_bar_color'] ); ?>;
}
.topbar-style-1 .header-top-bar {
	background-color: <?php echo esc_html( YakeenTheme::$options['top_bar_bgcolor'] ); ?>;
	color: <?php echo esc_html( YakeenTheme::$options['top_bar_color'] ); ?>;
}
.topbar-style-2 .header-top-bar {
	background-color: <?php echo esc_html( YakeenTheme::$options['top_bar_bgcolor_2'] ); ?>;
	color: <?php echo esc_html( YakeenTheme::$options['top_bar_color_2'] ); ?>;
}
.topbar-style-2 .header-top-bar a {
	color: <?php echo esc_html( YakeenTheme::$options['top_bar_color_2'] ); ?>;
}
.topbar-style-2 .header-top-bar a:hover {
	color: <?php echo esc_html( YakeenTheme::$options['top_bar_link_hover_color_2'] ); ?>;
}
.topbar-style-2 .header-top-bar i {
	color: <?php echo esc_html( YakeenTheme::$options['top_baricon_color_2'] ); ?>;
}
.header-icon-area .social-item li a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.header-icon-area .additional-menu-area {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.search-icon a svg path {
	stroke: <?php echo esc_html( YakeenTheme::$options['search_icon_color'] ); ?>;
}
.search-icon a:hover svg path {
	stroke: <?php echo esc_html( YakeenTheme::$options['search_icon_hover_color'] ); ?>;
}

<?php
/*-------------------------------------
#. Header
---------------------------------------*/
?>
<?php // Main Menu ?>
.site-header .main-navigation nav ul li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_menu_size'] ) ?>;
	line-height: <?php echo esc_html( YakeenTheme::$options['typo_menu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	color: <?php echo esc_html( $menu_color ); ?>;
	font-style: normal;
}
.site-header .main-navigation ul li ul li a {
	font-family: '<?php echo esc_html( $typo_sub_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( YakeenTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_sub_menu['regularweight'] ) ?>;
	color: <?php echo esc_html( $submenu_color ); ?>;
	font-style: normal;
}
.mean-container .mean-nav ul li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( YakeenTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( YakeenTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	font-style: normal;
}

.site-header .main-navigation ul.menu > li > a:hover {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.site-header .main-navigation ul.menu li.current-menu-item > a,
.site-header .main-navigation ul.menu > li.current > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.site-header .main-navigation ul.menu li.current-menu-ancestor > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}

.site-header .main-navigation nav ul li a.active {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.site-header .main-navigation nav > ul > li > a::before {
	background-color: <?php echo esc_html( $menu_hover_color ); ?>;
}

.header-style-1 .site-header .main-navigation ul.menu > li.current > a:hover,
.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a:hover,
.header-style-1 .site-header .main-navigation  ul li a.active,
.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a,
.header-style-1 .site-header .main-navigation ul.menu > li.current > a  {
	color: <?php echo esc_html( $menu_hover_color );?>;
}

.additional-menu-area .sidenav-social span a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.additional-menu-area .sidenav ul li a:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}-->
.rt-slide-nav .offscreen-navigation li>a {
	color: <?php echo esc_html( $menu_color ); ?>;
}

.rt-slide-nav .offscreen-navigation ul>li>a:hover,
.rt-slide-nav .offscreen-navigation li.current-menu-item > a, 
.rt-slide-nav .offscreen-navigation li.current-menu-parent > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}

.rt-slide-nav .offscreen-navigation ul li > a:hover:before {
	background-color: <?php echo esc_html( $menu_hover_color ); ?>;
} 

.mobile-top-bar .header-top .icon-left,
.mobile-top-bar .header-top .info-text a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.header-social li a:hover i {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php // Submenu ?>
.site-header .main-navigation ul.menu li ul.sub-menu li a:hover {
	color: <?php echo esc_html( $submenu_hover_color );?>;
}
.site-header .main-navigation ul li.mega-menu ul.sub-menu li a:hover {
	color: <?php echo esc_html( $submenu_hover_color ); ?>;
}
.site-header .main-navigation ul li ul.sub-menu li:hover > a:before {
	background-color: <?php echo esc_html( $submenu_hover_color ); ?>;
}
.site-header .main-navigation ul li ul.sub-menu li.menu-item-has-children:hover:before {
	color: <?php echo esc_html( $submenu_hover_color ); ?>;
}

<?php // Multi Column Menu ?>
.site-header .main-navigation ul li.mega-menu ul.sub-menu li a {
	color: <?php echo esc_html( $submenu_color ); ?>
}
.site-header .main-navigation ul li.mega-menu > ul.sub-menu li:before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.site-header .main-navigation ul li ul.sub-menu li.menu-item-has-children:before {
	color: <?php echo esc_html( $submenu_color ); ?>;
}
<?php // Mean Menu ?>
.mean-container a.meanmenu-reveal,
.mean-container .mean-nav ul li a.mean-expand {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container a.meanmenu-reveal span {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container .mean-nav ul li a:hover,
.mean-container .mean-nav > ul > li.current-menu-item > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.mean-container .mean-nav ul li.current_page_item > a,
.mean-container .mean-nav ul li.current-menu-item > a,
.mean-container .mean-nav ul li.current-menu-parent > a {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header icons ?>
.cart-icon-area .cart-icon-num {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.site-header .search-box .search-text {
	border-color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header Layout 1 ?>
.header-style-1 .site-header .header-top .icon-left,
.header-style-1 .site-header .header-top .info-text a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header Layout 2 ?>
.header-style-2 .header-icon-area .header-search-box a:hover i {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php // Header Layout 3 ?>
.header-style-3 .site-header .info-wrap .info i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
<?php // Header Layout 4 ?>

<?php // Header option ?>
.header-icon-area .cart-icon-area > a:hover,
.header-icon-area .search-icon a:hover,
.header-icon-area .user-icon-area a:hover,
.menu-user .user-icon-area a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.header__switch,
.additional-menu-area .sidenav .closebtn {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.mobile-top-bar .header-top .icon-left,
.mobile-top-bar .header-top .info-text a:hover,
.additional-menu-area .sidenav-address span a:hover,
.additional-menu-area .sidenav-address span i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.header__switch__main {
    background: <?php echo esc_html( $secondary_color );?>;
}

<?php
/*-------------------------------------
#. Sidenav
---------------------------------------*/
?>
.additional-menu-area .sidenav {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Banner
---------------------------------------*/
?>
.breadcrumb-area .entry-breadcrumb span a,
.breadcrumb-trail ul.trail-items li a {
	color: <?php echo esc_html( YakeenTheme::$options['breadcrumb_link_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb span a:hover,
.breadcrumb-trail ul.trail-items li a:hover {
	color: <?php echo esc_html( YakeenTheme::$options['breadcrumb_link_hover_color'] );?>;
}
.breadcrumb-trail ul.trail-items li,
.entry-banner .entry-breadcrumb .delimiter,
.entry-banner .entry-breadcrumb .dvdr {
	color: <?php echo esc_html( YakeenTheme::$options['breadcrumb_seperator_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb .current-item {
	color: <?php echo esc_html( YakeenTheme::$options['breadcrumb_active_color'] );?>;
}
.entry-banner:after {
    background: rgba(247, 247, 247, <?php echo esc_html( YakeenTheme::$options['banner_bg_opacity'] ); ?>);
}
.entry-banner .entry-banner-content {
	padding-top: <?php  echo esc_html( YakeenTheme::$options['banner_top_padding'] ); ?>px;
	padding-bottom: <?php  echo esc_html( YakeenTheme::$options['banner_bottom_padding'] ); ?>px;
}
.breadcrumb-area .entry-breadcrumb span a:hover,
.breadcrumb-area .entry-breadcrumb .current-item {
	color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Footer
---------------------------------------*/
?>
.footer-area .widgettitle {
	color: <?php echo esc_html( YakeenTheme::$options['footer_title_color'] ); ?>;
}
.footer-style-1 .footer-area {
	background-color: <?php echo esc_html( YakeenTheme::$options['fbgcolor'] ); ?>;
	color: <?php echo esc_html( YakeenTheme::$options['footer_color'] ); ?>;
}
.footer-style-4 .footer-area {
	background-color: <?php echo esc_html( YakeenTheme::$options['fbgcolor4'] ); ?>;
}
.footer-top-area .widget a,
.footer-top-area .widget_archive li a:before,
.footer-top-area ul li.recentcomments a:before,
.footer-top-area ul li.recentcomments span a:before,
.footer-top-area .widget_categories li a:before,
.footer-top-area .widget_pages li a:before,
.footer-top-area .widget_meta li a:before,
.footer-top-area .widget_recent_entries ul li a:before,
.footer-top-area .footer-social li a {
	color: <?php echo esc_html( YakeenTheme::$options['footer_link_color'] ); ?>;
}
.footer-top-area .widget a:hover,
.footer-top-area .widget a:active,
.footer-top-area .widget_archive li a:hover:before,
.footer-top-area .widget_categories li a:hover:before,
.footer-top-area .widget_pages li a:hover:before,
.footer-top-area .widget_meta li a:hover:before,
.footer-top-area .widget_recent_entries ul li a:hover:before {
	color: <?php echo esc_html( YakeenTheme::$options['footer_link_hover_color'] ); ?>;
}
.footer-top-area .widget_tag_cloud a,
.footer-top-area .rt-category-style2 .rt-item a {
	color: <?php echo esc_html( YakeenTheme::$options['footer_link_color'] ); ?>;
}
.footer-top-area .widget_tag_cloud a:hover,
.footer-top-area .rt-category-style2 .rt-item a:before {
	color: <?php echo esc_html( YakeenTheme::$options['footer_link_hover_color'] ); ?>;
}

.footer-top-area .rt-category-style2 .rt-item a:hover:before,
.footer-top-area .rt-category-style2 .rt-item a:hover {
	color: <?php echo esc_html( YakeenTheme::$options['footer_link_hover_color'] ); ?>;
}
.footer-top-area .post-box-style .post-box-cat a, 
.footer-top-area .post-box-style .post-box-date {
	color: <?php echo esc_html( YakeenTheme::$options['footer_color'] ); ?>;
}
.footer-area .footer-social li a:hover {
	background: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .rt-category .rt-item a:hover .rt-cat-name::before {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-box-title-1 span {
	border-top-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-area .copyright {
	color: <?php echo esc_html( YakeenTheme::$options['copyright_text_color'] ); ?>;
}
.footer-area .copyright a {
	color: <?php echo esc_html( YakeenTheme::$options['copyright_link_color'] ); ?>;
}
.footer-area .copyright a:hover {
	color: <?php echo esc_html( YakeenTheme::$options['copyright_hover_color'] ); ?>;
}

.footer-style-2 .footer-area .widgettitle {
	color: <?php echo esc_html( YakeenTheme::$options['footer2_title_color'] ); ?>;
}
.footer-style-2 .footer-top-area {
	background-color: <?php echo esc_html( YakeenTheme::$options['fbgcolor2'] ); ?>;
	color: <?php echo esc_html( YakeenTheme::$options['footer2_color'] ); ?>;
}
.footer-style-2 .footer-area .copyright {
	color: <?php echo esc_html( YakeenTheme::$options['footer2_color'] ); ?>;
}
.footer-style-2 .footer-top-area a,  
.footer-style-2 .footer-area .copyright a,
.footer-style-2 .footer-top-area .widget ul.menu li a,
.footer-style-2 .footer-top-area .footer-social li a {
	color: <?php echo esc_html( YakeenTheme::$options['footer2_link_color'] ); ?>;
}
.footer-style-2 .footer-top-area a:hover,
.footer-style-2 .footer-area .copyright a:hover,
.footer-style-2 .footer-top-area .widget ul.menu li a:hover,
.footer-style-2 .footer-area .copyright a:hover,
.footer-style-2 .footer-top-area .footer-social li a:hover,
.footer-style-2 .footer-top-area ul li a:hover i {
	color: <?php echo esc_html( YakeenTheme::$options['footer2_hover_color'] ); ?>;
}

.footer-style-3 .footer-area .widgettitle {
    color: <?php echo esc_html( YakeenTheme::$options['footer3_title_color'] ); ?>;
}
.footer-style-3 .footer-top-area {
	background-color: <?php echo esc_html( YakeenTheme::$options['fbgcolor3'] ); ?>;
	color: <?php echo esc_html( YakeenTheme::$options['footer3_color'] ); ?>;
}
.footer-style-3 .footer-area .copyright {
	color: <?php echo esc_html( YakeenTheme::$options['footer3_color'] ); ?>;
}
.footer-style-3 .footer-area .copyright a:hover {
    color: <?php echo esc_html( YakeenTheme::$options['footer3_hover_color'] ); ?>;
}
.footer-style-3 .footer-area .copyright {
	color: <?php echo esc_html( YakeenTheme::$options['footer3_color'] ); ?>;
}
.footer-style-3 .footer-top-area a,
.footer-style-3 .footer-area .copyright a,
.footer-style-3 .footer-top-area .widget ul.menu li a,
.footer-style-3 .footer-top-area .footer-social li a {
	color: <?php echo esc_html( YakeenTheme::$options['footer3_link_color'] ); ?>;
}
.footer-style-3 .footer-top-area a:hover,
.footer-style-3 .footer-area .copyright a:hover,
.footer-style-3 .footer-top-area .widget ul.menu li a:hover,
.footer-style-3 .footer-top-area .footer-social li a:hover,
.footer-style-3 .footer-top-area ul li a:hover i {
	color: <?php echo esc_html( YakeenTheme::$options['footer3_hover_color'] ); ?>;
}
.footer-style-3 .footer-top-area .widget ul.menu li a:after {
    background-color: <?php echo esc_html( YakeenTheme::$options['footer3_hover_color'] ); ?>;
}

.footer-style-4 .footer-area .widgettitle {
	color: <?php echo esc_html( YakeenTheme::$options['footer4_title_color'] ); ?>;
}
.footer-style-4 .footer-top-area {
	background-color: <?php echo esc_html( YakeenTheme::$options['fbgcolor4'] ); ?>;
	color: <?php echo esc_html( YakeenTheme::$options['footer4_color'] ); ?>;
}
.footer-style-4 .footer-area .copyright {
	color: <?php echo esc_html( YakeenTheme::$options['footer4_color'] ); ?>;
}
.footer-style-4 .footer-top-area a,  
.footer-style-4 .footer-area .copyright a,
.footer-style-4 .footer-top-area .widget ul.menu li a,
.footer-style-4 .footer-top-area .footer-social li a {
	color: <?php echo esc_html( YakeenTheme::$options['footer4_link_color'] ); ?>;
}
.footer-style-4 .footer-top-area a:hover,
.footer-style-4 .footer-area .copyright a:hover,
.footer-style-4 .footer-top-area .widget ul.menu li a:hover,
.footer-style-4 .footer-area .copyright a:hover,
.footer-style-4 .footer-top-area .footer-social li a:hover,
.footer-style-4 .footer-top-area ul li a:hover i {
	color: <?php echo esc_html( YakeenTheme::$options['footer4_hover_color'] ); ?>;
}

.footer-style-1 .footer-social li a:hover,
.entry-footer .meta-tags a:hover,
.entry-footer .post-share .share-links a:hover {
	background-color: <?php echo esc_html( YakeenTheme::$options['footer_link_hover_color'] ); ?>;
	border-color: <?php echo esc_html( YakeenTheme::$options['footer_link_hover_color'] ); ?>;
}

<?php
/*-------------------------------------
#. Widgets
---------------------------------------*/
?>
.post-box-style .entry-cat a:hover,
.post-tab-layout .post-tab-cat a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.sidebar-widget-area .widget .widgettitle .titledot,
.rt-category-style2 .rt-item:hover .rt-cat-count,
.sidebar-widget-area .widget_tag_cloud a:hover, 
.sidebar-widget-area .widget_product_tag_cloud a:hover,
.post-box-style .item-list:hover .post-box-img .post-img::after,
.post-tab-layout ul.btn-tab li .active, 
.post-tab-layout ul.btn-tab li a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.sidebar-widget-area .widget .widgettitle svg path.main-shape {
	fill: <?php echo esc_html( $primary_color );?>;
}
.feature-post-layout .rt-feature-widget .entry-title a:hover,
.widget_yakeen_about_author .author-widget .author-social li a:hover,
.post-box-style .post-content .entry-title a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.post-box-style .entry-date svg path {
	stroke: <?php echo esc_html( $primary_color );?>;
}

.widget_yakeen_about_author .author-widget {
	background-color: <?php echo esc_html( $primary_color );?>;
}

<?php
/*-------------------------------------
#. Error 404
---------------------------------------*/
?>
.error-page-content .error-title {
	color: <?php echo esc_html( YakeenTheme::$options['error_text1_color'] ); ?>;
}
.error-page-content p {
	color: <?php echo esc_html( YakeenTheme::$options['error_text2_color'] ); ?>;
}

<?php
/*------------------------------------
#. Buttons
------------------------------------*/
?>
a.button-style-1:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
	border-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Single Content
---------------------------------------*/
?>
.entry-header ul.entry-meta li a:hover,
.entry-footer ul.item-tags li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.rt-related-post-info .post-title a:hover,
.rt-related-post-info .post-date ul li.post-relate-date,
.post-detail-style2 .show-image .entry-header ul.entry-meta li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.about-author ul.author-box-social li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.post-navigation a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.entry-header .entry-meta ul li i,
.entry-header .entry-meta ul li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.single-post .entry-content ol li:before,
.entry-content ol li:before,
.meta-tags a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-related-post .title-section h2:after,
.single-post .ajax-scroll-post > .type-post:after {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.entry-footer .item-tags a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
blockquote p:before,
blockquote {
	background-color: <?php echo esc_html( $secondary_color );?>;
	color: <?php echo esc_html( $primary_color );?>;
}
blockquote p:before {
	box-shadow: 0px 12px 47px rgba(<?php echo esc_html( $primary_rgb );?>, 0.25);
}
.post-navigation a:hover,
.about-author ul.author-box-social li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.single .yakeen-progress-bar {
    height: <?php echo esc_html( YakeenTheme::$options['scroll_indicator_height'] ); ?>px;
    background: <?php echo esc_html( YakeenTheme::$options['scroll_indicator_bgcolor'] ); ?>;
}
<?php
/*-------------------------------------
#. Archive Contents
---------------------------------------*/
?>
.blog-box ul.entry-meta li a:hover,
.blog-layout-1 .blog-box ul.entry-meta li a:hover,
.blog-box ul.entry-meta li.post-comment a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.entry-categories .category-style,
.admin-author .author-box-social li a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.blog-layout-1 .blog-box ul.entry-meta li a:hover,
.blog-layout-1 .blog-box .entry-content .entry-title a:hover,
.team-default .team-content .team-title a:hover,
ul.entry-meta li i,
.blog-box .entry-content .entry-title a:hover,
.entry-categories.style-2 ul li a:hover,
ul.entry-meta li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}

.team-single .team-single-content .team-content ul.team-social li a:hover,
.team-multi-layout-1 .team-item .team-social li a:hover,
.admin-author .author-box-social li a:hover,
.rt-video .rt-play:hover, 
.rt-item .rt-image .rt-play:hover,
.post-date.style-1 {
	background-color: <?php echo esc_html( $primary_color );?>;
}

@-webkit-keyframes pulseShadowlgprimary {
    0% {
        -webkit-box-shadow: 0 0 0 0 rgba(<?php echo esc_html( $primary_rgb );?>, 0.7);
    }

    70% {
        -webkit-box-shadow: 0 0 0 15px rgba(240, 118, 84, 0);
    }

    100% {
        -webkit-box-shadow: 0 0 0 0 rgba(240, 118, 84, 0);
    }
}

@keyframes pulseShadowlgprimary {
    0% {
        -webkit-box-shadow: 0 0 0 0 rgba(<?php echo esc_html( $primary_rgb );?>, 0.7);
        box-shadow: 0 0 0 0 rgba(<?php echo esc_html( $primary_rgb );?>, 0.7);
    }

    70% {
        -webkit-box-shadow: 0 0 0 15px rgba(240, 118, 84, 0);
        box-shadow: 0 0 0 15px rgba(240, 118, 84, 0);
    }

    100% {
        -webkit-box-shadow: 0 0 0 0 rgba(240, 118, 84, 0);
        box-shadow: 0 0 0 0 rgba(240, 118, 84, 0);
    }
}
<?php
/*-------------------------------------
#. Comment
---------------------------------------*/
?>
#respond form .btn-send {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.item-comments .item-comments-list ul.comments-list li .comment-reply {
	background-color: <?php echo esc_html( $primary_color );?>;
}
form.post-password-form input[type="submit"] {
    background: <?php echo esc_html( $primary_color );?>;
}
form.post-password-form input[type="submit"]:hover {
    background: <?php echo esc_html( $secondary_color );?>;
}
.comments-area .main-comments .replay-area a:hover,
#respond form .btn-send {
	background-color: <?php echo esc_html( $primary_color );?>;
	border-color: <?php echo esc_html( $primary_color );?>;
}
#respond form .btn-send:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php

/*----------------------
#. Dark mode
----------------------*/
?>
[data-theme="dark-mode"] body,
[data-theme="dark-mode"] .header-area,
[data-theme="dark-mode"] .header-menu,
[data-theme="dark-mode"] .site-content,
[data-theme="dark-mode"] .error-page-area,
[data-theme="dark-mode"] #page .content-area {
    background-color: <?php echo esc_html( YakeenTheme::$options['dark_mode_bgcolor'] ); ?> !important;
}
[data-theme="dark-mode"] .entry-banner,
[data-theme="dark-mode"] .dark-section2,
[data-theme="dark-mode"] .elementor-background-overlay,
[data-theme="dark-mode"] .topbar-style-1 .header-top-bar,
[data-theme="dark-mode"] .additional-menu-area .sidenav,
[data-theme="dark-mode"] .dark-section2 .fluentform-widget-wrapper,
[data-theme="dark-mode"] .dark-section .elementor-widget-container,
[data-theme="dark-mode"] blockquote, 
[data-theme="dark-mode"] .rt-post-slider-default.rt-post-slider-style4 .rt-item .entry-content,
[data-theme="dark-mode"] .about-author, 
[data-theme="dark-mode"] .comments-area,
[data-theme="dark-mode"] .elementor-section-wrap .dark-section3.elementor-section {
    background-color: <?php echo esc_html( YakeenTheme::$options['dark_mode_light_bgcolor'] ); ?> !important;
}
[data-theme="dark-mode"] body,
[data-theme="dark-mode"] .breadcrumb-area .entry-breadcrumb span a,
[data-theme="dark-mode"] .rt-post-grid-default .rt-item .post_excerpt,
[data-theme="dark-mode"] .rt-post-list-default .rt-item .post_excerpt,
[data-theme="dark-mode"] .rt-section-title.style2 .entry-text,
[data-theme="dark-mode"] .rt-title-text-button .entry-content,
[data-theme="dark-mode"] .rt-contact-info .entry-text,
[data-theme="dark-mode"] .rt-contact-info .entry-text a,
[data-theme="dark-mode"] .fluentform .subscribe-form p,
[data-theme="dark-mode"] .additional-menu-area .sidenav-address span a,
[data-theme="dark-mode"] .meta-tags a,
[data-theme="dark-mode"] .entry-content p,
[data-theme="dark-mode"] #respond .logged-in-as a,
[data-theme="dark-mode"] .about-author .author-bio,
[data-theme="dark-mode"] .comments-area .main-comments .comment-text,
[data-theme="dark-mode"] .rt-skills .rt-skill-each .rt-name,
[data-theme="dark-mode"] .rt-skills .rt-skill-each .progress .progress-bar > span,
[data-theme="dark-mode"] .team-single .team-info ul li,
[data-theme="dark-mode"] .team-single .team-info ul li a,
[data-theme="dark-mode"] .error-page-area p,
[data-theme="dark-mode"] blockquote.wp-block-quote cite,
[data-theme="dark-mode"] .rtrs-review-box .rtrs-review-body p,
[data-theme="dark-mode"] .rtrs-review-box .rtrs-review-body .rtrs-review-meta .rtrs-review-date {
	color: <?php echo esc_html( YakeenTheme::$options['dark_mode_color'] ); ?>;
}

[data-theme="dark-mode"] .dark-border,
[data-theme="dark-mode"] .dark-border .elementor-element-populated,
[data-theme="dark-mode"] .rt-section-title.style1 .entry-title .titleline,
[data-theme="dark-mode"] .header-style-4 .header-menu,
[data-theme="dark-mode"] .post-tab-layout ul.btn-tab li a,
[data-theme="dark-mode"] .rt-post-tab .post-cat-tab a,
[data-theme="dark-mode"] .rt-post-slider-default.rt-post-slider-style4 ul.entry-meta,
[data-theme="dark-mode"] .dark-section2 .fluentform-widget-wrapper,
[data-theme="dark-mode"] .dark-site-subscribe .elementor-widget-container,
[data-theme="dark-mode"] .sidebar-widget-area .fluentform .frm-fluent-form,
[data-theme="dark-mode"] .additional-menu-area .sidenav .sub-menu,
[data-theme="dark-mode"] .additional-menu-area .sidenav ul li,
[data-theme="dark-mode"] .rt-post-list-style4,
[data-theme="dark-mode"] .rt-post-list-default .rt-item,
[data-theme="dark-mode"] .post-box-style .rt-news-box-widget,
[data-theme="dark-mode"] table th, 
[data-theme="dark-mode"] table td,
[data-theme="dark-mode"] .sidebar-widget-area .widget .widgettitle .titleline,
[data-theme="dark-mode"] .section-title .related-title .titleline,
[data-theme="dark-mode"] .meta-tags a,
[data-theme="dark-mode"] .search-form .input-group,
[data-theme="dark-mode"] .post-navigation .text-left,
[data-theme="dark-mode"] .post-navigation .text-right,
[data-theme="dark-mode"] .post-detail-style1 .share-box-area .post-share .share-links .email-share-button {
	border-color: <?php echo esc_html( YakeenTheme::$options['dark_mode_border_color'] ); ?> !important;
}
