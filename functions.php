<?php
/**
 * Design Theme functions and definitions
 */

remove_action('wp_head', 'wp_generator');

define('TEMPLATE_DIRECTORY', get_template_directory());
define('TEMPLATE_DIRECTORY_URI', get_template_directory_uri());
define('STYLESHEET_URI', get_stylesheet_uri());
define('STYLESHEET_DIRECTORY', get_stylesheet_directory());
define('APP_VERSION', '1.8');

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


function get_all_tags_list() {
    $tags = get_tags([
        'hide_empty' => false,
    ]);

    $tag_list = [];

    foreach ($tags as $tag) {
        $visible_posts = get_posts([
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'tag_id'         => $tag->term_id,
            'posts_per_page' => -1, 
            'meta_query'     => [
                'relation' => 'OR',
                [
                    'key'     => 'hide_el',
                    'value'   => '1',
                    'compare' => '!='
                ],
                [
                    'key'     => 'hide_el',
                    'compare' => 'NOT EXISTS'
                ]
            ]
        ]);

        if (!empty($visible_posts)) {
            $tag_list[] = [
                'id'    => $tag->term_id,
                'name'  => $tag->name,
                'slug'  => $tag->slug,
                'count' => count($visible_posts), 
            ];
        }
    }

    return $tag_list;
}


function get_first_blog_item(){
    return 0;
    $blog_info = get_field('blog_info', 'options');
    $top_post = $blog_info['top_post'];

    switch($top_post['top_post_select']){
        case 'select':
            return $top_post['top_post_item'];
            break;

        case 'latest':
        default:
            $recent_posts = wp_get_recent_posts([
                'numberposts' => 1,
                'post_status' => 'publish',
            ]);
            if ( ! empty( $recent_posts ) ) {
                $latest_post_id = $recent_posts[0]['ID'];
                return $latest_post_id;
            }

            return 0;
    }
}

add_action( 'pre_get_posts', function( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {

        if (empty($_GET['tag']) && $query->is_archive() ) {
            $post__not_in = $query->get( 'post__not_in' );

            if ( ! is_array( $post__not_in ) ) {
                $post__not_in = [];
            }

            $post__not_in[] = get_first_blog_item(); 

            $query->set( 'post__not_in', $post__not_in );
        }
    }
} );


add_filter( 'the_content', 'add_ids_to_case_study_headings' );

function add_ids_to_case_study_headings( $content ) {
    if ( is_admin() || (get_post_type() !== 'post' ) ) {
        return $content;
    }

    global $nav_content_headings;
    $nav_content_headings = [];

    return preg_replace_callback(
        '/<h2([^>]*class="[^"]*wp-block-heading[^"]*"[^>]*)>(.*?)<\/h2>/is',
        function ( $matches ) use ( &$nav_content_headings ) {
            $attributes = $matches[1];
            $heading_text = trim( strip_tags( $matches[2] ) );

            $id = sanitize_title( $heading_text );

            static $used_ids = [];
            $original_id = $id;
            $i = 2;
            while ( in_array( $id, $used_ids ) ) {
                $id = $original_id . '-' . $i++;
            }
            $used_ids[] = $id;

            $nav_content_headings[] = [
                'id'   => $id,
                'text' => $heading_text,
            ];

            return sprintf( '<h2%s id="%s">%s</h2>', $attributes, esc_attr( $id ), $matches[2] );
        },
        $content
    );
}

function get_three_random_posts($post__not_in = 0) {
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'orderby'        => 'rand',
        'post__not_in'   => [$post__not_in], 
        'post_status'    => 'publish',
        'fields'         => 'ids'
    ];

    return get_posts($args);
}
