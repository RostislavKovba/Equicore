<?php
/**
 * Block - Contacts.
 */

global $global_options;
$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$title       = get_field_value($block_fields, 'title');
$description = get_field_value($block_fields, 'description');

// Contacts info
$contacts    = get_field_value($global_options, 'contacts');
$address     = get_field_value($global_options, 'address');
$telegram    = get_field_value($global_options, 'telegram');
$map         = get_field_value($global_options, 'map');
?>


<section
    class="section section-contacts <?php if (!IS_ADMIN) echo 'animate'; ?>"
    <?php if (IS_ADMIN) echo ' visible'; ?>
    <?php if ($block_id) echo ' id="' . esc_attr($block_id) . '"'; ?>
    <?php if (IS_ADMIN && $disabled) echo 'disabled="disabled"'; ?>
>
    <div class="d-none d-sm-block spacer-lg"></div>
    <div class="d-block d-sm-none spacer-md"></div>

    <div class="container-fluid animate" data-animate='{"target": ".slideUp",  "delay": 400}'>
        <!-- title -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-block text-center mb-md">
                    <h1 class="h2-lg title type-2 slideUp">
                        <i></i>
                        <?php echo $title; ?>
                    </h1>

                    <div class="text text-pretty slideUp">
                        <?php echo $description; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row contact-row g-64 animate" data-animate='{"target": ".fadeIn",  "delay": 100}'>
            <div class="col-lg-6 pl-xl-xl">
                <!-- Contact items -->
                <div class="row gy-md sticky-block">
                    <div class="col-12">
                        <div class="contact-items-w">
                            <div class="row gy-md gx-sm">

                                <?php foreach ($contacts as $contact) : ?>
                                    <div class="col-sm-6 fadeIn">
                                        <div class="contact-item">
                                            <div class="contact-item-img">
                                                <img width="30" height="30" src="<?php echo ASSETS_IMG ?>/icons/icon-phone.svg" alt="" loading="lazy" />
                                            </div>

                                            <div class="contact-item-info">
                                                <b><?php echo $contact['title'] ?></b>
                                                <a href="tel:<?php echo $contact['phone'] ?>"><?php echo $contact['phone'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <?php if ($address) : ?>
                                    <div class="col-sm-6 fadeIn">
                                        <div class="contact-item">
                                            <div class="contact-item-img">
                                                <img width="30" height="30" src="<?php echo ASSETS_IMG ?>/icons/icon-location.svg" alt="" loading="lazy" />
                                            </div>
                                            <div class="contact-item-info">
                                                <b>Адреса</b>
                                                <p><?php echo $address; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 fadeIn">
                        <div class="social type-2">
                            <?php get_template_part('/src/template-parts/links', 'socials') ?>
                        </div>
                    </div>

                    <?php if ($telegram) : ?>
                        <div class="col-lg-12 fadeIn">
                            <?php get_template_part('/src/template-parts/links', 'telegram') ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="col-lg-6 animate slideLeft-2">
                <!-- Map -->
                <div class="spacer-sm d-lg-none"></div>
                <div class="contact-block">
                    <?php echo $map; ?>
                </div>
            </div>
        </div>
    </div>
</section>
