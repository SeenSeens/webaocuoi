<?php get_header(); ?>
<!-- mfn_hook_content_before -->
<!-- mfn_hook_content_before -->
<!-- #Content -->
<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
        <div class="sections_group">
            <div class="archive-title">
                <?php
                if (is_tag()) : printf(__('Posts tagged: %1$s', 'halink'), single_cat_title('', false));
                elseif (is_category()) : printf(__('Posts categorized: %1$s', 'halink'), single_cat_title('', false));
                elseif (is_day()) : printf(__('Daily Archives: %1$s', 'halink'), get_the_time('l, F j, Y'));
                elseif (is_month()) : printf(__('Monthly Archives: %1$s', 'halink'), get_the_time('F Y'));
                elseif (is_year()) : printf(__('Yearly Archives: %1$s', 'halink'),get_the_time('Y'));
                endif;
                ?>
            </div>
            <?php if(is_tag() || is_category()) { ?>
                <div class="archive-description"><?= term_description(); ?></div>
            <?php } ?>
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