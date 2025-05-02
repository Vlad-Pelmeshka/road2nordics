<?php
/**
 * Design Theme functions and definitions
 */

remove_action('wp_head', 'wp_generator');

define('TEMPLATE_DIRECTORY', get_template_directory());
define('TEMPLATE_DIRECTORY_URI', get_template_directory_uri());
define('STYLESHEET_URI', get_stylesheet_uri());
define('STYLESHEET_DIRECTORY', get_stylesheet_directory());
define('APP_VERSION', '1.7');

/* Autoload theme files */
$folders = array(
    'inc', 'custom-fields'
);
foreach ($folders as $folder) {
    $folder = get_template_directory() . DIRECTORY_SEPARATOR . $folder;
    if (is_dir($folder)) {
        foreach (scandir($folder) as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $filepath = $folder . DIRECTORY_SEPARATOR . $file;
            $pathinfo = pathinfo($filepath);
            if (isset($pathinfo['extension']) && $pathinfo['extension'] == 'php') {
                include_once $filepath;
            }
        }
    }
}


// Enable support for default Gutenberg blocks
function datizy_theme_setup()
{
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-line-height');
    add_theme_support('custom-spacing');
}

add_action('after_setup_theme', 'datizy_theme_setup');

// Allow all default Gutenberg blocks
add_filter('allowed_block_types_all', function ($allowed_blocks, $editor_context) {
    return true; // Enables all default blocks
}, 10, 2);

add_action('init', function () {
    update_option('crc_base_currency', 'USD');
    update_option('crc_target_currency', 'EUR');
});