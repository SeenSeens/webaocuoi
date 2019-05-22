<?php get_header(); ?>
<!-- mfn_hook_content_before -->
<!-- mfn_hook_content_before -->
<!-- #Content -->
<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
        <div class="">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('content', get_post_format());
                }
                halink_pagination();
            } else {
                get_template_part('template-parts/content/content', 'none');
            }
            ?>
            <div class="entry-content" itemprop="mainContentOfPage">
                <div class="section mcb-section" style="padding-top:0px; padding-bottom:0px; background-color:">
                    <div class="section_wrapper mcb-section-inner"></div>
                </div>
                <div class="section mcb-section" style="padding-top:0px; padding-bottom:0px; background-color:">
                    <div class="section_wrapper mcb-section-inner"></div>
                </div>
                <div class="section the_content no_content">
                    <div class="section_wrapper">
                        <div class="the_content_wrapper"></div>
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
    </div>
</div>

<!-- mfn_hook_content_after -->
<!-- mfn_hook_content_after -->
<?php get_footer(); ?>