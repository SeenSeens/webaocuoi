<?php
class WG_Footer2 extends WP_Widget
{
    // Thông tin widget
    public function __construct()
    {
        parent::__construct(
            'WG_Footer2', esc_html_x('Widget footer 2', 'widget name', 'halink'),
            array(
                'classname' => 'WG_Footer2',
                'description' => 'Widget tự định nghĩa',
                'customize_selective_refresh' => true
            )
        );
    }

    // Hiển thị widget
    public function widget($args, $instance)
    {
        extract($args);
        $image = apply_filters('widget_image_uri', $instance['image_uri']);
        echo $before_widget;
        ?>
        <!-- <aside id="text-3" class="widget widget_text">
        <h4>KẾT NỐI VỚI LOUSTUDIO</h4>
        <div class="textwidget">
            <p>
                <a href="https://www.facebook.com/LouStudio.vn">
                    <img class="alignnone wp-image-126 size-full" src="<?= $image_uri; ?>" alt="" width="64" height="64"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.flickr.com/photos/january11_tml/page1">
                    <img class="alignnone wp-image-127 size-full" src="<?= $image_uri; ?>" alt="" width="64" height="64"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.instagram.com/lou.studio/">
                    <img class="alignnone wp-image-128 size-full" src="<?= $image_uri; ?>" alt="" width="64" height="64">
                </a>
            </p>
        </div>
        </aside> -->
        <?php
        echo $after_widget;
    }

    // Thiết lập trường nhập liệu
    public function form($instance)
    {
        $defaults = array(
            'image_uri' => '',
        );
        $instance = wp_parse_args($instance, $defaults);
        ?>
        <p>
            <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image1</label>
            <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
            <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
            <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
        </p>
        <p>
            <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image2</label>
            <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
            <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
            <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
        </p>
        <p>
            <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image3</label>
            <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
            <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
            <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
        </p>
        <?php
    }

    // Lưu dữ liệu
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        return $instance;
    }
}
// add_action('widgets_init', function () {
//     register_widget('footer2_Widget');
// });