<?php get_header(); ?>
<div id="Content">
    <div class="content_wrapper clearfix">
        <?php if (have_posts()) : ?>
        <div class="sections_group" style="width:75%; float: left;">
            <div class="no-title post type-post status-publish format-standard has-post-thumbnail hentry">
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

                    <div class="section section-post-intro-share">
                        <div class="section_wrapper clearfix">
                            <div class="column one">

                                <div class="share_wrapper clearfix">
                                    <span class="st_facebook_vcount" displaytext="Facebook" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton">
                                            <div>
                                                <div class="stBubble" style="display: block;">
                                                    <div class="stBubble_count">178</div>
                                                </div><span class="stMainServices st-facebook-counter" style="background-image: url(&quot;https://ws.sharethis.com/images/2017/facebook_counter.png&quot;);">&nbsp;</span>
                                            </div>
                                        </span>
                                    </span>
                                    <span class="st_twitter_vcount" displaytext="Tweet" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton">
                                            <div>
                                                <div class="stBubble" style="display: block;">
                                                    <div class="stBubble_count">1</div>
                                                </div><span class="stMainServices st-twitter-counter" style="background-image: url(&quot;https://ws.sharethis.com/images/2017/twitter_counter.png&quot;);">&nbsp;</span>
                                            </div>
                                        </span>
                                    </span>
                                    <span class="st_pinterest_vcount" displaytext="Pinterest" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton">
                                            <div>
                                                <div class="stBubble" style="display: block;">
                                                    <div class="stBubble_count">0</div>
                                                </div><span class="stMainServices st-pinterest-counter" style="background-image: url(&quot;https://ws.sharethis.com/images/2017/pinterest_counter.png&quot;);">&nbsp;</span>
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

                            </div>
                        </div>
                    </div>

                    <div class="section section-post-about">
                        <div class="section_wrapper clearfix">

                            <div class="column one author-box">
                                <div class="author-box-wrapper">
                                    <div class="avatar-wrapper">
                                        <img alt="admin" src="https://secure.gravatar.com/avatar/1cc4ea3f27bf5da98a431261647ab567?s=64&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/1cc4ea3f27bf5da98a431261647ab567?s=128&amp;d=mm&amp;r=g 2x" class="avatar avatar-64 photo" height="64" width="64"> </div>
                                    <div class="desc-wrapper">
                                        <h5><a href="https://loustudio.vn/author/admin/"><?php the_author(); ?></a></h5>
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
                                    <h3 id="reply-title" class="comment-reply-title">Trả lời <small><a rel="nofollow" id="cancel-comment-reply-link" href="/trang-diem-co-dau-tai-loustudio/#respond" style="display:none;">Hủy</a></small></h3>
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
        <?php endif; ?>
        <!-- .sections_group -->
        
        <!-- .four-columns - sidebar -->
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>