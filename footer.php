</main>

<footer class="footer">
    <div class="footer__inner inner">
        <div class="footer__content">
            <div class="footer__form">
                <h2>
                    Sign up for our newsletter
                </h2>
                <p>
                    Be the first to know about our special offers, news, and updates.
                </p>


                <?php echo do_shortcode('[contact-form-7 id="d26f1d8" title="Newsletter form updated"]'); ?>
            </div>
            <div class="footer__menu-conr">
                <nav class="footer__nav">
                    <?php
                    $menu = wp_nav_menu(array(
                        'theme_location' => 'footer-nav',
                        'container' => '',
                        'menu_class' => 'footer__menu',
                        'echo' => FALSE,
                        'fallback_cb' => '__return_false',
                    ));
                    echo !empty($menu) ? $menu : '';
                    ?>
                </nav>
            </div>
            <div class="footer__connect">
                <div class="footer__connect-title">
                    Сontact us:
                </div>
                <div class="footer__connect-email">
                    <a href="mailto:welcome@road2nordics.com">welcome@road2nordics.com</a>
                </div>
                <div class="footer__connect-title">
                    Connect with  us:
                </div>
                <div class="footer__connect-insta">
                    <a class="footer__instagram" href="https://www.instagram.com/road2nordics/" target="_blank" aria-label="Link Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>				</a>
                </div>
            </div>
        </div>

    </div>
    <div class="footer__copyrights">
        <?php if ($copyright = get_field('copyright', 'option')): ?>
            <div class="footer__copyright">
                <?php echo str_replace('{{year}}', date('Y'), $copyright); ?>
            </div>
        <?php endif; ?>
    </div>
</footer>
<div id="scrollToTop" class="scroll-to-top">
    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g opacity="0.6">
            <rect width="50" height="50" rx="5" fill="#00011A" fill-opacity="0.3"/>
            <path d="M16.7544 26.8596L25.0351 18.614L33.2807 26.8596L34.0176 26.1228L25.0351 17.1403L16.0176 26.1228L16.7544 26.8596Z"
                  fill="white"/>
        </g>
    </svg>

</div>
<script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js
"></script>
<?php wp_footer(); ?>
</div>
</body>
</html>