<?php
class WG_Album extends WP_Widget {
    function __construct()
    {
        $widget_ops = array(
            'classname'                   => 'widget_package',
            'description'                 => __('Album ảnh mới nhất'),
            'customize_selective_refresh' => true,
        );
        parent::__construct('album', __('Album ảnh'), $widget_ops);
        $this->alt_option_name = 'WG_Album';
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
        $query = new WP_Query(array(
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
                        <div class="column mcb-column one column_column column-margin">
                            <div class="column_attr clearfix align_center">
                                <?= $before_title.$title; ?><strong><span style="color: #C49A6C;"> MỚI NHẤT</span></strong><?= $after_title; ?>
                                <hr class="hr_narrow  hr_color" style="margin: 0 auto 2px;">
                            </div>
                        </div>                    
                        <div class="column mcb-column one column_portfolio ">
                            <div class="column_filters">
                                <div class="portfolio_wrapper isotope_wrapper ">
                                    <ul class="portfolio_group lm_wrapper isotope col-4 grid">
                                        <?php while($query->have_posts()) : $query->the_post(); ?>
                                        <li class="portfolio-item isotope-item category-album has-thumbnail">
                                            <div class="portfolio-item-fw-bg">
                                                <div class="portfolio-item-fill"></div>
                                                <div class="list_style_header">
                                                    <h3 class="entry-title" itemprop="headline"><a class="link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <div class="links_wrapper"><a href="#" class="button button_js portfolio_prev_js"><span class="button_icon"><i class="icon-up-open"></i></span></a><a href="#" class="button button_js portfolio_next_js"><span class="button_icon"><i class="icon-down-open"></i></span></a><a href="<?php get_the_permalink(); ?>" class="button button_left button_theme button_js kill_the_icon"><span class="button_icon"><i class="icon-link"></i></span><span class="button_label">Read more</span></a></div>
                                                </div>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <div class="mask"></div>
                                                            <img src="<?php the_post_thumbnail(); ?>" class="scale-with-grid wp-post-image">
                                                        </a>
                                                        <div class="image_links double"><a href="<?= get_the_permalink(); ?>"><i class="icon-search"></i></a><a href="<?php get_the_permalink(); ?>" class="link"><i class="icon-link"></i></a></div>
                                                    </div>
                                                </div>
                                                <div class="desc">
                                                    <div class="title_wrapper">
                                                        <h5 class="entry-title" itemprop="headline"><a class="link" href="<?php the_permalink(); ?>" style="text-transform: uppercase;"><?php the_title(); ?></a></h5>
                                                        <div class="button-love"><a href="#" class="mfn-love " data-id="8081"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i><i class="icon-heart-fa"></i></span><span class="label">2</span></a></div>
                                                    </div>
                                                    <div class="details-wrapper">
                                                        <dl>
                                                            <dt>Date</dt>
                                                            <dd><?php the_modified_date(); ?></dd>
                                                        </dl>
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
        </div>
        <?php
    }
}
