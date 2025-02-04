<?php
/**
 * Block - Call To Action.
 */

global $global_options;
$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$title      = get_field_value($block_fields, 'title');
$image      = get_field_value($block_fields, 'image');

// Contacts info
$contacts    = get_field_value($global_options, 'contacts');
$telegram    = get_field_value($global_options, 'telegram');
?>

<section class="section <?php if (!IS_ADMIN) echo 'animate'; ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="container-fluid px-sm">
        <div class="qst-section">
            <div class="row g-xs justify-content-center">
                <div class="col-md-8 animate slideRight">
                    <div class="cta-content <?php if (!IS_ADMIN) echo 'animate'; ?>" data-animate='{"target": ".fadeIn",  "delay": 100}'>
                        <div class="h3 title mb-md text-left text-animate">
                            <?php echo $title ?>
                        </div>

                        <div class="cta-items">
                            <?php foreach ($contacts as $i => $contact) : if ($i == 2) break; ?>
                                <div class="cta-item fadeIn">
                                    <p class="cta-item-title"><?php echo $contact['title'] ?></p>
                                    <a href="tel:<?php echo $contact['phone'] ?>" class="cta-item-link btn-link"><?php echo $contact['phone'] ?></a>
                                </div>
                            <?php endforeach; ?>

                            <?php if ($telegram) : ?>
                                <div class="cta-item fadeIn">
                                    <?php get_template_part('/src/template-parts/links', 'telegram') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div style="overflow: hidden" class="col-md-4 animate slideLeft">
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
</section>
