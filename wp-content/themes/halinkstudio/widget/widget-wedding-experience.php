<?php
class WG_Wedding_Experience extends WP_Widget
{
    function __construct()
    { 
        $widget_ops = array(
			'classname'                   => 'widget_wedding_experience',
			'description'                 => __( 'Kinh nghiệm cưới' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'wedding_experience', __( 'Kinh nghiệm cưới' ), $widget_ops );
        $this->alt_option_name = 'WG_Wedding_Experience';
    }
    function form($instance)
    { 
        $instance = wp_parse_args($instance);
        $title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $categories     = isset($instance['categories']) ? esc_attr($instance['categories']) : '';
        $number    = isset($instance['number']) ? absint($instance['number']) : '';
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
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : '';
		if ( ! $number ) {
			$number = 1;
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
                        <div class="column mcb-column one column_column column-margin-0px">
                            <div class="column_attr clearfix align_center" style="">
                            <?= $before_title.$title; ?><strong><span style="color: #C49A6C;">&nbsp;CƯỚI</span></strong><?= $after_title; ?>
                                <hr class="hr_narrow hr_color" style="margin: 0 auto 2px;">
                                <br>
                            </div>
                        </div>
                        <div class="column mcb-column one column_blog_teaser ">
                            <div class="blog-teaser ">
                                <ul class="teaser-wrapper">
                                <?php 
                                while ($service->have_posts()) :
                                    $service->the_post();
                                    ?>
                                    <li class="post type-post status-publish format-standard has-post-thumbnail hentry">
                                        <div class="photo-wrapper scale-with-grid"><img src="<?= get_the_post_thumbnail(); ?>"></div>
                                        <div class="desc-wrapper">
                                            <div class="desc">
                                                <div class="post-meta clearfix"><span class="author"><span class="label">Published by </span><i class="icon-user"></i> <a href=""><?= get_the_author(); ?></a></span> <span class="date"><span class="label">at </span><i class="icon-clock"></i> <span class="post-date"><?= get_the_modified_date(); ?></span></span><span class="comments"><i class="icon-comment-empty-fa"></i> <a href="" class="post-comments">0</a></span></div>
                                                <div class="post-title">
                                                    <h3><a href="<?php the_permalink(); ?>" style="text-transform: uppercase;"><?php the_title(); ?></a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endwhile; ?> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
