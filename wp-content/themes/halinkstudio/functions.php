<?php
/**
 * THEME_URL => Lấy đường dẫn thư mục theme
 * CORE => Lấy đường dẫn thư mục core
 */
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");
/**
 * Nhúng file /core/init.php
 */
require_once CORE . "/init.php";
/**
 * Khai báo chức năng của theme
 */
if (!file_exists('halinkstudio_theme_setup')) :
	function halinkstudio_theme_setup()
	{
		/**
		 * Thiết lập textdomain
		 */
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain('halink', $language_folder);
		/**
		 * Tự động thêm link RSS lên <head>
		 */
		add_theme_support('automatic-feed-link');
		/**
		 * Post thumbnails
		 */
		add_theme_support('post-thumbnails');
		/**
		 * Post format
		 */
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
		));
		/**
		 * Title tag
		 */
		add_theme_support('title-tag');
		/**
		 * Custom background
		 */
		$default_background = array(
			'default-color' => '#FFFFFF'
		);
		add_theme_support('custom-background', $default_background);
		/**
		 * Menu
		 */
		register_nav_menu('header-menu', __('Menu chính', 'halink'));
		register_nav_menu('menu-right', __('Menu phải', 'halink'));
		/**
		 * Side bar
		 */
		register_sidebar(
			array(
				'name'          => __( 'Trang chủ', 'halink' ),
				'id'            => 'home',
				'description'   => __( 'Add widgets here to appear in your home', 'halink' ),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2 style="font-size:30px; text-transform: uppercase;">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => __('Sidebar', 'halink'),
				'id'            => 'sidebar',
				'class'			=> '',
				'description'   => __('Add widgets here to appear in your sidebar.', 'halink'),
				'before_title'  => '<h3 style="text-transform: uppercase;">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => __('Footer', 'halink'),
				'id'            => 'sidebar-footer',
				'class'			=> '',
				'description'   => __('Add widgets here to appear in your sidebar footer.', 'halink'),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h4>',
				'after_title'   => '</h4>',
			)
		);
		register_sidebar(
			array(
				'name'          => __('Service', 'halink'),
				'id'            => 'service',
				'class'			=> '',
				'description'   => __('Dịch vụ', 'halink'),
				'before_widget' => '<div class="column mcb-column one-third column_sliding_box"><div class="sliding_box">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h4>',
				'after_title'   => '</h4>',
			)
		);
	}
	add_action('init', 'halinkstudio_theme_setup');
endif;

/**
 * Nhúng tệp tin css
 */
if (!file_exists('halink_style')) :
	function halink_style()
	{
		/*========== css ==========*/
		wp_register_style('css-normalize', get_template_directory_uri()."/css/normalize.css", 'all');
		wp_enqueue_style('css-normalize');
		// wp_register_style('css-bootstrap', get_template_directory_uri()."/bootstrap/css/bootstrap.min.css", 'all');
		// wp_enqueue_style('css-bootstrap');
		wp_register_style('css-animations', get_template_directory_uri()."/css/animations.min.css", 'all');
		wp_enqueue_style('css-animations');
		wp_register_style('css-base', get_template_directory_uri()."/css/base.css", 'all');
		wp_enqueue_style('css-base');
		wp_register_style('css-jplayer', get_template_directory_uri()."/css/jplayer.blue.monday.css", 'all');
		wp_enqueue_style('css-jplayer');
		wp_register_style('css-jquery', get_template_directory_uri()."/css/jquery.ui.all.css", 'all');
		wp_enqueue_style('css-jquery');
		wp_register_style('css-layout', get_template_directory_uri()."/css/layout.css", 'all');
		wp_enqueue_style('css-layout');
		wp_register_style('css-carousel', get_template_directory_uri()."/css/owl.carousel.css", 'all');
		wp_enqueue_style('css-carousel');
		wp_register_style('css-theme', get_template_directory_uri()."/css/owl.theme.css", 'all');
		wp_enqueue_style('css-theme');
		wp_register_style('css-prettyPhoto', get_template_directory_uri()."/css/prettyPhoto.css", 'all');
		wp_enqueue_style('css-prettyPhoto');
		wp_register_style('css-responsive', get_template_directory_uri()."/css/responsive.css", 'all');
		wp_enqueue_style('css-responsive');
		wp_register_style('css-shortcodes', get_template_directory_uri()."/css/shortcodes.css", 'all');
		wp_enqueue_style('css-shortcodes');
		wp_register_style('css-custom', get_template_directory_uri()."/css/custom.css", 'all');
		wp_enqueue_style('css-custom');
		wp_register_style('css-style', get_template_directory_uri()."/style.css", 'all');
		wp_enqueue_style('css-style');
		
		/*========== js ==========*/
		// wp_register_script('js-bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', array('jquery'));
		// wp_enqueue_script('js-bootstrap');
		wp_register_script('js-animations', get_template_directory_uri().'/js/animations.min.js', array('jquery'));
		wp_enqueue_script('js-animations');
		wp_register_script('js-jplayer', get_template_directory_uri().'/js/jplayer.min.js', array('jquery'));
		wp_enqueue_script('js-jplayer');
		wp_register_script('js-menu', get_template_directory_uri().'/js/menu.js', array('jquery'));
		wp_enqueue_script('js-menu');
		wp_register_script('js-carousel', get_template_directory_uri().'/js/owl.carousel.js', array('jquery'));
		wp_enqueue_script('js-carousel');
		wp_register_script('js-plugins', get_template_directory_uri().'/js/plugins.js', array('jquery'));
		wp_enqueue_script('js-plugins');
		wp_register_script('js-scripts', get_template_directory_uri().'/js/scripts.js', array('jquery'));
		wp_enqueue_script('js-scripts');
		wp_register_script('js-translate3d', get_template_directory_uri().'/js/translate3d.js', array('jquery'));
		wp_enqueue_script('js-translate3d');
		wp_register_script('js-custom', get_template_directory_uri().'/js/custom.js', array('jquery'));
		wp_enqueue_script('js-custom');
	}
