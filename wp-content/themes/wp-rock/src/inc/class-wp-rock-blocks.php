<?php

function disable_quick_edit( $actions = array(), $post = null ) {
    // Remove the Quick Edit link
    if (isset($actions['inline hide-if-no-js'])) {
        unset($actions['inline hide-if-no-js']);
    }
    // Return the set of links without Quick Edit
    return $actions;
}
add_filter('post_row_actions', 'disable_quick_edit', 10, 2);
add_filter('page_row_actions', 'disable_quick_edit', 10, 2);


/**
 *  Custom ACF Gutenberg blocks.
 *
 * @package WP-rock
 * @since 4.4.0
 */

/**
 * Registering ACF blocks.
 */
class WP_Rock_Blocks
{

    /**
     * Array with blocks defining.
     *
     * @var array[]
     */
    public array $blocks = array(
        'block-banner' => array(),
        'block-services' => array(),
        'block-faq' => array(),
        'block-gallery' => array(),
    );

    /**
     * List of Allowed blocks
     * core/freeform  - it's standard WYSIWYG.
     *
     * @var string[]
     */
    protected array $allowed = array('core/freeform');


    /**
     *  Construct of the class
     */
    public function __construct()
    {
        add_action('init', array($this, 'add_custom_blocks'));
        add_filter('allowed_block_types_all', array($this, 'filter_allowed_blocks'), 10, 2);
    }

    /**
     * Function for `allowed_block_types_all` filter-hook.
     *
     * @param bool|string[] $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
     * @param WP_Block_Editor_Context $editor_context The current block editor context.
     *
     * @return bool|string[]
     */
    public function filter_allowed_blocks($allowed_block_types, $editor_context)
    {

        if (!empty($editor_context->post)) {
            $allowed = array_map(array($this, 'add_prefix'), array_keys($this->blocks));

            if (!empty($this->allowed)) {
                foreach ($this->allowed as $block) {
                    $allowed[] = $block;
                }
            }

            return $allowed;
        }
        return $allowed_block_types;
    }

    /**
     * Just adding prefix to blocks.
     *
     * @param string $value - name of block.
     * @return string
     */
    public function add_prefix($value)
    {
        return 'acf/' . $value;
    }


    /**
     * Final registration blocks
     *
     * @return void
     */
    public function add_custom_blocks()
    {
        if (function_exists('acf_register_block_type')) {


            function wp_rock_category($categories, $post): array
			{
                return array_merge(
                    $categories,
                    array(
                        array(
                            'slug' => 'wp-rock',
                            'title' => 'WP Rock',
                            'icon' => 'wordpress-alt'
                        ),
                    )
                );
            }

            add_filter('block_categories_all', 'wp_rock_category', 10, 2);

            foreach ($this->blocks as $id => $block) {
                $cleanedId = str_replace("block-", "", $id);
                $cleanedTitle = str_replace("-", " ", $cleanedId);
                $title = $block['title'] ?? ucwords($cleanedTitle);

                $args = array(
                    'title' => __($title, 'wp-rock'),
                    'name' => $id,
                    'render_template' => 'src/template-parts/acf-blocks/' . $id . '.php',
                    'render_callback' => 'block_render',
                    'category' => 'wp-rock',
                    'post_types' => array_key_exists('post_types', $block) ? $block['post_types'] : array('page'),
                    'mode' => array_key_exists('mode', $block) ? $block['mode'] : 'preview',
                    'multiple' => array_key_exists('multiple', $block) ? $block['multiple'] : false,
                    'supports' => array(
						'align' => true,
						'full_height' => true,
						'anchor' => true,
						'color' => array(
							'gradients' => true,
							'background' => true,
						)
                    ),

                    'example' => array(
                        'attributes' => array(
                            'mode' => 'preview', // Important!
                            'data' => array(
                                'preview_image' => file_exists(THEME_DIR . '/src/images/acf-blocks/' . $id . '.jpg') ? THEME_URI . '/src/images/acf-blocks/' . $id . '.jpg' : THEME_URI . '/src/images/acf-blocks/no-preview.jpg',
                            ),
                        )
                    )

                );

                if (isset($block['description'])) {
                    $description = $block['description'];
                    $args['description'] = __($description, 'wp-rock');
                }

                if (array_key_exists('enqueue_assets', $block)) {
                    $args['enqueue_assets'] = $block['enqueue_assets'];
                }

                /*$style_file = THEME_DIR . '/assets/public/css/' . $id . '.css';
                if (file_exists($style_file) && file_get_contents($style_file)) {
                    $args['enqueue_style'] = ASSETS_CSS . $id . '.css';
                }*/

                $script_file = THEME_DIR . '/assets/public/js/js-' . $id . '.js';
                if (file_exists($script_file) && file_get_contents($script_file)) {
                    $args['enqueue_script'] = ASSETS_JS . 'js-' . $id . '.js';
                }

                acf_register_block_type($args);
            }

            /**
             * Callback block render,
             * return preview image
             */
            function block_render($block)
            {
                if (isset($block['data']['preview_image'])) {
                    echo '<img src="' . $block['data']['preview_image'] . '" style="width: 468px;">';
                    return;
                }
                $template = str_replace('.php', '', $block['render_template']);
                get_template_part('/' . $template, null, $block);
            }
        }
    }
}

new WP_Rock_Blocks();