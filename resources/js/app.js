import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    once: true,
    duration: 800,
    easing: 'ease-out-cubic',
    offset: 80,
});

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const mobileButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

if (mobileButton && mobileMenu) {
    mobileButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
}