<?php
/**
 * Block: Image Text
 * @var array $block
 */

if (is_admin()){
    echo __('Block: Image Text');
}

$title = get_field('title');
$text = get_field('text');
$image = get_field('image');

?>

<section class="block-image-text-rotate">
    <div class="block-image-text-rotate__image">
        <div class="flip-container animated-section">
            <div class="flipper">
                <?php if ($image_f = get_field('front')): ?>
                    <div class="front">
                        <?php echo wp_get_attachment_image( $image_f['ID'], 'full', false, [ 
                            'decoding'   => "async",
                            'alt'     => 'Front Image Rotate',
                        ] ) ?>
                    </div>
                <?php endif; ?>
                <?php if ($image_b = get_field('back')): ?>
                    <div class="back">
                        <?php echo wp_get_attachment_image( $image_b['ID'], 'full', false, [ 
                            'decoding'   => "async",
                            'alt'     => 'Back Image Rotate',
                        ] ) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($image = get_field('image')): ?>
            <?php echo wp_get_attachment_image( $image['ID'], 'full', false, [ 
                'class'   => "img-cover",
                'alt'     => $image['alt'] ?: ('Image rotate' . $image['ID']),
            ] ) ?>
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
