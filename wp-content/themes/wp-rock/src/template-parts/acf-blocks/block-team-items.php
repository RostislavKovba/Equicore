<?php
/**
 * Block - Team items
 *
 * @package WP-rock
 * @since   4.4.0
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$is_reverse       = get_field_value($block_fields, 'is_reverse');

$posts_per_page   = get_field_value($block_fields, 'posts_per_page') ?: 4;
$team             = get_field_value($block_fields, 'team');

$args = [
    'post_type'      => 'team',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => 'DESC',
];
if ($team)
    $args['post__in'] = $team;

$query = new WP_Query($args);
$i = 0;
?>

<section class="section lr-3 block-team-items <?php if (!IS_ADMIN) echo 'animate'; ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container <?php if (!IS_ADMIN) echo ' animate'; ?>" data-animate='{"target": ".fadeIn",  "delay": 100}'>

        <?php while ($query->have_posts()) {
            $query->the_post();
            $i++;
            get_template_part('src/template-parts/content', 'team', [
                'id' => get_the_ID(),
                'is_reverse' => (($i % 2 == $is_reverse))
            ]);
        } ?>

    </div>
</section>