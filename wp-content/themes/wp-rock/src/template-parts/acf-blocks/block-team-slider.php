<?php
/**
 * Block - Example.
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

$title       = get_field_value($block_fields, 'title');
$description = get_field_value($block_fields, 'description');
$btn         = get_field_value($block_fields, 'button');

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
?>

<section class="section team bg-section <?php if (!IS_ADMIN) echo ' animate'; ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container">
        <div class="row g-md align-items-center justify-content-between">
            <div class="col-lg-5">
                <div class="team-content animate" data-animate='{"target": ".slideUp",  "delay": 400}'>
                    <h6 class="title h4 team-title text-animate"><?php echo $title; ?></h6>
                    <div class="text text_sm slideUp">
                        <p>
                            <?php echo $description; ?>
                        </p>
                    </div>

                    <a href="<?php echo $btn['url'] ?>" class="btn-group team-btn slideUp">
                        <b><?php echo $btn['title'] ?></b>
                        <div class="btn-icon">
                            <svg width="24" height="24">
                                <use xlink:href="<?php echo ASSETS_IMG ?>icons/icons_global.svg#icon-arrow" fill="none"></use>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="swiper-entry team-slider swiper">
                    <div
                        class="swiper-container"
                        data-options='{
                            "slidesPerView": "1",
                            "spaceBetween": 16,
                            "breakpoints" : {
                                "576":{  "slidesPerView" : 1},
                                "768":{ "spaceBetween" : 20, "slidesPerView" : 2}
                        }}'
                    >
                        <div class="swiper-wrapper">

                            <?php while ($query->have_posts()) {
                                $query->the_post();
                                echo '<div class="swiper-slide">';
                                get_template_part('src/template-parts/content', 'team-slide', ['id' => get_the_ID()]);
                                echo '</div>';
                            } ?>

                        </div>
                    </div>

                    <div class="swiper-controls-wrap animate fadeIn">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination swiper-pagination-relative"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>