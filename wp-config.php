<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt,
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define('SAVEQUERIES', true);
define( 'DB_NAME', 'studio' );

/** Username của database */
define( 'DB_USER', 'studio' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '123456789' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'a}aub@R~_5Qa&zg.h-5eh[^(b*yjO[_`Z>n9UW@G@G@|m`k[0rkQB.yE4Kd@Q0er' );
define( 'SECURE_AUTH_KEY',  'sy -QWHQB7AM3^Z|~g0lnd~Yqx+al8iZi#_e3V*zu3|Y}JToDE^3oN N%)xsG.Ji' );
define( 'LOGGED_IN_KEY',    '6~JR&w}%6SnTV 7.==y&1Yr/hA aXnAT.V|6u=h(^I% :,CB<sEf+]!o}*h%v`*|' );
define( 'NONCE_KEY',        'W4i/d,UDcO~0agjL~CyT$cMV#5kl{@=!bq4V>Da.ibo39h>rem;CA YZCi)5C%D{' );
define( 'AUTH_SALT',        '2*u>f^.&+q{{PG5nvlgrQJ)czCf7LlJf6_=w8Kqq[3R?1:U{k:^RGm+.vBw,laiW' );
define( 'SECURE_AUTH_SALT', 'TxlT<=[,CTO&L`CVEX#FU+eE2JN_-AIReJfIy~=G0C|smto[X@]#rK=jAl3:%]&g' );
define( 'LOGGED_IN_SALT',   '6wsc)Jb1wpn1]YD)#OKR&r2#Ug6myIpkT!AKC 3gTv:6{E/=lJ;q!0wd|~<(,cC<' );
define( 'NONCE_SALT',       ']28Vs,<JNjT,d_<rL 9j-u]ZT]TMXhWHf%`NkmY:DF1J|~bzfy&x!2,:gYjSA10N' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
