<?php get_header(); ?>
<div id="Content">
	<div class="content_wrapper clearfix">
		<!-- .sections_group -->
		<div class="sections_group">
			<div class="entry-content" itemprop="mainContentOfPage">
				<?php if (is_active_sidebar('home')) :  ?>
					<?php dynamic_sidebar('home'); ?>
				<?php endif; ?>		
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
<?php get_footer(); ?>