<?php get_header(); ?>
<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
        <div class="sections_group">
            <div class="extra_content">
                <div class="section the_content has_content">
                    <div class="section_wrapper">
                        <div class="the_content_wrapper">
                            <p style="text-align: justify;">Để có được một album ảnh cưới đẹp thì ngoài cách trang điểm, tạo mẫu, váy cưới, áo dài ra còn cần cái thần thái , sự tự tin. Có được điều này dĩ nhiên bạn phải có sự chuẩn bị tâm lý từ trước. Phải chịu khó tham khảo các bậc ” anh chị” đi trước về cái phong cách, tạo dáng, tạo hình như thế nào. Và tôi tin rằng với những bức ảnh cưới đẹp nhất Việt Nam – <strong><a href="<?php the_permalink('the_category'); ?>">Album hình cưới đẹp</a></strong> nhất Việt Nam.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="section_wrapper clearfix">
                    <div class="column one column_portfolio">
                        <div class="portfolio_wrapper isotope_wrapper">
                            <ul class="portfolio_group lm_wrapper isotope grid col-3">
                                <?php
                                /* $service = new WP_Query(array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'cat' => 17,
                                    'orderby' => 'ID',
                                    'order' => 'DESC',
                                )); */
                                if (have_posts()) :
                                    while (have_posts()) :
                                        the_post();
                                        ?>
                                        <li class="portfolio-item isotope-item has-thumbnail">
                                            <div class="portfolio-item-fw-bg">
                                                <div class="portfolio-item-fill"></div>
                                                <div class="list_style_header">
                                                    <h3 class="entry-title" itemprop="headline" ><a class="link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                </div>
                                                <div class="image_frame scale-with-grid">
                                                    <div class="image_wrapper">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <div class="mask"></div>
                                                            <img style="height: 20em;" class="responsive" src="<?php the_post_thumbnail(); ?>">
                                                        </a>
                                                        <div class="image_links double"><a href="<?php get_the_permalink(); ?>" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a><a href="<?php the_permalink(); ?>" class="link"><i class="icon-link"></i></a></div>
                                                    </div>
                                                </div>
                                                <div class="desc">
                                                    <div class="title_wrapper">
                                                        <h5 class="entry-title" itemprop="headline"><a class="link" href="<?php the_permalink(); ?>" style="text-transform: uppercase;"><?php the_title(); ?></a></h5>
                                                        <div class="button-love"><a href="#" class="mfn-love " data-id="<?php the_ID(); ?>"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i><i class="icon-heart-fa"></i></span><span class="label">1</span></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    endwhile;
                                    wp_reset_query();
                                else : get_template_part('template-parts/content/content', 'none');
                                endif;
                            ?>
                            </ul>
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