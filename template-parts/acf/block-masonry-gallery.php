<?php
/**
 * Block: Masonry Gallery
 * @var array $block
 */

if (is_admin()){
    echo __('Block: Masonry Gallery');
}

$title      = get_field('title');
$gallery    = get_field('gallery_images');
$section_id = get_field('section_id') ?: 'masonry_gallery';

?>

<?php if ($gallery): ?>
    <section class="grid-gallery">
        <?php if ($title): ?>
            <h2 class="grid-gallery__title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="grid-gallery-inner" id="<?php echo esc_attr($section_id); ?>">
            <?php foreach ($gallery as $image): ?>
                <div class="grid-item">
                    <a href="<?php echo esc_url($image['url']); ?>"
                       class="glightbox"
                       data-gallery="acf-gallery">
                        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
