<?php
$id = $args['id'] ?: get_the_ID();

$thumbnail_id = get_post_thumbnail_id($id);
?>

<div
    class="accordion-item slideUp"
    itemscope
    itemprop="mainEntity"
    itemtype="https://schema.org/Question"
>
    <div class="accordion-title" itemprop="name">
        <i></i>
        що одягнути на тренування?
    </div>

    <div
        class="accordion-inner"
        itemscope
        itemprop="acceptedAnswer"
        itemtype="https://schema.org/Answer"
    >

        <div class="text" itemprop="text">
            <p>
                Eqicore — це місце, де поєднуються традиції кінного спорту і сучасні методи тренувань,
                створюючи комфортну та безпечну атмосферу для коней та їхніх власників.
            </p>
        </div>
    </div>
</div>