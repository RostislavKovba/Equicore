<?php
/**
 * Block - Gallery.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';


$gallery_type   = get_field_value($block_fields, 'gallery_type');

$selection_type = get_field_value($block_fields, 'selection_type');
$posts_per_page = $gallery_type ? -1 : get_field_value($block_fields, 'posts_per_page');
$gallery        = get_field_value($block_fields, 'gallery');

$args = [
    'post_type'      => 'gallery',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => 'DESC',
];
if ($selection_type == 'manual')
    $args['post__in'] = $gallery;

$query = new WP_Query($args);
?>

<section class="section gallery-section <?php if (!IS_ADMIN) echo ' animate'; ?> <?php echo esc_html($class_name); ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container-fluid px-sm animate" data-animate='{"target": ".slideLeft",  "delay": 200}'>
        <div class="row mb-sm glr-row">

            <?php while ($query->have_posts()) {
                $query->the_post();
                get_template_part('src/template-parts/content', 'gallery', ['id' => get_the_ID(), 'type' => $gallery_type]);
            } ?>

        </div>

        <?php if ($gallery_type) : ?>

            <div class="pagination">
                <ul>
                    <li class="pag-arrow"><a href="#"></a></li>
                    <ul class="pag-links">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                    <li class="pag-arrow"><a href="#"></a></li>
                </ul>
            </div>

        <?php endif; ?>
    </div>

    <div class="spacer-lg"></div>
</section>