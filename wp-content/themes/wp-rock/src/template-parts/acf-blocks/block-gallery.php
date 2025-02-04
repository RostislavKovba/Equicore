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

$suptitle    = 'Галерея';
$title       = get_the_title();
$gallery     = get_field('gallery', get_the_id());

$col_template = [
    3,5,4,
    5,3,4,
    3,4,5,
    4,5,3,
]
?>

<section class="section gallery-section block-gallery <?php if (!IS_ADMIN) echo 'animate'; ?> <?php echo esc_html($class_name); ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="d-none d-sm-block spacer-lg"></div>
    <div class="d-block d-sm-none spacer-md"></div>

    <div class="container-fluid px-sm <?php if (!IS_ADMIN) echo 'animate'; ?>" data-animate='{"target": ".slideUp",  "delay": 200}'>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-block text-center mb-md">
                    <div class="text-uppercase text text-pretty slideUp">
                        <?php echo $suptitle; ?>
                    </div>

                    <h1 class="h2-lg title type-2 slideUp">
                        <i></i>
                        <?php echo $title; ?>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row mb-sm glr-row block-gallery__row slideUp glr-item">

            <?php foreach ($gallery as $i => $image) :
                // Repeat template
                if ((count($col_template) < count($gallery)) && count($col_template) <= $i ) $i -= count($col_template) * (int)($i / count($col_template));

                $col_num = $col_template[$i];
                ?>
                <div class="block-gallery__image lightbox-gallery col-md-<?php echo $col_num ?>">
                    <div class="lightbox-img" data-src="<?php echo $image['url'] ?>">
                        <?php echo wp_get_attachment_image($image['id'], 'full', false, [
//                            'class' => 'rellax-img',
//                            'data-rellax-speed' => '-1.5',
                        ]); ?>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>