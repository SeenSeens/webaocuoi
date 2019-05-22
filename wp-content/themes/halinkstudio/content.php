<div id="post-<?php the_ID();?>" class="<?php post_class(); ?>">
    <div class="entry-thumbnail">
        <?php halink_thumbnail('thumbnail'); ?>
    </div>
    <div class="entry-header">
        <?php
        halink_entry_header();
        halink_entry_meta();
        ?>
    </div>
    <div class="entry-content">
        <?php halink_entry_content(); ?>
        <?php (is_single() ? halink_entry_tag() : ''); ?>
    </div>
</div>

