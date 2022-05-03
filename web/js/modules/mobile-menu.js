const defaultParams = {
    buttonSelector: "#menu-btn",
    navWrapper: "#nav-wrap"
}

class MobileMenu {
    constructor(params) {
        this.params = Object.assign({}, defaultParams, params);

        const {buttonSelector, navWrapper} = this.params;

        this.button = document.querySelector(buttonSelector);
        this.navWrapper = document.querySelector(navWrapper);

        if(this.button){
            this.addEventListeners();
        }
    }

    addEventListeners() {
        window.addEventListener('click', event => {
            if(this.button.contains(event.target)) {
                this.openMenu();
            }else{
                this.closeMenu();
            }
        })
    }

    closeMenu() {
        this.button.classList.remove('active');
        this.navWrapper.classList.remove('active');
        document.body.classList.remove('open-menu');
    }

    openMenu() {
        this.button.classList.toggle('active');
        this.navWrapper.classList.toggle('active');
        document.body.classList.toggle('open-menu');
    }
}

export default MobileMenu;