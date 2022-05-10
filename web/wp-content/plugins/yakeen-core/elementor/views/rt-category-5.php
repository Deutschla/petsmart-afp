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
$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";

?>
<div class="rt-category rt-category-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_space'] );?>">
	<?php foreach( $terms as $term ) { ?>
		<div class="<?php echo esc_attr( $col_class );?>">
			<div class="rt-item">
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
                    <span class="rt-cat-icon"><?php echo yakeen_arrow_icon(); ?></span>
                </a>
				</div>
				<div class="rt-content">
					<h4 class="rt-cat-name">
						<a class="rt-cat-link" href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
					</h4>
				</div>
		    </div>
		</div>
	<?php } ?>
	</div>
</div>