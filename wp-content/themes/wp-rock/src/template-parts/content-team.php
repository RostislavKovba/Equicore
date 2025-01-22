<?php
$id = $args['id'] ?: get_the_ID();

$image   = [
    'url' => get_the_post_thumbnail_url($id),
    'id' => get_post_thumbnail_id($id),
];
$name       = get_the_title($id);
$position   = get_field('position', $id);
?>

<div class="team-item">
    <div class="team-img">
        <picture>
            <source srcset="<?php echo $image['url']; ?>" type="image/jpg" />

            <?php echo wp_get_attachment_image($image['id'], 'full', false, [
                'class' => 'rellax-img',
                'data-rellax-speed' => '-2',
                'fetchpriority' => 'high',
                'loading' => 'lazy'
            ]); ?>
        </picture>
    </div>

    <div class="team-item_desc">
        <div class="h6 title team-name"><?php echo $name ?></div>
        <div class="text"><?php echo $position ?></div>
    </div>
</div>