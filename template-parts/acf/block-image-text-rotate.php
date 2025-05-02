<?php
/**
 * Block: Image Text
 * @var array $block
 */

if (is_admin()):?>
    <?php echo __('Block: Image Text'); ?>
<?php endif; ?>

<?php
$title = get_field('title');
$text = get_field('text');
$image = get_field('image');;
?>
<section class="block-image-text-rotate">
    <div class="block-image-text-rotate__image">
        <div class="flip-container animated-section">
            <div class="flipper">
                <?php if ($image_f = get_field('front')): ?>
                    <div class="front">
                        <img decoding="async"  src="<?php echo $image_f['url']; ?>" alt="Front Image">
                    </div>
                <?php endif; ?>
                <?php if ($image_b = get_field('back')): ?>
                    <div class="back">
                        <img decoding="async" src="<?php echo $image_b['url']; ?>" alt="Back Image">
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($image = get_field('image')): ?>
            <img class="img-cover" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
        <?php endif; ?>


    </div>

    <div class="block-image-text-rotate__content">
        <?php if ($title): ?>
            <h2 class="block-image-text-rotate__title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if ($text): ?>
            <p class="block-image-text-rotate__text "><?php echo $text; ?></p>
        <?php endif; ?>



    </div>

</section>
