<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
class YakeenTheme_Category_Widget extends WP_Widget {

	/**
	 * Sets up a new Categories widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt-category',
			'description' => esc_html__( 'Yakeen Category Widget' , 'yakeen-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-categories', __( 'Yakeen: Categories' ), $widget_ops );
	}
	public function widget( $args, $instance ) {
		static $first_dropdown = true;

		$default_title = __( '' );
		$title         = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$count        = ! empty( $instance['count'] ) ? '1' : '0';
		$limit        = ! empty( $instance['limit'] ) ? $instance['limit'] : 6;
		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		 
		$thumb_size = 'yakeen-size3';

		$rt_args = array (
		    'taxonomy' => 'category',  
		    'hide_empty' => true,  
		    'include' => 'all',  
		    'fields' => 'all', 
		);

		$terms = get_terms($rt_args );

		?>
		<div class="rt-category rt-category-style2">
			<?php 
			$i = 0;
			foreach( $terms as $term ) { 
				if( $limit && $i == $limit ) {
					break;
				}
				?>
				<div class="rt-item space">
					<div class="rt-content">
			            <h4 class="rt-cat-name">
							<a href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
			            </h4>
						<?php if( $count == 1 ) { ?>
			            <span class="rt-cat-count">( <?php echo esc_html( $term->count ); ?> )</span>
			        	<?php } ?>
			        </div>
			    </div>
			<?php $i++; } ?>
		</div>

		<?php
		
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['limit']        = absint( $new_instance['limit'] );
		$instance['count']        = ! empty( $new_instance['count'] ) ? 1 : 0;

		return $instance;
	}

	public function form( $instance ) {
		// Defaults.
		$instance     = wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'limit' => '',
			'count' => ''
		) );
		$count = isset( $instance['count'] ) ? (bool) $instance['count'] : false;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo esc_attr( $instance['limit'] ); ?>" />
		</p>

		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>"<?php checked( $count ); ?> />
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Show post counts' ); ?></label>
		</p>
		<?php
	}

}
