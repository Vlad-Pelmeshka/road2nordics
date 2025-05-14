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
                        <svg class="svg-inline--fas-fa-arrow-left premium-drawable-icon premium-svg-nodraw"
                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path>
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