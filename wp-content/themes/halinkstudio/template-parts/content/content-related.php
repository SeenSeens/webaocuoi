<div class="section section-post-related">
    <div class="section_wrapper clearfix">
        <div class="section-related-adjustment ">
            <h4>Related posts</h4>
            <div class="section-related-ul col-3">
                <?php
                $args = array(
                    'post__not_in' => array(get_the_ID()),
                    //'cat' => 17, 20, 16, 22, 24, 23, 18, 19, 21,
                    'posts_per_page' => 3,
                    'orderby' => 'related',
                    'post_type' => 'post',
                    'post_status' => 'publish'
                );
                $query = new WP_Query($args);
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="column post-related post-<?php the_ID(); ?> post type-post status-publish format-standard has-post-thumbnail hentry">
                        <div class="single-photo-wrapper image">
                            <div class="image_frame scale-with-grid">
                                <div class="image_wrapper">
                                    <a href="<?php the_title(); ?>">
                                        <div class="mask"></div>
                                        <img src="<?php the_post_thumbnail(); ?>" class="scale-with-grid wp-post-image">
                                    </a>
                                    <div class="image_links double"><a href="<?php get_the_permalink(); ?>" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a><a href="<?php the_permalink(); ?>" class="link"><i class="icon-link"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="date_label"><?php the_date(); ?></div>
                        <div class="desc">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <hr class="hr_color">
                            <a href="<?php the_permalink(); ?>" class="button button_left button_js kill_the_icon"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                        </div>
                    </div>
                <?php endwhile;
            wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>