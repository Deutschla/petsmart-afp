<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}
add_action('after_setup_theme', 'yakeen_setup');
if ( !function_exists( 'yakeen_setup' ) ) {
	function yakeen_setup() {
		// Language
		load_theme_textdomain( 'yakeen', YAKEEN_BASE_DIR . 'languages' );

		// Theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		remove_theme_support('widgets-block-editor');
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'audio' ) );
		// for gutenberg support
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Primary Color', 'yakeen' ),
				'slug' => 'yakeen-primary',
				'color' => '#f07654',
			),
			array(
				'name' => esc_html__( 'Secondary Color', 'yakeen' ),
				'slug' => 'yakeen-secondary',
				'color' => '#ffefec',
			),
			array(
				'name' => esc_html__( 'dark gray', 'yakeen' ),
				'slug' => 'yakeen-button-dark-gray',
				'color' => '#333333',
			),
			array(
				'name' => esc_html__( 'light gray', 'yakeen' ),
				'slug' => 'yakeen-button-light-gray',
				'color' => '#a5a6aa',
			),
			array(
				'name' => esc_html__( 'white', 'yakeen' ),
				'slug' => 'yakeen-button-white',
				'color' => '#ffffff',
			),
		) );
		add_theme_support( 'editor-gradient-presets', array(
			array(
				'name'     => esc_html__( 'Gradient Color', 'yakeen' ),
				'gradient' => 'linear-gradient(135deg, rgba(255, 0, 0, 1) 0%, rgba(252, 75, 51, 1) 100%)',
				'slug'     => 'yakeen_gradient_color',
			),
		));	
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__( 'Small', 'yakeen' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => esc_html__( 'Normal', 'yakeen' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => esc_html__( 'Large', 'yakeen' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => esc_html__( 'Huge', 'yakeen' ),
				'size' => 50,
				'slug' => 'huge'
			)
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support('editor-styles');	
		
		// Image sizes
		add_image_size( 'yakeen-size1', 1110, 650, true ); 
		add_image_size( 'yakeen-size2', 1110, 550, true );  
		add_image_size( 'yakeen-size3', 956, 828, true );  
		add_image_size( 'yakeen-size4', 732, 700, true );  
		add_image_size( 'yakeen-size5', 732, 576, true );  
		add_image_size( 'yakeen-size6', 732, 520, true );  
		add_image_size( 'yakeen-size7', 732, 440, true );  
		add_image_size( 'yakeen-size8', 640, 760, true );  
		add_image_size( 'yakeen-size9', 552, 552, true );  
		add_image_size( 'yakeen-size10', 552, 126, true );  
		
		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'yakeen' ),
			'topright' => esc_html__( 'Header Right', 'yakeen' ),
		) );		
	}
}

function yakeen_theme_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}
add_action( 'admin_init', 'yakeen_theme_add_editor_styles' );

function yakeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'yakeen_pingback_header' );

