<?php
/**
 * Block - Half Image.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$is_revert  = get_field_value($block_fields, 'is_revert');
$title      = get_field_value($block_fields, 'title');
$subtitle   = get_field_value($block_fields, 'subtitle');
$boxes      = get_field_value($block_fields, 'boxes');
$image      = get_field_value($block_fields, 'image');

?>

<section class="section lr-02 bg-section py-0"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container animate" data-animate='{"target": ".fadeIn",  "delay": 200}'>
        <div class="row justify-content-between">

            <!-- img -->
            <div class="col-lg-6 order-lg-1">
                <div class="lr-02-img animate slideLeft">
                    <picture>
                        <source srcset="<?php echo $image['url']; ?>" type="image/jpg"/>
                        <?php echo wp_get_attachment_image($image['id'], 'full', false, [
                            'class' => 'rellax-img',
                            'data-rellax-speed' => '-1',
                            'data-rellax-desktop-speed' => '-2',
                            'loading' => 'lazy'
                        ]); ?>
                    </picture>
                </div>
            </div>

            <!-- content -->
            <div class="col-lg-6 order-lg-0 align-self-center">
                <div class="lr-content-2">
                    <div class="h3 title lr-02-title text-animate"><?php echo $title; ?></div>
                    <div class="text text_lg fadeIn">
                        <p><?php echo $subtitle; ?></p>
                    </div>

                    <div class="ctg-items">

                        <?php foreach ($boxes as $box) : ?>
                            <div class="ctg-item fadeIn">
                                <div class="ctg-img">
                                    <img src="<?php echo $box['icon'] ?>" alt="image" />
                                </div>
                                <div class="ctg-text text"><?php echo $box['title'] ?></div>
                                <div class="ctg-sup"><?php echo $box['subtitle'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
