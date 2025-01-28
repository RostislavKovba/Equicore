<?php
/**
 * Block - Side Image.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$is_revert  = get_field_value($block_fields, 'is_revert');
$text       = get_field_value($block_fields, 'text');
$button     = get_field_value($block_fields, 'button');
$image      = get_field_value($block_fields, 'image')

?>

<section class="section <?php if (!IS_ADMIN) echo 'animate'; ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container animate" data-animate='{"target": ".slideUp",  "delay": 400}'>
        <div class="row g-md justify-content-between">

            <div class="col-md-7 align-self-center <?php if ($is_revert) echo 'order-md-2' ?>">
                <div class="lr-content-1">
                    <div class="text slideUp">
                        <p>
                            <?php echo $text; ?>
                        </p>
                    </div>

                    <?php if ($button) : ?>
                        <a href="<?php echo $button['url'] ?>" class="btn-group slideUp">
                            <b><?php echo $button['title'] ?></b>
                            <div class="btn-icon">
                                <svg width="24" height="24">
                                    <use xlink:href="<?php echo ASSETS_IMG ?>icons/icons_global.svg#icon-arrow" fill="none"></use>
                                </svg>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-5">
                <div class="lr-img-1">
                    <picture>
                        <source srcset="<?php echo $image['url']; ?>" type="image/jpg" />
                        <?php echo wp_get_attachment_image($image['id'], 'full', false, [
                            'class' => 'rellax-img',
                            'data-rellax-speed' => '-2',
                            'loading' => 'lazy'
                        ]); ?>
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>
