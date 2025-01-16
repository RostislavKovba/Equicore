<?php
/**
 * Initial setup actions for site
 *
 * @package WP-rock
 */

/*Collect all ACF option fields to global variable. */
global $global_options;
global $locale_postfix;

if ( defined('ICL_LANGUAGE_CODE') ) {
	$cache_key = 'acf_theme_general_settings_' . (defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'default');
	$locale_postfix = ICL_LANGUAGE_CODE;
}
else if ( function_exists('pll_current_language') ) {
	$cache_key = 'acf_theme_general_settings_' . (function_exists('pll_current_language') ? get_locale() : 'default');
	$locale_postfix = get_locale();
}
else {
	$cache_key = 'acf_theme_general_settings_default';
	$locale_postfix = '';
}

$global_options = get_transient($cache_key);


if (!$global_options) {
	if (function_exists('get_fields')) {
		if ($locale_postfix !== 'default' && $locale_postfix !== 'en') {
			$global_options = get_fields('theme-general-settings_' . $locale_postfix);
		} else {
			$global_options = get_fields('theme-general-settings');
		}

		// Save the result in cache for 1 hour
		set_transient($cache_key, $global_options, WEEK_IN_SECONDS);
	}
}

// Reset cache when ACF fields are updated on Options pages
add_action('acf/save_post', function ($post_id) {
	// Check that the ACF options page is saved
	if (strpos($post_id, 'theme-general-settings') !== false && function_exists('get_fields')) {

		global $locale_postfix;

		// Generate a key for the cache based on the current language (if polylingual support is used)
		$cache_key = 'acf_theme_general_settings_' . $locale_postfix ?: 'default';

		// Delete cache
		delete_transient($cache_key);

		if ($locale_postfix !== 'default' && $locale_postfix !== 'en' ) {
			$global_options = get_fields('theme-general-settings_' . $locale_postfix);
		} else {
			$global_options = get_fields('theme-general-settings');
		}

		// Save the result in cache for 1 hour
		set_transient($cache_key, $global_options, WEEK_IN_SECONDS);
	}
});


/**
 * Main theme's class init
 */
$wp_rock = new WP_Rock();
add_action( 'after_setup_theme', array( $wp_rock, 'px_site_setup' ) );


/**
 * Sanitize uploaded file name
 */
add_filter( 'sanitize_file_name', array( $wp_rock, 'custom_sanitize_file_name' ), 10, 1 );


/**
 * Set custom upload size limit
 */
$wp_rock->px_custom_upload_size_limit( 5 );


/**
 * Check field and return its value or return null.
 *
 * @param {array}  $data_arr - Array to check and return data.
 * @param {string} $key      - key that should be found in array.
 *
 * @return mixed|null
 */
function get_field_value( $data_arr, $key ) {
     return ( isset( $data_arr[ $key ] ) ) ? $data_arr[ $key ] : null;
}
