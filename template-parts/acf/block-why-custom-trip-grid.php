<?php
/**
 * Block: Why Custom Trip Grid
 * @var array $block
 */

if (is_admin()):?>
    <?php echo __('Block: Why Custom Trip Grid'); ?>
<?php endif; ?>

<?php
$title = get_field('title');
$text = get_field('text');
$section_id = get_field('section_id');

?>
<section class="block-why-custom-trip-grid" id="<?php if ($section_id = get_field('section_id')):?><?php echo $section_id; ?><?php endif; ?>">

    <div class="block-why-custom-trip-grid__inner inner">
        <div class="block-why-custom-trip-grid__content">
            <?php if ($title): ?>
                <h2 class="block-why-custom-trip-grid__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <p class="block-why-custom-trip-grid__text "><?php echo $text; ?></p>
            <?php endif; ?>

        </div>

        <div class="block-why-custom-trip-grid__items">
            <?php while (have_rows('items')) : the_row('items'); ?>
                <div class="block-why-custom-trip-grid__item">
                    <?php if ($img_item = get_sub_field('icon')): ?>
                        <div class="block-why-custom-trip-grid__item-image">
                            <img  src="<?php echo $img_item['url']; ?>" alt="<?php echo $img_item['alt']; ?>">
                        </div>
                    <?php endif; ?>
                    <div class="block-why-custom-trip-grid__item-content">
                        <?php if ($title_item = get_sub_field('title')): ?>
                            <div class="block-why-custom-trip-grid__item-title">
                                <?php echo $title_item; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</section>
