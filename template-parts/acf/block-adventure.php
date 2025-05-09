<?php
/**
 * Block: Adventure
 * @var array $block
 */

if (is_admin()):?>
    <?php echo __('Block: Adventure'); ?>
<?php endif; ?>

<?php
$title = get_field('title');
$text = get_field('text');
$price = get_field('price');
$price_d = get_field('discount_price');
$save = get_field('save');
$image = get_field('image');
$extra_text = get_field('extra_text_for_price');
$section_id = get_field('section_id');
?>
<section id="<?php if ($section_id = get_field('section_id')): ?><?php echo $section_id; ?><?php endif; ?>"
         class="block-adventure">

    <div class="block-adventure__content">
        <?php if ($title): ?>
            <h2 class="block-adventure__title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($icon = get_field('icon')): ?>
            <div class="block-adventure__icon">
                <img class="" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"/>
            </div>

        <?php endif; ?>
        <?php if ($text): ?>
            <div class="block-adventure__text"><?php echo $text; ?></div>
        <?php endif; ?>
        <?php if ($price_d): ?>
            <div class="block-adventure__price-d">

                <del> <span class="price" data-price-usd="<?php echo $price_d; ?>"> <?php echo $price_d; ?></span></del>
            </div>
            <?php if ($save): ?>
                <div class="block-adventure__price-save">
                    <?php echo $save; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($extra_text): ?>
            <div class="block-adventure__extra_text">
                <?php echo $extra_text; ?>
            </div>
        <?php endif; ?>
        <?php if ($price): ?>
            <div class="block-adventure__price">
                <div class="block-adventure__price-inner">
                    <span class="price" data-price-usd="<?php echo $price; ?>"> <?php echo $price; ?></span>
                </div>

            </div>
        <?php endif; ?>
        <div class="block-adventure__btn">
            <?php
            $button_eur = get_field('button_eur');
            $button_usd = get_field('button_usd');

            $currency = $_COOKIE['currency'] ?? 'EUR';

            $default = ($currency === 'USD' && !empty($button_usd)) ? $button_usd : $button_eur;

            if ($button_eur && $button_usd):
                ?>
                <a href="<?php echo esc_url($default['url']); ?>"
                   data-url-eur="<?php echo esc_url($button_eur['url']); ?>"
                   data-url-usd="<?php echo esc_url($button_usd['url']); ?>"
                   class="block-adventure__cta btn-primary"
                   target="<?php echo esc_attr($default['target']); ?>"
				   rel="nofollow noopener">
                    <svg class="svg-inline--fas-fa-cart-arrow-down premium-drawable-icon premium-svg-nodraw"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM403.029 192H360v-60c0-6.627-5.373-12-12-12h-24c-6.627 0-12 5.373-12 12v60h-43.029c-10.691 0-16.045 12.926-8.485 20.485l67.029 67.029c4.686 4.686 12.284 4.686 16.971 0l67.029-67.029c7.559-7.559 2.205-20.485-8.486-20.485z"></path>
                    </svg>
                    <?php echo esc_html($default['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="block-adventure__image">
        <?php if ($image = get_field('image')): ?>
            <?php echo wp_get_attachment_image( $image['ID'], 'full', false, [ 
                'alt'     => $image['alt'],
                'loading' => 'eager',
                'class'   => 'img-cover'
            ] ) ?>
        <?php endif; ?>
    </div>

</section>
