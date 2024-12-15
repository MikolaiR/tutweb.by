import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Mobile menu functionality
window.toggleMobileMenu = function(open) {
    const menu = document.getElementById('mobile-menu');
    if (menu) {
        menu.classList.toggle('hidden', !open);
    }
};

// Language switcher
window.switchLanguage = function(locale) {
    const form = document.createElement('form');
    form.method = 'GET';
    form.action = `/language/${locale}`;
    document.body.appendChild(form);
    form.submit();
};

// Flash message auto-hide
document.addEventListener('DOMContentLoaded', () => {
    const flashMessage = document.querySelector('[data-flash-message]');
    if (flashMessage) {
        setTimeout(() => {
            flashMessage.style.opacity = '0';
            setTimeout(() => {
                flashMessage.remove();
            }, 300);
        }, 5000);
    }
});
