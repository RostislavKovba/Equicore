<?php
/**
 * Main function themes
 *
 * @package WP-rock
 * @since 4.4.0
 */

define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_DIR', get_template_directory() );
define( 'STYLE_URI', get_stylesheet_uri() );
define( 'STYLE_DIR', get_stylesheet_directory() );
define( 'ASSETS_CSS', THEME_URI . '/assets/public/css/' );
define( 'ASSETS_JS', THEME_URI . '/assets/public/js/' );
define( 'ASSETS_IMG', THEME_URI . '/assets/public/images/' );

define( 'IS_ADMIN', is_admin());

// required files.
require THEME_DIR . '/src/inc/class-wp-rock.php';
require THEME_DIR . '/src/inc/initial-setup.php';
require THEME_DIR . '/src/inc/enqueue-scripts.php';
require THEME_DIR . '/src/inc/wpeditor-formats-options.php';
require THEME_DIR . '/src/inc/analytics-settings.php';
require THEME_DIR . '/src/inc/acf-setting.php';
require THEME_DIR . '/src/inc/custom-posts-type.php';
require THEME_DIR . '/src/inc/custom-taxonomies.php';
require THEME_DIR . '/src/inc/custom-translations.php';
require THEME_DIR . '/src/inc/woocommerce-customization.php';
require THEME_DIR . '/src/inc/class-wp-rock-blocks.php';
require THEME_DIR . '/src/inc/ajax-requests.php';
require THEME_DIR . '/src/inc/custom-accept-cookies.php';
require THEME_DIR . '/src/inc/custom-hooks.php';
require THEME_DIR . '/src/inc/custom-shortcodes.php';
require THEME_DIR . '/src/inc/class-mobile-detect.php';
require THEME_DIR . '/src/inc/filtering.php'; // Post filtering and load more.

function debug($data) {
    echo '<pre class="debug">';
//        var_dump($data);
    print_r($data);
    echo '</pre>';
}
