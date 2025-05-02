<?php
/**
 * Block: Image Text Left Right Custom
 * @var array $block
 */

if (is_admin()):?>
    <?php echo __('Block: Image Text Left Right Custom'); ?>
<?php endif; ?>

<?php
$title = get_field('title');
$text = get_field('text');
$bg = get_field('background_image');
$image = get_field('image');
$choose_mode = get_field('leftright');
$section_id = get_field('section_id');
?>

<?php if (!$choose_mode) : ?>
    <section id="<?php if ($section_id = get_field('section_id')): ?><?php echo $section_id; ?><?php endif; ?>"
             class="block-image-text-left-right-custom">
        <?php if ($bg): ?>
            <img class="img-cover" src="<?php echo $bg['url']; ?>" alt="
        <?php echo $bg['alt']; ?>"/>
        <?php endif; ?>
        <div class="block-image-text-left-right-custom__image">
            <?php if ($image = get_field('image')): ?>
                <img class="img-cover" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
            <?php endif; ?>
        </div>

        <div class="block-image-text-left-right-custom__content">

            <?php if ($title): ?>
                <h2 class="block-image-text-left-right-custom__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <div class="block-image-text-left-right-custom__text"><?php echo $text; ?></div>
            <?php endif; ?>

            <div class="block-image-text-left-right-custom__btn">
                <?php if ($cta = get_field('button')): ?>
                    <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"
                       class="block-image-text-left-right-custom__cta btn-primary">
                        <?php echo $cta['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($choose_mode) : ?>
    <section id="<?php if ($section_id = get_field('section_id')): ?><?php echo $section_id; ?><?php endif; ?>"
             class="block-image-text-left-right-custom right ">
        <?php if ($bg): ?>
            <img class="img-cover" src="<?php echo $bg['url']; ?>" alt="
        <?php echo $bg['alt']; ?>"/>
        <?php endif; ?>
        <div class="block-image-text-left-right-custom__content">

            <?php if ($title): ?>
                <h2 class="block-image-text-left-right-custom__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <div class="block-image-text-left-right-custom__text"><?php echo $text; ?></div>
            <?php endif; ?>

            <div class="block-image-text-left-right-custom__btn">
                <?php if ($cta = get_field('button')): ?>
                    <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"
                       class="block-image-text-left-right-custom__cta btn-primary">
                        <?php echo $cta['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="block-image-text-left-right-custom__image">
            <?php if ($image = get_field('image')): ?>
                <img class="img-cover" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>