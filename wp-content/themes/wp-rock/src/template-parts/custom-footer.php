<?php
/**
 * Custom footer template
 *
 * @package WP-rock
 */

?>
<footer itemscope itemtype="http://schema.org/Organization">
    <meta itemprop="name" content="Name company" />

    <div class="container-fluid px-md">
        <div class="footer-top">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto">
                    <a class="footer-logo" href="index.php" aria-label="Company logo">
                        <img width="160" height="76" src="img/logo.svg" alt="" loading="lazy" />
                    </a>
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

                <div class="col-6 col-lg-auto text-left">
                    <div class="social">
                        <div class="social-title title">слідкуйте за нами</div>
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
                <!-- langs -->
                <div class="col-12">
                    <div class="footer-langs">
                        <ul>

                            <?php
                            $languages = pll_the_languages( ['raw'=>true] );

                            foreach( $languages as $lang ) : ?>

                                <li><a href="<?php echo $lang['url']; ?>"
                                       lang="<?php echo $lang['slug']; ?>"
                                       hreflang="<?php echo $lang['slug']; ?>"
                                       class="<?php echo $lang['current_lang'] ? 'active' : '' ?>">
                                        <?php echo pll__($lang['name']); ?>
                                    </a>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr />

        <!-- footer-bottom -->
        <div class="footer-bottom">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 order-2 order-lg-1">
                    <div class="footer-copy">
                        <div>Terms & Conditions</div>
                        <a href="privacy.php">Privacy Policy</a>
                    </div>
                </div>

                <div class="col-lg-4 order-2 order-lg-2">
                    <a class="dev-link" href="#">
                        <span>Developed by</span>
                        <img width="102" height="14" src="img/SpaceWeb-logo.svg" alt="SpaceWeb logo" loading="lazy" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
