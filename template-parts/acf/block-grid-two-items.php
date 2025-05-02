<?php
/**
 * Block: Grid Two Items
 * @var array $block
 */

if (is_admin()):?>
    <?php echo __('Block: Grid Two Items'); ?>
<?php endif; ?>

<?php
$title = get_field('title');
$text = get_field('text');

?>
<section class="block-grid-two-items">

    <div class="block-grid-two-items__inner inner">
        <div class="block-grid-two-items__content">
            <?php if ($title): ?>
                <h2 class="block-grid-two-items__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <p class="block-grid-two-items__text "><?php echo $text; ?></p>
            <?php endif; ?>

        </div>

        <div class="block-grid-two-items__items">
            <?php while (have_rows('items')) : the_row('items'); ?>
                <div class="block-grid-two-items__item">
                    <?php if ($img_item = get_sub_field('image')): ?>
                        <div class="block-grid-two-items__item-image">
                            <img class="img-cover" src="<?php echo $img_item['url']; ?>" alt="<?php echo $img_item['alt']; ?>">
                        </div>
                    <?php endif; ?>
                    <div class="block-grid-two-items__item-content">
                        <?php if ($title_item = get_sub_field('title')): ?>
                            <div class="block-grid-two-items__item-title">
                                <?php echo $title_item; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($text_item = get_sub_field('text')): ?>
                            <div class="block-grid-two-items__item-text">
                                <?php echo $text_item; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>


</section>
