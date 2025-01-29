<?php
$id = $args['id'] ?: get_the_ID();
$is_reverse = $args['is_reverse'];

$image   = [
    'url' => get_the_post_thumbnail_url($id),
    'id' => get_post_thumbnail_id($id),
];
$name        = get_the_title($id);
$position    = get_field('position', $id);
$description = get_field('description', $id);
?>

<div class="row g-xxs justify-content-between align-stretch team-item">

    <div class="col-sm-4 <?php echo $is_reverse ? 'order-sm-2 slideLeft' : 'slideRight' ?> <?php if (!IS_ADMIN) echo ' animate'; ?> slideLeft">
        <div class="lr-img-3">
            <picture>
                <source srcset="<?php echo $image['url']; ?>" type="image/jpg" />
                <?php echo wp_get_attachment_image($image['id'], 'full', false, [
                    'class' => 'rellax-img',
                    'data-rellax-speed' => '-2',
                    'loading' => 'lazy'
                ]); ?>
            </picture>

            <!-- labels -->
            <div class="lr-3-labels d-flex d-sm-none">
                <div class="lr-3-name">
                    <b><?php echo $name ?></b>
                    <p><?php echo $position ?></p>
                </div>

                <div class="lr-3-icon icon">
                </div>
            </div>

            <div class="lr-content-3 d-block d-sm-none">
                <div class="h6 lr-title-3 title text-animate"><?php echo $name ?></div>
                <div class="lr-text-3 text fadeIn">
                    <p>
                        <?php echo $description ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-8 <?php if (!IS_ADMIN) echo ' animate'; ?> <?php echo $is_reverse ? 'slideRight' : 'slideLeft' ?>">
        <div class="lr-content-3 d-none d-sm-block">
            <div class="h6 lr-title-3 title text-animate"><?php echo $name ?></div>
            <div class="lr-text-3 text fadeIn">
                <p>
                    <?php echo $description ?>
                </p>
            </div>
        </div>
    </div>
</div>