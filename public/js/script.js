    // Header Script Start
    { /* Header Start */ }

    { /* javascript for the responsive navigation menu */ }
    var menu = document.querySelector(".menu");
    var menuBtn = document.querySelector(".menu-btn");
    var closeBtn = document.querySelector(".close-btn");

    menuBtn.addEventListener("click", () => {
        menuBtn.classList.remove("active");
        menu.classList.add("active");
        closeBtn.classList.add("active");
    });

    closeBtn.addEventListener("click", () => {
        menu.classList.remove("active");
        menuBtn.classList.add("active");
        closeBtn.classList.remove("active");
    });

    //javascript for the navigation bar effects on scroll
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);

    });

    { /* Header End */ }
    // Header Script End


    // Slider Script Start

    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btn');
    var btnsTwo = document.querySelectorAll('.btn-two');
    let currentSlide = 1;
    slides[0].classList.add('active-slider');
    btns[0].classList.add('active-slider');
    btnsTwo[0].classList.add('active-slider');

    { /* Javascript for image slider manual navigation */ }
    var manualNav = function(manual) {
        slides.forEach((slide) => {
            slide.classList.remove('active-slider');
        });
        btns.forEach((btn) => {
            btn.classList.remove('active-slider');
        });

        btnsTwo.forEach((btn) => {
            btn.classList.remove('active-slider');
        });
        slides[manual].classList.add('active-slider');
        btns[manual].classList.add('active-slider');
        btnsTwo[manual].classList.add('active-slider');
    }

    btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            manualNav(i);
            currentSlide = i;
        });
    });

    btnsTwo.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            manualNav(i);
            currentSlide = i;
        });
    });

    // Javascript for image slider autoplay navigation
    var repeat = function(activeClass) {
        let active = document.getElementsByClassName('active-slider');
        let i = 1;

        var repeater = () => {
            setTimeout(function() {
                active.forEach((activeSlide) => {
                    activeSlide.classList.remove('active-slider');
                });

                slides[i].classList.add('active-slider');
                btns[i].classList.add('active-slider');
                btnsTwo[i].classList.add('active-slider');
                i++;

                if (slides.length == i) {
                    i = 0;
                }
                if (i >= slides.length) {
                    return;
                }
                repeater();
            }, 10000);
        }
        repeater();
    }
    repeat();

    // Slider Script End

    // Filter Script Start
    { /* Latest Projects Script Start */ }


    { /* gallery item filter */ }

    const filterButtons = document.querySelector(".latest-projects-header .filter-buttons").children;
    const items = document.querySelector(".latest-projects-gallery").children;

    for (let i = 0; i < filterButtons.length; i++) {
        filterButtons[i].addEventListener("click", function() {
            for (let j = 0; j < filterButtons.length; j++) {
                filterButtons[j].classList.remove("active")
            }
            this.classList.add("active");
            const target = this.getAttribute("data-target")

            for (let k = 0; k < items.length; k++) {
                items[k].classList.remove("active")
                if (target == items[k].getAttribute("data-id")) {
                    items[k].classList.add("active")

                }
            }

        })
    }

    { /* Latest Projects Script End */ }


    { /* Latest News Script Start */ }

    const filterNewsButtons = document.querySelector(".latest-news-header .filter-buttons").children;
    const itemsNews = document.querySelector(".latest-news-gallery").children;

    for (let i = 0; i < filterNewsButtons.length; i++) {
        filterNewsButtons[i].addEventListener("click", function() {
            for (let j = 0; j < filterNewsButtons.length; j++) {
                filterNewsButtons[j].classList.remove("active")
            }
            this.classList.add("active");
            const target = this.getAttribute("data-target")

            for (let k = 0; k < itemsNews.length; k++) {
                itemsNews[k].classList.remove("active")
                if (target == itemsNews[k].getAttribute("data-id")) {
                    itemsNews[k].classList.add("active")

                }
            }

        })
    } { /* Latest News Script End */ }

    // Filter Script End
    // Layer 1 Script Start
    { /* Javascript for image slider autoplay navigation */ }
    var layers = document.querySelectorAll('.layer-img');
    layers[0].classList.add('active-layer');

    var repeat = function(activeClass) {
        let active = document.getElementsByClassName('active-layer');
        let i = 1;

        var repeater = () => {
            setTimeout(function() {
                [...active].forEach((activeSlide) => {
                    activeSlide.classList.remove('active-layer');
                });

                layers[i].classList.add('active-layer');
                i++;

                if (layers.length == i) {
                    i = 0;
                }
                if (i >= layers.length) {
                    return;
                }
                repeater();
            }, 3000);
        }
        repeater();
    }
    repeat();
    // Layer 1 Script Start


    // Layer Script Start
    let box = document.querySelector('.layer-img');
    document.querySelector('.layer-img-1-section').setAttribute("style", "height:" + box.offsetHeight + "px");
    // Layer Script End