// Initialize Widgets
add_action( 'widgets_init', 'yakeen_widgets_register' );
if ( !function_exists( 'yakeen_widgets_register' ) ) {
	function yakeen_widgets_register() {
		
		$footer_widget_titles1 = array(
			'1' => esc_html__( 'Footer (Style 1) 1', 'yakeen' ),
			'2' => esc_html__( 'Footer (Style 1) 2', 'yakeen' ),
			'3' => esc_html__( 'Footer (Style 1) 3', 'yakeen' ),
			'4' => esc_html__( 'Footer (Style 1) 4', 'yakeen' ),
		);	

		// Register Widget Areas ( Common )
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'yakeen' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="rt-widget-title-holder"><h3 class="widgettitle">',
			'after_title'   => yakeen_section_title_bottom_icon2().'</h3></div>',
			) );
		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar - Left', 'yakeen' ),
			'id'            => 'topbar-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar - Right', 'yakeen' ),
			'id'            => 'topbar-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Offcanvas Info', 'yakeen' ),
			'id'            => 'offcanvas',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );		
		
		if ( !empty(YakeenTheme::$options['footer_column_1']) ){
			$item_widget = YakeenTheme::$options['footer_column_1'];
		} else {
			$item_widget = 4;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles1[$i],
				'id'            => 'footer-style-1-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. YakeenTheme::$footer_style .'">',
				'after_title'   => yakeen_heading_shape().'</h3>',
			) );
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 2', 'yakeen' ),
			'id'            => 'footer-style-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. YakeenTheme::$footer_style .'">',
			'after_title'   => yakeen_heading_shape().'</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 3', 'yakeen' ),
			'id'            => 'footer-style-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. YakeenTheme::$footer_style .'">',
			'after_title'   => yakeen_heading_shape().'</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 4', 'yakeen' ),
			'id'            => 'footer-style-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. YakeenTheme::$footer_style .'">',
			'after_title'   => yakeen_heading_shape().'</h3>',
		) );		
	}
}
/*Allow HTML for the kses post*/
function yakeen_kses_allowed_html($tags, $context) {
    switch($context) {
        case 'social':
            $tags = array(
                'a' => array('href' => array()),
                'b' => array()
            );
            return $tags;
		case 'allow_link':
            $tags = array(
                'a' => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
					'target' => array(),
                ),
				'img' => array(
                    'alt'    => array(),
                    'class'  => array(),
                    'height' => array(),
                    'src'    => array(),
                    'srcset' => array(),
                    'width'  => array(),
                ),
                'b' => array()
            );
            return $tags;
		case 'allow_title':
            $tags = array(
				'a' => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
					'target' => array(),
                ),
                'span' => array(
                    'class' => array(),
                    'style' => array(),
                ),
                'b' => array()
            );
            return $tags;
			
        case 'alltext_allow':
            $tags = array(
                'a' => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
					'target' => array(),
                ),
                'abbr' => array(
                    'title' => array(),
                ),
                'b' => array(),
                'br' => array(),
                'blockquote' => array(
                    'cite'  => array(),
                ),
                'cite' => array(
                    'title' => array(),
                ),
                'code' => array(),
                'del' => array(
                    'datetime' => array(),
                    'title' => array(),
                ),
                'dd' => array(),
                'div' => array(
                    'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),
                ),
                'dl' => array(),
                'dt' => array(),
                'em' => array(),
                'h1' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h2' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h3' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h4' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h5' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),),
                'h6' => array(
                	'class' => array(),
                    'title' => array(),
                    'style' => array(),
                    'id' 	=> array(),
                ),
                'i' => array(
					'class' => array(),
				),
                'img' => array(
                    'alt'    => array(),
                    'class'  => array(),
                    'height' => array(),
                    'src'    => array(),
                    'srcset' => array(),
                    'width'  => array(),
                ),
                'li' => array(
                    'class' => array(),
                ),
                'ol' => array(
                    'class' => array(),
                ),
                'p' => array(
                    'class' => array(),
                ),
                'q' => array(
                    'cite' => array(),
                    'title' => array(),
                ),
                'span' => array(
                    'class' => array(),
                    'title' => array(),
                    'style' => array(),
                ),
                'strike' => array(),
                'strong' => array(),
                'ul' => array(
                    'class' => array(),
                ),
            );
            return $tags;
        default:
            return $tags;
    }
}
add_filter( 'wp_kses_allowed_html', 'yakeen_kses_allowed_html', 10, 2);


/**
 * @param Wp_Query $query
 * @return mixed
 */
function advanced_search_query($query) {
    if($query->is_search()) {
        // category terms search.
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('tax_query', array(array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($_GET['category']) )
            ));
        }    
    }
    return $query;
}
add_action('pre_get_posts', 'advanced_search_query', 1000);

/*social link to author profile page*/
add_action( 'show_user_profile', 'yakeen_user_social_profile_fields' );
add_action( 'edit_user_profile', 'yakeen_user_social_profile_fields' );

