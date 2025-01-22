<?php
/**
 * Block - Contacts.
 */

$block_fields = get_fields();

$disabled = get_field_value($block_fields, 'disabled');
if (!IS_ADMIN && $disabled) {
    return;
}

$class_name = isset($args['className']) ? ' ' . $args['className'] : '';
$block_id   = isset($args['metadata']['name']) ? str_replace(' ', '', $args['metadata']['name']) : '';

$title      = get_field_value($block_fields, 'title');
$description = get_field_value($block_fields, 'description');
$map        = get_field_value($block_fields, 'map');
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
                    <h1 class="h2-lg title type-2 slideUp"><i></i><?php echo $title; ?></h1>
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
                                <div class="col-sm-6 fadeIn">
                                    <!-- 1 -->
                                    <div class="contact-item">
                                        <div class="contact-item-img">
                                            <img width="30" height="30" src="img/icons/icon-phone.svg" alt="" loading="lazy" />
                                        </div>
                                        <div class="contact-item-info">
                                            <b>Голова клубу</b>
                                            <a href="tel:+380630987529800">+38 (063) 0987529800</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- 2 -->
                                    <div class="contact-item fadeIn">
                                        <div class="contact-item-img">
                                            <img width="30" height="30" src="img/icons/icon-phone.svg" alt="" loading="lazy" />
                                        </div>
                                        <div class="contact-item-info">
                                            <b>Старший тренер</b>
                                            <a href="tel:+380630987529800">+38 (063) 0987529800</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 3 -->
                                <div class="col-sm-6 fadeIn">
                                    <div class="contact-item">
                                        <div class="contact-item-img">
                                            <img width="30" height="30" src="img/icons/icon-phone.svg" alt="" loading="lazy" />
                                        </div>
                                        <div class="contact-item-info">
                                            <b>Готель</b>
                                            <a href="tel:+380630987529800">+38 (063) 0987529800</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- 4 -->
                                <div class="col-sm-6 fadeIn">
                                    <div class="contact-item">
                                        <div class="contact-item-img">
                                            <img width="30" height="30" src="img/icons/icon-phone.svg" alt="" loading="lazy" />
                                        </div>
                                        <div class="contact-item-info">
                                            <b>Фотосесії</b>
                                            <a href="tel:+380630987529800">+38 (063) 0987529800</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 5 -->
                                <div class="col-sm-6 fadeIn">
                                    <div class="contact-item">
                                        <div class="contact-item-img">
                                            <img width="30" height="30" src="img/icons/icon-location.svg" alt="" loading="lazy" />
                                        </div>
                                        <div class="contact-item-info">
                                            <b>Адреса</b>
                                            <p>Зимна Вода, вул. Логістична 6</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 fadeIn">
                        <div class="social type-2">
                            <ul style="justify-content: flex-start">
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank" aria-label="you tube">
                                        <img width="16" height="16" src="img/icons/icon-inst.svg" alt="" loading="lazy" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.tiktok.com/" target="_blank" aria-label="facebook">
                                        <img width="16" height="16" src="img/icons/icon-tiktok.svg" alt="" loading="lazy" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 fadeIn">
                        <a href="https://t.me/Equicore" class="btn-group">
                            <b>телеграм бот</b>
                            <div class="btn-icon type-2">
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
                                        ></path>
                                    </g>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 animate slideLeft-2">
                <!-- Map -->
                <div class="spacer-sm d-lg-none"></div>
                <div class="contact-block">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24486.004193631372!2d23.89380816686565!3d49.82791001660129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473ae0e93a84c883%3A0x46f96efe71001752!2z0JfQuNC80L3QsCDQktC-0LTQsCwg0JvRjNCy0ZbQstGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCA4MTExMA!5e0!3m2!1suk!2sua!4v1737469407949!5m2!1suk!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="spacer-xl"></div>
</section>
