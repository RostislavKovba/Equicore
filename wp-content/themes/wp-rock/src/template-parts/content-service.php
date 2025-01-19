<?php
$id = $args['id'] ?: get_the_ID();

$title   = get_the_title( $id );
$excerpt = get_the_excerpt($id);
$url     = get_permalink();
$image   = [
    'url' => get_the_post_thumbnail_url($id),
    'id' => get_post_thumbnail_id($id),
]
?>

<div class="srv-item <?php  if (!IS_ADMIN) echo 'animate'?>" data-animate='{"target": ".slideUp",  "delay": 300}'>
    <div class="srv-content">
        <a class="h4 title text-animate" href="<?php echo $url; ?>">
            <?php echo $title; ?>
        </a>

        <div class="text text_sm slideUp">
            <?php echo $excerpt; ?>
        </div>

        <a href="<?php echo $url; ?>" class="btn-icon slideUp">
            <svg width="24" height="24">
                <use xlink:href="<?php echo ASSETS_IMG ?>icons/icons_global.svg#icon-arrow" fill="none"></use>
            </svg>
        </a>
    </div>

    <div class="srv-img-w">
        <a class="srv-img" href="<?php echo $url; ?>">
            <picture>
                <source srcset="<?php echo $image['url']; ?>" type="image/jpg" />
                <?php echo wp_get_attachment_image($image['id'], 'full', '' , [
                    'class' =>"rellax-img",
                    'data-rellax-speed' => "-2",
                    'loading' => "lazy",
                ]); ?>
            </picture>
        </a>

        <a href="<?php echo $url; ?>" class="srv-labels">
            <div class="h4 title"><?php echo $title; ?></div>
            <div class="btn-icon">
                <svg width="24" height="24">
                    <use xlink:href="<?php echo ASSETS_IMG ?>icons/icons_global.svg#icon-arrow" fill="none"></use>
                </svg>
            </div>
        </a>
    </div>
</div>