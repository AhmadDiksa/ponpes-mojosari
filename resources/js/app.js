import './bootstrap';

// Import AOS
import AOS from 'aos';
import 'aos/dist/aos.css'; // Import aAOS styles

// Import Swiper
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle'; // Impor semua style Swiper (navigasi, paginasi, dll)

// Inisialisasi AOS
AOS.init({
    duration: 800, // durasi animasi
    once: true, // animasi hanya terjadi sekali
});

// Inisialisasi Hero Slider
document.addEventListener('DOMContentLoaded', () => {
    const heroSlider = new Swiper('.hero-slider', {
        // Opsi Swiper
        direction: 'horizontal',
        loop: true, // Membuat slider berputar terus menerus
        effect: 'fade', // Efek transisi (bisa juga 'slide', 'cube', 'coverflow', 'flip')
        fadeEffect: {
            crossFade: true
        },
        autoplay: {
            delay: 5000, // Pindah slide setiap 5 detik
            disableOnInteraction: false,
        },
        
        // Navigasi (panah kiri/kanan)
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // Paginasi (titik-titik di bawah)
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }
    });
});