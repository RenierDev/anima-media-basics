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
// include('shortcode/videogif_shortcode.php');


// Video gif shortcode
function videogif($atts = [])
{
    // normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    // override default attributes with user attributes
    $wporg_atts = shortcode_atts([
        'mp4' => $atts['mp4'],
        'style' => null,
        'controls' => False
    ], $atts);

    // build output
    $o = '';
    $o .= '<video autoplay loop muted playsinline ';
    if ($wporg_atts['controls']) $o .= 'controls ';
    $o .= 'class="videogif"';
    if (!is_null($wporg_atts['style'])) $o .= 'style="' . $wporg_atts['style'] . '" ';
    $o .= '><source src="' . $wporg_atts['mp4'] . '" type="video/mp4" />';
    $o .= '<p>Your browser does not support the video element.</p></video>';

    // return output
    return $o;
}
add_shortcode('videogif', 'videogif');

function videogif_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'videogif', $plugin_url . 'css/videogif.css' );
}
add_action( 'wp_enqueue_scripts', 'videogif_load_plugin_css' );