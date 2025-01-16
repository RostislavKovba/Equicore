<?php
/**
 * Create Theme General Settings page using Advanced Custom Fields.
 *
 * @package acf/settings
 */

// Check if the ACF function 'acf_add_options_page' exists
if ( function_exists( 'acf_add_options_page' ) ) {

    // Create a new options page under the WordPress Settings menu
    $parent = acf_add_options_page(
        array(
            'page_title' => 'Theme General Settings', // Title of the options page
            'menu_title' => 'Theme Settings',        // Text to appear in the menu
            'menu_slug'  => 'theme-general-settings', // Unique slug for the options page URL
            'post_id'    => 'theme-general-settings', // Unique identifier for the options page
            'capability' => 'edit_posts',             // Capability required to access this options page
            'redirect'   => false,                     // Do not redirect to the first submenu page
        )
    );
}

/**
 * Register the styles (CSS) for the ACF blocks (acf_register_block_type()) in head section instead of body or footer
 */
add_action( 'wp_enqueue_scripts', 'register_acf_block_styles' );
add_action( 'admin_enqueue_scripts', 'register_acf_block_styles' );

function register_acf_block_styles() : void {

    $wrock_blocks  = new WP_Rock_Blocks();
    $custom_blocks = $wrock_blocks->blocks;

    if ( !empty($custom_blocks) ) {

        foreach (array_keys($custom_blocks) as $key) {
            if( has_block( 'acf/'.$key ) ) {
                $style_file = ASSETS_CSS . $key . '.css';
                wp_enqueue_style( 'acf-block-'.$key, $style_file, array(), 'null' );
            }
        }
    }
}

/**
 * Adding "preconnect" rel attribute to <link> tag for ACF styles to improve performance
 * @param $html
 * @param $handle
 * @param $href
 * @param $media
 *
 * @return array|mixed|string|string[]
 */
function add_preconnect_rel_attribute($html, $handle, $href, $media) {

    $wrock_blocks  = new WP_Rock_Blocks();
    $custom_blocks = $wrock_blocks->blocks;

    if ( !empty($custom_blocks) ) {

        foreach (array_keys($custom_blocks) as $key) {
            if ($handle === 'acf-block-'.$key) {
                // Adding attribute rel="preconnect"
                $html = str_replace('stylesheet', 'preconnect', $html);
            }
        }
    }

    return $html;
}
// add_filter('style_loader_tag', 'add_preconnect_rel_attribute', 90, 4);
