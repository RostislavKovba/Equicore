<?php
$id = $args['id'] ?: get_the_ID();
$id = $args['id'] ?: get_the_ID();

$thumbnail_id = get_post_thumbnail_id($id);
$categories   = get_the_category($id);
?>

<div class="blog-item">
    <?php if ($categories && !is_wp_error($categories)) : ?>
        <?php foreach ($categories as $category): ?>
            <span class="blog-item__category product-item__flash"><?php echo esc_html($category->name); ?></span>
        <?php endforeach; ?>
    <?php endif; ?>
    <a class="blog-item__image" href="<?php the_permalink(); ?>">
        <?php echo wp_get_attachment_image($thumbnail_id, 'full'); ?>
    </a>
    <a class="blog-item__title" href="<?php the_permalink(); ?>">
        <h4><?php the_title(); ?></h4>
    </a>
    <div class="blog-item__desc"><?php the_excerpt(); ?></div>
    <a class="blog-item__link" href="<?php the_permalink(); ?>"><?php echo pll__('Read More'); ?></a>
</div>


