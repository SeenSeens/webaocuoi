<?php get_header(); ?>
<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content/content', 'single');
                        //comments_template();
                    }
                } else {
                    get_template_part('template-parts/content/content', 'none');
                }
            ?>

        <!-- .four-columns - sidebar -->
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>