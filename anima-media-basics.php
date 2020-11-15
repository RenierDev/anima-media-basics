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
// require_once('shortcode/videogif_shortcode.php');
include( plugin_dir_path( __FILE__ ) . 'shortcode/videogif_shortcode.php');