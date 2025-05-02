<?php

global $custom_blocks;
$custom_blocks = [
    'acf/banner-hero' => 'Banner: Hero',
    'acf/banner-hero-ebook' => 'Banner: Hero Ebook',
    'acf/block-grid-items' => 'Block: Grid Items',
    'acf/block-faq' => __('Block: Faq'),
    'acf/block-quote' => __('Block: Quote'),
    'acf/block-grid-four-items' => __('Block: Grid Four Items'),
    'acf/block-testimonials' => __('Block: Testimonials'),
    'acf/block-logo-sliders' => __('Block: Logo Slider'),
    'acf/block-image-text' => __('Block: Image Text'),
    'acf/block-grid-two-items' => __('Block: Grid Two Items'),
    'acf/block-grid-mix-items' => __('Block: Grid Mix Items'),
    'acf/block-grid-three-items' => __('Block: Grid Three Items'),
    'acf/block-grid-two-items-custom' => __('Block: Grid Two Items Custom'),
    'acf/block-grid-three-items-custom' => __('Block: Grid Three Items Custom'),
    'acf/block-text-left-right' => __('Block: Image Text Left Right'),
    'acf/block-text-left-right-custom' => __('Block: Image Text Left Right Custom'),
    'acf/block-reviews' => __('Block: Reviews'),
    'acf/block-review' => __('Block: Review'),
    'acf/block-masonry-gallery' => __('Block: Masonry Gallery'),
    'acf/block-image-text-rotate' => __('Block: Image Text Rotate'),
    'acf/block-adventure' => __('Block: Adventure'),
    'acf/block-journey' => __('Block: Journey'),
    'acf/block-limited' => __('Block: Limited'),
    'acf/block-thank-you' => __('Block: Thank You'),
    'acf/block-why-custom-trip-grid' => __('Block: Why Custom Trip Grid'),
    'acf/block-bonus' => __('Block: Bonus'),


];

// Sort ACF blocks
ksort($custom_blocks);

add_filter('allowed_block_types', 'tunit_allowed_block_types', 10, 2);
function tunit_allowed_block_types($allowed_blocks, $editor_context)
{
    global $custom_blocks;

    // Check if we are in a post editor context
    if (!empty($editor_context->post)) {
        // Get default Gutenberg blocks
        $default_blocks = [
            'core/paragraph', 'core/image', 'core/heading', 'core/gallery', 'core/list', 'core/quote',
            'core/audio', 'core/cover', 'core/file', 'core/video', 'core/table', 'core/verse', 'core/code',
            'core/freeform', 'core/html', 'core/preformatted', 'core/pullquote', 'core/buttons', 'core/button',
            'core/columns', 'core/group', 'core/media-text', 'core/separator', 'core/spacer', 'core/shortcode',
            'core/social-links', 'core/social-link', 'core/more', 'core/nextpage', 'core/latest-posts',
            'core/latest-comments', 'core/archives', 'core/categories', 'core/tag-cloud', 'core/rss',
            'core/search', 'core/site-title', 'core/site-tagline', 'core/site-logo', 'core/navigation',
            'core/post-title', 'core/post-content', 'core/post-excerpt', 'core/post-date', 'core/post-terms',
            'core/query', 'core/query-loop', 'core/post-template', 'core/loginout', 'core/page-list'
        ];

        // Merge ACF blocks with default Gutenberg blocks
        return array_merge(array_keys($custom_blocks), $default_blocks);
    }

    return $allowed_blocks;
}

add_action('acf/init', 'tunit_acf_init');
function tunit_acf_init()
{
    if (function_exists('acf_register_block_type')) {
        global $custom_blocks;
        foreach ($custom_blocks as $name => $label) {
            $block_name = substr($name, 4); // Remove 'acf/' prefix
            acf_register_block_type([
                'name' => $block_name,
                'title' => $label,
                'render_callback' => 'tunit_acf_block_render',
            ]);
        }
    }
}

function tunit_acf_block_render($block)
{
    // Render ACF blocks with a custom wrapper
    $file = get_theme_file_path("/template-parts/{$block['name']}.php");
    if (file_exists($file)) {
        include $file;
    }
}

// Hook into the content filter to modify block rendering globally
add_filter('the_content', 'tunit_custom_block_renderer');
function tunit_custom_block_renderer($content)
{
    // Check if we're on a page
    if (is_page()) {
        // Parse all blocks in the content
        $blocks = parse_blocks($content);
        $output = '';

        foreach ($blocks as $block) {
            $block_name = isset($block['blockName']) ? $block['blockName'] : '';

            // If it's a default Gutenberg block, wrap it in <div class="inner">
            if (in_array($block_name, [
                'core/paragraph', 'core/image', 'core/heading', 'core/gallery', 'core/list', 'core/quote',
                'core/audio', 'core/cover', 'core/file', 'core/video', 'core/table', 'core/verse', 'core/code',
                'core/freeform', 'core/html', 'core/preformatted', 'core/pullquote', 'core/buttons', 'core/button',
                'core/columns', 'core/group', 'core/media-text', 'core/separator', 'core/spacer', 'core/shortcode',
                'core/social-links', 'core/social-link', 'core/more', 'core/nextpage', 'core/latest-posts',
                'core/latest-comments', 'core/archives', 'core/categories', 'core/tag-cloud', 'core/rss',
                'core/search', 'core/site-title', 'core/site-tagline', 'core/site-logo', 'core/navigation',
                'core/post-title', 'core/post-content', 'core/post-excerpt', 'core/post-date', 'core/post-terms',
                'core/query', 'core/query-loop', 'core/post-template', 'core/loginout', 'core/page-list'
            ])) {
                // Wrap default Gutenberg blocks in <div class="inner">
                $output .= '<div class="inner">' . render_block($block) . '</div>';
            } elseif (strpos($block_name, 'acf/') === 0) {
                // ACF block with custom wrapper (no wrapping here)
                $output .= render_block($block);
            } else {
                // Any other blocks (third-party or unknown)
                $output .= render_block($block);
            }
        }

        return $output;
    }

    return $content; // Return the content unchanged for non-pages
}

