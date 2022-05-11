<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class YakeenTheme_About_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'yakeen_about_author', // Base ID
			esc_html__( 'Yakeen : About Author', 'yakeen-core' ), // Name
			array( 'description' => esc_html__( 'About Author Widget', 'yakeen-core' ) ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			$html      = apply_filters( 'widget_title', $instance['title'] );
			echo $html = $args['before_title'] . $html . $args['after_title'];
		} else {
			$html = '';
		}

		$img = wp_get_attachment_image( $instance['ab_image'] );

		?>
		
		<div class="author-widget">
			<?php
			if ( ! empty( $instance['ab_image'] ) ) {
				?>
				<div class="author-image">
					<ul class="shape-wrap">
						<li class="top-shape wow fadeInDown animated" data-wow-duration="2.7s"><?php echo yakeen_author_shape_top(); ?></li>
						<li class="left-shape wow fadeInLeft animated" data-wow-duration="3s"><?php echo yakeen_author_shape_left(); ?></li>
						<li class="right-shape wow fadeInRight animated" data-wow-duration="3s"><?php echo yakeen_author_shape_right(); ?></li>
					</ul>
					<?php echo wp_kses( $img, 'alltext_allow' ); ?>
				</div>
				<?php
			}
			if ( ! empty( $instance['subtitle'] ) ) {
				?>
				<h3 class="entry-title title-size-xl"><?php echo esc_html( $instance['subtitle'] ); ?></a></h3>
				<?php
			}
			if ( ! empty( $instance['text'] ) ) {
				?>
				<p class="entry-content"><?php echo esc_html( $instance['text'] ); ?></p>
				<?php
			}

			?>
			<ul class="author-social">
				<?php
				if ( ! empty( $instance['facebook'] ) ) {
					?>
					<li><a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<?php
				}
				if ( ! empty( $instance['twitter'] ) ) {
					?>
					<li><a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
					<?php
				}
				if ( ! empty( $instance['linkedin'] ) ) {
					?>
					<li><a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
					<?php
				}
				if ( ! empty( $instance['pinterest'] ) ) {
					?>
					<li><a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
					<?php
				}
				if ( ! empty( $instance['skype'] ) ) {
					?>
					<li><a href="<?php echo esc_url( $instance['skype'] ); ?>" target="_blank"><i class="fab fa-skype"></i></a></li>
					<?php
				}
				if ( ! empty( $instance['youtube'] ) ) {
					?>
					<li><a href="<?php echo esc_url( $instance['youtube'] ); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
					<?php
				}
				if ( ! empty( $instance['instagram'] ) ) {
					?>
					<li><a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<?php
				}
				if ( ! empty( $instance['behance'] ) ) {
					?>
					<li><a href="<?php echo esc_url( $instance['behance'] ); ?>" target="_blank"><i class="fab fa-behance"></i></a></li>
					<?php
				}
				if ( ! empty( $instance['dribbble'] ) ) {
					?>
					<li><a href="<?php echo esc_url( $instance['dribbble'] ); ?>" target="_blank"><i class="fab fa-dribbble"></i></a></li>
					<?php
				}
				?>
			</ul>
		</div>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['ab_image']  = ( ! empty( $new_instance['ab_image'] ) ) ? sanitize_text_field( $new_instance['ab_image'] ) : '';
		$instance['subtitle']  = ( ! empty( $new_instance['subtitle'] ) ) ? wp_kses_post( $new_instance['subtitle'] ) : '';
		$instance['text']      = ( ! empty( $new_instance['text'] ) ) ? wp_kses_post( $new_instance['text'] ) : '';
		$instance['facebook']  = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']   = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['linkedin']  = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		$instance['skype']     = ( ! empty( $new_instance['skype'] ) ) ? sanitize_text_field( $new_instance['skype'] ) : '';
		$instance['youtube']   = ( ! empty( $new_instance['youtube'] ) ) ? sanitize_text_field( $new_instance['youtube'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		$instance['behance']   = ( ! empty( $new_instance['behance'] ) ) ? sanitize_text_field( $new_instance['behance'] ) : '';
		$instance['dribbble']  = ( ! empty( $new_instance['dribbble'] ) ) ? sanitize_text_field( $new_instance['dribbble'] ) : '';

		return $instance;
	}

	public function form( $instance ) {
		$defaults = array(
			'title'     => esc_html__( 'About Author', 'yakeen-core' ),
			'subtitle'  => '',
			'text'      => '',
			'ab_image'  => '',
			'facebook'  => '',
			'twitter'   => '',
			'skype'     => '',
			'youtube'   => '',
			'linkedin'  => '',
			'pinterest' => '',
			'instagram' => '',
			'behance'   => '',
			'dribbble'  => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'     => array(
				'label' => esc_html__( 'Title', 'yakeen-core' ),
				'type'  => 'text',
			),
			'ab_image'  => array(
				'label' => esc_html__( 'Author', 'blogxer-core' ),
				'type'  => 'image',
			),
			'subtitle'  => array(
				'label' => esc_html__( 'Sub Title', 'yakeen-core' ),
				'type'  => 'text',
			),
			'text'      => array(
				'label' => esc_html__( 'Text', 'yakeen-core' ),
				'type'  => 'text',
			),
			'facebook'  => array(
				'label' => esc_html__( 'Facebook URL', 'yakeen-core' ),
				'type'  => 'url',
			),
			'twitter'   => array(
				'label' => esc_html__( 'Twitter URL', 'yakeen-core' ),
				'type'  => 'url',
			),
			'linkedin'  => array(
				'label' => esc_html__( 'LinkedIn URL', 'yakeen-core' ),
				'type'  => 'url',
			),
			'pinterest' => array(
				'label' => esc_html__( 'Pinterest URL', 'yakeen-core' ),
				'type'  => 'url',
			),
			'skype'     => array(
				'label' => esc_html__( 'Skype URL', 'yakeen-core' ),
				'type'  => 'url',
			),
			'youtube'   => array(
				'label' => esc_html__( 'Youtube URL', 'yakeen-core' ),
				'type'  => 'url',
			),
			'instagram' => array(
				'label' => esc_html__( 'Instagram URL', 'yakeen-core' ),
				'type'  => 'url',
			),
			'behance'   => array(
				'label' => esc_html__( 'Behance Plus URL', 'yakeen-core' ),
				'type'  => 'url',
			),
			'dribbble'  => array(
				'label' => esc_html__( 'Dribbble Plus URL', 'yakeen-core' ),
				'type'  => 'url',
			),
		);

		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}
