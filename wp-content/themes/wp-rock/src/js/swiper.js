/* eslint-disable */

//*===========
//*  SWIPER  =
//*===========
const _functions = {};
let winW, winH, winScr, isTouchScreen, isAndroid, isChrome, isIPhone, isMac;

jQuery(function ($) {
    'use strict';
    // Options set Swiper
    function updateClasses({ el, slides, activeIndex }) {
        $(el).find('.swiper-slide-prev-prev').removeClass('swiper-slide-prev-prev');
        $(slides).eq(activeIndex).prev().prev().addClass('swiper-slide-prev-prev');
        $(el).find('.swiper-slide-next-next').removeClass('swiper-slide-next-next');
        $(slides).eq(activeIndex).next().next().addClass('swiper-slide-next-next');
    }
    _functions.getSwOptions = function (swiper) {
        let options = swiper.data('options');
        options = !options || typeof options !== 'object' ? {} : options;
        console.log(options);
        const $p = swiper.closest('.swiper-entry'),
            slidesLength = swiper.closest('.swiper-entry').find('.swiper-wrapper>.swiper-slide').length;

        if (options.arrowsOut) {
            if (!options.navigation)
                options.navigation = {
                    nextEl: $p.closest('section, .section').find('.swiper-button-next')[0],
                    prevEl: $p.closest('section, .section').find('.swiper-button-prev')[0],
                };
            if (!options.pagination) {
                options.pagination = {
                    el: $p.closest('section, .section').find('.swiper-pagination')[0],
                    clickable: false,
                    dynamicBullets: slidesLength > 5 ? true : false,
                };
            } else {
                options.pagination = {
                    el: $p.closest('section, .section').find('.swiper-pagination')[0],
                    ...options.pagination,
                };
            }
        } else {
            if (!options.pagination) {
                options.pagination = {
                    el: $p.find('.swiper-pagination')[0],
                    clickable: false,
                    dynamicBullets: slidesLength > 5 ? true : false,
                };
            } else {
                options.pagination = {
                    el: $p.find('.swiper-pagination')[0],
                    ...options.pagination,
                };
            }
            if (!options.navigation) {
                options.navigation = {
                    nextEl: $p.find('.swiper-button-next')[0],
                    prevEl: $p.find('.swiper-button-prev')[0],
                };
            }
        }

        options.preloadImages = false;
        options.lazy = {
            loadPrevNext: true,
        };
        options.observer = true;
        options.observeParents = true;
        options.watchOverflow = true;
        if (!('centerInsufficientSlides' in options)) options.centerInsufficientSlides = true;
        if (!options.speed) options.speed = 1000;
        options.roundLengths = true;
        if (isTouchScreen) options.direction = 'horizontal';
        if (slidesLength <= 1) {
            options.loop = false;
        }
        options.on = {
            init(swiper) {
                updateClasses(swiper);
            },
            slideChange(swiper) {
                updateClasses(swiper);
            },
        };

        return options;
    };

    _functions.updateSwiperLock = function (swiper) {
        if (swiper.isLocked) {
            $(swiper.el).closest('.swiper-entry').addClass('swiper-controls-hide');
        } else {
            $(swiper.el).closest('.swiper-entry').removeClass('swiper-controls-hide');
        }
    };
    // Init each Swiper
    _functions.initSwiper = function ($el) {
        const options = _functions.getSwOptions($el);
        const swiper = new Swiper($el[0], options);

        if (options.destroy) {
            const breakpoint = window.matchMedia(options.destroy);
            const breakpointChecker = function () {
                if (breakpoint.matches === true) {
                    if (swiper !== undefined) {
                        swiper.el.classList.add('swiper-destroyed');
                        swiper.destroy(true, true);
                    }
                    return;
                } else if (breakpoint.matches === false && swiper.destroyed) {
                    swiper = new Swiper($el[0], options);
                    swiper.el.classList.remove('swiper-destroyed');
                    _functions.updateSwiperLock(swiper);
                }
            };
            breakpointChecker();
            breakpoint.addEventListener('change', breakpointChecker);
        }

        _functions.updateSwiperLock(swiper);
        swiper.on('resize', function () {
            _functions.updateSwiperLock(swiper);
        });
        $(document).trigger('swiperInit');
    };
    $('.swiper-entry .swiper-container').each(function () {
        let thisSlider = $(this);

        _functions.initSwiper(thisSlider);
    });

    // thumbs Swiper
    $('.swiper-thumbs').each(function () {
        if ($('.swiper-thumbs-top').length && $('.swiper-thumbs-bottom').length) {
            let t = $(this);
            let top = t.find('.swiper-thumbs-top>.swiper-container')[0].swiper,
                bottom = t.find('.swiper-thumbs-bottom>.swiper-container')[0].swiper;
            top.thumbs.swiper = bottom;
            top.thumbs.init();
            top.thumbs.update();

            if (top.slides.length < 2) {
                t.addClass('hide-bottom');
            }
        }
    });
});