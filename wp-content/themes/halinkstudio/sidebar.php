<div class="sidebar sidebar-1 four columns" style="float: right;">
    <div class="widget-area clearfix ">
        <aside id="widget_mfn_menu-2" class="widget widget_mfn_menu">
            <div class="menu-menu-container">
                <ul id="menu-menu-1" class="menu submenus-show">
                    <?php halink_menu('menu-right'); ?>
                </ul>
            </div>
        </aside>

        <?php if (is_active_sidebar('sidebar')) :  ?>
            <?php dynamic_sidebar('sidebar'); ?>
        <?php endif; ?>
      
    </div>
</div>