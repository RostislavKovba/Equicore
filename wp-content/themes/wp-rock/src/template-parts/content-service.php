<?php
$id = $args['id'] ?: get_the_ID();

$thumbnail_id = get_post_thumbnail_id($id);
$categories   = get_the_category($id);
?>

<div class="blog-item">
    <div class="blog-content">
        <a class="h4 title text-animate" href="service-single.php">тренування</a>
        <div class="text text_sm slideUp">
            Eqicore — це місце, де поєднуються традиції кінного спорту і сучасні методи тренувань,
            створюючи комфортну та безпечну атмосферу для коней та їхніх власників.
        </div>
        <a href="service-single.php" class="btn-icon slideUp">
            <svg width="24" height="24">
                <use xlink:href="img/icons/icons_global.svg#icon-arrow" fill="none"></use>
            </svg>
        </a>
    </div>

    <div class="blog-img-w">
        <a class="blog-img" href="service-single.php">
            <picture>
                <source srcset="img/blog/blog-02.webp" type="image/webp" />
                <source srcset="img/blog/blog-02.jpg" type="image/jpg" />
                <img
                        class="rellax-img"
                        data-rellax-speed="-2"
                        width="384"
                        height="218"
                        src="#"
                        alt=""
                        loading="lazy"
                />
            </picture>
        </a>

        <a href="service-single.php" class="blog-labels">
            <div class="h4 title">тренування</div>
            <div class="btn-icon">
                <svg width="24" height="24">
                    <use xlink:href="img/icons/icons_global.svg#icon-arrow" fill="none"></use>
                </svg>
            </div>
        </a>
    </div>
</div>