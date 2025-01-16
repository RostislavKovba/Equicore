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
$block_id = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$title = get_field_value($block_fields, 'title');
$testimonials = get_field_value($block_fields, 'testimonials');
?>

<section<?php if (IS_ADMIN && $disabled) { ?> disabled="disabled" <?php } ?>
            class="block-example my-6 py-4 my-lg-3 py-lg-2<?php echo esc_html($class_name);
            echo IS_ADMIN ? ' visible' : ''; ?>"<?php if ($block_id) {
        echo ' id="' . esc_attr($block_id) . '"';
    } ?>>

    <div class="container text-center">
        <?php if ($title) { ?>
        <h1 class="h2 mb-3"><?php echo nl2br($title); ?></h1>
        <?php } ?>
        <?php if ($testimonials) { ?>
            <div class="swiper block-example__slider js-example-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $testimonial):
                        $text = $testimonial['text'];
                        $name = $testimonial['name'];
                        $position = $testimonial['position'];
                        ?>
                        <div class="swiper-slide block-example__slider-item text-center">
                            <div class="block-example__slider-text"><?php echo esc_html($text);?></div>
                            <div class="block-example__slider-author"><strong><?php echo esc_html($name);?>,</strong> <?php echo esc_html($position);?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="block-example__slider-nav block-example__slider-nav_next js-nav-next"></div>
                <div class="block-example__slider-nav block-example__slider-nav_prev js-nav-prev"></div>
                <div class="block-example__slider-pagination js-pagination"></div>
            </div>
        <?php } ?>
    </div>
</section>
