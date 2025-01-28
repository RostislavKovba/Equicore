<?php
/**
 * Block - Features.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$boxes      = get_field_value($block_fields, 'boxes');
if (!$boxes) return;

?>

<section class="section ctg <?php if (!IS_ADMIN) echo 'animate'; ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container">
        <div class="ctg-wrap <?php if (!IS_ADMIN) echo 'animate'; ?>" data-animate='{"target": ".slideLeft",  "delay": 100}'>
            <div class="ctg-items">

                <?php foreach ($boxes as $box) : ?>

                    <?php if ($box['icon']) : ?>

                        <div class="ctg-item slideLeft">
                            <div class="ctg-img">
                                <img src="<?php echo $box['icon'] ?>" alt="image" />
                            </div>
                            <div class="ctg-text text"><?php echo $box['title'] ?></div>
                        </div>

                    <?php else : ?>

                        <div class="h3 title animate text-animate">
                            <?php echo $box['title'] ?>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>