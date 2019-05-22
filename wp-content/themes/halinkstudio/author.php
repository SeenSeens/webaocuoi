<?php get_header(); ?>
<!-- mfn_hook_content_before -->
<!-- mfn_hook_content_before -->
<!-- #Content -->
<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
        <div class="sections_group">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('content', get_post_format());
                }
                halink_pagination();
            } else {
                get_template_part('content', 'none');
            }
            ?>
        </div>
        <!-- .four-columns - sidebar -->
    </div>
</div>

<!-- mfn_hook_content_after -->
<!-- mfn_hook_content_after -->
<?php get_footer(); ?>