<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 


function yakeen_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','yakeen_enqueue_high_priority_scripts', 1500 );
function yakeen_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', YAKEEN_CSS_URL . 'rtl.css', array(), YAKEEN_VERSION );
	}
}
//elementor animation dequeue
add_action('elementor/frontend/after_enqueue_scripts', function(){
    wp_deregister_style( 'e-animations' );
    wp_dequeue_style( 'e-animations' );
});

add_action( 'wp_enqueue_scripts', 'yakeen_register_scripts', 12 );
if ( !function_exists( 'yakeen_register_scripts' ) ) {
	function yakeen_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// animate CSS	
		wp_register_style( 'magnific-popup',     yakeen_get_maybe_rtl('magnific-popup.css'), array(), YAKEEN_VERSION );		
		wp_register_style( 'animate',        	 yakeen_get_maybe_rtl('animate.min.css'), array(), YAKEEN_VERSION );

		/*JS*/
		// magnific popup
		wp_register_script( 'magnific-popup',    YAKEEN_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), YAKEEN_VERSION, true );

		// theia sticky
		wp_register_script( 'theia-sticky',    	 YAKEEN_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), YAKEEN_VERSION, true );
		
		// tween max
		wp_register_script( 'tween-max',         YAKEEN_JS_URL . 'tween-max.js', array( 'jquery' ), YAKEEN_VERSION, true );
		
		// parallax scroll js
		wp_register_script( 'rt-parallax',   	 YAKEEN_JS_URL . 'rt-parallax.js', array( 'jquery' ), YAKEEN_VERSION, true );
		
		// wow js
		wp_register_script( 'rt-wow',   		 YAKEEN_JS_URL . 'wow.min.js', array( 'jquery' ), YAKEEN_VERSION, true );

		// isotope js
		wp_register_script( 'isotope-pkgd',      YAKEEN_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), YAKEEN_VERSION, true );		
		wp_register_script( 'swiper-min',        YAKEEN_JS_URL . 'swiper.min.js', array( 'jquery' ), YAKEEN_VERSION, true );

		// color mode js
		wp_register_script( 'color-mode',        YAKEEN_JS_URL . 'color-mode.js', array( 'jquery' ), YAKEEN_VERSION, true );
		
	}
}

add_action( 'wp_enqueue_scripts', 'yakeen_enqueue_scripts', 15 );
if ( !function_exists( 'yakeen_enqueue_scripts' ) ) {
	function yakeen_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'yakeen-gfonts', 	YakeenTheme_Helper::fonts_url(), array(), YAKEEN_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			yakeen_get_maybe_rtl('bootstrap.min.css'), array(), YAKEEN_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-yakeen',    YAKEEN_ASSETS_URL . 'fonts/flaticon-yakeen/flaticon.css', array(), YAKEEN_VERSION );
		
		elementor_scripts();
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       YAKEEN_CSS_URL . 'font-awesome.min.css', array(), YAKEEN_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            yakeen_get_maybe_rtl('animate.min.css'), array(), YAKEEN_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'yakeen-default',    	yakeen_get_maybe_rtl('default.css'), array(), YAKEEN_VERSION );
		// vc modules css
		wp_enqueue_style( 'yakeen-elementor',   yakeen_get_maybe_rtl('elementor.css'), array(), YAKEEN_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'yakeen-style',     	yakeen_get_maybe_rtl('style.css'), array(), YAKEEN_VERSION );

        wp_enqueue_style( 'petsmart-style',     	yakeen_get_maybe_rtl('petsmart.css'), array(), YAKEEN_VERSION );

		
		// Template Style
		wp_add_inline_style( 'yakeen-style',   	yakeen_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         YAKEEN_JS_URL . 'bootstrap.min.js', array( 'jquery' ), YAKEEN_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// color mode
		if ( YakeenTheme::$options['color_mode'] ) {
            wp_enqueue_script('color-mode');
        }

		// isotope js
		
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'rt-wow' );
		wp_enqueue_script( 'rt-parallax' );
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'swiper-min' );		
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'yakeen-main',    	YAKEEN_JS_URL . 'main.js', $dep , YAKEEN_VERSION, true );
		
		// localize script
		$yakeen_localize_data = array(
			'stickyMenu' 	=> YakeenTheme::$options['sticky_menu'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . '</a>',
			'extraOffset' => YakeenTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => YakeenTheme::$options['sticky_menu'] ? 52 : 0,
			'rtl' => is_rtl()?'yes':'no',
			
			// Ajax
			'nonce' => wp_create_nonce( 'yakeen-nonce' )
		);
		wp_localize_script( 'yakeen-main', 'yakeenObj', $yakeen_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview		
		wp_enqueue_script( 'rt-wow' );
		wp_enqueue_script( 'tween-max' );
	} 
}

add_action( 'wp_enqueue_scripts', 'yakeen_high_priority_scripts', 1500 );
if ( !function_exists( 'yakeen_high_priority_scripts' ) ) {
	function yakeen_high_priority_scripts() {
		// Dynamic style
		YakeenTheme_Helper::dynamic_internal_style();
	}
}

function yakeen_template_style(){
	ob_start();
	?>
	
	.entry-banner {
		<?php if ( YakeenTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( YakeenTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( YakeenTheme::$bgimg );?>) no-repeat scroll center bottom / cover;
		<?php endif; ?>
	}

	.content-area {
		padding-top: <?php echo esc_html( YakeenTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( YakeenTheme::$padding_bottom );?>px;
	}

	<?php if( isset( YakeenTheme::$pagebgcolor ) || isset( YakeenTheme::$pagebgimg ) ) { ?>
	#page .content-area {
		background-image: url( <?php echo YakeenTheme::$pagebgimg; ?> );
		background-color: <?php echo YakeenTheme::$pagebgcolor; ?>;
	}
	<?php } ?>

	.error-page-area {		 
		background-color: <?php echo esc_html( YakeenTheme::$options['error_bodybg_color'] );?>;
	}
	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'yakeen-gfonts', YakeenTheme_Helper::fonts_url(), array(), YAKEEN_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       YAKEEN_CSS_URL . 'font-awesome.min.css', array(), YAKEEN_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-yakeen',    YAKEEN_ASSETS_URL . 'fonts/flaticon-yakeen/flaticon.css', array(), YAKEEN_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );

function load_custom_wp_admin_script() {
	wp_enqueue_style( 'yakeen-admin-style',  YAKEEN_CSS_URL . 'admin-style.css', false, YAKEEN_VERSION );
	wp_enqueue_script( 'yakeen-admin-main',  YAKEEN_JS_URL . 'admin.main.js', false, YAKEEN_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );
