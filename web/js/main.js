import MobileMenu from "./modules/mobile-menu.js";
import Slider from "./modules/slider.js";

new MobileMenu({
    buttonSelector: "#menu-btn-mobile",
    navWrapper: "#nav-wrapper"
});

new Slider('.blog-slider')