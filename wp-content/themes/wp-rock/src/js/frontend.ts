/**
 * SASS
 */
import '../scss/frontend.scss';
/**
 * JavaScript
 */
import Sliders from './components/swiper-init';
import Popup from './parts/popup-window';

function ready() {
    const popupInstance = new Popup();
    const header = document.querySelector('.site-header') as HTMLElement;

    popupInstance.init();

    window.document.addEventListener('scroll', () => {
        const operationType = header && Math.floor(window.scrollY) > 100 ? 'add' : 'remove';
        header.classList[operationType]('scroll-header');
    });

    {
        // Detect Initial scroll of page
        const operationType = header && Math.floor(window.scrollY) > 100 ? 'add' : 'remove';
        header.classList[operationType]('scroll-header');
    }
}

window.document.addEventListener('DOMContentLoaded', ready);
