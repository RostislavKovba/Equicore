<?php
/**
 * Block - Services.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$posts_per_page   = get_field_value($block_fields, 'posts_per_page') ?: 5;
$services         = get_field_value($block_fields, 'services');

$args = [
    'post_type'      => 'service',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => 'ASC',
    'orderby'        => 'menu_order',
];
if ($services)
    $args['post__in'] = $services;

$query = new WP_Query($args);
?>

<section class="section section-srv <?php  if (!IS_ADMIN) echo 'animate'?> <?php echo esc_html($class_name); ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- srv wrap -->
                <div class="srv-wrap <?php  if (!IS_ADMIN) echo 'animate'?>" data-animate='{"target": ".slideLeft",  "delay": 100}'>

                    <?php while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('src/template-parts/content', 'service', ['id' => get_the_ID()]);
                    } ?>

                </div>
            </div>
        </div>
    </div>
</section>