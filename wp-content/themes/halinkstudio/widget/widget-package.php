<?php
class WG_Package extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array(
            'classname'                   => 'widget_package',
            'description'                 => __('Gói chụp tại lou studio'),
            'customize_selective_refresh' => true,
        );
        parent::__construct('package', __('Gói chụp'), $widget_ops);
        $this->alt_option_name = 'WG_Package';
    }
    function form($instance)
    { 
        $instance = wp_parse_args($instance);
        $title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $categories     = isset($instance['categories']) ? esc_attr($instance['categories']) : '';
        $number    = isset($instance['number']) ? absint($instance['number']) : 5;
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
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
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
                <div class="wrap mcb-wrap one  valign-top clearfix">
                    <div class="mcb-wrap-inner">
                        <div class="column mcb-column one column_column column-margin">
                            <div class="column_attr clearfix align_center">
                                <?= $before_title.$title; ?><strong><span style="color: #C49A6C;">&nbsp;LOUSTUDIO</span></strong><?= $after_title; ?>
                                <hr class="hr_narrow hr_color" style="margin: 0 auto 2px;">
                                <br>
                                <h6>Nơi đâu sẽ biến giấc mơ thời thiếu nữ được đắm chìm trong hoa cỏ và nắm chặt tay người mình yêu trở thành sự thật? Nha Trang thơ mộng với bãi biển dài cát trắng, Đà Nẵng thiên đường du lịch nghỉ mát, Hay Phú Quốc – đảo ngọc hoang sơ bậc nhất Việt Nam.</h6></div>
                        </div>
                        <?php 
                        while ($service->have_posts()) :
                            $service->the_post();
                            ?>
                        <div class="column mcb-column one-fifth column_trailer_box">
                            <div class="trailer_box">
                                <a href="<?php the_permalink(); ?>">
                                    <img style="height: 200px;" class="scale-with-grid rounded-corners" src=<?php the_post_thumbnail(); ?>
                                    <div class="desc">
                                        <h2>ĐÀ NẴNG</h2>
                                        <div class="line"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <div class="column mcb-column one-fifth column_placeholder">
                            <div class="placeholder">&nbsp;</div>
                        </div>
                        <div class="column mcb-column three-fifth column_column column-margin-">
                            <div class="column_attr clearfix align_center">
                                <h6>Dù là ở đâu, <b><a href="<?php bloginfo('url'); ?>">Lou Studio</a> </b>vẫn luôn đồng hành cùng bạn đi qua những phút giây hạnh phúc nhất cuộc đời, bắt trọn những khoảnh khắc hạnh phúc nhất của lứa đôi.</h6>
                            </div>
                        </div>
                        <div class="column mcb-column one-fifth column_placeholder">
                            <div class="placeholder">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
