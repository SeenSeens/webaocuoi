<?php
class WG_Service extends WP_Widget {
    public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_service',
			'description'                 => __( 'Các dịch vụ tại loustudio' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'service', __( 'Dịch vụ' ), $widget_ops );
        $this->alt_option_name = 'WG_Service';
    }
    
    public function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $args = array(
            'type'      => 'post',
            'child_of'  => 0,
            'parent'    => '16'
        );
        $categories = get_categories( $args );
        if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Dịch vụ tại lou studio' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        ?>
        <div class="column mcb-column one column_column  column-margin-0px">
            <div class="column_attr clearfix align_center">
            <?= $before_title.$title; ?><strong><span style="color: #C49A6C;">&nbsp;LOUSTUDIO</span></strong><?= $after_title; ?>
                <hr class="hr_narrow  hr_color" style="margin: 0 auto 2px;"> <br>
            </div>
        </div>  
        <div class="section mcb-section">
            <div class="section_wrapper mcb-section-inner">
                <div class="wrap mcb-wrap one valign-top clearfix">
                    <div class="mcb-wrap-inner">
                    <?php
                    foreach ( $categories as $category ) { ?>                               
                        <div class="column mcb-column one-third column_sliding_box ">
                            <div class="sliding_box">
                                <a href="<?= get_term_link($category->term_id, 'category'); ?>">
                                    <div class="photo_wrapper"><img src="<?= z_taxonomy_image_url($category->term_id); ?>"/></div>
                                    <div class="desc_wrapper">
                                        <h4 style="text-transform: uppercase;"><?= $category->name; ?></h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		return $instance;
    }
}