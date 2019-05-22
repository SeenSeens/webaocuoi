<div id="post-<?php the_ID();?>" class="<?php post_class(); ?>">
    <div class="entry-header">
        <?php
        halink_entry_header();
        ?>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php (is_single() ? halink_entry_tag() : ''); ?>
    </div>
</div>