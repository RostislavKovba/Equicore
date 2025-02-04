<?php
/**
 * Block - Galleries.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$gallery_type   = get_field_value($block_fields, 'gallery_type');

$posts_per_page = get_field_value($block_fields, 'posts_per_page') ?: -1;
$gallery        = get_field_value($block_fields, 'gallery');
$button         = get_field_value($block_fields, 'button');

$post_type  = 'gallery';
$args = [
    'post_type'      => $post_type,
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => 'DESC',
];
if ($gallery)
    $args['post__in'] = $gallery;

$query = new WP_Query($args);
?>

<section class="section gallery-section block-galleries <?php if (!IS_ADMIN) echo 'animate'; ?> <?php echo esc_html($class_name); ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <form class="container-fluid px-sm js-filters-form <?php if (!IS_ADMIN) echo 'animate'; ?>" data-animate='{"target": ".slideUp",  "delay": 200}'>
        <input type="hidden" name="filter_active" value="<?php echo $gallery_type ?: false; ?>">
        <input type="hidden" name="paged" id="paged" value="1">
        <input type="hidden" name="auto_submit" value="true">
        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>">
        <input type="hidden" name="posts_per_page" value="<?php echo $posts_per_page; ?>">
        <input type="hidden" name="content_args" value='<?php echo json_encode(['type' => $gallery_type]); ?>'>

        <div class="row mb-sm glr-row js-posts-list slideUp">

            <?php while ($query->have_posts()) {
                $query->the_post();
                get_template_part('src/template-parts/content', $post_type, ['id' => get_the_ID(), 'type' => $gallery_type]);
            } ?>

        </div>

        <?php if ($gallery_type) : ?>
            <div class="load-more text-center w-100 js-load-more">
                <?php get_template_part('src/template-parts/load-more-btn'); ?>
            </div>
        <?php endif; ?>

        <?php if ($button) : ?>
            <div class="glr-btn text-right">
                <a href="<?php echo $button['url'] ?>" class="btn-group type-2">
                    <b><?php echo $button['title'] ?></b>
                    <div class="btn-icon">
                        <svg width="24" height="24">
                            <use xlink:href="<?php echo ASSETS_IMG ?>icons/icons_global.svg#icon-arrow" fill="none"></use>
                        </svg>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    </form>
</section>