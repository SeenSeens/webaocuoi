<?php get_header(); ?>
<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
        <div class="sections_group">
            <div class="extra_content">
            </div>
            <div class="section full-width">
                <div class="section_wrapper clearfix">
                    <div class="column one column_blog">
                        <div class="blog_wrapper isotope_wrapper">
                            <div class="posts_group lm_wrapper masonry tiles col-3 isotope">
                            <?php
                                $service = new WP_Query(array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'cat' => 19,
                                    'orderby' => 'ID',
                                    'order' => 'DESC',
                                ));
                                if (have_posts()) :
                                    while ($service->have_posts()) :
                                        $service->the_post();
                                        ?>
                                        <div class="post-item isotope-item clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
                                            <div class="date_label"><?php get_the_modified_date(); ?></div>
                                            <div class="post-photo-wrapper scale-with-grid">
                                                <div class="image_wrapper_tiles"><img src="<?php the_post_thumbnail(); ?>"></div>
                                            </div>
                                            <div class="post-desc-wrapper">
                                                <div class="post-desc">
                                                    <div class="post-head">
                                                        <div class="post-meta clearfix">
                                                            <div class="author-date">
                                                                <span class="vcard author post-author"><span class="label">Published by </span><i class="icon-user"></i> <span class="fn"><a href=""><?php the_author(); ?></a></span></span> <span class="date"><span class="label">at </span><i class="icon-clock"></i> <span class="post-date updated"><?= get_the_modified_date(); ?></span></span>
                                                                <div class="post-links"><i class="icon-comment-empty-fa"></i> <a href="" class="post-comments">0</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-title">
                                                        <h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" style="text-transform: uppercase;"><?php the_title(); ?></a></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                    wp_reset_query();
                                else : get_template_part('template-parts/content/content', 'none');
                                endif;
                                ?>                                 
                            </div>
                            <!-- Phân trang -->
                            <div class="column one pager_wrapper">
                                <div class="pager">
                                <?php halink_pagination(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .four-columns - sidebar -->
    </div>
</div>
<?php get_footer(); ?>