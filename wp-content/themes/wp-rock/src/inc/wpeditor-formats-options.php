<?php
/**
 * Add Dropcap option but keep the defaults.
 *
 * @package tiny_mce/customization
 */

add_filter( 'tiny_mce_before_init', 'my_wpeditor_formats_options' );

/**
 * Customizing WP Editor formats options.
 *
 * @param {array} $settings  -  Existing settings.
 * @return mixed
 */
function my_wpeditor_formats_options( $settings ) {
    /* Set to true to include the default settings. */
    $settings['style_formats_merge'] = true;

    $style_formats = array(
        array(
            'title' => 'Title decor',
            'block' => 'span',
            'classes' => 'title-decor',
        ),
        array(
            'title' => 'Custom Link',
            'block' => 'span',
            'classes' => 'btn-group slideUp',
        ),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}

add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );
/**
 * Add style selector to the beginning of the toolbar
 *
 * @param {array} $buttons - Buttons.
 * @return mixed
 */
function fb_mce_editor_buttons( $buttons ) {

    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}


