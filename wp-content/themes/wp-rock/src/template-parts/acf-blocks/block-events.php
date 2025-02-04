<?php
/**
 * Block - Events
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$posts_per_page = get_field_value($block_fields, 'posts_per_page') ?: -1;

$post_type  = 'event';
$orderby    = 'meta_value';
$meta_key   = 'date'; // acf field name
$meta_type  = 'DATE';
$args = [
    'post_type'      => $post_type,
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => 'DESC',
    'orderby'        => $orderby,
    'meta_key'       => $meta_key,
    'meta_type'      => $meta_type,
];

$query = new WP_Query($args);
?>

<section class="section block-events <?php if (!IS_ADMIN) echo ' animate'; ?> <?php echo esc_html($class_name); ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-xl-12 js-filters-form">
                <input type="hidden" name="filter_active" value="true">
                <input type="hidden" name="paged" id="paged" value="1">
                <input type="hidden" name="auto_submit" value="true">
                <input type="hidden" name="post_type" value="<?php echo $post_type; ?>">
                <input type="hidden" name="posts_per_page" value="<?php echo $posts_per_page; ?>">

                <input type="hidden" name="orderby" value="<?php echo $orderby; ?>">
                <input type="hidden" name="meta_key" value="<?php echo $meta_key; ?>">
                <input type="hidden" name="meta_type" value="<?php echo $meta_type; ?>">

                <div class="sub-links">
                    <div class="sub-links-w">
                        <div class="custom-checkbox js-all-filter">
                            <input type="radio"
                                   name="event_type"
                                   id="all"
                                   value="all"
                                <?php echo 'checked'?>
                            >
                            <label for="all">
                                Всі
                            </label>
                        </div>

                        <div class="custom-checkbox js-filter-item">
                            <input type="radio"
                                   name="event_type"
                                   id="future"
                                   value="future"
                            >
                            <label for="future">
                                Активні
                            </label>
                        </div>

                        <div class="custom-checkbox js-filter-item">
                            <input type="radio"
                                   name="event_type"
                                   id="past"
                                   value="past"
                            >
                            <label for="past">
                                Архів
                            </label>
                        </div>
                    </div>
                </div>


                <div class="blog-wrap js-posts-list">
                    <?php while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('src/template-parts/content', $post_type, ['id' => get_the_ID()]);
                    } ?>
                </div>

                <div class="load-more text-center w-100 js-load-more">
                    <?php get_template_part('src/template-parts/load-more-btn'); ?>
                </div>

            </form>
        </div>
    </div>
</section>