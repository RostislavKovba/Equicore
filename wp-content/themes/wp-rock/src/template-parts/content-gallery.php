<?php
$id     = $args['id'] ?: get_the_ID();
$type   = $args['type'];

$thumbnail  = [
    'id' => get_post_thumbnail_id($id),
    'url' => get_the_post_thumbnail_url($id)
];

$class      = $type ? 'col-sm-6 col-12' : 'col-6';
$title      = get_the_title($id);
$url        = get_the_permalink($id);
$gallery    = get_field('gallery', $id);
$categories = get_the_category($id);

?>

<div class="col-lg-4 slideLeft <?php echo $class; ?>">
    <div class="glr-item">
        <!-- ".lightbox-img [data-src]" for true img in gallery -->
        <!-- "img [src]" for thumbs in gallery -->

        <div class="lightbox-gallery">
            <div class="lightbox-img" data-src="<?php echo $thumbnail['url'] ?>">
                <?php echo wp_get_attachment_image($thumbnail['id'], 'full', false, [
                    'class' => 'rellax-img',
                    'data-rellax-speed' => '-1.5',
                ]); ?>
            </div>

            <?php foreach ($gallery as $image) : ?>

                <div class="lightbox-img" data-src="<?php echo $image['url'] ?>">
                    <img width="0" height="0" alt="" src="<?php echo $image['url'] ?>" />
                </div>

            <?php endforeach; ?>
        </div>

        <?php if ($type) : ?>

            <div class="glr-bottom">
                <h6 class="glr-title title h6">
                    <?php echo $title; ?>
                </h6>

                <a href="<?php echo $url; ?>" class="btn-icon d-none d-sm-flex">
                    <svg width="24" height="24">
                        <use xlink:href="<?php echo ASSETS_IMG ?>icons/icons_global.svg#icon-arrow" fill="none"></use>
                    </svg>
                </a>

                <a href="<?php echo $url; ?>" class="btn-group type-2 d-flex d-sm-none">
                    <b>галерея</b>
                    <div class="btn-icon">
                        <svg width="24" height="24">
                            <use xlink:href="<?php echo ASSETS_IMG ?>icons/icons_global.svg#icon-arrow" fill="none"></use>
                        </svg>
                    </div>
                </a>
            </div>

        <?php endif; ?>
    </div>
</div>