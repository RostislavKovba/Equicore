<?php
/**
 * Custom header template
 *
 * @package WP-rock
 */

global $global_options;
?>

<header>
    <div class="h-wrap">
        <div class="container-fluid">
            <div class="h-inner">
                <!-- logo -->
                <a class="h-logo" href="index.php" aria-label="Company logo">
                    <img width="88" height="40" src="img/logo.svg" alt="" loading="eager" />
                </a>

                <!-- h-menu -->
                <div class="h-menu">
                    <div class="btn-close type-2">
                        <span>закрити</span>
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
                            <a href="contact.php" class="h-contacts-link type-2">Контакти</a>
                            <a href="https://www.instagram.com/" class="h-contacts-link">
                                <img src="img/icons/inst-icon.svg" alt="icon" />
                            </a>
                            <a href="https://www.tiktok.com/" class="h-contacts-link">
                                <img src="img/icons/tiktok-icon.svg" alt="icon" />
                            </a>
                        </div>
                    </div>
                </div>
                <!-- button contact -->
                <div class="h-action">
                    <a href="contacts.php" class="btn btn-sm btn-primary">
                        <b>контакти</b>
                    </a>
                </div>
                <!-- burger -->
                <div class="h-burger js-open-menu"><i></i></div>
            </div>
        </div>
    </div>

    <div class="h-menu-overlay"></div>
</header>
