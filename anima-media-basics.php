<?php
/*
Plugin Name: Anima Media Basics
Plugin URI: 
Description: Functions and shortcode stuff for Anima Media, by Anima Media
Version: 
Author: Renier Myburgh
Author URI: 
License: 
License URI: 
*/

include('inc/allow_webp.php');
include('inc/remove_topbar_logo.php');
include('inc/set_logo_to_login.php');

include('shortcode/flipcard_shortcode.php');
include('shortcode/videogif_shortcode.php');

function videogif_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'videogif', $plugin_url . 'css/videogif.css' );
}
add_action( 'wp_enqueue_scripts', 'videogif_load_plugin_css' );