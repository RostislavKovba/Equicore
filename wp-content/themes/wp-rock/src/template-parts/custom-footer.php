<?php
/**
 * Custom footer template
 *
 * @package WP-rock
 */

global $global_options;

$socials_title = get_field_value($global_options, 'footer_socials_title');
?>
<footer itemscope itemtype="http://schema.org/Organization">
    <meta itemprop="name" content="<?php bloginfo('name'); ?>" />

    <div class="container-fluid px-md">
        <div class="footer-top">
            <div class="row justify-content-between">

                <!-- Logo -->
                <div class="col-12 col-md-auto">
                    <?php echo WP_Rock::custom_logo('footer-logo'); ?>
                </div>

                <div class="col-6 col-lg-auto text-left">
                    <nav class="footer-links">
                        <div class="footer-links-title title">
                            <?php echo wp_get_nav_menu_name( 'footer_menu_1' ); ?>
                        </div>
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'footer_menu_1',
                                'menu_class'      => '',
                                'container'       => false,
                            )
                        ); ?>
                    </nav>
                </div>

                <div class="col-6 col-lg-auto text-left">
                    <nav class="footer-links">
                        <div class="footer-links-title title">
                            <?php echo wp_get_nav_menu_name( 'footer_menu_2' ); ?>
                        </div>
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'footer_menu_2',
                                'menu_class'      => '',
                                'container'       => false,
                            )
                        ); ?>
                    </nav>
                </div>

                <div class="col-6 col-lg-auto text-left">
                    <nav class="footer-links">
                        <div class="footer-links-title title">
                            <?php echo wp_get_nav_menu_name( 'footer_menu_3' ); ?>
                        </div>
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'footer_menu_3',
                                'menu_class'      => '',
                                'container'       => false,
                            )
                        ); ?>
                    </nav>
                </div>

                <!-- Socials -->
                <div class="col-6 col-lg-auto text-left">
                    <div class="social">
                        <div class="social-title title"><?php echo $socials_title; ?></div>

                        <?php get_template_part('/src/template-parts/links', 'socials') ?>
                    </div>
                </div>

                <!-- Langs -->
                <div class="col-12">
                    <div class="footer-langs">
                        <?php get_template_part('/src/template-parts/links', 'lang') ?>
                    </div>
                </div>
            </div>
        </div>
        <hr />

        <!-- footer-bottom -->
        <div class="footer-bottom">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 order-2 order-lg-1">
                    <?php wp_nav_menu(
                        array(
                            'theme_location'  => 'footer_terms',
                            'menu_class'      => 'footer-copy',
                            'container'       => false,
                        )
                    ); ?>
                </div>

                <div class="col-lg-4 order-2 order-lg-2">
                    <a class="dev-link" target="_blank" href="https://spaceweb.com.ua/">
                        <span>Developed by</span>
                        <img width="102" height="14" src="<?php echo ASSETS_IMG ?>/SpaceWeb-logo.svg" alt="SpaceWeb logo" loading="lazy" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
