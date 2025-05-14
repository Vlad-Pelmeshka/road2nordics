<?php
/**
 * Block: Adventure
 * @var array $block
 */

if (is_admin()){
    echo __('Block: Bonus');
}

$title      = get_field('title');
$text       = get_field('text');
$section_id = get_field('section_id') ?: 'bonus_section';

?>

<section id="<?php echo $section_id; ?>" class="block-bonus">
    <div class="block-bonus__content">
        <?php if ($title): ?>
            <h2 class="block-bonus__title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($text): ?>
            <div class="block-bonus__text"><?php echo $text; ?></div>
        <?php endif; ?>
    </div>
</section>
