<?php
/* SVG Support */
add_filter( 'upload_mimes', 'cc_mime_types' );
add_action( 'admin_head', 'fix_svg' );
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
function fix_svg() {
	echo "<style type=\"text/css\">
           .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
           }
        </style>";
}

/* General Functions */
function get_copyright_text() {
	return str_replace( '{{year}}', date( 'Y' ), get_field( 'copyright_text', 'options' ) );
}

/* General Options */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( [ 
		'page_title' => 'General Settings',
		'menu_title' => 'General Settings',
		'menu_slug'  => 'general_settings',
		'capability' => 'manage_options',
		'redirect'   => true,
	] );
}

/* Register Custom Query */
function get_query_param( $param, $default = '' ) {
	return ! empty( $_GET[ $param ] ) ? $_GET[ $param ] : $default;
}

/* Socials List */
function get_socials_list() {
	return [ 
		'twitter', 'youtube', 'instagram', 'linkedin', 'vimeo', 'facebook'
	];
}

/* Generating sliced image URL */
function get_url_image_by_size( $image_arr, $size = false ) {
	if ( ! $image_arr )
		return;
	if ( $size ) {
		if ( $image_arr['sizes'][ $size ] ) {
			return $image_arr['sizes'][ $size ];
		} else {
			return $image_arr['url'];
		}
	} else {
		return $image_arr['url'];
	}
}

/* Get Link Target */
function get_link_target( $link ) {
	return $link['target'] ? $link['target'] : '_self';
}

/* Get ALT Image */

function get_alt_image( $image, $ID ) {
	return $image['alt'] ? $image['alt'] : get_the_title( $ID );
}

add_action( 'admin_init', function () {
	// Redirect any user trying to access comments page
	global $pagenow;

	if ( $pagenow === 'edit-comments.php' ) {
		wp_safe_redirect( admin_url() );
		exit;
	}

	// Remove comments metabox from dashboard
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

	// Disable support for comments and trackbacks in post types
	foreach ( get_post_types() as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
} );

// Close comments on the front-end
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

// Hide existing comments
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

// Remove comments page in menu
add_action( 'admin_menu', function () {
	remove_menu_page( 'edit-comments.php' );
} );

// Remove comments links from admin bar
add_action( 'init', function () {
	if ( is_admin_bar_showing() ) {
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
	}
} );

//Disable emojis in WordPress
add_action( 'init', 'smartwp_disable_emojis' );

function smartwp_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function mytheme_setup() {
	add_theme_support( 'editor-styles' ); // Enables theme styles in the editor
	add_theme_support( 'wp-block-styles' ); // Enables default block styles
	add_theme_support( 'align-wide' ); // Allows wide and full-width blocks
	add_theme_support( 'editor-color-palette' ); // Custom color palette
	add_theme_support( 'responsive-embeds' ); // Ensures responsive embeds
	add_theme_support( 'custom-spacing' ); // Enables spacing controls
	add_theme_support( 'custom-line-height' ); // Enables line height controls
	add_theme_support( 'custom-units', array( 'px', 'em', 'rem', 'vh', 'vw', '%' ) ); // Enables custom units
}
add_action( 'after_setup_theme', 'mytheme_setup' );
/* Debugger */
function dd( $e ) {
	echo '<pre>';
	echo var_dump( $e );
	echo '</pre>';
	die();
}
