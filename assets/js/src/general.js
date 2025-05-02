
document.addEventListener('DOMContentLoaded', function () {
    const hamburgers = document.querySelectorAll('.header__hamburger');
    const menu = document.querySelector('.js-mobi');
    const logom = document.querySelector('.header__logo-container');

    if (hamburgers.length && menu) {
        hamburgers.forEach(hamburger => {
            hamburger.addEventListener('click', () => {
                hamburger.classList.toggle('active');
                menu.classList.toggle('open');

                if (menu.classList.contains('open')) {
                    // Add class with a delay of 300ms
                    setTimeout(() => {
                        logom.classList.add('act');
                    }, 300); // Adjust the delay (in ms) as needed
                } else {
                    // Remove the class immediately when closing
                    logom.classList.remove('act');
                }
            });
        });
    }

    const scrollToTopButton = document.getElementById('scrollToTop');

    // Show button after scrolling 100px
    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            scrollToTopButton.classList.add('show');
        } else {
            scrollToTopButton.classList.remove('show');
        }
    });

    // Smooth scroll to top
    scrollToTopButton.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });


});
document.addEventListener("DOMContentLoaded", function() {
    function scrollToSection(target) {
        var element = document.querySelector(target);
        if (!element) return;
        var offsetTop = element.getBoundingClientRect().top + window.pageYOffset - 50; // Adjust for fixed header
        window.scrollTo({ top: offsetTop, behavior: 'smooth' });

        // Immediately update active class after scroll
        setTimeout(updateActiveLink, 300);
    }

    document.querySelectorAll('.scroll-to-link a').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var section = this.getAttribute('href');
            if (section && section.startsWith("#")) {
                scrollToSection(section);
            }

            document.querySelectorAll('.scroll-to-link').forEach(function(item) {
                item.classList.remove('active');
            });
            this.parentElement.classList.add('active');
        });
    });

    function updateActiveLink() {
        var scrollPosition = window.pageYOffset;

        document.querySelectorAll('.scroll-to-link a').forEach(function(link) {
            var section = link.getAttribute('href');
            if (!section || !section.startsWith("#")) return;
            var target = document.querySelector(section);
            if (!target) return;

            var sectionTop = target.getBoundingClientRect().top + window.pageYOffset - 60;
            var sectionBottom = sectionTop + target.offsetHeight;

            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                document.querySelectorAll('.scroll-to-link').forEach(function(item) {
                    item.classList.remove('active');
                });
                link.parentElement.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', updateActiveLink);
    window.addEventListener('resize', updateActiveLink);
    updateActiveLink();



    document.querySelectorAll(".mobi .menu-item-has-children > a").forEach(function (trigger) {
        trigger.addEventListener("click", function (e) {
            e.preventDefault(); // prevent link from navigating

            const parentItem = this.parentElement;
            const subMenu = parentItem.querySelector(".sub-menu");

            // Toggle active class
            if (subMenu) {
                subMenu.classList.toggle("active");
            }

            // Optional: toggle class on the parent too
            parentItem.classList.toggle("active");
        });
    });

});









