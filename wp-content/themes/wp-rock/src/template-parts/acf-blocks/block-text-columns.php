<?php
/**
 * Block - Text Columns
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$columns_number = get_field_value($block_fields, 'columns_number');
$column_1       = get_field_value($block_fields, 'column_1');
$column_2       = get_field_value($block_fields, 'column_2');
$column_3       = get_field_value($block_fields, 'column_3');

$columns = [$column_1, $column_2];
if ($column_3) $columns[] = $column_3;
?>

<section class="section trf <?php if (!IS_ADMIN) echo ' animate'; ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container <?php if (!IS_ADMIN) echo ' animate'; ?>" data-animate='{"target": ".slideLeft",  "delay": 200}'>
        <div class="row g-l justify-content-between">

            <?php foreach ($columns as $column) : ?>
                <div class="col-lg-<?php echo (12 / count($columns) ) ?> slideLeft">
                    <div class="text type-2">
                        <?php echo $column ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>