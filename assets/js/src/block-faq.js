document.addEventListener('DOMContentLoaded', function () {
    const accordions = document.querySelectorAll('.js-acc-item');

    const openAccordion = (accordion) => {
        const accContent = accordion.querySelector('.js-acc-content');

        accordion.classList.add('active');
        accContent.style.maxHeight = accContent.scrollHeight + 'px';
    };

    const closeAccordion = (accordion) => {
        const accContent = accordion.querySelector('.js-acc-content');
        accordion.classList.remove('active');
        accContent.style.maxHeight = null;
    };

    const updateAccordionHeights = () => {
        accordions.forEach((accordion) => {
            if (accordion.classList.contains('active')) {
                const accContent = accordion.querySelector('.js-acc-content');
                accContent.style.maxHeight = accContent.scrollHeight + 'px';
            }
        });
    };

    accordions.forEach((accordion) => {
        const accTrigger = accordion.querySelector('.js-acc-trigger');
        const accContent = accordion.querySelector('.js-acc-content');

        accTrigger.onclick = () => {
            if (accContent.style.maxHeight) {
                closeAccordion(accordion);
            } else {
                accordions.forEach((accordion) => closeAccordion(accordion));
                openAccordion(accordion);
            }
        };
    });

    // Open the first accordion on load
    if (accordions.length > 0) {
        openAccordion(accordions[0]);
    }

    // Listen for window resize (such as device orientation change)
    window.addEventListener('resize', updateAccordionHeights);
});