function yakeen_user_social_profile_fields( $user ) { ?>

	<h3><?php esc_html_e( 'User Designation' , 'yakeen' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="yakeen_author_designation"><?php esc_html_e( 'Author Designation' , 'yakeen' ); ?></label></th>
			<td><input type="text" name="yakeen_author_designation" id="yakeen_author_designation" value="<?php echo esc_attr( get_the_author_meta( 'yakeen_author_designation', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Author Designation' , 'yakeen' ); ?></span></td>
		</tr>
	</table>
	
	<h3><?php esc_html_e( 'Social profile information' , 'yakeen' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="facebook"><?php esc_html_e( 'Facebook' , 'yakeen' ); ?></label></th>
			<td><input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'yakeen_facebook', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your facebook URL.' , 'yakeen' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="twitter"><?php esc_html_e( 'Twitter' , 'yakeen' ); ?></label></th>
			<td><input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'yakeen_twitter', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Twitter username.' , 'yakeen' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="linkedin"><?php esc_html_e( 'LinkedIn' , 'yakeen' ); ?></label></th>
			<td><input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'yakeen_linkedin', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your LinkedIn Profile' , 'yakeen' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="pinterest"><?php esc_html_e( 'Pinterest' , 'yakeen' ); ?></label></th>
			<td><input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'yakeen_pinterest', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Pinterest Profile' , 'yakeen' ); ?></span></td>
		</tr>
	</table>
<?php }

add_action( 'personal_options_update', 'yakeen_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'yakeen_extra_profile_fields' );

function yakeen_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'yakeen_facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'yakeen_twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'yakeen_linkedin', $_POST['linkedin'] );
	update_user_meta( $user_id, 'yakeen_pinterest', $_POST['pinterest'] );
	update_user_meta( $user_id, 'yakeen_author_designation', $_POST['yakeen_author_designation'] );
}

/*find newest post/product with time*/
function yakeen_is_new( $id ) {
	$now    = time();
	$published_date = get_post_time('U');
	$diff =  $now - $published_date;
	if ( $diff < 604800 ) { ?>
		<span class="new-post"><?php esc_html_e( 'New' , 'yakeen' ); ?></span>
	<?php }
}

if( ! function_exists( 'yakeen_post_img_src' )){
	function yakeen_post_img_src( $size = 'yakeen-size1' ){
		$post_id  = get_the_ID();
		if ( has_post_thumbnail( $post_id ) ) {			
			$image_id = get_post_thumbnail_id( $post_id );			
			$image    = wp_get_attachment_image_src( $image_id, $size );
			return $image[0];
		} else {
			return;
		}
	}
}

/*Post Time & time format*/
if( ! function_exists( 'yakeen_get_time' )){

	function yakeen_get_time( $return = false ){

		$post = get_post();
		
		# Date is disabled globally ----------
		if( YakeenTheme::$options['post_time_format'] == 'none' ){
			return false;
		}
		# Human Readable Post Dates ----------
		elseif(  YakeenTheme::$options['post_time_format'] == 'modern' ){

			$time_now  = current_time( 'timestamp' );
			$post_time = get_the_time( 'U' ) ;
			$since = sprintf( esc_html__( '%s ago' , 'yakeen' ), human_time_diff( $post_time, $time_now ) );			
		}
		else{
			$since = get_the_date();
		}

		$post_time = '<span class="date meta-item"><span>'.$since.'</span></span>';

		if( $return ){
			return $post_time;
		}

		echo wp_kses( $post_time , 'alltext_allow' );
	}

}

function widgets_scripts( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_style( 'wp-color-picker' );
	
}
add_action( 'admin_enqueue_scripts', 'widgets_scripts' );

/*Module: Last Post update Date*/
function yakeen_last_update() { 

	$lastupdated_args = array(
		'orderby' => 'modified',
		'posts_per_page' => 1,
		'ignore_sticky_posts' => '1'
	);
 
	$lastupdated_loop = new WP_Query( $lastupdated_args );
	
	while( $lastupdated_loop->have_posts() )  {
		$lastupdated_loop->the_post();
		echo get_the_modified_date( 'M j, Y g:i a' );
	}	
	wp_reset_postdata();
}

/*
* for most use of the get_term cached 
* This is because all time it hits and single page provide data quickly
*/
function get_img( $img ){
	$img = get_stylesheet_directory_uri() . '/assets/img/' . $img;
	return $img;
}
function get_css( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/css/' . $file . '.css';
	return $file;
}
function get_js( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/js/' . $file . '.js';
	return $file;
}
function filter_content( $content ){
	// wp filters
	$content = wptexturize( $content );
	$content = convert_smilies( $content );
	$content = convert_chars( $content );
	$content = wpautop( $content );
	$content = shortcode_unautop( $content );

	// remove shortcodes
	$pattern= '/\[(.+?)\]/';
	$content = preg_replace( $pattern,'',$content );

	// remove tags
	$content = strip_tags( $content );

	return $content;
}

function get_current_post_content( $post = false ) {
	if ( !$post ) {
		$post = get_post();				
	}
	$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
	$content = filter_content( $content );
	return $content;
}

function cached_get_term_by( $field, $value, $taxonomy, $output = OBJECT, $filter = 'raw' ){
	// ID lookups are cached
	if ( 'id' == $field )
		return get_term_by( $field, $value, $taxonomy, $output, $filter );

	$cache_key = $field . '|' . $taxonomy . '|' . md5( $value );
	$term_id = wp_cache_get( $cache_key, 'get_term_by' );

	if ( false === $term_id ){
		$term = get_term_by( $field, $value, $taxonomy );
		if ( $term && ! is_wp_error( $term ) )
			wp_cache_set( $cache_key, $term->term_id, 'get_term_by' );
		else
			wp_cache_set( $cache_key, 0, 'get_term_by' ); // if we get an invalid value, let's cache it anyway
	} else {
		$term = get_term( $term_id, $taxonomy, $output, $filter );
	}

	if ( is_wp_error( $term ) )
		$term = false;

	return $term;
}

/*for avobe reason*/
function cached_get_term_link( $term, $taxonomy = null ){
	// ID- or object-based lookups already result in cached lookups, so we can ignore those.
	if ( is_numeric( $term ) || is_object( $term ) ){
		return get_term_link( $term, $taxonomy );
	}

	$term_object = cached_get_term_by( 'slug', $term, $taxonomy );
	return get_term_link( $term_object );
}


/*only to show the first category in the post - primary category*/
function yakeen_if_term_exists( $term, $taxonomy = '', $parent = null ){
	if ( null !== $parent ){
		return term_exists( $term, $taxonomy, $parent );
	}

	if ( ! empty( $taxonomy ) ){
		$cache_key = $term . '|' . $taxonomy;
	}else{
		$cache_key = $term;
	}

	$cache_value = wp_cache_get( $cache_key, 'term_exists' );

	//term_exists frequently returns null, but (happily) never false
	if ( false  === $cache_value ){
		$term_exists = term_exists( $term, $taxonomy );
		wp_cache_set( $cache_key, $term_exists, 'term_exists' );
	}else{
		$term_exists = $cache_value;
	}

	if ( is_wp_error( $term_exists ) )
		$term_exists = null;

	return $term_exists;
}


// Head Script
if( !function_exists( 'yakeen_head' ) ) {
	function yakeen_head(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}	
}
add_action( 'wp_head', 'yakeen_head', 1 );

//find the post type function 
if ( ! function_exists ( 'yakeen_post_type' ) ) {
	function yakeen_post_type() {
		$yakeen_post_type_var =get_post_type( get_the_ID());
		echo esc_html( $yakeen_post_type_var );
	}
}

/*next previous post links*/
if ( !function_exists( 'yakeen_post_links_next_prev' ) ) {
	function yakeen_post_links_next_prev() { ?>
	<div class="divider post-navigation">
		<?php if ( !empty( get_next_post_link())){ ?>
			<div class="<?php if ( empty( get_previous_post_link())){ ?>-offset-md-6<?php } ?> <?php if ( is_rtl() ){ echo esc_attr( 'text-left' ); } else { echo esc_attr( 'text-left' ); } ?>">
				<div class="pad-lr-15">
					<span class="next-article"><i class="flaticon flaticon-previous"></i>
					<?php next_post_link( '%link', esc_html__('Previous Post' , 'yakeen' ) );?></span>
					<?php next_post_link( '<h4 class="post-nav-title">%link</h4>' ); ?>
				</div>			
			</div>
		<?php } ?>
		<div class="navigation-archive"><a href="<?php echo get_post_type_archive_link( get_post_type(get_the_ID()) ); ?>"><i class="flaticon flaticon-menu"></i></a></div>
		<?php if ( !empty( get_previous_post_link())){ ?>
			<div class="<?php if ( empty( get_next_post_link())){ ?>offset-md-6<?php } ?> <?php if ( is_rtl() ){ echo esc_attr( 'text-right' ); } else { echo esc_attr( 'text-right' ); } ?>">
				<div class="pad-lr-15">
				<span class="prev-article">
				<?php previous_post_link( '%link', esc_html__('Next Post' , 'yakeen' ) );?><i class="flaticon flaticon-next"></i></span>
				<?php previous_post_link('<h4 class="post-nav-title">%link</h4>'); ?>
				</div>
			</div>
		<?php } ?>
	</div>
<?php }
}

/*Remove the archive label*/
function yakeen_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'yakeen_archive_title' );

