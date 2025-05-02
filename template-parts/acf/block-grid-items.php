<?php
/**
 * Block: Grid Items
 * @var array $block
 */

if (is_admin()):?>
    <?php echo __('Block: Grid Item'); ?>
<?php endif; ?>

<?php
// fields

$quote_text = get_field('quote_text');
$quote_name = get_field('quote_name');
$quote_position = get_field('quote_position');

$image_url = get_template_directory_uri() . '/assets/images/home/banner_bg.jpg'; // Adjust the path and filename as per your directory structure
?>

<section class="block-grid-items grid-animate">
    <div class="block-grid-items__inner inner grid-animate-inner">
        <?php if (get_field('items')): ?>
            <div class="block-grid-items__items grid-animate-items">
                <?php while (have_rows('items')) : the_row('items'); ?>
                    <div class="block-grid-items__item grid-animate-item">
                        <div class="block-grid-items__item-container grid-animate-container">
                            <div class="block-grid-items__item-content grid-animate-content">
                                <?php if ($icon = get_sub_field('icon')): ?>
                                    <img class="block-grid-items__item-icon grid-animate-icon" src="<?php echo $icon['url']; ?>" alt="features">
                                <?php endif; ?>
                                <?php if ($title = get_sub_field('title')): ?>
                                    <h2 class="block-grid-items__item-title block-title-m grid-animate-title"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if ($text = get_sub_field('text')): ?>
                                    <div class="block-grid-items__item-text text grid-animate-text"><?php echo $text; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="block-grid-items__quote grid-animate-quote">
            <div class="block-grid-items__quote-stars grid-animate-stars">
                <svg width="152" height="25" viewBox="0 0 152 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 0.5L15.6678 7.45173L23.4127 8.7918L17.9346 14.4283L19.0534 22.2082L12 18.74L4.94658 22.2082L6.06541 14.4283L0.587322 8.7918L8.33222 7.45173L12 0.5Z" fill="#C9CAFF"/>
                    <path d="M44 0.5L47.6678 7.45173L55.4127 8.7918L49.9346 14.4283L51.0534 22.2082L44 18.74L36.9466 22.2082L38.0654 14.4283L32.5873 8.7918L40.3322 7.45173L44 0.5Z" fill="#C9CAFF"/>
                    <path d="M76 0.5L79.6678 7.45173L87.4127 8.7918L81.9346 14.4283L83.0534 22.2082L76 18.74L68.9466 22.2082L70.0654 14.4283L64.5873 8.7918L72.3322 7.45173L76 0.5Z" fill="#C9CAFF"/>
                    <path d="M108 0.5L111.668 7.45173L119.413 8.7918L113.935 14.4283L115.053 22.2082L108 18.74L100.947 22.2082L102.065 14.4283L96.5873 8.7918L104.332 7.45173L108 0.5Z" fill="#C9CAFF"/>
                    <path d="M140 0.5L143.668 7.45173L151.413 8.7918L145.935 14.4283L147.053 22.2082L140 18.74L132.947 22.2082L134.065 14.4283L128.587 8.7918L136.332 7.45173L140 0.5Z" fill="#C9CAFF"/>
                </svg>
            </div>
            <?php if ($quote_text): ?>
                <div class="block-grid-items__quote-text grid-animate-quote-text"><?php echo $quote_text; ?></div>
            <?php endif; ?>
            <div class="block-grid-items__quote-info grid-animate-quote-info">
                <?php if ($quote_name): ?>
                    <div class="block-grid-items__quote-name grid-animate-quote-name"><?php echo $quote_name; ?></div>
                <?php endif; ?>
                <?php if ($quote_position): ?>
                    <div class="block-grid-items__quote-position grid-animate-quote-position"><?php echo $quote_position; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
