<?php
/**
 * Block: About
 * @var array $block
 */

if (is_admin()){
    echo __('Block: About');
}

$title  = get_field('title');
$text   = get_field('text');

?>

<section class="block-about about-animate">
    <div class="block-about__inner inner about-animate-inner">
        <div class="block-about__content about-animate-content">
            <?php if ($title): ?>
                <h2 class="block-about__title block-title-m about-animate-title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <div class="block-about__text about-animate-text"><?php echo $text; ?></div>
            <?php endif; ?>
        </div>

        <div class="block-about__image about-animate-image">
            <?php if ($image = get_field('image')): ?>
                <?php echo wp_get_attachment_image( $image['ID'], 'full', false, [ 
                    'decoding'   => "async",
                    'alt'     => 'About Image',
                ] ) ?>
            <?php endif; ?>
        </div>
    </div>
</section>