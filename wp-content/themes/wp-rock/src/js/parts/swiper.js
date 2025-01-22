/* eslint-disable */

//*===========
//*  SWIPER  =
//*===========

export function inistSwiper() {
    const _functions = {};
    let winW, winH, winScr, isTouchScreen, isAndroid, isChrome, isIPhone, isMac;


    'use strict';
// Options set Swiper
    function updateClasses({ el, slides, activeIndex }) {
        jQuery(el).find('.swiper-slide-prev-prev').removeClass('swiper-slide-prev-prev');
        jQuery(slides).eq(activeIndex).prev().prev().addClass('swiper-slide-prev-prev');
        jQuery(el).find('.swiper-slide-next-next').removeClass('swiper-slide-next-next');
        jQuery(slides).eq(activeIndex).next().next().addClass('swiper-slide-next-next');
    }
    _functions.getSwOptions = function (swiper) {
        let options = swiper.data('options');
        options = !options || typeof options !== 'object' ? {} : options;
        console.log(options);
        const jQueryp = swiper.closest('.swiper-entry'),
            slidesLength = swiper.closest('.swiper-entry').find('.swiper-wrapper>.swiper-slide').length;

        if (options.arrowsOut) {
            if (!options.navigation)
                options.navigation = {
                    nextEl: jQueryp.closest('section, .section').find('.swiper-button-next')[0],
                    prevEl: jQueryp.closest('section, .section').find('.swiper-button-prev')[0],
                };
            if (!options.pagination) {
                options.pagination = {
                    el: jQueryp.closest('section, .section').find('.swiper-pagination')[0],
                    clickable: false,
                    dynamicBullets: slidesLength > 5 ? true : false,
                };
            } else {
                options.pagination = {
                    el: jQueryp.closest('section, .section').find('.swiper-pagination')[0],
                    ...options.pagination,
                };
            }
        } else {
            if (!options.pagination) {
                options.pagination = {
                    el: jQueryp.find('.swiper-pagination')[0],
                    clickable: false,
                    dynamicBullets: slidesLength > 5 ? true : false,
                };
            } else {
                options.pagination = {
                    el: jQueryp.find('.swiper-pagination')[0],
                    ...options.pagination,
                };
            }
            if (!options.navigation) {
                options.navigation = {
                    nextEl: jQueryp.find('.swiper-button-next')[0],
                    prevEl: jQueryp.find('.swiper-button-prev')[0],
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
            jQuery(swiper.el).closest('.swiper-entry').addClass('swiper-controls-hide');
        } else {
            jQuery(swiper.el).closest('.swiper-entry').removeClass('swiper-controls-hide');
        }
    };
// Init each Swiper
    _functions.initSwiper = function (jQueryel) {
        const options = _functions.getSwOptions(jQueryel);
        const swiper = new Swiper(jQueryel[0], options);

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
                    swiper = new Swiper(jQueryel[0], options);
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
        jQuery(document).trigger('swiperInit');
    };
    jQuery('.swiper-entry .swiper-container').each(function () {
        let thisSlider = jQuery(this);

        _functions.initSwiper(thisSlider);
    });

// thumbs Swiper
    jQuery('.swiper-thumbs').each(function () {
        if (jQuery('.swiper-thumbs-top').length && jQuery('.swiper-thumbs-bottom').length) {
            let t = jQuery(this);
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
}