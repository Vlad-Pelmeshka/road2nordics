<?php
/**
 * Block: Quote
 * @var array $block
 */

if (is_admin()) {
    echo esc_html__('Block: Quote', 'text-domain');
}

// Fields
$quote_text = get_field('quote_text');
$quote_name = get_field('quote_name');
$quote_position = get_field('quote_position');

if ($quote_text): ?>
    <div class="single-acf-block__quote">

        <div class="single-acf-block__quote-text"><?php echo wp_kses_post($quote_text); ?></div>

        <div class="single-acf-block__quote-info">
            <?php if ($quote_name): ?>
                <div class="single-acf-block__quote-name"><?php echo esc_html($quote_name); ?></div>
            <?php endif; ?>
            <?php if ($quote_position): ?>
                <div class="single-acf-block__quote-position"><?php echo esc_html($quote_position); ?></div>
            <?php endif; ?>
        </div>

    </div>
<?php endif; ?>