/*Case single page link*/
add_action( 'wp_ajax_yakeen_like', 'yakeen_like_callback' );
add_action( 'wp_ajax_nopriv_yakeen_like', 'yakeen_like_callback' );
function yakeen_like_callback(){
	if(!$user_id = get_current_user_id()){
		wp_send_json_error('You must be login to like this post');
	}

	if(!$post_id = !empty($_POST['post_id']) ? absint($_POST['post_id']) : 0){
		wp_send_json_error('Post is mest be selected to like this post');
	}	

	$current_likes = get_user_meta($user_id, '_yakeen_likes', true);
	$current_likes = !empty($current_likes) && is_array($current_likes) ? $current_likes : [];
	$existKey = array_search($post_id,  $current_likes);

	if($existKey !== false){
		unset($current_likes[$existKey]);
		update_user_meta($user_id, '_yakeen_likes',$current_likes);
		wp_send_json_success([
			'post_id'=> $post_id,
			'action'=> 'unliked'
		]);
	}else{
		$current_likes[]=$post_id;
		update_user_meta($user_id, '_yakeen_likes',$current_likes);
		wp_send_json_success([
			'post_id'=> $post_id,
			'action'=> 'liked'
		]);
	}

}

/*Category Color function*/
if( ! function_exists( 'yakeen_get_primary_category' )){
	function yakeen_get_primary_category() {
		if( get_post_type() != 'post' ) {
			return;
		}
		# Get the first assigned category ----------
			$get_the_category = get_the_category();
			$primary_category = array( $get_the_category[0] );

		if( ! empty( $primary_category[0] )) {
			return $primary_category;
		}
	}
}

