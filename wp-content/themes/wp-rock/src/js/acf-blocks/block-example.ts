import Swiper, {Mousewheel, Autoplay, Navigation, EffectFade, Pagination} from 'swiper';

const initBlockExample = () => {
    const blocks = document.querySelectorAll('.block-example');
    if (blocks) {
        blocks.forEach((block) => {
            block.classList.add('active');

            const exampleSlider = document.querySelector('.js-example-slider');

            // Initialize Swiper only if the carousel element exists
            if (exampleSlider && exampleSlider instanceof HTMLElement) {
                const swiper = new Swiper(exampleSlider, {
                    modules: [Autoplay, Navigation, EffectFade, Pagination, Mousewheel],
                    mousewheel: {
                        forceToAxis: true,
                    },
                    loop: true,
                    slidesPerView: 1,
                    speed: 600,
                    effect: 'fade',
                    // autoHeight: true,
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        prevEl: '.js-nav-prev',
                        nextEl: '.js-nav-next',
                    },
                    pagination: {
                        el: ".js-pagination",
                        clickable: true,
                        bulletClass: "block-example__bullet",
                        bulletActiveClass: "block-example__bullet_active",
                    },

                    // Responsive breakpoints
                    breakpoints: {
                        //768: {autoHeight: false,},
                    },
                });
            }
        });
    }
};

document.addEventListener(
    'DOMContentLoaded',
    initBlockExample,
    false
);

// Initialize dynamic block preview (editor).
if (window['acf']) {
    window['acf']?.addAction('render_block_preview', initBlockExample);
}

export {};