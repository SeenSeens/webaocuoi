<div class="sections_group" style="width:75%; float: left;">
    <div class="no-title post type-post status-publish format-standard has-post-thumbnail hentry">
        <div class="section section-post-header">
            <div class="section_wrapper clearfix">
                <div class="column one post-nav ">
                    <ul class="next-prev-nav">
                        <li class="prev"><a class="button button_js" href=""><span class="button_icon"><i class="icon-left-open"></i></span></a></li>
                    </ul>
                </div>
                <div class="column one post-header">
                    <div class="button-love"><a href="#" class="mfn-love " data-id="<?php the_ID(); ?>"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i><i class="icon-heart-fa"></i></span><span class="label">0</span></a></div>
                    <div class="title_wrapper">
                        <div class="post-meta clearfix">
                            <div class="author-date">
                                <span class="vcard author post-author" itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                                    <span class="label">Published by</span>
                                    <i class="icon-user"></i>
                                    <span class="fn" itemprop="name"><a href=""><?php the_author(); ?></a></span>
                                </span>
                                <span class="date">
                                    <span class="label">at</span>
                                    <i class="icon-clock"></i>
                                    <time class="entry-date updated" datetime="<?= get_the_date(); ?>" itemprop="datePublished"><?= get_the_date(); ?></time>
                                    <meta itemprop="dateModified" content="<?= get_the_modified_date(); ?>">
                                </span>
                                <meta itemscope="" itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="https://google.com/article">
                                <div itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization" style="display:none;">
                                    <meta itemprop="name" content="">
                                    <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                                        <img src="<?= esc_url($custom_logo_url); ?>" itemprop="url" content="">
                                    </div>
                                </div>
                            </div>
                            <div class="category meta-categories">
                                <span class="cat-btn">Categories <i class="icon-down-dir"></i></span>
                                <div class="cat-wrapper">
                                    <ul class="post-categories">
                                        <?php if(!empty('the_category')) { ?>
                                            <li><a href="<?php the_permalink(); ?>" rel="category tag"><?php the_category(); ?></a></li>
                                        <?php } else { } ?>                                     
                                    </ul>
                                </div>
                            </div>
                            <div class="category mata-tags">
                                <span class="cat-btn">Tags <i class="icon-down-dir"></i></span>
                                <div class="cat-wrapper">
                                    <ul class="">
                                        <?php if(!empty('the_tags')) { ?>
                                            <li><a href="<?php the_permalink(); ?>" rel="category tag"><?php the_tags(); ?></a></li>
                                        <?php } else { } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column one single-photo-wrapper image">
                    <div class="share_wrapper">
                        <span class="st_facebook_vcount" displaytext="Facebook" st_processed="yes">
                            <span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton">
                                <div>
                                    <div class="stBubble" style="display: block;">
                                        <div class="stBubble_count">0</div>
                                    </div>
                                    <span class="stMainServices st-facebook-counter" style="background-image: url(&quot;https://ws.sharethis.com/images/2017/facebook_counter.png&quot;);">&nbsp;</span>
                                </div>
                            </span>
                        </span>
                        <span class="st_twitter_vcount" displaytext="Tweet" st_processed="yes">
                            <span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton">
                                <div>
                                    <div class="stBubble" style="display: block;">
                                        <div class="stBubble_count">0</div>
                                    </div>
                                    <span class="stMainServices st-twitter-counter" style="background-image: url(&quot;https://ws.sharethis.com/images/2017/twitter_counter.png&quot;);">&nbsp;</span>
                                </div>
                            </span>
                        </span>
                        <span class="st_pinterest_vcount" displaytext="Pinterest" st_processed="yes">
                            <span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton">
                                <div>
                                    <div class="stBubble" style="display: block;">
                                        <div class="stBubble_count">0</div>
                                    </div>
                                    <span class="stMainServices st-pinterest-counter" style="background-image: url(&quot;https://ws.sharethis.com/images/2017/pinterest_counter.png&quot;);">&nbsp;</span>
                                </div>
                            </span>
                        </span>
                        <script src="https://ws.sharethis.com/button/buttons.js"></script>
                        <script>
                            stLight.options({
                                publisher: "1390eb48-c3c3-409a-903a-ca202d50de91",
                                doNotHash: false,
                                doNotCopy: false,
                                hashAddressBar: false
                            });
                        </script>
                    </div>
                    <div class="image_frame scale-with-grid ">
                        <div class="image_wrapper">
                            <a href="<?php get_the_permalink(the_post_thumbnail()); ?>" rel="prettyphoto">
                                <div class="mask"></div>
                                <img width="1200" height="480" src="<?php the_post_thumbnail(); ?>" class="scale-with-grid wp-post-image" alt="" itemprop="image">
                            </a>
                            <div class="image_links"><a href="<?php get_the_permalink(); ?>" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-wrapper-content">
            <div class="section the_content has_content">
                <div class="section_wrapper">
                    <div class="the_content_wrapper">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="section section-post-footer">
                <div class="section_wrapper clearfix">
                    <div class="column one post-pager">
                    </div>
                </div>
            </div>
            <div class="section section-post-about">
                <div class="section_wrapper clearfix">
                    <div class="column one author-box">
                        <div class="author-box-wrapper">
                            <div class="avatar-wrapper">
                                <img alt="admin" src="https://secure.gravatar.com/avatar/1cc4ea3f27bf5da98a431261647ab567?s=64&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/1cc4ea3f27bf5da98a431261647ab567?s=128&amp;d=mm&amp;r=g 2x" class="avatar avatar-64 photo" height="64" width="64">
                            </div>
                            <div class="desc-wrapper">
                                <h5><a href=""><?php the_author(); ?></a></h5>
                                <div class="desc"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part( 'template-parts/content/content', 'related' ); ?> 
        <div class="section section-post-comments">
            <div class="section_wrapper clearfix">
                <div class="column one comments">
                    <div id="comments">
                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Trả lời <small><a rel="nofollow" id="cancel-comment-reply-link" href="/chup-anh-cuoi-dep-tai-studio-dep-lung-linh-tiet-kiem-chi-phi-toi-da/#respond" style="display:none;">Hủy</a></small></h3>
                            <?php echo do_shortcode('[contact-form-7 id="259" title="Bình luận"]'); ?>
                        </div>
                        <!-- #respond -->
                    </div>
                    <!-- #comments -->
                </div>
            </div>
        </div>
    </div>
</div>