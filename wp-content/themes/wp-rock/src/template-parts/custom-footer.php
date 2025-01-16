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
                        <div class="footer-links-title title">послуги</div>
                        <ul>
                            <li><a href="#">Утримання коней</a></li>
                            <li><a href="#">Тренування</a></li>
                            <li><a href="#">Фотосесії</a></li>
                            <li><a href="#">Кінна школа</a></li>
                            <li><a href="#">Готель</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-6 col-lg-auto text-left">
                    <nav class="footer-links">
                        <div class="footer-links-title title">Більше</div>
                        <ul>
                            <li><a href="about.php">Про нас</a></li>
                            <li><a href="team.php">Команда</a></li>
                            <li><a href="#">Турніри</a></li>
                            <li><a href="gallery.php">Галерея</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-6 col-lg-auto text-left">
                    <nav class="footer-links">
                        <div class="footer-links-title title">контакти</div>
                        <ul>
                            <li><a href="about.php">Контакти</a></li>
                        </ul>
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
                            <li><a class="active" href="#">UA</a></li>
                            <li><a href="#">ENG</a></li>
                            <li><a href="#">PL</a></li>
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
                        <span>Develop by</span>
                        <img width="102" height="14" src="img/SpaceWeb-logo.svg" alt="SpaceWeb logo" loading="lazy" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
