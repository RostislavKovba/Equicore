<?php
/**
 * Connecting scripts to site
 *
 * @package WP-rock
 */


/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function px_site_scripts() {

    $general_style_ver = gmdate('ymd-Gis', filemtime(STYLE_DIR . '/style.css'));
    $custom_style_ver  = gmdate('ymd-Gis', filemtime(STYLE_DIR . '/assets/public/css/frontend.css'));
    $custom_js_ver     = gmdate('ymd-Gis', filemtime(STYLE_DIR . '/assets/public/js/frontend.js'));

    // Load our main stylesheet.
    wp_enqueue_style( 'wp-rock-style', STYLE_URI, $general_style_ver );

    wp_enqueue_style( 'bootstrap', ASSETS_CSS . 'vendors/bootstrap-grid.css', array(), $custom_style_ver );
    wp_enqueue_style( 'lightgallery', ASSETS_CSS . 'vendors/lightgallery.min.css', array(), $custom_style_ver );
    wp_enqueue_style( 'wp-rock_style', ASSETS_CSS . 'frontend.css', array(), $custom_style_ver );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_404() ) {
        wp_enqueue_style('page_404', ASSETS_CSS . '404.css', array(), null);
    }

    wp_enqueue_script( 'lightgallery_js', ASSETS_JS . 'vendors/lightgallery-all.min.js', array( 'jquery' ), $custom_js_ver, true );
    wp_enqueue_script( 'markerclusterer_js', ASSETS_JS . 'vendors/markerclusterer.js', array( 'jquery' ), $custom_js_ver, true );
    wp_enqueue_script( 'swiper_lib', ASSETS_JS . 'vendors/swiper-bundle.min.js', array( 'jquery' ), $custom_js_ver, true );
    wp_enqueue_script( 'swiper_js', ASSETS_JS . 'swiper.js', array( 'jquery' ), $custom_js_ver, true );
    wp_enqueue_script( 'frontend_js', ASSETS_JS . 'frontend.js', array( 'jquery' ), $custom_js_ver, true );
    wp_enqueue_script( 'filter_js', ASSETS_JS . 'filter.js', array( 'jquery' ), $custom_js_ver, true );
    wp_enqueue_script( 'gallery_js', ASSETS_JS . 'gallery.js', array( 'jquery', 'frontend_js' ), $custom_js_ver, true );

    $vars = array(
        'ajax_url'   => admin_url( 'admin-ajax.php' ),
        'theme_path' => get_stylesheet_directory_uri(),
        'site_url'   => get_site_url(),
    );

    wp_localize_script( 'frontend_js', 'var_from_php', $vars );
    wp_localize_script( 'filter_js', 'var_from_php', $vars );

    remove_action( 'wp_head', 'wp_print_scripts' );
    remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
    remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

    add_action( 'wp_footer', 'wp_print_scripts', 5 );
    add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
    add_action( 'wp_footer', 'wp_print_head_scripts', 5 );

}

add_action( 'wp_enqueue_scripts', 'px_site_scripts' );


add_action(
    'admin_enqueue_scripts',
    function () {
        wp_enqueue_style( 'bootstrap', ASSETS_CSS . 'vendors/bootstrap-grid.css', array(), null );
        wp_enqueue_style( 'wp-rock_style_admin', ASSETS_CSS . 'backend.css', array(), null );

        wp_enqueue_script( 'lightgallery_js', ASSETS_JS . 'vendors/lightgallery-all.min.js', array( 'jquery' ), null, true );
        wp_enqueue_script( 'backend_js', ASSETS_JS . 'backend.js', array('jquery'), null, true );
    },
    99
);