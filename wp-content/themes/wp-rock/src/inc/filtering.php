<?php

class Filter
{
    public function __construct()
    {
        $theme = new WP_Rock;
        $theme->ajax_front_to_backend('filtering', [$this, 'filtering']);
        $theme->ajax_front_to_backend('load_more', [$this, 'load_more']);
    }

    /**
     * Collecting WP_Query args
     *
     * @return array
     */
    function get_filter_args() {
        // Collecting POST data
        $paged          = filter_input( INPUT_POST, 'paged', FILTER_SANITIZE_NUMBER_INT );
        $post_type      = filter_input( INPUT_POST, 'post_type', FILTER_SANITIZE_STRING );
        $per_page       = filter_input( INPUT_POST, 'posts_per_page', FILTER_SANITIZE_NUMBER_INT );
        $taxonomies     = filter_input( INPUT_POST, 'taxonomies', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );
        $orderby_input  = filter_input( INPUT_POST, 'orderby', FILTER_SANITIZE_STRING  );
        $event_type     = filter_input( INPUT_POST, 'event_type', FILTER_SANITIZE_STRING  );
        // Price range
        $price_min      = filter_input( INPUT_POST, 'price_min', FILTER_SANITIZE_NUMBER_INT) ?: 0;
        $price_max      = filter_input( INPUT_POST, 'price_max', FILTER_SANITIZE_NUMBER_INT) ?: 10000;
        // Ordering
        $orderby   = explode('-', $orderby_input)[0] ? : 'date';
        $order     = explode('-', $orderby_input)[1] ? : 'DESC';

        $args = [
            'post_type'		 => $post_type ?: 'post',
            'post_status'    => 'publish',
            'posts_per_page' => $per_page ?: get_option( 'posts_per_page' ),
            'paged'          => $paged,
            'orderby'        => $orderby,
            'order'          => $order,
            'tax_query'		 => [
                'relation' => 'AND',
            ],
            'meta_query'		 => [
                'relation' => 'AND',
            ]
        ];

        if ($orderby == 'meta_value') {
            $args['meta_key']  = filter_input( INPUT_POST, 'meta_key', FILTER_SANITIZE_STRING  );
            $args['meta_type'] = filter_input( INPUT_POST, 'meta_type', FILTER_SANITIZE_STRING  );
        }

        if ($orderby == 'price') {
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_price';
        }

        if ($post_type == 'product') {
            $args['meta_query'] = [
                [
                    'key'     => '_price',
                    'value'   => [$price_min, $price_max],
                    'compare' => 'BETWEEN',
                    'type'    => 'NUMERIC',
                ]
            ];
        }

        if ($post_type == 'event' && $event_type !== 'all') {
            $today = current_time('Y-m-d');

            $args['meta_query'] = [
                [
                    'key'     => 'date',
                    'value'   => $today,
                    'compare' => ($event_type == 'future') ? '>=' : '<',
                    'type'    => 'DATE'
                ]
            ];
        }

        foreach ($taxonomies as $taxonomy) {
            $terms = filter_input( INPUT_POST, $taxonomy, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );
            if (empty($terms[0]) || $terms[0] == 'all') continue;

            $args['tax_query'][] = [
                'taxonomy'  => $taxonomy,
                'field'     => 'term_id',
                'operator'  => 'IN',
//                'include_children' => false,
                'terms'     => $terms,
            ];
        }

//        $args['tax_query']['relation'] = 'AND';
//        $args['tax_query'][] = [
//            'taxonomy'  => 'product_visibility',
//            'terms'     => ['exclude-from-catalog'],
//            'field'     => 'name',
//            'operator'  => 'NOT IN',
//        ];

        return $args;
    }

    /**
     * Products filtering
     */
    public function filtering() {
        ob_start();
        $args = $this->get_filter_args();
        $content_type = filter_input( INPUT_POST, 'content_type', FILTER_SANITIZE_STRING ) ?: $args['post_type'];

//        debug($args);

        query_posts($args);

        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                get_template_part('src/template-parts/content', $content_type, ['id' => get_the_ID()]);
            }
        }

        $html = ob_get_clean();
        echo json_encode(['html' => $html]);

        die();
    }

    /**
     * Show load more button
     */
    public function load_more() {
        ob_start();
        global $wp_query;
        $args = $this->get_filter_args();

        query_posts($args);

        $found_posts    = $wp_query->found_posts;
        $showing_posts  = $args['posts_per_page'] * $args['paged'];
        $next_page      = $args['paged']++;

        if ( $found_posts > $showing_posts ) :
            get_template_part('/src/template-parts/load-more-btn');
        endif;

        $html = ob_get_clean();
        echo json_encode(['html' => $html]);

        die();
    }
}

new Filter();
