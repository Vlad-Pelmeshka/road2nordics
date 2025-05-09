document.addEventListener('DOMContentLoaded', function () {
	
    var baseSpeed = 0.5;

    // Adjust autoScroll speed based on screen width
    if (window.innerWidth <= 320) {
        baseSpeed = .5;
    } else if (window.innerWidth <= 480) {
        baseSpeed = .5;
    }

    var splide = new Splide('#slider-logos', {
        type: 'loop',
        drag: 'free',
        focus: 'center',
        arrows: false,
        pagination: false,
        autoplay: false,
        perPage: 6,

        autoScroll: {
            speed: baseSpeed,
        },

        breakpoints: {
            1200: { perPage: 5 },
            1024: { perPage: 4 },
            768:  { perPage: 3 },
            480:  { perPage: 2 },
            320:  { perPage: 1 }
        }
    });

    splide.mount(window.splide.Extensions);
});
