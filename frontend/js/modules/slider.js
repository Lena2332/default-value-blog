const initParams = {
    sliderClass: 'slider',
    trackClass: 'slider-track',
    listClass: 'slider-list',
    slideClass: 'slider-slide',
    sliderInitialize: 'slider-initialized',
    trackDragging: 'dragging'
}

const defaultParams = {
    loop: false,
    speed: 300,
    slidesPerView: 1,
    additionalSlederClass: '',
    additionalSlideClass: '',
    navigation: false,
    breakpoints: {}
}

/** regex to match first the first coords (250px) in translate3d(250px, 0, 0)  */
const transformRegex = /[-0-9.]+(?=px)/;

/**
 * find the closest breakpoint to the current value of window width
 * @param {Number[]} array
 * @param {Number} value
 * @returns {Number}
 */
const findCurrentBreakpoint = (array, value) => {
    const foundBreakpoint = array.find(el => el === value);

    /** if value is already in array - return this value */
    if (foundBreakpoint) {
        return value;
    }

    /** if not - return the closest previous value  */
    const tmp = [...array, value].sort((a, b) => a - b);
    const idx = tmp.findIndex(el => el === value);

    return idx ? array[idx - 1] : value
}

/** returns the array of styles, filtering empty values that can be used in classList add */
const concatStyles = styles => {
    return styles.filter(el => el);
}

/**
 * We can receive 2 types of event: either Mouse or Touch.
 * For Mouse event current x-coordinate locate in event.clientX
 * For Touch event - in event.touches[0] - track only one touch
 * normalized to MouseEvent
 *
 * @param {MouseEvent | TouchEvent} evt
 * @returns {*}
 */
const resolveEvent = evt => {
    return evt.type.search('touch') !== -1 ? evt.touches[0] : evt;
}

/**
 * update slide width
 *
 * @param {HTMLElement} slide
 * @param {Number} width
 */
const updateSlideWidth = (slide, width) => {
    slide.style.width = `${width}px`
}

class Slider
{
    constructor(el, params= {}) {

        let containers;

        const sliderParams = Object.assign({}, defaultParams, params);

        if(!el && !params.el) {
            return;
        }

        if(el) {
            containers = document.querySelectorAll(el);
        }

        if(containers) {
            if(containers.length > 1) {
                containers = Array.from(containers);

                return containers.map(container => {
                     return new Slider(null, {...sliderParams, el: container})
                })
            }

            if(containers.length === 1) {
                console.log('container');
                sliderParams.el = containers[0]
            }
        }

        this.initParams = sliderParams;
        this.params = sliderParams;
        this.swipePosition = {
            posInit: 0,
            posX1: 0,
            posX2: 0,
            posFinal: 0,
            posThreshold: 0.4
        }

        this.initSlider();

    }

    initSlider()
    {
        const {el, additionalSliderClass} = this.params;
        const sliderClasses = concatStyles([initParams.slideClass, additionalSliderClass, initParams.sliderInitialize]);

        this.containerWidth = el.offsetWidth;
        this.activeIndex = 0;

        this.initTrack();
    }

    initTrack()
    {
        console.log('initTrack');
        const list = document.createElement('div');
        const track = document.createElement('div');
        const slideClasses = concatStyles([initParams.slideClass, this.params.additionalSlideClass]);

        list.classList.add(initParams.listClass);
        track.classList.add(initParams.trackClass);
        track.style.cssText = `
            transform: translate3d(0, 0, 0);
            transition: transform ${ this.params.speed}ms
        `
        /**
         *  children are actually not an array, they are NodeList, to use them as an array,
         *  they need to transform into one either by Array.from() or [...this.params.el.children]
         */
        this.slides = Array.from(this.params.el.children);

        this.slides.forEach(slide => {
            slide.classList.add(...slideClasses);
            slide.style.width = `${this.containerWidth/this.params.slidesPerView}px`;
            //updateSlideWidth(slide, this.getSlideWidth());
        })

        /** append actually move nodes to new parent */
        track.append(...this.params.el.children)
        list.append(track)
        this.params.el.append(list)
        this.track = track;
    }
}

export default Slider;