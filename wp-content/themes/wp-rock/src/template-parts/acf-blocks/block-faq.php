<?php
/**
 * Block - FAQ.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$title = get_field_value($block_fields, 'title');
$image = get_field_value($block_fields, 'img');

$posts_per_page   = get_field_value($block_fields, 'posts_per_page') ?: 4;
$faqs             = get_field_value($block_fields, 'faqs');

$args = [
    'post_type'      => 'faq',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => 'DESC',
];
if ($faqs)
    $args['post__in'] = $faqs;

$query = new WP_Query($args);
?>

<section class="section faq-section <?php  if (!IS_ADMIN) echo 'animate'?> <?php echo esc_html($class_name); ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container">
        <div class="row g-md justify-content-between">
            <div class="d-none d-md-block col-xl-5">
                <div class="faq-img animate slideRight image-cover">
                    <picture>
                        <source srcset="<?php echo $image['url']; ?>" type="image/jpg"/>
                        <?php echo wp_get_attachment_image($image['id'], 'full', false, [
                            'class' => 'rellax-img',
                            'data-rellax-speed' => '-1',
                            'data-rellax-desktop-speed' => '-2.5',
                            'fetchpriority' => 'high',
                            'loading' => 'lazy'
                        ]); ?>
                    </picture>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="faq-accordion sticky-block ">

                    <h1 class="h3 title title-margin-2 text-left text-animate"><?php echo $title; ?></h1>
                    <div class="accordion animate" itemscope itemtype="https://schema.org/FAQPage" data-animate='{"target": ".slideUp",  "delay": 100}'>

                        <?php while ($query->have_posts()) {
                            $query->the_post();
                            get_template_part('src/template-parts/content', 'faq', ['id' => get_the_ID()]);
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>