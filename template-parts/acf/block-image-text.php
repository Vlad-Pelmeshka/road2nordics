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
<section class="block-image-text">
    <div class="block-image-text__image">
        <?php if ($image = get_field('image')): ?>
            <img class="img-cover" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
        <?php endif; ?>
    </div>

    <div class="block-image-text__content">
        <?php if ($title): ?>
            <h2 class="block-image-text__title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if ($text): ?>
            <p class="block-image-text__text "><?php echo $text; ?></p>
        <?php endif; ?>

        <div class="block-image-text__btn">
            <?php if ($cta = get_field('button')): ?>
                <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"
                   class="block-image-text__cta btn-primary">
                    <?php echo $cta['title']; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>

</section>
