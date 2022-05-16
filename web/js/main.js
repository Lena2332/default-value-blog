console.log('linked js');

import MobileMenu from "./modules/mobile-menu.js";

new MobileMenu({
    buttonSelector: "#menu-btn-mobile",
    navWrapper: "#nav-wrapper"
});