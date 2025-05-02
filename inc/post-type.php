<?php
//Hide Post Editor
function wph_hide_editor()
{
    remove_post_type_support('post', 'editor');
}

add_action('admin_init', 'wph_hide_editor');

add_action( 'init', 'new_default_post_type', 1 );
function new_default_post_type() {

    register_post_type( 'post', array(
        'labels' => array(
            'name_admin_bar' => 'Articles',
            'singular_name'  => 'Article',
            'menu_name'      => 'Articles',
        ),
        'description'       => 'Article Items',
        'public'            => true,
        'menu_position'     => 3,
        'supports'          => array('title', 'custom-fields'),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        // 'taxonomies'        => array(),
        'rewrite'           => array('slug' => 'article'),
    ) );
}

add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}
add_action('admin_menu', 'hide_default_posts_menu');
// Hide default Posts menu
function hide_default_posts_menu() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'hide_default_posts_menu');

