<?php
/*
Plugin Name: NACHC admin tweaks
Plugin Script: nachc_admin.php
Plugin URI: http://ryancanhelpyou.com
Description: NACHC admin tweaks
Version: 1.1
License: GPL
Author: Ryan King
Author URI: http://ryancanhelpyou.com

=== RELEASE NOTES ===
2015-08-31 - v1.0 - first version
*/


// uncomment next line if you need functions in external PHP script;
// include_once(dirname(__FILE__).'/some-library-in-same-folder.php');

// ------------------

if ( ! function_exists( 'cptui_register_my_taxes' ) ) {
add_action( 'init', 'cptui_register_my_taxes' );
function cptui_register_my_taxes() {

	$labels = array(
		"name" => "Categories",
		"label" => "Categories",
		);

	$args = array(
		"labels" => $labels,
		"hierarchical" => true,
		"label" => "Categories",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'category', 'with_front' => false ),
		"show_admin_column" => true,
	);
	register_taxonomy( "news_category", array( "news_center" ), $args );

// End cptui_register_my_taxes
}
}

if ( ! function_exists( 'cptui_register_my_cpts' ) ) {
add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => "News",
		"singular_name" => "News",
		"menu_name" => "News",
		"add_new_item" => "Add New Item",
		);

	$args = array(
		"labels" => $labels,
		"description" => "NACHC News Updates",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "news", "with_front" => false ),
		"query_var" => true,
		"menu_icon" => "dashicons-clipboard",		
		"supports" => array( "title", "editor", "excerpt", "revisions", "author" ),		
		"taxonomies" => array( "post_tag", "news_category" )
	);
	register_post_type( "news_center", $args );

// End of cptui_register_my_cpts()
}
}

// create News Options page config
if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'News Display Settings',
		'menu_title' 	=> 'Display Settings',
		'menu_slug' 	=> 'news-display-settings',
		'capability' 	=> 'edit_posts',
		'parent_slug' => 'edit.php?post_type=news_center',
		'redirect' 	=> false
	));
 
}