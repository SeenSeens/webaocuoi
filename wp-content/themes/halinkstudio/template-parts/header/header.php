<div id="Header_wrapper">
    <!-- #Header -->
    <header id="Header">
        <div id="Action_bar">
            <div class="container">
                <div class="column one">
                    <ul class="contact_details"></ul>
                    <ul class="social"></ul>
                </div>
            </div>
        </div>

        <!-- .header_placeholder 4sticky  -->   
        <div class="header_placeholder"></div>

        <div id="Top_bar" class="is-sticky" style="top: 61px;">
            <div class="container">
                <div class="column one">
                    <div class="top_bar_left clearfix" style="width: 1129px;">
                        <!-- Logo -->
                        <div class="logo" style="margin: auto">
                            <?php halink_logo_view(); ?>
                        </div>
                        <div class="menu_wrapper">
                            <nav id="menu" class="menu-menu-container">
                                <?php halink_menu('header-menu') ?>
                            </nav>
                            <a class="responsive-menu-toggle " href="#">
                                <i class="icon-menu-fine"></i>
                            </a>
                        </div>
                        <div class="search_wrapper">
                            <!-- #searchform -->
                            <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
                                <i class="icon_search icon-search-fine"></i>
                                <a href="#" class="icon_close"><i class="icon-cancel-fine"></i></a>
                                <input type="text" class="field" name="s" id="s" placeholder="Enter your search">
                                <input type="submit" class="submit" value="" style="display:none;">
                            </form>
                        </div>
                    </div>

                    <div class="top_bar_right">
                        <div class="top_bar_right_wrapper"><a id="search_button" href="#"><i class="icon-search-fine"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

<?php if(is_single()) : ?>
<div id="Intro" class="">
    <div class="intro-inner">
        <h1 class="intro-title"><?php the_title(); ?></h1>
        <div class="intro-meta">
            <div class="author">
                <i class="icon-user"></i>
                <span><a href=""><?php the_author(); ?></a></span>
            </div>
            <div class="date">
                <i class="icon-clock"></i>
                <span><?= get_the_modified_date(); ?></span>
            </div>
            <div class="categories">
                <i class="icon-docs"></i>
                <span><a href=""><?php the_category(); ?></a></span>					
            </div>
        </div>
    </div>
    <div class="intro-next"><i class="icon-down-open-big"></i></div>
</div>
<?php endif; ?>

<?php
if(have_posts()) :
    echo do_shortcode('[metaslider id="62"]');    
endif;
?>
