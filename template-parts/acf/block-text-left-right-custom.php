<?php
/**
 * Block: Image Text Left Right Custom
 * @var array $block
 */

if (is_admin()){
    echo __('Block: Image Text Left Right Custom');
}

$title          = get_field('title');
$text           = get_field('text');
$bg             = get_field('background_image');
$image          = get_field('image');
$choose_mode    = get_field('leftright');
$section_id     = get_field('section_id') ?: 'text-left-right-custom_section';

?>

<?php if ($choose_mode) : ?>
    <section id="<?php echo $section_id; ?>" class="block-image-text-left-right-custom right ">
        <?php if ($bg): ?>
            <?php echo wp_get_attachment_image( $bg['ID'], 'full', false, [ 
				'class' => 'img-cover',
				'alt'   => $bg['alt'] ?: "$title BG 2 " . $bg['ID'],
			] ) ?>
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
                <?php echo wp_get_attachment_image( $image['ID'], 'full', false, [ 
                    'alt'     => $image['alt'] ?: ('Block Trip Icon ' . $image['ID']),
                    'loading' => 'eager',
                    'class'   => 'img-cover'
                ] ) ?>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <section id="<?php echo $section_id; ?>" class="block-image-text-left-right-custom">
        <?php if ($bg): ?>
            <?php echo wp_get_attachment_image( $bg['ID'], 'full', false, [ 
				'class' => 'img-cover',
				'alt'   => $bg['alt'] ?: "$title Bg " . $bg['ID'],
			] ) ?>
        <?php endif; ?>
        <div class="block-image-text-left-right-custom__image">
            <?php if ($image = get_field('image')): ?>
                <?php echo wp_get_attachment_image( $image['ID'], 'full', false, [ 
                    'alt'     => $image['alt'] ?: ('Block Trip Icon ' . $image['ID']),
                    'loading' => 'eager',
                    'class'   => 'img-cover'
                ] ) ?>
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