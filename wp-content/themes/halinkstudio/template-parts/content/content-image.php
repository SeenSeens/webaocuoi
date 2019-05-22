<div id="post-<?php the_ID();?>" class="<?php post_class(); ?>">
    <div class="entry-thumbnail">
        <?php halink_thumbnail('large'); ?>
    </div>
    <div class="entry-header">
        <?php 
        halink_entry_header();
        $attachment = get_children(array('post_perent' => $post->ID));
        $attachment_number = count($attachment);
        printf(__('This image post contains %1$s photo', 'halink'), $attachment_number);
        ?>
    </div>
    <div class="entry-content">
        <?php halink_entry_content(); ?>
        <?php (is_single() ? halink_entry_tag() : ''); ?>
    </div>
</div>