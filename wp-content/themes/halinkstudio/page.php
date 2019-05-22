<?php get_header(); ?>
<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="sections_group" style="width: 75%; float: left;">
            <div class="entry-content" itemprop="mainContentOfPage">
                <div class="section the_content has_content">
                    <div class="section_wrapper">
                        <div class="the_content_wrapper">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="section section-page-footer">
                    <div class="section_wrapper clearfix">
                        <div class="column one page-pager">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .four-columns - sidebar -->
        <?php get_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
