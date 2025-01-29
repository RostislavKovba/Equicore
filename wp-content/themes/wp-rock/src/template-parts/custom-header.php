<?php
/**
 * Custom header template
 *
 * @package WP-rock
 */

global $global_options;

$header_link = get_field_value($global_options, 'header_link');
$header_close_title = get_field_value($global_options, 'header_close_title');
?>

<header class="header">
    <div class="h-wrap">
        <div class="container-fluid">
            <div class="h-inner">
                <!-- logo -->
                <?php echo WP_Rock::custom_logo('h-logo'); ?>

                <!-- h-menu -->
                <div class="h-menu">
                    <div class="btn-close type-2">
                        <span><?php echo $header_close_title; ?></span>
                    </div>
                    <div class="container animate" data-animate='{"target": ".slideUp",  "delay": 250}'>

                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'primary_menu',
                                'menu_class'      => '',
                                'container'       => 'nav',
                                'container_class' => 'h-links',
                            )
                        ); ?>

                        <!-- h-contacts -->
                        <div class="h-contacts d-sm-none">
                            <?php if ($header_link) : ?>
                                <a href="<?php echo $header_link['url'] ?>" class="h-contacts-link type-2">
                                    <?php echo $header_link['title'] ?>
                                </a>
                            <?php endif; ?>

                            <?php get_template_part('/src/template-parts/links', 'socials') ?>
                        </div>
                    </div>
                </div>

                <!-- button contact -->
                <div class="h-action">
                    <?php if ($header_link) : ?>
                        <a href="<?php echo $header_link['url'] ?>" class="btn btn-sm btn-primary">
                            <?php echo $header_link['title'] ?>
                        </a>
                    <?php endif; ?>
                </div>
                <!-- burger -->
                <div class="h-burger js-open-menu"><i></i></div>
            </div>
        </div>
    </div>

    <div class="h-menu-overlay"></div>
</header>
