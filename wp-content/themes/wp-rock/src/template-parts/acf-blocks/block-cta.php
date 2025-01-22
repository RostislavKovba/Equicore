<?php
/**
 * Block - Call To Action.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$title      = get_field_value($block_fields, 'title');
$image      = get_field_value($block_fields, 'image')

//wp_get_attachment_image($image_id, 'full');
?>

<section class="section <?php if (!IS_ADMIN) echo 'animate'; ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container-fluid px-sm">
        <div class="qst-section">
            <div class="row g-xs justify-content-center">
                <div class="col-md-8">
                    <div class="cta-content <?php if (!IS_ADMIN) echo 'animate'; ?>" data-animate='{"target": ".fadeIn",  "delay": 200}'>
                        <div class="h3 title mb-md text-left text-animate">
                            <?php echo $title ?>
                        </div>

                        <div class="cta-items">
                            <!-- 0 -->
                            <div class="cta-item fadeIn">
                                <p class="cta-item-title">Голова клубу</p>
                                <a href="tel:+380630987529800" class="cta-item-link btn-link">+38 (063) 0987529800</a>
                            </div>

                            <!-- 1 -->
                            <div class="cta-item fadeIn">
                                <p class="cta-item-title">Старший тренер</p>
                                <a href="tel:+380630987529800" class="cta-item-link btn-link">+38 (063) 0987529800</a>
                            </div>

                            <!-- 2 -->
                            <div class="cta-item fadeIn">
                                <a href="https://t.me/Equicore" class="btn-group">
                                    <b>телеграм бот</b>
                                    <div class="btn-icon type-2">
                                        <!-- <svg width="24" height="24">
                                            <use xlink:href="img/icons/icons_global.svg#icon-telegram" fill="none"></use>
                                        </svg> -->
                                        <svg
                                                id="icon-telegram"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g id="Icon/telegram">
                                                <path
                                                        id="Vector"
                                                        d="M21 5L2 12.5L9 13.5M21 5L18.5 20L9 13.5M21 5L9 13.5M9 13.5V19L12.2488 15.7229"
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="overflow: hidden" class="col-md-4">
                    <div class="image-cover cta-img">
                        <picture>
                            <source srcset="<?php echo $image['url']; ?>" type="image/jpg" />
                            <?php echo wp_get_attachment_image($image['id'], 'full', false, [
                                'loading' => 'lazy'
                            ]); ?>
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="spacer-lg"></div>
</section>
