<?php
/**
 * Block - Text Content
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$text       = get_field_value($block_fields, 'text');

?>

<section class="section"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-8 col-xl-10">
                <div class="text">
                    <?php echo $text; ?>
                </div>
            </div>
        </div>
    </div>
</section>
