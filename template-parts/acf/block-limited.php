<?php
/**
 * Block: Limited
 * @var array $block
 */

if (is_admin()){
    echo __('Block: Limited');
}

$title = get_field('title');
$text = get_field('text');
$image = get_field('image');;
$normal_price = get_field('normal_price');
$save_price = get_field('save');
$dis_p_t = get_field('discounted_price_title');
$dis_p = get_field('discounted_price');

?>

<section class="block-limited">
    <div class="block-limited__inner">
        <?php if ($image = get_field('image')): ?>
            <?php echo wp_get_attachment_image( $image['ID'], 'full', false, [ 
                'class'   => "img-cover",
                'alt'     => $image['alt'] ?: ('Image limited' . $image['ID']),
            ] ) ?>
        <?php endif; ?>

        <div class="block-limited__content">
            <?php if ($title): ?>
                <h2 class="block-limited__title"><?php echo $title; ?></h2>
            <?php endif; ?>
            <div class="block-limited__timer">
                <div class="block-limited__countdown">
                    <div class="timer-box"><span class="timer-hours">00</span><div class="label">Hours</div></div>
                    <div class="timer-box"><span class="timer-minutes">00</span><div class="label">Minutes</div></div>
                    <div class="timer-box"><span class="timer-seconds">00</span><div class="label">Seconds</div></div>
                </div>
            </div>

            <?php if ($normal_price): ?>
                <div class="block-limited__normal-price">Normal Price: <span class="block-limited__normal-price line" data-price-usd="<?php echo $normal_price; ?>"><?php echo $normal_price; ?></span></div>

            <?php endif; ?>
            <?php if ($save_price): ?>

                <div class="block-limited__save-price" data-price-usd="<?php echo $save_price; ?>"><?php echo $save_price; ?></div>
            <?php endif; ?>
            <div class="block-limited__discont">
                <?php if ($dis_p_t): ?>
                    <div class="block-limited__dis-price-title"><?php echo $dis_p_t; ?></div>
                <?php endif; ?>
                <?php if ($dis_p): ?>
                    <div class="block-limited__dis-price" data-price-usd="<?php echo $dis_p; ?>"><?php echo $dis_p; ?></div>
                <?php endif; ?>
            </div>

            <div class="block-limited__btn">
                <?php if ($cta = get_field('button')): ?>
                    <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"
                       class="block-limited__cta btn-primary">
                        <svg class="svg-inline--fas-fa-cart-arrow-down premium-drawable-icon premium-svg-nodraw"
                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM403.029 192H360v-60c0-6.627-5.373-12-12-12h-24c-6.627 0-12 5.373-12 12v60h-43.029c-10.691 0-16.045 12.926-8.485 20.485l67.029 67.029c4.686 4.686 12.284 4.686 16.971 0l67.029-67.029c7.559-7.559 2.205-20.485-8.486-20.485z"></path>
                        </svg>
                        <?php echo $cta['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
