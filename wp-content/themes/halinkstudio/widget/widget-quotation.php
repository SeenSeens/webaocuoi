<?php
class WG_Quotation extends WP_Widget
{
    function __construct()
    { 
        $widget_ops = array(
			'classname'                   => 'widget_quotation',
			'description'                 => __( 'Báo giá ưu đãi' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'quotation', __( 'Báo giá' ), $widget_ops );
        $this->alt_option_name = 'WG_Quotation';
    }
    function form($instance)
    { 
        $instance = wp_parse_args($instance);
        $title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $categories     = isset($instance['categories']) ? esc_attr($instance['categories']) : '';
        $number    = isset($instance['number']) ? absint($instance['number']) : 2;
        ?>
        <p>
            <label for="<?= $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" type="text" value="<?= $title; ?>" />
        </p>
        <p>
            <label for="<?= $this->get_field_id('categories'); ?>"><?php _e('Categories:'); ?></label>
            <select name="<?= $this->get_field_id('categories'); ?>" id="<?= $this->get_field_id('categories'); ?>" style='width:50%;margin-left:5px'>
                <option value="">Bất kỳ</option>
                <?php
                $taxonomy     = 'category';
                $orderby      = 'name';
                $show_count   = 0;
                $pad_counts   = 0;
                $hierarchical = 1;
                $title        = '';
                $empty        = 0;
                $args = array(
                    'taxonomy'     => $taxonomy,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'hide_empty'   => $empty
                );
                $all_categories = get_categories($args);
                foreach ($all_categories as $cat) {
                    $sl = "";
                    if ($cat->term_id == $categories) {
                        $sl = "selected";
                    }
                    echo "<option value=\"" . $cat->term_id . "\" $sl>" . $cat->name . "</option>";
                }
                ?>
            </select>
        </p>
        <p>
            <label for="<?= $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
            <input class="tiny-text" id="<?= $this->get_field_id('number'); ?>" name="<?= $this->get_field_name('number'); ?>" type="number" step="1" min="1" value="<?= $number; ?>" size="3" />
        </p>
        <?php
    }
    function update($new_instance, $old_instance)
    { 
        $instance              = $old_instance;
        $instance['title']     = sanitize_text_field($new_instance['title']);
        $instance['categories'] = $_POST[$this->get_field_id('categories')];
        $instance['number']    = (int)$new_instance['number'];
        return $instance;
    }
    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $categories = apply_filters('widget_categories', $instance['categories']);
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 2;
		if ( ! $number ) {
			$number = 2;
        }
        $service = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'cat' => $categories,
            'orderby' => 'ID',
            'order' => 'DESC',
            'posts_per_page' => $number
        ));
        ?>
        <div class="section mcb-section">
            <div class="section_wrapper mcb-section-inner">
                <div class="wrap mcb-wrap one valign-top clearfix">
                    <div class="mcb-wrap-inner">
                        <div class="column mcb-column one column_column  column-margin-0px">
                            <div class="column_attr clearfix align_center">
                            <?= $before_title.$title; ?><strong><span style="color: #C49A6C;">&nbsp;ƯU ĐÃI</span></strong><?= $after_title; ?>
                                <hr class="hr_narrow  hr_color" style="margin: 0 auto 2px;">
                                <br>
                            </div>
                        </div>
                        <?php 
                        while ($service->have_posts()) :
                            $service->the_post();
                            ?>
                            <div class="column mcb-column one-second column_sliding_box ">
                                <div class="sliding_box">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="photo_wrapper"><img class="scale-with-grid" src="<?php the_post_thumbnail(); ?>"></div>
                                        <div class="desc_wrapper">
                                            <h4 style="text-transform: uppercase;"><?= get_the_title() ;?></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?> 
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
