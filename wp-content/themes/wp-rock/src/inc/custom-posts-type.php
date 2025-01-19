<?php
/**
 *  Custom post types admin columns
 */

add_action('manage_post_posts_columns', 'add_post_thumbnail_column', 4 );
add_action('manage_team_posts_columns', 'add_post_thumbnail_column', 4 );
add_action('manage_service_posts_columns', 'add_post_thumbnail_column', 4 );

add_action('manage_post_posts_custom_column', 'manage_post_thumbnail_column', 5, 2 );
add_action('manage_team_posts_custom_column', 'manage_post_thumbnail_column', 5, 2 );
add_action('manage_service_posts_custom_column', 'manage_post_thumbnail_column', 5, 2 );

add_action('admin_head', 'admin_custom_column_styles');
function admin_custom_column_styles() {
    print
        '<style>
        .column-post-thumbnail { width: 150px; max-height: 150px;}
        .admin-column-thumbnail { max-height: 60px; width: auto; max-width: 90px; }
        .column-title {min-width: 200px;}
    </style>';
}

function add_post_thumbnail_column($columns) {
    $new_columns['post-thumbnail'] = 'Thumbnail';
    return array_slice( $columns, 0, 1 ) + $new_columns + array_slice( $columns, 1 );
}

function manage_post_thumbnail_column($column_key, $post_id) {
    if( $column_key === 'post-thumbnail' ){
        echo wp_get_attachment_image(get_post_thumbnail_id($post_id), 'post-thumbnail', '', ['class' => 'admin-column-thumbnail']);
    }
}
