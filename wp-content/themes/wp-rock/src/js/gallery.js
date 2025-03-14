/* eslint-disable */

jQuery(function ($) {
    'use strict';

    function initGallery() {
        const glrItem = $('.glr-item');
        if (!glrItem) return;
        glrItem.lightGallery({
            selector: '.lightbox-img',
            // prevHtml: '<div class="swiper-button-prev"></div>',
            // nextHtml: '<div class="swiper-button-next"></div>',
            // appendSubHtmlTo: ".lg-sub-html",
            subHtmlSelectorRelative: true,
            speed: 600,
            backdropDuration: 300,
            escKey: true,
            keyPress: true,
            controls: true,
            getCaptionFromTitleOrAlt: true,
            download: false,
        });

        $(document).on('onBeforeOpen.lg', '.lightbox-gallery', function () {
            _functions.removeScroll();
        });

        $(document).on('onCloseAfter.lg', '.lightbox-gallery', function () {
            _functions.addScroll();
        });

        $(document).on('onAfterSlide.lg.tm', '.lightbox-gallery', function () {
            if ($('.lg-current').find('.lg-video video').length) {
                $('.lg-current').find('.lg-video video')[0].play();
            }
        });
    }

    initGallery();
    $(document).on('customFilterUpdated', initGallery);

});