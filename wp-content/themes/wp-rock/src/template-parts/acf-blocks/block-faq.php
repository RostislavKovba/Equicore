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

$selection_type   = get_field_value($block_fields, 'selection_type');
$posts_per_page   = get_field_value($block_fields, 'posts_per_page') ?: 4;
$faqs             = get_field_value($block_fields, 'faqs');

$args = [
    'post_type'      => 'faq',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => 'DESC',
];
if ($selection_type == 'manual')
    $args['post__in'] = $faqs;

$query = new WP_Query($args);
?>

<section class="section faq-section <?php  if (!IS_ADMIN) echo 'animate'?> <?php echo esc_html($class_name); ?>"
     data-animate='{"target": ".slideUp",  "delay": 200}'
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="spacer-md"></div>

    <div class="container">
        <div class="row g-md justify-content-between">
            <div class="d-none d-md-block col-xl-5">
                <div class="faq-img image-cover">
                    <picture>
                        <source srcset="img/faq-img.webp" type="image/webp" />
                        <source srcset="img/faq-img.jpg" type="image/jpg" />
                        <img
                                class="rellax-img"
                                data-rellax-speed="-2.5"
                                width="384"
                                height="384"
                                src="#"
                                alt=""
                                loading="lazy"
                        />
                    </picture>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="faq-accordion sticky-block">
                    <!-- title -->
                    <h1 class="h3 title title-margin-2 text-left text-animate">часті запитання</h1>
                    <div class="accordion" itemscope itemtype="https://schema.org/FAQPage">

                        <?php while ($query->have_posts()) {
                            $query->the_post();
                            get_template_part('src/template-parts/content', 'faq', ['id' => get_the_ID()]);
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="spacer-lg"></div>
</section>