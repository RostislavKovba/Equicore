<?php
/**
 * Block - Banner.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$title      = get_field_value($block_fields, 'title');
$subtitle   = get_field_value($block_fields, 'subtitle');
$image      = get_field_value($block_fields, 'image') ?: get_the_post_thumbnail();
?>

<section class="section banner-section <?php if (!IS_ADMIN) echo 'animate'?> <?php echo esc_html($class_name); ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="banner <?php if (!IS_ADMIN) echo 'full'?>">
        <div class="banner-media">

            <picture>
                <!-- desktop -->
                <source srcset="<?php echo $image['desktop']['url']; ?>" type="image/jpg" media="(min-width:768px)">
                <!-- mobile -->
                <source srcset="<?php echo $image['mobile']['url']; ?>" type="image/jpg" media="(max-width:767px)">
                <img class="rellax-img"
                    data-rellax-speed="-1"
                    data-rellax-desktop-speed="-8.5"
                    fetchpriority="high"
                    src="#"
                    alt="Banner Image"
                    loading="eager"
                >
            </picture>
        </div>

        <div class="banner-align align-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="banner-info <?php if (!IS_ADMIN) echo 'animate'?>" data-animate='{"target": ".slideUp",  "delay": 400}'>
                            <h1 class="h1 title slideUp"><?php echo $title; ?></h1>
                            <div class="text text_lg slideUp"><?php echo $subtitle ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>