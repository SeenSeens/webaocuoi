<?php
class WG_Post_Experience extends WP_Widget
{
    public function __construct() {
		$widget_ops = array(
			'classname'                   => 'WG_Post_Experience',
			'description'                 => __( 'Các bài viết hay nhất' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'post_experience', __( 'Bài biết hay nhất' ), $widget_ops );
		$this->alt_option_name = 'WG_Post_Experience';
	}
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Bài viết hay nhất' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$r = new WP_Query(
			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                    'orderby' => 'experience',
				),
				$instance
			)
		);
		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<aside id="widget_mfn_recent_posts" class="widget widget_mfn_recent_posts">
            <div class="Recent_posts">
                <ul>
                    <?php
                    if ( $title ) {
                        echo $args['before_title'] . $title . $args['after_title'];
                    }
                    ?>
                    <?php foreach ( $r->posts as $new_post ) : ?>
                        <?php
                        $post_title = get_the_title( $new_post->ID );
                        $title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
                        $post_thumbnail = get_the_post_thumbnail( $new_post->ID);
                        $images		= ( ! empty( $post_thumbnail ) ) ? $post_thumbnail : __('(no images)' );
                        ?>
                        <li class="post format">
                            <a href="<?php get_the_permalink( $new_post->ID ); ?>">
                                <div class="photo">
                                    <img class="scale-with-grid wp-post-image" src="<?= $images; ?>">
                                    <span class="c">0</span>
                                </div>
                                <div class="desc">
                                    <h6><?= $title; ?></h6>
                                    <?php if ( $show_date ) : ?>
                                    <span class="date"><i class="icon-clock"></i><?= get_the_date(); ?></span>
                                    <?php endif; ?>                      
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </aside>
		<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>

		<?php
	}
}