/*only to show the first category in the post - primary category ID*/
if( ! function_exists( 'yakeen_get_primary_category_id' )){
	function yakeen_get_primary_category_id(){
		$primary_category = yakeen_get_primary_category();
		if( ! empty( $primary_category[0]->term_id )){
			return $primary_category[0]->term_id;
		}
		return false;
	}
}

/*For category color*/
if ( ! function_exists ( 'yakeen_category_prepare' ) ) {
	function yakeen_category_prepare() {
		foreach( get_the_category() as $category ) {
			$get_color  = get_term_meta( $category->term_id , 'rt_category_color', true ); 
			if ( $get_color ) {	?>
				<a href="<?php echo get_category_link( $category->term_id ); ?>"><span class="category-style" style="background:#<?php echo esc_attr( $get_color ); ?>"><?php echo esc_html( $category->name ); ?></span></a>
			<?php } else { ?>
				<a href="<?php echo get_category_link( $category->term_id ); ?>"><span class="category-style"><?php echo esc_html( $category->name ); ?></span></a>
			<?php }
		} 
	}
}

/*For single category color*/
if ( ! function_exists ( 'yakeen_single_category_prepare' ) ) {
	function yakeen_single_category_prepare() {

		foreach( get_the_category() as $category ) {
			$get_color  = get_term_meta( $category->term_id , 'rt_category_color', true ); 
			if ( $get_color ) {	?>
				<a href="<?php echo get_category_link( $category->term_id ); ?>"><span class="category-style" style="background:#<?php echo esc_attr( $get_color ); ?>"><?php echo esc_html( $category->name ); ?></span></a>
			<?php } else { ?>
				<a href="<?php echo get_category_link( $category->term_id ); ?>"><span class="category-style"><?php echo esc_html( $category->name ); ?></span></a>
			<?php }
		} 
	}
}


