<?php
class WG_Footer1 extends WP_Widget
{
    // Thông tin widget
    public function __construct()
    {
        parent::__construct(
            'WG_Footer1', esc_html_x('Widget footer', 'widget name', 'halink'),
            array(
                'classname' => 'WG_Footer1',
                'description' => esc_html__('Widget tự tạo', 'halink'),
                'customize_selective_refresh' => true
            )
        );
    }

    // Hiển thị widget
    public function widget($args, $instance)
    {
        extract($args);
        $address = apply_filters('widget_address', $instance['address']);
        $hotline = apply_filters('widget_hotline', $instance['hotline']);
        $comments = apply_filters('widget_comments', $instance['comments']);
        $email = apply_filters('widget_email', $instance['email']);
        $website = apply_filters('widget_website', $instance['website']);
        //echo $before_widget;
        ?>
        <div class="column one-third">
            <aside id="" class="widget widget_text">
                <div class="">
                    <p>
                        <img class="alignnone size-medium wp-image-6869" src="<?= bloginfo('template_directory')?>/images/300x200.png" alt="" width="144" height="100">
                    </p>
                </div>
                <div class="list-contact">
                    <ul>
                        <li><strong>Địa chỉ:</strong> <?= $address; ?></li>
                        <li><strong>Hotline:</strong>&nbsp; <?= $hotline; ?></li>
                        <li><strong>Đóng góp ý kiến:&nbsp;</strong><?= $comments; ?></li>
                        <li><strong>Email:</strong><?= $email; ?></li>
                        <li><strong>Website:</strong><?= $website; ?></li>
                    </ul>
                </div>
            </aside>
        </div>
        <?php
        //echo $after_widget;
    }

    // Thiết lập trường nhập liệu
    public function form($instance)
    {
        $defaults = array(
            'address' => 'Hãy nhập nội dung',
            'hotline' => 'Hãy nhập nội dung',
            'comments' => 'Hãy nhập nội dung',
            'email' => 'Hãy nhập nội dung',
            'website ' => 'https://halink.vn/'
        );
        $instance = wp_parse_args($instance, $defaults);
        // Loại bỏ những ký tự đặc biệt
        $address = esc_attr($instance['address']);
        $hotline = esc_attr($instance['hotline']);
        $comments = esc_attr($instance['comments']);
        $email = esc_attr($instance['email']);
        $website = esc_attr($instance['website']);
        ?>
        Nhập địa chỉ <br>
        <input type="text" class="widefat" name="<?= $this->get_field_name('address')?>" value="<?= $address ?>">
        Nhập hotline <br>
        <input type="text" class="widefat" name="<?= $this->get_field_name('hotline')?>" value="<?= $hotline ?>">
        Đóng góp ý kiến <br>
        <input type="text" class="widefat" name="<?= $this->get_field_name('comments')?>" value="<?= $comments ?>">
        Email <br>
        <input type="text" class="widefat" name="<?= $this->get_field_name('email')?>" value="<?= $email ?>">
        Website <br>
        <input type="text" class="widefat" name="<?= $this->get_field_name('website')?>" value="<?= $website ?>">
        <?php
    }

    // Lưu dữ liệu
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['address'] = $new_instance['address'];
        $instance['hotline'] = $new_instance['hotline'];
        $instance['comments'] = $new_instance['comments'];
        $instance['email'] = $new_instance['email'];
        $instance['website'] = $new_instance['website'];
        return $instance;
    }
}
add_action('widgets_init', function () {
    register_widget('WG_Footer1');
});