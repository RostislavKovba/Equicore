/* eslint-disable */

import '../scss/frontend.scss';
import Rellax from 'rellax';

//*====================================
//*  FUNCTIONS ON DOCUMENT READY      =
//*====================================
//*  FUNCTIONS CALC & RESIZE, SCROLL  =
//*====================================
//*  ANIMATION                        =
//*====================================
//*  HEADER                           =
//*====================================
//*  POPUPS                           =
//*====================================
//*  KEY FOCUS                        =
//*====================================
//*  TABS, ACCORDION                  =
//*====================================
//*  OTHER JS                         =
//*====================================
//*  DYNAMIC LOAD JS                  =
//*====================================

const _functions = {};
let winW, winH, winScr, isTouchScreen, isAndroid, isChrome, isIPhone, isMac;

jQuery(function ($) {
    ('use strict');

    //*================================
    //*  FUNCTIONS ON DOCUMENT READY  =
    //*================================
    (isTouchScreen =
        navigator.userAgent.match(/Android/i) ||
        navigator.userAgent.match(/webOS/i) ||
        navigator.userAgent.match(/iPhone/i) ||
        navigator.userAgent.match(/iPad/i) ||
        navigator.userAgent.match(/iPod/i)),
        (isAndroid = navigator.userAgent.match(/Android/i)),
        (isChrome =
            navigator.userAgent.indexOf('Chrome') >= 0 && navigator.userAgent.indexOf('Edge') < 0),
        (isIPhone = navigator.userAgent.match(/iPhone/i)),
        (isMac = navigator.platform.toUpperCase().indexOf('MAC') >= 0);

    if (isTouchScreen) $('html').addClass('touch-screen');
    if (isAndroid) $('html').addClass('android');
    if (isChrome) $('html').addClass('chrome');
    if (isIPhone) $('html').addClass('ios');
    if (isMac) $('html').addClass('mac');

    if (!$('.banner-section').length) $('header').addClass('no-banner');

    //*====================================
    //*  FUNCTIONS CALC & SCROLL, RESIZE  =
    //*====================================
    // Function Calculations on page
    _functions.pageCalculations = function () {
        winW = $(window).outerWidth();
        winH = $(window).outerHeight();
    };
    _functions.pageCalculations();

    /* Function on page scroll */
    $(window).on('scroll', function () {
        _functions.scrollCall();
    });

    var prev_scroll = 0;
    _functions.scrollCall = function () {
        winScr = $(window).scrollTop();

        if (winScr > $('header').innerHeight()) {
            $('header').addClass('scrolled');
        } else if (winScr <= $('header').innerHeight()) {
            $('header').removeClass('scrolled');
            $('.js-filter-category').removeClass('top');

            prev_scroll = 0;
        }

        //show/hide header on scroll & filter panel on catalog page
        if (winScr > prev_scroll) {
            //   $('header').addClass('hide');
            $('.js-filter-category').addClass('top');
        } else {
            //   $('header').removeClass('hide');
            $('.js-filter-category').removeClass('top');
        }

        prev_scroll = winScr;
    };
    _functions.scrollCall();

    /* Function on page resize */
    _functions.resizeCall = function () {
        setTimeout(function () {
            _functions.pageCalculations();
        }, 100);
    };

    if (!isTouchScreen) {
        $(window).on('resize', function () {
            _functions.resizeCall();
        });
    } else {
        window.addEventListener(
            'orientationchange',
            function (e) {
                // Portrait
                if (window.orientation == 0) {
                    $('html').removeClass('landscape');
                }
                // Landscape
                else {
                    $('html').addClass('landscape');
                }

                _functions.resizeCall();
            },
            false,
        );
    }

    //*==============
    //*  ANIMATION  =
    //*==============
    document.querySelectorAll('.section').forEach(section => {
        section.style.opacity = 1;
    });
    // elements
    const animateObserver = new IntersectionObserver(
        entries => {
            for (const entry of entries)
                if (entry.isIntersecting && !entry.target.classList.contains('animated'))
                    if (entry.target.getAttribute('data-animate')) {
                        const paramsS = entry.target.getAttribute('data-animate');
                        const params = JSON.parse(paramsS);
                        if (params.target) {
                            entry.target.classList.add('animated');
                            entry.target.querySelectorAll(params.target)?.forEach((el, i) => {
                                setTimeout(() => {
                                    el.classList.add('animated');
                                }, (params.delay || 0) * i + (params.startDelay || 0));
                            });
                        } else {
                            setTimeout(() => {
                                entry.target.classList.add('animated');
                            }, params.delay || 0);
                        }
                    } else {
                        entry.target.classList.add('animated');
                    }
        },
        {
            root: document,
            rootMargin: '-40px',
        },
    );
    document.querySelectorAll('.animate')?.forEach(element => {
        animateObserver.observe(element);
    });

    //*==============
    //*  ANIMATION-observer  =
    //*==============
    const observerFunction = new IntersectionObserver(
        function (entries, observer) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;

                entry.target.classList.add('|', 'animated');
                observer.unobserve(entry.target);
            });
        },
        {
            root: null,
            threshold: 0,
            rootMargin: window.innerWidth > 767 ? '-8%' : '-5%',
        },
    );

    document.querySelectorAll('.section').forEach(block => {
        observerFunction.observe(block);
    });

    //*===========
    //*  HEADER  =
    //*===========

    /* Open menu */
    $(document).on('click', '.js-open-menu', function () {
        $('html').toggleClass('overflow-menu');
        $('header').removeClass('hide');
        $('header').toggleClass('open-menu');
    });

    /* Close menu */
    $(document).on('click', '.h-menu-overlay, .h-menu > .btn-close', function () {
        $('html').removeClass('overflow-menu');
        $('header').removeClass('open-menu');
    });

    //*===========
    //*  POPUPS  =
    //*===========
    _functions.scrollWidth = function () {
        let scrWidth = $(window).outerWidth() - $('body').innerWidth();

        $('body, .h-wrap').css({
            paddingRight: `${scrWidth}px`,
        });
    };

    // Popups Functions
    let popupTop = 0;
    _functions.removeScroll = function () {
        _functions.scrollWidth();
        popupTop = winScr;
        $('html')
            .css({
                top: '-' + winScr,
                width: '100%',
            })
            .addClass('overflow-hidden');
    };

    _functions.addScroll = function () {
        _functions.scrollWidth();
        $('html').removeClass('overflow-hidden');
        window.scroll(0, popupTop);
    };

    _functions.openPopup = function (popup) {
        $('.popup-content').removeClass('active');
        $(popup + ', .popup-wrapper').addClass('active');
        _functions.removeScroll();
    };

    _functions.closePopup = function () {
        $('.popup-wrapper, .popup-content').removeClass('active');
        $('.video-popup iframe').remove();
        _functions.addScroll();
    };

    // Close  popup
    $(document).on('click', '.popup-content .close-popup, .popup-content .layer-close', function (e) {
        e.preventDefault();
        _functions.closePopup();
    });

    // Ajax popup
    $(document).on('click', '.open-popup', function (e) {
        const popupWrapper = document.getElementById('popups');

        if (e.target.closest('.open-popup')) {
            let dataRel = e.target.closest('.open-popup').getAttribute('data-rel');
            e.preventDefault();

            if (popupWrapper.hasChildNodes()) {
                _functions.openPopup('.popup-content[data-rel="' + dataRel + '"]');
            } else {
                const ajaxPopup = new XMLHttpRequest();

                ajaxPopup.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        popupWrapper.innerHTML = this.responseText;

                        setTimeout(function () {
                            _functions.initSelect('.popup-wrapper');
                            _functions.initMask();
                            _functions.openPopup('.popup-content[data-rel="' + dataRel + '"]');
                        }, 50);
                    }
                };
                ajaxPopup.open('GET', 'inc/popups/_popups.php', true);
                ajaxPopup.send();
            }
        }
    });

    //*==============
    //*  KEY FOCUS  =
    //*==============
    // Detect if user is using keyboard tab-button to navigate
    // with 'keyboard-focus' class we add default css outlines
    function keyboardFocus(e) {
        if (e.keyCode !== 9) {
            return;
        }

        switch (e.target.nodeName.toLowerCase()) {
            case 'input':
            case 'select':
            case 'textarea':
                break;
            default:
                document.documentElement.classList.add('keyboard-focus');
                document.removeEventListener('keydown', keyboardFocus, false);
        }
    }
    document.addEventListener('keydown', keyboardFocus, false);

    //*====================
    //*  TABS, ACCORDION  =
    //*====================
    // tabs
    $(document).on('click', '.tab-toggle>div', function (e) {
        let tab = $(this).closest('.tabs').find('.tabs-wrap .tab');
        let i = $(this).index();

        $(this).addClass('is-active').siblings().removeClass('is-active');
        tab
            .eq(i)
            .siblings('.tab:visible')
            .stop()
            .finish()
            .fadeOut(function () {
                tab.eq(i).fadeIn(200);
            });
        e.preventDefault();
    });

    // accordion
    $(document).on('click', '.accordion-title', function () {
        if ($(this).hasClass('is-active')) {
            $(this).removeClass('is-active').next().slideUp();
        } else {
            $(this)
                .closest('.accordion')
                .find('.accordion-title')
                .not(this)
                .removeClass('is-active')
                .next()
                .slideUp();
            $(this).addClass('is-active').next().slideDown();
        }
    });

    // Thousands separator
    _functions.addThousandsSeparator = function (number, separator = ' ') {
        let numberString = number.toString();
        numberString = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, separator);
        return numberString;
    };

    //*====================
    //* dynamic load video
    //*====================
    const options = {
        root: document,
        rootMargin: '50%',
    };

    const videoObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            _functions.videoLoad(entry.target);
            observer.unobserve(entry.target);
        });
    }, options);

    document.querySelectorAll('.video').forEach(element => {
        videoObserver.observe(element);
    });

    _functions.videoLoad = function (block) {
        let videoBlock = $(block).find('video'),
            videoSrc = videoBlock.data('src');
        videoBlock.attr('src', videoSrc);
    };

    //activate autoplay video
    if ($('.video').length) {
        $(this).find('video').attr('autoplay', '');
    }

    //*=============
    //*  OTHER JS  =
    //*=============
    //rellax
    let rellax, rellaxImg;
    setTimeout(() => {
        if ($('.rellax').length) {
            rellax = new Rellax('.rellax', {
                center: true,
            });
            rellax.refresh();
        }
        if ($('.rellax-img').length) {
            rellaxImg = new Rellax('.rellax-img', {
                center: true,
            });
            rellaxImg.refresh();
        }
    }, 300);

    // text animation
    $('.text-animate').each(function () {
        $(this)
            .find('*')
            .addBack()
            .contents()
            .each(function () {
                if (this.nodeType == 3) {
                    let $this = $(this);
                    $this.replaceWith(
                        $this.text().replace(/[^\s]+/g, "<span class='text-animate-word'><span>$&</span></span>"),
                    );
                }
            });
    });

    const options2 = {
        root: document,
        rootMargin: '0px',
    };

    const textAnimateObserver = new IntersectionObserver(entries => {
        for (const entry of entries)
            if (entry.isIntersecting && !entry.target.classList.contains('text-animated')) {
                entry.target.classList.add('text-animated');
                const letters = entry.target.querySelectorAll('.text-animate-word');
                const delay = 300 / letters.length;
                letters.forEach(function (letter, i) {
                    setTimeout(() => {
                        letter.classList.add('animated');
                    }, i * delay);
                });
            }
    }, options2);

    setTimeout(() => {
        document.querySelectorAll('.text-animate')?.forEach(element => {
            textAnimateObserver.observe(element);
        });
    }, 1000);

});