endif;
add_action('wp_enqueue_scripts', 'halink_style');

/*========== Hàm tạo logo ==========*/
if (!file_exists('logo')) :
	function logo()
	{
		add_theme_support(
			'custom-logo',
			array(
				'width'      => 500,
				'height'     => 500,
				'flex-width'  => true,
			)
		);
	}
endif;
add_action('init', 'logo');

/*========== Tùy chỉnh lại menu ==========*/
require_once get_parent_theme_file_path('/inc/editMenuWalker.php');
/*========== widget ==========*/

require_once get_parent_theme_file_path('/widget/widget-footer1.php');
require_once get_parent_theme_file_path('/widget/widget-footer2.php');
require_once get_parent_theme_file_path('/widget/widget-post-news.php');
require_once get_parent_theme_file_path('/widget/widget-good-essay.php');
require_once get_parent_theme_file_path('/widget/widget-service.php');
require_once get_parent_theme_file_path('/widget/widget-package.php');
require_once get_parent_theme_file_path('/widget/widget-album.php');
require_once get_parent_theme_file_path('/widget/widget-quotation.php');
require_once get_parent_theme_file_path('/widget/widget-feedback.php');
require_once get_parent_theme_file_path('/widget/widget-wedding-experience.php');
if (!file_exists('halink_widget')) {
	function halink_widget()
	{
		register_widget('WG_Footer1');
		register_widget('WG_Footer2');
		register_widget('WG_Post_News');
		register_widget('WG_Post_Experience');
		register_widget('WG_Service');
		register_widget('WG_Package');
		register_widget('WG_Album');
		register_widget('WG_Quotation');
		register_widget('WG_Feedback');
		register_widget('WG_Wedding_Experience');
	}
	add_action('widgets_init', 'halink_widget');
}

/**
 * Phân trang
 */
if(!file_exists('halink_pagination')) {
	function halink_pagination($custom_query = null) {
		global $wp_query;
		if($custom_query) $main_query = $custom_query;
		else $main_query = $wp_query;
		$big = 999999999;
		$total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
		if($total > 1) echo '<div class="paginate_links">';
		echo paginate_links( array(
			'base'        => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'   => '?paged=%#%',
			'current'  => max( 1, get_query_var('paged') ),
			'total'    => $total,
			'mid_size' => '10',
			'prev_text'    => __('Trước','halink'),
			'next_text'    => __('Tiếp','halink'),
		) );
		if($total > 1) echo '</div>';
	}
}

/**
 * Hiển thị thumbnail
 */
if(!file_exists('halink_thumbnail')) {
	function halink_thumbnail($size) {
		if( has_post_thumbnail() && !post_password_required() || has_post_format('image')) { ?>
			<figure class="post-thumbnail"><?php the_post_thumbnail($size); ?></figure>
		<?php
		}
	}
}

