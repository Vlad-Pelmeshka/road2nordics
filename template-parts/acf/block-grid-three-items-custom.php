<?php
/**
 * Block: Grid Three Items Custom
 * @var array $block
 */

if (is_admin()){
    echo __('Block: Grid Three Items Custom');
}

$title      = get_field('title');
$text       = get_field('text');
$section_id = get_field('section_id') ?: 'grid-three-items-custom_section';

?>

<section class="block-grid-three-items-custom" id="<?php echo $section_id; ?>">
    <div class="block-grid-three-items-custom__inner inner">
        <div class="block-grid-three-items-custom__content">
            <?php if ($title): ?>
                <h2 class="block-grid-three-items-custom__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <p class="block-grid-three-items-custom__text "><?php echo $text; ?></p>
            <?php endif; ?>

        </div>

        <div class="block-grid-three-items-custom__items">
            <?php while (have_rows('items')) : the_row('items'); ?>
                <div class="block-grid-three-items-custom__item">
                    <?php if ($img_item = get_sub_field('image')): ?>
                        <div class="block-grid-three-items-custom__item-image">
                            <?php echo wp_get_attachment_image( $img_item['ID'], 'full', false, [ 
                                'alt'     => $img_item['alt'] ?: ('Custom Trip Icon ' . $img_item['ID']),
                                'loading' => 'eager'
                            ] ) ?>
                        </div>
                    <?php endif; ?>
                    <div class="block-grid-three-items-custom__item-content">
                        <?php if ($title_item = get_sub_field('title')): ?>
                            <div class="block-grid-three-items-custom__item-title">
                                <?php echo $title_item; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($text_item = get_sub_field('text')): ?>
                            <div class="block-grid-three-items-custom__item-text">
                                <?php echo $text_item; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>


</section>
