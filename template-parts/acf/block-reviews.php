<?php
/**
 * Block: Reviews
 * @var array $block
 */

if (is_admin()):?>
    <?php echo __('Block: Reviews'); ?>
<?php endif; ?>

<?php
// fields


$image_url = get_template_directory_uri() . '/assets/images/home/Stars.png'; // Adjust the path and filename as per your directory structure
?>

<section class="block-reviews grid-animate">
    <div class="block-reviews__inner inner grid-animate-inner">
        <?php if ($title = get_field('title')): ?>
            <h2 class="block-reviews__title  grid-animate-title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if (get_field('items')): ?>
            <div class="block-reviews__items grid-animate-items">
                <?php while (have_rows('items')) : the_row('items'); ?>
                    <div class="block-reviews__item grid-animate-item">
                        <div class="block-reviews__item-container grid-animate-container">

                            <?php if ($icon = get_sub_field('photo')): ?>
                                <img class="block-reviews__item-icon grid-animate-icon"
                                     src="<?php echo $icon['url']; ?>" alt="photo">
                            <?php endif; ?>
                            <div class="block-reviews__item-stars">
                                <img class="" src="<?php echo $image_url; ?>" alt="stars">
                            </div>

                            <?php if ($text = get_sub_field('text')): ?>
                                <div class="block-reviews__item-text text grid-animate-text"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php if ($name = get_sub_field('name')): ?>
                                <div class="block-reviews__item-text name"><?php echo $name; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>