/**
 * Hiển thị tiêu đề post
 */
if(!file_exists('halink_entry_header')) {
	function halink_entry_header() {
		if(is_single()) { ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<?php } else { ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php }
	}
}

/**
 * Lấy dữ liệu post
 */
if(!file_exists('halink_entry_meta')) {
	function halink_entry_meta() {
		if(!is_page()) { ?>
			<div class="entry-meta">
				<?php
				printf(__('<span class="author">Posted by %1$s', 'halink'),
				get_the_author());
				printf(__('<span class="date-published"> at %1$s', 'halink'),
				get_the_date());
				printf(__('<span class="category"> in %1$s', 'halink'),
				get_the_category_list(','));

				if(comments_open()) { ?>
					<span class="meta-reply">
						<?php
						comments_popup_link(
							__('Leave a comment', 'halink'),
							__('One comment', 'halink'),
							__('% comment', 'halink'),
							__('Read all coments', 'halink')
						);
						?>
					</span>
				<?php
				}
				?>
			</div>
		<?php } 
	}
}

/**
 * Hiển thị nội dung của post / page
 */
if(!file_exists('halink_entry_content')) {
	function halink_entry_content() {
		if(!is_single() && !is_page()) {
			the_excerpt();
		} else {
			the_content();
			// Phân trang trong single
			$link_pages = array(
				'before' => __('<p>Page: ', 'halink'),
				'after' => '</p>',
				'nextpagelink' => __('Next page', 'halink'),
				'previouspagelink' => __('Previous page', 'halink')
			);
			wp_link_pages($link_pages);
		}
	}
}
function halink_readmore() { ?>
	<?php return ?> <a href="<?php get_permalink(get_the_ID()); ?>" class="read-more"> <?php __('...[Read more]', 'halink')?> </a> <?php ;?>
<?php
}
add_filter('excerpt_more', 'halink_readmore');

/**
 * Hiển thị tag
 */
if(!file_exists('halink_entry_tag')) {
	function halink_entry_tag() {
		if(has_tag()) { ?>
			<div class="entry-tag">
				<?php printf(__('Tagged in %1$s', 'halink'), get_the_tag_list('', ',')); ?>
			</div>
		<?php }
	}
}

/**
 * Hiển thị logo
 */
if(!file_exists('haink_logo_view')) {
	function halink_logo_view() {
		$custom_logo_id = get_theme_mod('custom_logo');
		$custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
		?>
		<a href="<?php bloginfo('url'); ?>" id="logo">
			<img src="<?= esc_url($custom_logo_url); ?>">
		</a>
	<?php
	}
}
/**
 * Thiết lập menu
 */
if(!file_exists('halink_menu')) {
	function halink_menu($menu) {
		$editmenuwalker = new editMenuWalker;
		wp_nav_menu(
			array(
				'theme_location' => $menu,
				'container' => 'false',
				'walker' => $editmenuwalker
			)
		);
	}
}
/**
 * Truy vấn đến danh mục
 */
if(!file_exists('halink_categories')) {
	function halink_categories($cat) {
		$service = new WP_Query(array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'cat' => $cat,
			'orderby' => 'ID',
			'order' => 'DESC',
		));
	}
}


/**
 * 
 */
function wp_category_template() {
	$category = get_queried_object();
	$parent_id = $category->category_parent;
	$templates = array();
	if ( $parent_id == 0 ) {
	$templates[] = "category-{$category->slug}.php";
	$templates[] = "category-{$category->term_id}.php";
	$templates[] = 'category.php';
	} else {
	$parent = get_category( $parent_id );
	$templates[] = "category-{$category->slug}.php";
	$templates[] = "category-{$category->term_id}.php";
	$templates[] = "category-{$parent->slug}.php";
	$templates[] = "category-{$parent->term_id}.php";
	$templates[] = 'category.php';
	}
	return locate_template( $templates );
	}
	add_filter( 'category_template', 'wp_category_template' );

function hsc_f_link_category_id($id)
{
	$r='';
	if($id!='')
	{
		foreach($id as $category)
		{
			$r= "<a href=\"".get_category_link( $category->term_id)."\" rel='category tag'>".$category->name."</a>".$separator;
		}
	}
	return $r;
}

function hsc_f_name_category_id($id)
{
	$r='';
	if($id!='')
	{
		foreach($id as $category)
		{
			$r= $category->name;
		}
	}
	return $r;
}