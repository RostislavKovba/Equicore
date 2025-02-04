<?php
/**
 * Custom hooks
 *
 * @package WP-rock/custom-hooks
 */

/**
 * Remove windows LSEP from content
 *
 * @param { string } $html - Text content.
 *
 * @return array|string|string[]
 */
function remove_lsep( $html ) {
    $pattern = '/\x{2028}/u';

    return preg_replace( $pattern, '', $html );
}


/**
 * Remove windows LSEP from content
 *
 * @param {string} $content - Text content.
 * @return string|string[]
 */
function remove_windows_lsep_from_content( $content ) {
    return str_replace( "\r\n", '', $content );
}
add_filter( 'the_content', 'remove_windows_lsep_from_content' );



/**
 * Change display type for language switcher in Frontend
 */
add_filter(
    'pll_the_languages_args',
    function( $args ) {
        $args['display_names_as'] = 'slug';
        return $args;
    }
);



/**
 * Remove tag <p> и <br> in plugin contact form.
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );



/**
 * Add Formats to TinyMCE
 * - https://developer.wordpress.org/reference/hooks/tiny_mce_before_init/
 * - https://codex.wordpress.org/Plugin_API/Filter_Reference/tiny_mce_before_init
 *
 * @param array $args - Arguments used to initialize the tinyMCE
 *
 * @return array $args  - Modified arguments
 */
function prefix_tinymce_toolbar($args ): array
{

    $args['fontsize_formats'] = "14px 16px 18px 20px 28px 32px 40px 48px 54px";

    return $args;

}
add_filter( 'tiny_mce_before_init', 'prefix_tinymce_toolbar' );


function my_mce_buttons_2($buttons) {
    array_unshift($buttons, 'fontsizeselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');


/**
 * Adding default blocks to the block editor for custom post types
 *
 * @return void
 */
function set_post_type_default_blocks() {
    // post
    $program_object = get_post_type_object( 'post' );
    $program_object->template = array(
        array( 'acf/block-banner' ),
//        array( 'acf/block-single-related'),
    );

    // case-study
    $center_object = get_post_type_object( 'service' );
    $center_object->template = array(
        array( 'acf/block-banner' ),
    );

    // inspiration
    $center_object = get_post_type_object( 'gallery' );
    $center_object->template = array(
        array( 'acf/block-gallery' ),
    );

    // page
    $center_object = get_post_type_object( 'page' );
    $center_object->template = array(
        array( 'acf/block-banner' ),
    );
}
add_action( 'init', 'set_post_type_default_blocks' );