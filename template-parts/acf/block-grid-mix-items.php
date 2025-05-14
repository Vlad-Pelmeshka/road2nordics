<?php
/**
 * Block: Grid Mix Items
 * @var array $block
 */

if (is_admin()){
    echo __('Block: Grid Mix Items');
}

$title = get_field('title');
$text = get_field('text');

?>

<section class="block-grid-mix-items">
    <div class="block-grid-mix-items__inner inner">
        <div class="block-grid-mix-items__content">
            <?php if ($title): ?>
                <h2 class="block-grid-mix-items__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <p class="block-grid-mix-items__text"><?php echo $text; ?></p>
            <?php endif; ?>
        </div>

        <div class="block-grid-mix-items__items">
            <?php while (have_rows('items')) : the_row(); ?>
                <?php
                $img_item = get_sub_field('image');
                $title_item = get_sub_field('title');
                $text_item = get_sub_field('text');
                $is_large = get_sub_field('is_large'); // A custom field to determine if the item should be large
                ?>

                <div class="block-grid-mix-items__item <?php echo $is_large ? 'large-item' : 'small-item'; ?>">
                    <?php if ($img_item): ?>
                        <div class="block-grid-mix-items__item-image">
                            <?php echo wp_get_attachment_image( $img_item['ID'], 'full', false, [ 
                                'class'   => "img-cover",
                                'alt'     => 'Grid mix items ' . $img_item['ID'],
                            ] ) ?>
                        </div>
                    <?php endif; ?>
                    <div class="block-grid-mix-items__item-content">
                        <?php if ($title_item): ?>
                            <div class="block-grid-mix-items__item-title">
                                <?php echo $title_item; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($text_item): ?>
                            <div class="block-grid-mix-items__item-text">
                                <?php echo $text_item; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</section>
