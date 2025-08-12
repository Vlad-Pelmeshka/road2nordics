<?php
//Hide Post Editor

function hide_default_posts_menu() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'hide_default_posts_menu');

add_action( 'init', 'new_default_post_type', 1 );
function new_default_post_type() {

    register_post_type( 'post', array(
        'labels' => array(
            'name_admin_bar' => 'Blog',
            'singular_name'  => 'Post',
            'menu_name'      => 'Blog',
        ),
        'description'       => 'Blog Items',
        'public'            => true,
        'menu_position'     => 3,
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        // 'taxonomies'        => array(),
        'rewrite'           => array('slug' => 'blog'),
        'show_in_rest'      => true,
    ) );
}

