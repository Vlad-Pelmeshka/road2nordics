<?php
/**
 * Block: Review
 * @var array $block
 */

if (is_admin()):?>
    <?php echo __('Block: Review'); ?>
<?php endif; ?>

<?php
// fields

$section_id = get_field('section_id');
$image_url = get_template_directory_uri() . '/assets/images/home/Stars.png'; // Adjust the path and filename as per your directory structure
?>

<section class="block-review grid-animate" id="<?php if ($section_id = get_field('section_id')):?><?php echo $section_id; ?><?php endif; ?>">
    <div class="block-review__inner inner grid-animate-inner">
        <?php if ($title = get_field('title')): ?>
            <h2 class="block-review__title  grid-animate-title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if (get_field('items')): ?>
            <div class="block-review__items grid-animate-items">
                <?php while (have_rows('items')) : the_row('items'); ?>
                    <div class="block-review__item grid-animate-item">
                        <div class="block-review__item-container grid-animate-container">

                            <?php if ($icon = get_sub_field('photo')): ?>
                                <img class="block-review__item-icon grid-animate-icon"
                                     src="<?php echo $icon['url']; ?>" alt="photo">
                            <?php endif; ?>
                            <div class="block-review__item-stars">
                                <img class="" src="<?php echo $image_url; ?>" alt="stars">
                            </div>

                            <?php if ($text = get_sub_field('text')): ?>
                                <div class="block-review__item-text text grid-animate-text"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php if ($name = get_sub_field('name')): ?>
                                <div class="block-review__item-text name"><?php echo $name; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>