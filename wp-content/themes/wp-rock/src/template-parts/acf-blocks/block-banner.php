<?php
/**
 * Block - Banner.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$title      = get_field_value($block_fields, 'title');
$subtitle   = get_field_value($block_fields, 'subtitle');
$image_id   = get_field_value($block_fields, 'image') ?: get_post_thumbnail_id();

//wp_get_attachment_image($image_id, 'full');
?>

<section class=" <?php echo esc_html($class_name); ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>


</section>