<?php
/**
 * Block: Thank You
 * @var array $block
 */

if (is_admin()){
    echo __('Block: Thank You');
}

$img_u      = get_field('image');
$img_icon   = get_field('icon');
$section_id = get_field('section_id') ?: 'thank-you_section';

?>

<section class="block-thank-you" id="<?php echo $section_id; ?>">
    <?php if ($img_u): ?>
        <?php  echo wp_get_attachment_image( $img_u['ID'], 'full', false, [ 
            'alt'     => $img_u['alt'] ?: 'Thank You Image Cover',
            'class'   => 'img-cover'
        ] )  ?>
    <?php endif; ?>
    <div class="block-thank-you__inner">
        <div class="block-thank-you__content">
            <?php if ($img_icon): ?>
                <?php echo wp_get_attachment_image( $img_icon['ID'], 'full', false, [ 
                    'alt'     => $img_icon['alt'] ?: 'Thank You Image',
                ] ) ?>
            <?php endif; ?>
            <?php if ($title = get_field('title')): ?>
                <h2 class="block-thank-you__title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($text = get_field('text')): ?>
                <p class="block-thank-you__text"><?php echo $text; ?></p>
            <?php endif; ?>

            <div class="block-thank-you__btn">
                <?php if ($cta = get_field('button')): ?>
                    <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"
                       class="block-thank-you__cta btn-primary">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 20.9706L3.51472 12.4853L12 4.00002" stroke="#FF7010" stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M3.51472 12.4853L20.4853 12.4853" stroke="#FF7010" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>

                        <?php echo $cta['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="block-thank-you__bottom">
            <?php if ($text_b = get_field('bottom_text')): ?>
                <p class=""><?php echo $text_b; ?></p>
            <?php endif; ?>
        </div>

    </div>
</section>