/*For Selected category color*/
if ( ! function_exists ( 'yakeen_sel_category_prepare' ) ) {
	function yakeen_sel_category_prepare( $sel_cat_id ) {
	$get_color  = get_term_meta( $sel_cat_id , 'rt_category_color', true );
	
	if ( $get_color ) {	?>
		<a href="<?php echo get_category_link( $sel_cat_id ); ?>"><span class="category-style" style="background:#<?php echo esc_attr( $get_color ); ?>"><?php echo get_cat_name( $sel_cat_id ); ?></span></a>
	<?php } else { ?>
		<a href="<?php echo get_category_link( yakeen_get_primary_category()[0]->term_id ); ?>"><span class="category-style"><?php echo esc_html( yakeen_get_primary_category()[0]->name ); ?></span></a>
	<?php } 
	
	}
}

if ( ! function_exists ( 'yakeen_sel_category_image' ) ) {
	function yakeen_sel_category_image( $sel_cat_id, $size = 'thumbnail' ) {
		$get_image  = get_term_meta( $sel_cat_id , 'rt_category_image', true );
		
		if ( $get_image ) {	
			return wp_get_attachment_image_src($get_image, $size)[0];
		} else {
			return '';
		} 
	}
}

/*add category color meta*/
function yakeen_colorpicker_field_add_new_category( $taxonomy ) {
  ?>
    <div class="form-field term-colorpicker-wrap">
        <label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'yakeen' ); ?></label>
        <input name="rt_category_color" value="#111111" class="colorpicker" id="term-colorpicker" />
        <p><?php esc_html_e( 'This is category background color.', 'yakeen' ); ?></p>
    </div>

    <div class="form-field term-group">
        <label for=""><?php esc_html_e( 'Upload and Image', 'yakeen' ); ?></label> 
        <div class="category-image"></div> 
        <input type="button" id="upload_image_btn" class="button" value="<?php esc_html_e( 'Upload an Image', 'yakeen' ); ?>" />
    </div>
  <?php
}
add_action( 'category_add_form_fields', 'yakeen_colorpicker_field_add_new_category' );


function yakeen_colorpicker_field_edit_category( $term ) {
    $color = get_term_meta( $term->term_id, 'rt_category_color', true );
    $color = ( ! empty( $color ) ) ? "#{$color}" : '#111111';

    $image = get_term_meta( $term->term_id, 'rt_category_image', true );
  ?>
    <tr class="form-field term-colorpicker-wrap">
        <th scope="row"><label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'yakeen' ); ?></label></th>
        <td>
            <input name="rt_category_color" value="<?php echo esc_attr( $color ); ?>" class="colorpicker" id="term-colorpicker" />
            <p class="description"><?php esc_html_e( 'This is category background color.', 'yakeen' ); ?></p>
        </td>
    </tr>

    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="term-image"><?php esc_html_e( 'Category Image', 'yakeen' ); ?></label></th>
        <td> 
            <div class="category-image">
            	<?php if ( $image ) { ?>
            		<div class="category-image-wrap">
	            		<img src='<?php echo wp_get_attachment_image_src($image, 'thumbnail')[0]; ?>' width='200' />
	            		<input type="hidden" name="rt_category_image" value="<?php echo esc_attr( $image ); ?>" class="category-image-id"/>
	            		<button>x</button>
            		</div>
            	<?php } ?>
            </div>
	        
	        <input type="button" id="upload_image_btn" class="button" value="<?php esc_html_e( 'Upload an Image', 'yakeen' ); ?>" />
        </td>
    </tr>
  <?php
}
add_action( 'category_edit_form_fields', 'yakeen_colorpicker_field_edit_category' ); 

function yakeen_save_termmeta( $term_id ) {
    // Save term color if possible
    if( isset( $_POST['rt_category_color'] ) && ! empty( $_POST['rt_category_color'] ) ) {
        update_term_meta( $term_id, 'rt_category_color', sanitize_hex_color_no_hash( $_POST['rt_category_color'] ) );
    } else {
        delete_term_meta( $term_id, 'rt_category_color' );
    }

    if( isset( $_POST['rt_category_image'] ) && ! empty( $_POST['rt_category_image'] ) ) {
        update_term_meta( $term_id, 'rt_category_image', absint( $_POST['rt_category_image'] ) );
    } else {
        delete_term_meta( $term_id, 'rt_category_image' );
    }
}
add_action( 'created_category', 'yakeen_save_termmeta' );
add_action( 'edited_category',  'yakeen_save_termmeta' );

