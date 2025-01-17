<?php
/**
 * Block - FAQ.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$selection_type   = get_field_value($block_fields, 'selection_type');
$posts_per_page   = get_field_value($block_fields, 'posts_per_page') ?: 4;
$faqs             = get_field_value($block_fields, 'faqs');

$args = [
    'post_type'      => 'faq',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => 'DESC',
];
if ($selection_type == 'manual')
    $args['post__in'] = $faqs;

$query = new WP_Query($args);
?>

<section class=" <?php echo esc_html($class_name); ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>

    <?php while ($query->have_posts()) {
        $query->the_post();
        get_template_part('src/template-parts/content', 'faq', ['id' => get_the_ID()]);
    } ?>
</section>