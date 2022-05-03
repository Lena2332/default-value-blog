import MobileMenu from "./modules/mobile-menu.js";
import Slider from "./modules/slider.js";

new MobileMenu({
    buttonSelector: "#menu-btn-mobile",
    navWrapper: "#nav-wrapper"
});

new Slider('.blog-slider',{
    navigation: true,
    loop: true,
    slidesPerView: 3,
    breakpoints: {
        360: {
            slidesPerView: 1
        },
        '480': {
            slidesPerView: 2,
            navigation: false
        },
        768: {
            slidesPerView: 3,
            navigation: true
        }
    }
})