function yakeen_category_colorpicker_enqueue( $taxonomy ) {
    if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }
    // Colorpicker Scripts
    wp_enqueue_script( 'wp-color-picker' );
    // Colorpicker Styles
    wp_enqueue_style( 'wp-color-picker' );

}
add_action( 'admin_enqueue_scripts', 'yakeen_category_colorpicker_enqueue' );

//Category Color column
add_filter( 'manage_edit-category_columns', 'yakeen_edit_term_columns', 10, 3 );
function yakeen_edit_term_columns( $columns ) {
    $columns['rt_category_color'] = esc_html__( 'Color', 'yakeen' );
    $columns['rt_category_image'] = esc_html__( 'Image', 'yakeen' );
    return $columns;
}
// RENDER COLUMNS
add_filter( 'manage_category_custom_column', 'yakeen_manage_term_custom_column', 10, 3 );
function yakeen_manage_term_custom_column( $out, $column, $term_id ) {
    if ( 'rt_category_color' === $column ) {
        $value  = get_term_meta( $term_id , 'rt_category_color', true );
        if ( ! $value )
            $value = '';
        $out = sprintf( '<span class="term-meta-color-block" style="background:#%s" ></span>', esc_attr( $value ) );
    }

    if ( 'rt_category_image' === $column ) {
        $value  = get_term_meta( $term_id , 'rt_category_image', true );
        if ( $value ) {
        	$out = '<img src='.wp_get_attachment_image_src($value, 'thumbnail')[0].' width="200" />';
        } 
    }
    return $out;
}

function yakeen_load_custom_wp_admin_style() {	
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'rt-widget-color', YAKEEN_JS_URL . 'rt-widget-color.js', array( 'jquery','wp-color-picker' ), YAKEEN_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'yakeen_load_custom_wp_admin_style' );


add_filter( 'language_attributes', 	'filter_language_attributes', 10, 2 ); 

// define the language_attributes callback 
function filter_language_attributes( $output, $doctype ) { 
    $attributes = array();

    if ( function_exists( 'is_rtl' ) && is_rtl() )
            $attributes[] = 'dir="rtl"';

    if ( $lang = get_bloginfo('language') ) {
            if ( get_option('html_type') == 'text/html' || $doctype == 'html' )
                    $attributes[] = "lang=\"$lang\"";

            if ( get_option('html_type') != 'text/html' || $doctype == 'xhtml' )
                    $attributes[] = "xml:lang=\"$lang\"";
    }

    $color_mode = YakeenTheme::$options['code_mode_type'];
    $attributes[] = 'data-theme="' . esc_attr( $color_mode ) . '"';

    $output = implode(' ', $attributes);

    return $output; 
} 


function rt_w3c_validator() {
	/*----------------------------------------------------------------------------------------------------*/
	/*  W3C validator passing code
	/*----------------------------------------------------------------------------------------------------*/
    ob_start( function( $buffer ){
        $buffer = str_replace( array( '<script type="text/javascript">', "<script type='text/javascript'>" ), '<script>', $buffer );
        return $buffer;
    });
    ob_start( function( $buffer2 ){
        $buffer2 = str_replace( array( "<script type='text/javascript' src" ), '<script src', $buffer2 );
        return $buffer2;
    });
    ob_start( function( $buffer3 ){
        $buffer3 = str_replace( array( 'type="text/css"', "type='text/css'", 'type="text/css"', ), '', $buffer3 );
        return $buffer3;
    });
    ob_start( function( $buffer4 ){
        $buffer4 = str_replace( array( '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"', ), '<iframe', $buffer4 );
        return $buffer4;
    });
	ob_start( function( $buffer5 ){
        $buffer5 = str_replace( array( 'aria-required="true"', ), '', $buffer5 );
        return $buffer5;
    });
}

add_action( 'template_redirect', 'rt_w3c_validator' );

