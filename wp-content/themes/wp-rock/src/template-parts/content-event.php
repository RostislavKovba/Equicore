<?php
global $global_options;

$id = $args['id'] ?: get_the_ID();
$is_reverse = $args['is_reverse'];

$date           = get_field('date', $id);
$today          = current_time('d.m.Y');
$is_event_over  = strtotime($date) < strtotime($today);

$title   = get_the_title($id);
$excerpt = get_the_excerpt($id);
$gallery = get_field('gallery', $id);

$image   = [
    'url' => get_the_post_thumbnail_url($id),
    'id'  => get_post_thumbnail_id($id),
];

$button = [
    'title' => pll__($is_event_over ? 'Gallery' : 'Send a request'),
    'url'   => ($is_event_over && $gallery)
                ? get_permalink($gallery)
                : get_permalink(get_field_value($global_options, 'contact_page')),
]
?>

<div class="blog-item">
    <a class="blog-img" href="<?php echo $button['url']; ?>">
        <picture>
            <source srcset="<?php echo $image['url'] ?>" type="image/jpg"/>
            <?php echo wp_get_attachment_image($image['id'], 'full', false, [ 'loading' => 'lazy' ]); ?>
        </picture>
    </a>

    <div class="blog-content">
        <a class="h6 title" href="<?php echo $button['url']; ?>">
            <?php echo $title; ?>
        </a>

        <div class="text">
            <?php echo $excerpt; ?>
        </div>

        <div class="blog-labels">
            <div class="blog-label">
                <img
                    width="16"
                    height="16"
                    src="<?php echo ASSETS_IMG ?>icons/icon-bookmark.svg"
                    alt="icon"
                    loading="lazy"
                />
                <b><?php echo $date; ?></b>
            </div>
        </div>

        <a href="<?php echo $button['url']; ?>" class="btn-group">
            <b><?php echo $button['title']; ?></b>
            <div class="btn-icon">
                <svg width="24" height="24">
                    <use xlink:href="<?php echo ASSETS_IMG ?>icons/icons_global.svg#icon-arrow" fill="none"></use>
                </svg>
            </div>
        </a>
    </div>
</div>