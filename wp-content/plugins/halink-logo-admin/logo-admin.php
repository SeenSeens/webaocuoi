<?php
/**
 * Plugin Name: Halink Customize Admin Screen
 * Plugin URI: https://halink.vn/
 * Description: Tùy biến lại trang quản trị của admin.
 * Version: 1.0
 * Author: Tuan Halink
 * Author URI: https://halink.vn/
 */

 /**
 * Thay đổi logo trang đăng nhập
 */
function halink_custom_logo() { ?>
    <style type="text/css">
        #login h1 a {
            background-image: url(<?= plugins_url('images/logo.png', __FILE__); ?>);
            background-size: 280px 80px;
            width: 280px;
            height: 80px;
        }
    </style>
<?php
}
add_action('login_enqueue_scripts', 'halink_custom_logo');

/**
 * Tự đánh dấu vào nút Remember Me để ghi nhớ lần đăng nhập sau
 */
function halink_rememberme_check() {
    add_filter( 'login_footer', 'halink_rememberme_checked' );
}
add_action( 'init', 'halink_rememberme_check' );
 
function halink_rememberme_checked() {
    echo "<script>document.getElementById('rememberme').checked = true</scrip>";
}