<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;

use YakeenTheme;
use YakeenTheme_Helper;
use \WP_Query;
 
$thumb_size = 'yakeen-size9';

$args = array (
    'taxonomy' => 'category',  
    'hide_empty' => true,  
    'include' => 'all',  
    'fields' => 'all', 
);

if ( $data['catid'] ) {
	$args['include'] = $data['catid'];
}

$terms = get_terms($args );

?>
<div class="rt-category rt-swiper-slider rt-category-<?php echo esc_attr( $data['style'] );?>">
	<?php if( $data['title'] || $data['display_arrow']=='yes' ) { ?>
	<div class="section-title section-title-cat">
		<?php if( ( $data['title'] ) ) { ?>
		<h3 class="related-title"><?php echo esc_html_e( $data['title'] );?></h3>	
		<?php } ?>
		<?php if($data['display_arrow']=='yes'){  ?>			
		<div class="swiper-button">
            <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
            <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
        </div>
    	<?php } ?>
    </div>
    <?php } ?>
	<div class="swiper-container" data-xld ="<?php echo esc_attr( $data['swiper_data'] );?>">
		<div class="swiper-wrapper">
			<?php foreach( $terms as $term ) { ?>
				<div class="rt-item swiper-slide">
					<div class="rt-cat-img">
						<a class="rt-cat-link" href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>">
							<?php 
							$get_image  = get_term_meta( $term->term_id , 'rt_category_image', 'true' ); 
							if ( $get_image ) {	
								echo wp_get_attachment_image( $get_image, $thumb_size );
							}else {
								echo '<img class="wp-post-image" src="' . YakeenTheme_Helper::get_img( 'noimage_552X552.jpg' ) . '" alt="'.get_the_title().'">';
							}
							?>
						</a>
					</div>
					<div class="rt-content">
			            <h4 class="rt-cat-name">
			                <a class="rt-cat-link" href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>"><?php echo esc_html( $term->name ); ?></a> 
			            </h4>
			            <?php if( $data['cat_count'] == 'yes' ) { ?>
			            <p class="rt-cat-count">
			                <span class="anim-overflow">(<?php echo esc_html( $term->count ); ?>)</span>
			            </p>
			        	<?php } ?>
			        </div>
			    </div>
			<?php } ?>
		</div>
	</div>
</div>