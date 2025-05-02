<?php
/**
 * Block: Grid Two Items Custom
 * @var array $block
 */

if (is_admin()):?>
    <?php echo __('Block: Grid Two Items Custom'); ?>
<?php endif; ?>

<?php
$title = get_field('title');
$text = get_field('text');
$section_id = get_field('section_id');


?>
<section class="block-grid-two-items-custom" id="<?php if ($section_id = get_field('section_id')):?><?php echo $section_id; ?><?php endif; ?>">

    <div class="block-grid-two-items-custom__inner inner">
        <div class="block-grid-two-items-custom__content">
            <?php if ($title): ?>
                <h2 class="block-grid-two-items-custom__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <p class="block-grid-two-items-custom__text "><?php echo $text; ?></p>
            <?php endif; ?>

        </div>

        <div class="block-grid-two-items-custom__items">
            <?php while (have_rows('items')) : the_row('items'); ?>
                <div class="block-grid-two-items-custom__item">
                    <?php if ($img_item = get_sub_field('image')): ?>
                        <div class="block-grid-two-items-custom__item-image">
                            <img class="img-cover" src="<?php echo $img_item['url']; ?>" alt="<?php echo $img_item['alt']; ?>">
                        </div>
                    <?php endif; ?>
                    <div class="block-grid-two-items-custom__item-content">
                        <?php if ($title_item = get_sub_field('title')): ?>
                            <div class="block-grid-two-items-custom__item-title">
                                <?php echo $title_item; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($text_item = get_sub_field('text')): ?>
                            <div class="block-grid-two-items-custom__item-text">
                                <?php echo $text_item; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($price_item = get_sub_field('price')): ?>
                            <div class="block-grid-two-items-custom__item-price price"  data-price-usd="<?php echo $price_item; ?>">
                                <?php echo $price_item; ?>
                            </div>
                        <?php endif; ?>
                        <div class="block-grid-two-items-custom__btn">
                            <?php
                            $link_eur = get_sub_field('link_eur');
                            $link_usd = get_sub_field('link_usd');

                            $currency = $_COOKIE['currency'] ?? 'EUR';

                            $default = ($currency === 'USD' && !empty($link_usd)) ? $link_usd : $link_eur;

                            if ($link_eur && $link_usd):
                                ?>
                                <a href="<?php echo esc_url($default['url']); ?>"
                                   data-url-eur="<?php echo esc_url($link_eur['url']); ?>"
                                   data-url-usd="<?php echo esc_url($link_usd['url']); ?>"
                                   class="block-grid-two-items-custom__cta btn-border"
                                   target="<?php echo esc_attr($default['target']); ?>">
                                    <?php echo esc_html($default['title']); ?>
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4.19153L20.4853 12.6768L12 21.1621" stroke="#FF7010" stroke-width="1.5" stroke-linejoin="round"/>
                                        <path d="M20.4853 12.6768H3.51472" stroke="#FF7010" stroke-width="1.5" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>


</section>
