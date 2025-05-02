<?php
/*
Block: FAQ
 */
?>
<?php if (is_admin()): ?>
    <?php echo __('Block: FAQ'); ?>
<?php endif; ?>
<?php
$section_id = get_field('section_id');
?>
<section id="<?php if ($section_id = get_field('section_id')):?><?php echo $section_id; ?><?php endif; ?>"
         class="block-faq faq-animate" data-scroll-section>
    <div class="block-faq__inner inner faq-animate-inner">
        <div class="block-faq__content col-start faq-animate-content" data-scroll data-scroll-offset="15%">
            <?php if ($title = get_field('title')): ?>
                <h2 class="block-faq__title  faq-animate-title"><?php echo $title; ?></h2>
            <?php endif; ?>
        </div>
        <?php if (get_field('items')): ?>
            <ul class="block-faq__items js-collapse-items faq-animate-items">
                <?php while (have_rows('items')) : the_row('items'); ?>
                    <li class="block-faq__item js-acc-item faq-animate-item">
                        <div class="block-faq__item-head  js-acc-trigger faq-animate-trigger">
                            <h4 class="block-faq__item-title body-font faq-animate-item-title"><?php echo get_sub_field('name'); ?></h4>
                            <svg class="plus" style="width: 16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path class="plus" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                            </svg>
                            <svg class="minus" style="width: 16px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/>
                            </svg>
                        </div>
                        <div class="block-faq__item-content js-acc-content faq-animate-content">
                            <div class="block-faq__item-content-inner wysiwyg-styles faq-animate-inner-content">
                                <?php echo get_sub_field('text'); ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
        <?php if ($ex_info = get_field('extra_information')): ?>
            <div class="block-faq__extra-info">
                <?php echo $ex_info; ?>
            </div>
        <?php endif; ?>
    </div>
</section>